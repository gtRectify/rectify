<?php

namespace InstagramFeed\Integrations\Divi;

use InstagramFeed\Integrations\SBI_Integration;

/**
 * Class Divi Handler.
 *
 * @since 6.1
 */
class SBI_Divi_Handler
{
	/**
	 * Constructor.
	 *
	 * @since 6.1
	 */
	public function __construct()
	{
		$this->load();
	}

	/**
	 * Load an integration.
	 *
	 * @since 6.1
	 */
	public function load()
	{
		if ($this->allow_load()) {
			$this->hooks();
		}
	}

	/**
	 * Indicate if current integration is allowed to load.
	 *
	 * @return bool
	 * @since 6.1
	 */
	public function allow_load()
	{
		if (function_exists('et_divi_builder_init_plugin')) {
			return true;
		}

		$allow_themes = ['Divi'];
		$theme_name = get_template();

		return in_array($theme_name, $allow_themes, true);
	}

	/**
	 * Hooks.
	 *
	 * @since 6.1
	 */
	public function hooks()
	{

		add_action('et_builder_ready', [$this, 'register_module']);

		if (wp_doing_ajax()) {
			add_action('wp_ajax_sb_instagramfeed_divi_preview', [$this, 'preview']);
		}

		if ($this->is_divi_builder()) {
			add_action('wp_enqueue_scripts', [$this, 'builder_scripts']);
		}

		// Divi 5: Register feed scripts in the VB iframe via PackageBuildManager.
		// D5 legacy modules render via server-side AJAX — the standard wp_enqueue_scripts
		// path may not load scripts in the iframe, so this ensures they are available.
		if ($this->is_divi5()) {
			add_action(
				'divi_visual_builder_assets_before_enqueue_scripts',
				[$this, 'divi5_vb_assets']
			);
		}
	}

	/**
	 * Determine if a current page is opened in the Divi Builder.
	 *
	 * @return bool
	 * @since 6.1
	 */
	private function is_divi_builder()
	{

		if (!empty($_GET['et_fb'])) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		// Divi 5 compatible check.
		if (function_exists('et_core_is_fb_enabled') && et_core_is_fb_enabled()) {
			return true;
		}

		return false;
	}

	/**
	 * Determine if Divi 5 is active.
	 *
	 * @return bool
	 * @since 6.x
	 */
	private function is_divi5()
	{
		return function_exists('et_builder_d5_enabled') && et_builder_d5_enabled();
	}

	/**
	 * Load scripts.
	 *
	 * @since 6.1
	 */
	public function builder_scripts()
	{

		wp_enqueue_script(
			'sbinstagram-divi',
			// The unminified version is not supported by the browser.
			SBI_PLUGIN_URL . 'admin/assets/js/divi-handler.min.js',
			['react', 'react-dom', 'jquery'],
			SBIVER,
			true
		);

		wp_localize_script(
			'sbinstagram-divi',
			'sb_divi_builder',
			[
				'ajax_handler' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('sbi-admin'),
				'feed_splash' => htmlspecialchars(SBI_Integration::get_widget_cta('button'))
			]
		);

		$upload = wp_upload_dir();
		$resized_url = trailingslashit($upload['baseurl']) . trailingslashit(SBI_UPLOADS_NAME);

		$js_options = array(
			'font_method' => 'svg',
			'placeholder' => trailingslashit(SBI_PLUGIN_URL) . 'img/placeholder.png',
			'resized_url' => $resized_url,
			'ajax_url' => admin_url('admin-ajax.php'),
		);

		wp_enqueue_script(
			'sbiscripts',
			SBI_PLUGIN_URL . 'js/sbi-scripts.min.js',
			array('jquery'),
			SBIVER,
			true
		);
		wp_localize_script('sbiscripts', 'sb_instagram_js_options', $js_options);

		// Divi 5 bridge: MutationObserver that re-initializes feeds after D5
		// injects or replaces module HTML in the VB iframe.
		if ($this->is_divi5()) {
			wp_enqueue_script(
				'sbi-divi5-bridge',
				SBI_PLUGIN_URL . 'admin/assets/js/divi5-bridge.js',
				array('sbiscripts'),
				SBIVER,
				true
			);
		}
	}

	/**
	 * Register feed scripts in the Divi 5 Visual Builder iframe.
	 *
	 * Divi 5 legacy modules render server-side and inject HTML into the VB iframe.
	 * PackageBuildManager is the D5-native way to ensure scripts are available
	 * inside the iframe where the feed HTML needs to be initialized.
	 *
	 * @since 6.x
	 */
	public function divi5_vb_assets()
	{
		$package_manager = 'ET\\Builder\\VisualBuilder\\Assets\\PackageBuildManager';

		if (!class_exists($package_manager)) {
			return;
		}

		// Bridge script — MutationObserver that calls sbi_init() after D5 injects HTML.
		// Only the bridge needs PackageBuildManager. The feed scripts (sbi-scripts.min.js)
		// are already loaded via wp_enqueue_scripts in builder_scripts() with proper
		// wp_localize_script data. Registering them here too would double-load the file
		// without the localized sb_instagram_js_options, causing a ReferenceError.
		$package_manager::register_package_build(
			[
				'name'    => 'sbi-divi5-bridge',
				'version' => SBIVER,
				'script'  => [
					'src'                => SBI_PLUGIN_URL . 'admin/assets/js/divi5-bridge.js',
					'deps'               => ['jquery'],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);
	}

	/**
	 * Register module.
	 *
	 * @since 6.1
	 */
	public function register_module()
	{

		if (!class_exists('ET_Builder_Module')) {
			return;
		}

		new SBInstagramFeed();
	}

	/**
	 * Ajax handler for the Feed preview.
	 *
	 * @since 6.1
	 */
	public function preview()
	{

		check_ajax_referer('sbi-admin', 'nonce');

		if (!sbi_current_user_can('manage_instagram_feed_options')) {
			wp_send_json_error();
		}

		$feed_id = absint(filter_input(INPUT_POST, 'feed_id', FILTER_SANITIZE_NUMBER_INT));

		wp_send_json_success(
			do_shortcode(
				sprintf(
					'[instagram-feed feed="%1$s"]',
					absint($feed_id)
				)
			)
		);
	}
}
