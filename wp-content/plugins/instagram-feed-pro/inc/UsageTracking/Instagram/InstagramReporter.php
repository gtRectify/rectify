<?php
/**
 * Instagram reporter for Smash Usage Tracking.
 *
 * Collects configuration and dynamic metrics for Instagram Feed (Pro/Free).
 *
 * @package InstagramFeed\UsageTracking\Instagram
 * @since 6.11
 */

namespace InstagramFeed\UsageTracking\Instagram;

use InstagramFeed\UsageTracking\ReporterInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class InstagramReporter implements ReporterInterface {

	const SCHEMA_VERSION = '1.0';

	/**
	 * Keys to strip from feed settings (tokens/secrets).
	 *
	 * @var string[]
	 */
	private static $sensitive_keys = array(
		'access_token',
		'accesstoken',
		'token',
		'secret',
		'api_secret',
		'api_key',
	);

	/**
	 * Plugin slug for payload root.
	 *
	 * @return string
	 */
	public function get_plugin_slug() {
		return 'instagram';
	}

	/**
	 * Schema version for the report payload.
	 *
	 * @return string
	 */
	public function get_schema_version() {
		return self::SCHEMA_VERSION;
	}

	/**
	 * Configuration snapshot (environment, settings, sources, feeds, features).
	 *
	 * @return array
	 */
	public function get_configuration_snapshot() {
		$global_settings = $this->get_global_settings();

		// Single DB scan — reused for latest sample, summary, and features map.
		$all_feed_data = $this->get_all_feed_data();

		return array(
			'environment'      => $this->get_environment(),
			'global_settings'  => $global_settings,
			'sources'          => $this->get_sources_summary(),
			'latest_10_feeds'  => $this->get_latest_feeds( $all_feed_data ),
			'feeds'            => $this->get_feeds_summary( $all_feed_data ),
			'features_enabled' => $this->get_features_enabled( $all_feed_data, $global_settings ),
			'template_usage'   => $this->get_template_usage( $all_feed_data ),
			'source_types'     => $this->get_source_types( $all_feed_data ),
			'version'          => defined( 'SBIVER' ) ? SBIVER : '',
			'license_tier'     => $this->get_license_tier(),
			'license_status'   => $this->get_license_status(),
			'license_expires'  => $this->get_license_expires(),
			'license_item_id'  => $this->get_license_item_id(),
		);
	}

	/**
	 * Dynamic metrics for the given period.
	 *
	 * @param string|int $period_start Start of period (ISO 8601 or timestamp).
	 * @param string|int $period_end   End of period (ISO 8601 or timestamp).
	 * @return array
	 */
	public function get_dynamic_metrics( $period_start, $period_end ) {
		$ts_start = is_numeric( $period_start ) ? (int) $period_start : strtotime( $period_start );
		$ts_end   = is_numeric( $period_end ) ? (int) $period_end : strtotime( $period_end );

		return array(
			'period_start'     => $period_start,
			'period_end'       => $period_end,
			'performance'      => $this->get_performance_metrics(),
			'errors'           => $this->get_error_metrics(),
			'events'           => $this->get_events_for_period( $ts_start, $ts_end ),
			'days_active'      => $this->get_days_active( $period_start, $period_end ),
			'session_duration' => $this->get_session_duration(),
		);
	}

	/**
	 * Environment data (WP, PHP, theme, locale, multisite, install age).
	 *
	 * @return array
	 */
	private function get_environment() {
		$install_ts = null;
		$statuses   = get_option( 'sbi_statuses', array() );
		if ( ! empty( $statuses['first_install'] ) && is_numeric( $statuses['first_install'] ) ) {
			$install_ts = (int) $statuses['first_install'];
		}
		if ( null === $install_ts ) {
			$install_ts = get_option( 'sbi_pro_installed_timestamp', 0 );
		}
		$install_age_days = $install_ts ? max( 0, (int) ((time() - $install_ts) / DAY_IN_SECONDS) ) : 0;

		$theme      = wp_get_theme();
		$theme_name = $theme->exists() ? $theme->get( 'Name' ) : '';

		return array(
			'wp_version'           => get_bloginfo( 'version' ),
			'php_version'          => PHP_VERSION,
			'active_theme'         => $theme_name,
			'locale'               => get_locale(),
			'multisite'            => is_multisite(),
			'site_count'           => is_multisite() ? (int) get_blog_count() : 1,
			'active_plugins_count' => count(
                array_unique(
                    array_merge(
                        (array) get_option( 'active_plugins', array() ),
                        array_keys( (array) get_site_option( 'active_sitewide_plugins', array() ) )
                    )
                )
            ),
			'install_age_days'     => $install_age_days,
		);
	}

	/**
	 * Global Instagram Feed settings (caching, GDPR, preserve settings, advanced options).
	 *
	 * @return array
	 */
	private function get_global_settings() {
		$settings = get_option( 'sb_instagram_settings', array() );
		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		return array(
			'caching_type'             => isset( $settings['sbi_cache_cron_interval'] ) ? $settings['sbi_cache_cron_interval'] : '12hours',
			'cron_interval'            => isset( $settings['sbi_cache_cron_interval'] ) ? $settings['sbi_cache_cron_interval'] : '12hours',
			'gdpr'                     => isset( $settings['gdpr'] ) ? $settings['gdpr'] : 'auto',
			'preserve_settings'        => ! empty( $settings['sb_instagram_preserve_settings'] ),
			'optimize_images'          => empty( $settings['sb_instagram_disable_resize'] ),
			'ajax_theme_loading_fix'   => ! empty( $settings['sb_instagram_ajax_theme'] ),
			'disable_js_image_loading' => ! empty( $settings['disable_js_image_loading'] ),
			'disable_admin_notice'     => ! empty( $settings['disable_admin_notice'] ),
			'enable_email_report'      => ! empty( $settings['enable_email_report'] ),
			'email_notification_day'   => isset( $settings['email_notification'] ) ? $settings['email_notification'] : '',
			'email_notification_set'   => ! empty( $settings['email_notification_addresses'] ),
			'enqueue_js_in_head'       => ! empty( $settings['enqueue_js_in_head'] ),
			'enqueue_css_in_shortcode' => ! empty( $settings['enqueue_css_in_shortcode'] ),
			'ajax_initial'             => ! empty( $settings['sb_ajax_initial'] ),
		);
	}

	/**
	 * Sources summary (connected accounts count, account types).
	 *
	 * @return array
	 */
	private function get_sources_summary() {
		global $wpdb;
		$sources_table = $wpdb->prefix . 'sbi_sources';
		$table_exists  = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $sources_table ) ) === $sources_table;

		$connected_accounts_count = 0;
		$account_type             = array(
			'personal' => 0,
			'business' => 0,
			'basic'    => 0,
		);

		if ( $table_exists ) {
			$connected_accounts_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$sources_table}" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Table name derived from $wpdb->prefix, not user input.
			foreach ( array_keys( $account_type ) as $type ) {
				$account_type[ $type ] = (int) $wpdb->get_var(
                    $wpdb->prepare(
                        "SELECT COUNT(*) FROM {$sources_table} WHERE account_type = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Table name derived from $wpdb->prefix, not user input.
                        $type
                    )
                );
			}
		}

		return array(
			'connected_accounts_count' => $connected_accounts_count,
			'account_type'             => $account_type,
		);
	}

	/**
	 * Whitelist of feed setting keys to track.
	 *
	 * @var string[]
	 */
	private static $feed_settings_whitelist = array(
		// Feed type & structure
		'type',
		'layout',
		'num',
		'nummobile',
		'cols',
		'colsmobile',
		'colstablet',
		'order',
		'sortby',
		'media',
		'videotypes',
		// Header / footer
		'showheader',
		'headerstyle',
		'showbutton',
		'showfollow',
		'showfollowers',
		'showbio',
		// Content display
		'showcaption',
		'showlikes',
		// Lightbox
		'disablelightbox',
		'lightboxcomments',
		// Stories
		'stories',
		// Carousel
		'carouselrows',
		'carouselloop',
		'carouselarrows',
		'carouselpag',
		'carouselautoplay',
		// Pro features
		'shoppablefeed',
		'moderationmode',
		'enablemoderationmode',
		'customtemplates',
		'colorpalette',
		'highlighttype',
		// Load more
		'autoscroll',
		// Image settings
		'imageres',
		'imageaspectratio',
		'imagepadding',
		// Performance
		'resizeprocess',
		'gdpr',
		'ajaxtheme',
		'poststyle',
	);

	/**
	 * Load every feed's decoded settings plus feed_name, sorted newest-first.
	 * One DB query shared across get_latest_feeds(), get_feeds_summary(), and
	 * get_features_enabled() to avoid multiple table scans per report.
	 *
	 * @return array[] Each element: ['feed_name' => string, 'settings' => array]
	 */
	private function get_all_feed_data(): array {
		global $wpdb;
		$table        = $wpdb->prefix . 'sbi_feeds';
		$table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) ) === $table;

		if ( ! $table_exists ) {
			return array();
		}

		$rows = $wpdb->get_results(
			"SELECT feed_name, settings FROM {$table} ORDER BY last_modified DESC LIMIT 500", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Table name derived from $wpdb->prefix, not user input.
			ARRAY_A
		);

		$out = array();
		foreach ( $rows as $row ) {
			$decoded = ! empty( $row['settings'] ) ? json_decode( $row['settings'], true ) : array();
			$out[]   = array(
				'feed_name' => isset( $row['feed_name'] ) ? sanitize_text_field( (string) $row['feed_name'] ) : '',
				'settings'  => is_array( $decoded ) ? $decoded : array(),
			);
		}

		return $out;
	}

	/**
	 * Latest 15 feeds with whitelisted settings, derived from pre-loaded feed data.
	 * The payload key remains 'latest_10_feeds' for backwards compatibility.
	 *
	 * @param array[] $all_feed_data From get_all_feed_data().
	 * @return array
	 */
	private function get_latest_feeds( array $all_feed_data ): array {
		$feeds = array();
		foreach ( array_slice( $all_feed_data, 0, 15 ) as $row ) {
			$feed_name = $row['feed_name'];
			if ( strlen( $feed_name ) > 255 ) {
				$feed_name = substr( $feed_name, 0, 255 );
			}
			$feeds[] = array(
				'feed_name' => $feed_name,
				'settings'  => $this->pick_whitelisted_settings( $row['settings'] ),
			);
		}

		return $feeds;
	}

	/**
	 * Aggregate feed type and layout distribution across ALL feeds.
	 *
	 * @param array[] $all_feed_data From get_all_feed_data().
	 * @return array { total_count, by_type, by_layout }
	 */
	private function get_feeds_summary( array $all_feed_data ): array {
		$by_type   = array();
		$by_layout = array();

		foreach ( $all_feed_data as $row ) {
			$s      = $row['settings'];
			$type   = isset( $s['type'] ) ? (string) $s['type'] : 'unknown';
			$layout = isset( $s['layout'] ) ? (string) $s['layout'] : 'unknown';

			$by_type[ $type ]     = ($by_type[ $type ] ?? 0) + 1;
			$by_layout[ $layout ] = ($by_layout[ $layout ] ?? 0) + 1;
		}

		return array(
			'total_count' => count( $all_feed_data ),
			'by_type'     => $by_type,
			'by_layout'   => $by_layout,
		);
	}

	/**
	 * Flat boolean feature map for the Laravel dashboard's feature adoption page.
	 *
	 * Feed-level flags are true when ANY feed on this site uses the feature.
	 * Global flags reflect site-wide settings.
	 *
	 * @param array[] $all_feed_data   From get_all_feed_data().
	 * @param array   $global_settings From get_global_settings().
	 * @return array<string,bool>
	 */
	private function get_features_enabled( array $all_feed_data, array $global_settings ): array {
		// ── Feed-level flags (any feed using the feature = true) ──────────
		$feed_flags = array(
			'lightbox'         => false,
			'load_more'        => false,
			'show_header'      => false,
			'masonry_layout'   => false,
			'carousel_layout'  => false,
			'stories'          => false,
			'shoppable'        => false,
			'moderation'       => false,
			'custom_templates' => false,
			'hashtag_feeds'    => false,
			'tagged_feeds'     => false,
			'highlight'        => false,
			'auto_scroll'      => false,
			'show_likes'       => false,
			'show_caption'     => false,
		);

		foreach ( $all_feed_data as $row ) {
			$s = $row['settings'];

			if ( ! $feed_flags['lightbox'] && empty( $s['disablelightbox'] ) ) {
$feed_flags['lightbox'] = true;
            }
			if ( ! $feed_flags['load_more'] && ! empty( $s['showbutton'] ) ) {
$feed_flags['load_more'] = true;
            }
			if ( ! $feed_flags['show_header'] && ! empty( $s['showheader'] ) ) {
$feed_flags['show_header'] = true;
            }
			if ( ! $feed_flags['masonry_layout'] && isset( $s['layout'] ) && 'masonry' === $s['layout'] ) {
$feed_flags['masonry_layout'] = true;
            }
			if ( ! $feed_flags['carousel_layout'] && isset( $s['layout'] ) && 'carousel' === $s['layout'] ) {
$feed_flags['carousel_layout'] = true;
            }
			if ( ! $feed_flags['stories'] && ! empty( $s['stories'] ) ) {
$feed_flags['stories'] = true;
            }
			if ( ! $feed_flags['shoppable'] && ! empty( $s['shoppablefeed'] ) ) {
$feed_flags['shoppable'] = true;
            }
			if ( ! $feed_flags['moderation'] && ( ! empty( $s['moderationmode'] ) || ! empty( $s['enablemoderationmode'] )) ) {
$feed_flags['moderation'] = true;
            }
			if ( ! $feed_flags['custom_templates'] && ! empty( $s['customtemplates'] ) ) {
$feed_flags['custom_templates'] = true;
            }
			if ( ! $feed_flags['hashtag_feeds'] && isset( $s['type'] ) && 'hashtag' === $s['type'] ) {
$feed_flags['hashtag_feeds'] = true;
            }
			if ( ! $feed_flags['tagged_feeds'] && isset( $s['type'] ) && 'tagged' === $s['type'] ) {
$feed_flags['tagged_feeds'] = true;
            }
			if ( ! $feed_flags['highlight'] && ! empty( $s['highlighttype'] ) && '' !== $s['highlighttype'] ) {
$feed_flags['highlight'] = true;
            }
			if ( ! $feed_flags['auto_scroll'] && ! empty( $s['autoscroll'] ) ) {
$feed_flags['auto_scroll'] = true;
            }
			if ( ! $feed_flags['show_likes'] && ! empty( $s['showlikes'] ) ) {
$feed_flags['show_likes'] = true;
            }
			if ( ! $feed_flags['show_caption'] && ! empty( $s['showcaption'] ) ) {
$feed_flags['show_caption'] = true;
            }

			// Early exit once all feed-level flags are confirmed true.
			if ( ! in_array( false, $feed_flags, true ) ) {
				break;
			}
		}

		return array_merge(
            $feed_flags,
            array(
				// ── Global settings ───────────────────────────────────────────
				'optimize_images' => (bool) ($global_settings['optimize_images'] ?? true),
				'ajax_theme_fix'  => (bool) ($global_settings['ajax_theme_loading_fix'] ?? false),
				'gdpr_enabled'    => isset( $global_settings['gdpr'] ) && 'auto' !== $global_settings['gdpr'],
				'email_report'    => (bool) ($global_settings['enable_email_report'] ?? false),
				'ajax_initial'    => (bool) ($global_settings['ajax_initial'] ?? false),
            )
        );
	}

	/**
	 * Return only whitelisted feed settings (scalar or array values, no sensitive keys).
	 *
	 * @param array $settings Raw feed settings.
	 * @return array
	 */
	private function pick_whitelisted_settings( array $settings ) {
		$out = array();
		foreach ( self::$feed_settings_whitelist as $key ) {
			if ( ! array_key_exists( $key, $settings ) ) {
				continue;
			}
			// Skip sensitive keys even if somehow in whitelist.
			if ( in_array( $key, self::$sensitive_keys, true ) ) {
				continue;
			}
			$value = $settings[ $key ];
			if ( is_array( $value ) ) {
				$out[ $key ] = $value;
			} elseif ( is_scalar( $value ) ) {
				$out[ $key ] = $value;
			}
		}
		return $out;
	}

	/**
	 * Distribution of post-style templates across all feeds.
	 * Pro feeds have a dedicated 'poststyle' setting; 'layout' is the fallback.
	 *
	 * @param array[] $all_feed_data From get_all_feed_data().
	 * @return array  template => count
	 */
	private function get_template_usage( array $all_feed_data ): array {
		$usage = array();
		foreach ( $all_feed_data as $row ) {
			$s                  = $row['settings'];
			$template           = isset( $s['poststyle'] ) && '' !== $s['poststyle'] ? (string) $s['poststyle']
				: (isset( $s['layout'] ) && '' !== $s['layout'] ? (string) $s['layout'] : 'default');
			$usage[ $template ] = ($usage[ $template ] ?? 0) + 1;
		}
		return $usage;
	}

	/**
	 * Distribution of feed source types (user/hashtag/tagged) across all feeds.
	 *
	 * @param array[] $all_feed_data From get_all_feed_data().
	 * @return array  type => count
	 */
	private function get_source_types( array $all_feed_data ): array {
		$types = array();
		foreach ( $all_feed_data as $row ) {
			$s              = $row['settings'];
			$type           = isset( $s['type'] ) && '' !== $s['type'] ? (string) $s['type'] : 'user';
			$types[ $type ] = ($types[ $type ] ?? 0) + 1;
		}
		return $types;
	}

	/**
	 * License tier from SBI_License_Tier / sbi_license_data.
	 *
	 * @return string
	 */
	private function get_license_tier() {
		$status = get_option( 'sbi_license_status', '' );
		if ( 'valid' !== $status && 'expired' !== $status ) {
			return 'free';
		}
		try {
			$tier = new \InstagramFeed\SBI_License_Tier();

			$data    = (array) get_option( 'sbi_license_data', array() );
			$item_id = isset( $data['item_id'] ) ? (int) $data['item_id'] : 0;

			if ( $item_id > 0 ) {
				$all_access_ids = array_filter(
                    array(
						(int) $tier->item_id_all_access,
						isset( $tier->item_id_all_access_elite ) ? (int) $tier->item_id_all_access_elite : 0,
                    )
                );
				if ( in_array( $item_id, $all_access_ids, true ) ) {
					return 'all_access';
				}

				$map = $tier->item_id_to_tier_name();
				if ( isset( $map[ $item_id ] ) ) {
					return $map[ $item_id ];
				}
			}

			$license_tier = $tier->get_license_tier();
			return $license_tier ? $license_tier : 'unknown';
		} catch ( \Throwable $e ) {
			return 'unknown';
		}
	}

	/**
	 * License status from sbi_license_status option.
	 *
	 * @return string  valid | expired | invalid | inactive
	 */
	private function get_license_status() {
		$status = get_option( 'sbi_license_status', '' );
		return '' !== $status ? $status : 'inactive';
	}

	/**
	 * License expiry date from sbi_license_data option.
	 *
	 * @return string|null  Y-m-d date string, 'lifetime', or null if unavailable.
	 */
	private function get_license_expires() {
		$data = get_option( 'sbi_license_data', array() );
		return isset( $data['expires'] ) ? $data['expires'] : null;
	}

	/**
	 * EDD item ID from sbi_license_data option.
	 *
	 * @return int|null
	 */
	private function get_license_item_id() {
		$data = get_option( 'sbi_license_data', array() );
		return isset( $data['item_id'] ) ? (int) $data['item_id'] : null;
	}

	/**
	 * Performance metrics (feed caches count, cache requests count).
	 *
	 * @return array
	 */
	private function get_performance_metrics() {
		global $wpdb;
		$cache_table  = $wpdb->prefix . 'sbi_feed_caches';
		$table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $cache_table ) ) === $cache_table;

		$feed_caches_count    = 0;
		$cache_requests_count = 0;

		if ( $table_exists ) {
			$feed_caches_count    = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$cache_table}" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Table name derived from $wpdb->prefix, not user input.
			$cache_requests_count = (int) get_option( 'sbi_smash_cache_requests_count', 0 );
		}

		return array(
			'feed_caches_count'    => $feed_caches_count,
			'cache_requests_count' => $cache_requests_count,
		);
	}

	/**
	 * Map an Instagram / Graph API error code to an error category.
	 *
	 * Categories align with the Laravel dashboard's by_type aggregation.
	 *
	 * @param int|string $code
	 * @return string  auth|rate_limit|permission|not_found|server|network|other
	 */
	private function categorise_error_code( $code ): string {
		$code = (int) $code;

		// OAuth / token problems — user must reconnect their account.
		if ( in_array( $code, array( 102, 190, 458, 460, 461, 463, 467, 999 ), true ) ) {
			return 'auth';
		}

		// Instagram rate limiting.
		if ( in_array( $code, array( 4, 17, 32, 341, 613 ), true ) ) {
			return 'rate_limit';
		}

		// App permission denied.
		if ( 10 === $code || ($code >= 200 && $code <= 299) ) {
			return 'permission';
		}

		// Object or endpoint not found / invalid parameter.
		if ( in_array( $code, array( 100, 803 ), true ) ) {
			return 'not_found';
		}

		// Transient server errors.
		if ( in_array( $code, array( 1, 2, 18 ), true ) ) {
			return 'server';
		}

		return 'other';
	}

	/**
	 * Error metrics: categorised counts, critical flag, revoked accounts,
	 * and latest 10 errors with category tags (no tokens/PII).
	 *
	 * @return array
	 */
	private function get_error_metrics() {
		$reporter = get_option( 'sbi_error_reporter', array() );
		if ( ! is_array( $reporter ) ) {
			$reporter = array();
		}
		$connection = isset( $reporter['connection'] ) && is_array( $reporter['connection'] ) ? $reporter['connection'] : array();
		$accounts   = isset( $reporter['accounts'] ) && is_array( $reporter['accounts'] ) ? $reporter['accounts'] : array();
		$error_log  = isset( $reporter['error_log'] ) && is_array( $reporter['error_log'] ) ? $reporter['error_log'] : array();
		$revoked    = isset( $reporter['revoked'] ) && is_array( $reporter['revoked'] ) ? $reporter['revoked'] : array();

		// Real count: error reporter appends one entry per failure (max ~10).
		$api_failures = count( $error_log ) > 0 ? count( $error_log ) : ( ! empty( $connection ) ? 1 : 0);

		$provider_errors = 0;
		foreach ( $accounts as $account_errors ) {
			if ( is_array( $account_errors ) ) {
				$provider_errors += count( $account_errors );
			}
		}

		// Build full annotated list first so by_type counts the whole set.
		$latest = $this->build_latest_errors_array( $reporter, $error_log, $connection, $accounts );

		$by_type        = array(
			'auth'       => 0,
			'rate_limit' => 0,
			'permission' => 0,
			'not_found'  => 0,
			'server'     => 0,
			'network'    => 0,
			'other'      => 0,
		);
		$critical_count = 0;
		foreach ( $latest as $err ) {
			$cat = $err['category'] ?? 'other';
			if ( array_key_exists( $cat, $by_type ) ) {
				++$by_type[ $cat ];
			} else {
				++$by_type['other'];
			}
			if ( ! empty( $err['critical'] ) ) {
				++$critical_count;
			}
		}

		return array(
			'api_failures'     => $api_failures,
			'provider_errors'  => $provider_errors,
			'by_type'          => $by_type,
			'critical_count'   => $critical_count,
			'revoked_accounts' => count( $revoked ),
			'latest'           => array_slice( $latest, 0, 10 ),
		);
	}

	/**
	 * Build a flat array of all current errors, each annotated with a
	 * category and error_code where available. No tokens or PII included.
	 *
	 * @param array $reporter   Full sbi_error_reporter option.
	 * @param array $error_log  error_log array.
	 * @param array $connection connection error object if set.
	 * @param array $accounts   Per-account error arrays.
	 * @return array
	 */
	private function build_latest_errors_array( $reporter, $error_log, $connection, $accounts ) {
		$latest = array();

		// ── Log entries ───────────────────────────────────────────────────
		foreach ( array_slice( $error_log, -10 ) as $log_entry ) {
			$str       = is_string( $log_entry ) ? $log_entry : '';
			$prefix    = '';
			$logged_at = '';

			if ( preg_match( '/^(\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2})\s+-/', $str, $m ) ) {
				$logged_at = $m[1];
				$prefix    = $m[0];
			}

			$message = trim( substr( $str, strlen( $prefix ) ) );
			$message = $this->sanitize_error_message( $message, 300 );

			// Extract API error code from message text if present.
			$code     = null;
			$category = 'other';
			if ( preg_match( '/(?:api error|error|code)\s+(\d{1,4})/i', $message, $cm ) ) {
				$code     = (int) $cm[1];
				$category = $this->categorise_error_code( $code );
			}

			$entry = array(
				'type'      => 'log',
				'category'  => $category,
				'logged_at' => $logged_at,
				'message'   => $message,
			);
			if ( null !== $code ) {
				$entry['error_code'] = $code;
			}
			$latest[] = $entry;
		}

		// ── Connection error ──────────────────────────────────────────────
		if ( ! empty( $connection ) && isset( $connection['error_id'] ) ) {
			$error_id = $connection['error_id'];
			$code     = is_numeric( $error_id ) ? (int) $error_id : null;
			$category = null !== $code ? $this->categorise_error_code( $code ) : 'network';

			$latest[] = array(
				'type'       => 'connection',
				'category'   => $category,
				'error_code' => $code,
				'error_id'   => $error_id,
				'critical'   => ! empty( $connection['critical'] ),
			);
		}

		// ── Per-account errors ────────────────────────────────────────────
		foreach ( $accounts as $account_id => $by_type ) {
			if ( ! is_array( $by_type ) ) {
				continue;
			}
			foreach ( $by_type as $error_type => $err ) {
				if ( ! is_array( $err ) ) {
					continue;
				}

				$code = isset( $err['error']['code'] ) ? (int) $err['error']['code']
						: (isset( $err['errorno'] ) ? (int) $err['errorno'] : null);

				// Access-token errors are always auth regardless of code.
				$category = 'accesstoken' === $error_type
					? 'auth'
					: (null !== $code ? $this->categorise_error_code( $code ) : 'auth');

				$item = array(
					'type'       => 'account',
					'category'   => $category,
					'error_type' => $error_type,
					'critical'   => ! empty( $err['critical'] ),
				);
				if ( null !== $code ) {
					$item['error_code'] = $code;
				}
				if ( isset( $err['errorno'] ) ) {
					$item['errorno'] = $err['errorno'];
				}
				$latest[] = $item;
			}
		}

		// ── System / storage errors ───────────────────────────────────────
		$system_keys = array( 'resizing', 'database_create', 'upload_dir', 'platform_data_deleted' );
		foreach ( $system_keys as $key ) {
			if ( empty( $reporter[ $key ] ) ) {
				continue;
			}
			$msg      = is_array( $reporter[ $key ] ) ? wp_json_encode( $reporter[ $key ] ) : (string) $reporter[ $key ];
			$latest[] = array(
				'type'     => $key,
				'category' => 'other',
				'message'  => $this->sanitize_error_message( $msg, 300 ),
			);
		}

		return $latest;
	}

	/**
	 * Sanitize error message for tracking: strip tokens, limit length.
	 *
	 * @param string $message Raw message.
	 * @param int    $max_len Max length.
	 * @return string
	 */
	private function sanitize_error_message( $message, $max_len = 300 ) {
		// Redact known credential key=value patterns
		$message = preg_replace(
			'/\b(access_token|accesstoken|api_key|api_secret|client_id|client_secret|consumer_key|consumer_secret|secret_key|auth_token|refresh_token|private_key|token)\s*[=:]\s*["\']?[^\s&"\'\\\\,\]}\)]{4,}["\']?/i',
			'$1=[REDACTED]',
			$message
		);
		// Redact Bearer tokens
		$message = preg_replace( '/\bBearer\s+[A-Za-z0-9\-._~+\/]+=*/i', 'Bearer [REDACTED]', $message );
		if ( strlen( $message ) > $max_len ) {
			$message = substr( $message, 0, $max_len ) . '...';
		}
		return $message;
	}

	/**
	 * Number of days in the period when the plugin was actively used, or false if not tracked.
	 *
	 * @param string $period_start Y-m-d.
	 * @param string $period_end   Y-m-d.
	 * @return int|false
	 */
	private function get_days_active( $period_start, $period_end ) {
		$dates = get_option( \InstagramFeed\UsageTracking\Config::OPTION_ACTIVE_DATES, array() );
		if ( ! is_array( $dates ) || empty( $dates ) ) {
			return 0;
		}
		$count = 0;
		$start = strtotime( $period_start );
		$end   = strtotime( $period_end );
		foreach ( $dates as $d ) {
			$ts = strtotime( $d );
			if ( false !== $ts && $ts >= $start && $ts <= $end ) {
				++$count;
			}
		}
		return $count;
	}

	/**
	 * Average of last recorded session durations in seconds, or false if not tracked.
	 *
	 * @return int|float|false
	 */
	private function get_session_duration() {
		$durations = get_option( \InstagramFeed\UsageTracking\Config::OPTION_SESSION_DURATIONS, array() );
		if ( ! is_array( $durations ) || empty( $durations ) ) {
			return 0;
		}
		return (int) round( array_sum( $durations ) / count( $durations ) );
	}

	/**
	 * Event counts and last_date for each event from sbi_smash_usage_events.
	 * Supports storage as event_name => [ 'count' => N, 'last_date' => 'Y-m-d' ], or legacy numeric count or list of { event, timestamp }.
	 *
	 * @param int $ts_start Period start timestamp.
	 * @param int $ts_end   Period end timestamp.
	 * @return array Event name => [ 'count' => int, 'last_date' => string|null ].
	 */
	private function get_events_for_period( $ts_start, $ts_end ) {
		$events = get_option( \InstagramFeed\UsageTracking\EventRecorder::OPTION_NAME, array() );
		if ( ! is_array( $events ) ) {
			return array();
		}

		$first          = reset( $events );
		$is_legacy_list = is_array( $first ) && ! isset( $first['count'] ) && (isset( $first['event'] ) || isset( $first['timestamp'] ) || isset( $first['time'] ));

		if ( $is_legacy_list ) {
			$out = array();
			foreach ( $events as $entry ) {
				if ( ! is_array( $entry ) ) {
					continue;
				}
				$ts = isset( $entry['timestamp'] ) ? (int) $entry['timestamp'] : (isset( $entry['time'] ) ? (int) $entry['time'] : 0);
				if ( $ts < $ts_start || $ts > $ts_end ) {
					continue;
				}
				$name = isset( $entry['event'] ) ? $entry['event'] : (isset( $entry['name'] ) ? $entry['name'] : '');
				if ( '' !== $name ) {
					if ( ! isset( $out[ $name ] ) ) {
						$out[ $name ] = array(
							'count'     => 0,
							'last_date' => null,
						);
					}
					++$out[ $name ]['count'];
					$date = $ts ? gmdate( 'Y-m-d', $ts ) : null;
					if ( $date && (null === $out[ $name ]['last_date'] || $date > $out[ $name ]['last_date']) ) {
						$out[ $name ]['last_date'] = $date;
					}
				}
			}
			return $out;
		}

		$out = array();
		foreach ( $events as $name => $value ) {
			if ( ! is_string( $name ) || '' === $name ) {
				continue;
			}
			if ( is_array( $value ) && isset( $value['count'] ) ) {
				$last_date = isset( $value['last_date'] ) && is_string( $value['last_date'] ) ? $value['last_date'] : null;
				$last_ts   = $last_date ? strtotime( $last_date ) : false;
				if ( false === $last_ts || $last_ts < $ts_start || $last_ts > $ts_end ) {
					continue;
				}
				$out[ $name ] = array(
					'count'     => (int) $value['count'],
					'last_date' => $last_date,
				);
				continue;
			}
			if ( is_numeric( $value ) ) {
				$out[ $name ] = array(
					'count'     => (int) $value,
					'last_date' => null,
				);
			}
		}

		return $out;
	}
}
