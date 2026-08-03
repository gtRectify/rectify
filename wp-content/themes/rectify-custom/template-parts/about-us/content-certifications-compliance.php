<?php
/**
 * Certifications & Compliance page content.
 *
 * Every section is sourced from the Rectify Page Builder's
 * certifications-compliance profile. The profile's seed data also provides
 * the first-render fallback, keeping the editable builder content and the
 * front end in sync.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-cert-page' ); ?>>
	<?php
	if (
		function_exists( 'rectify_pb_render_page_sections' )
		&& function_exists( 'rectify_pb_get_about_certifications_compliance_seed_blocks' )
	) {
		$renderers = array(
			'cert-hero'                => 'rectify_pb_render_cert_hero',
			'cert-banner'              => 'rectify_pb_render_cert_banner',
			'cert-why-matters'         => 'rectify_pb_render_cert_why_matters',
			'cert-standards'           => 'rectify_pb_render_cert_standards',
			'cert-builder-registration' => 'rectify_pb_render_cert_builder_registration',
			'cert-engineering'         => 'rectify_pb_render_cert_engineering',
			'cert-registration-safety' => 'rectify_pb_render_cert_registration_safety',
			'cert-confidence'          => 'rectify_pb_render_cert_confidence',
			'cert-systems'             => 'rectify_pb_render_cert_systems',
			'cert-cta'                 => 'rectify_pb_render_cert_cta',
		);
		$sections  = array();

		foreach ( rectify_pb_get_about_certifications_compliance_seed_blocks() as $block ) {
			$section_key = isset( $block['section_key'] ) ? $block['section_key'] : '';
			$type        = isset( $block['type'] ) ? $block['type'] : '';
			$fields      = isset( $block['fields'] ) && is_array( $block['fields'] ) ? $block['fields'] : array();
			$renderer    = isset( $renderers[ $type ] ) ? $renderers[ $type ] : '';

			if ( ! $section_key || ! $renderer || ! is_callable( $renderer ) ) {
				continue;
			}

			$sections[] = array(
				'key'    => $section_key,
				'render' => static function () use ( $renderer, $fields, $section_key ) {
					call_user_func( $renderer, $fields, $section_key );
				},
			);
		}

		rectify_pb_render_page_sections( get_the_ID(), $sections );
	}
	?>
</article>
