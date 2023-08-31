<?php
/**
 * Manages the assets of the theme
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Assets
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

use WP_Screen;

/**
 * The Assets class.
 */
class Assets extends Singleton {
	/**
	 * Runs on WordPress' init action.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_scripts' ), 100 );
		add_action( 'admin_enqueue_scripts', array( self::class, 'enqueue_scripts' ), 100 );
	}

	/**
	 * Get the asset url by pathname, includes a cache buster parameter.
	 *
	 * @param string $path The path to the asset.
	 *
	 * @return string
	 */
	private static function mix( $path ) {
		$manifest = get_template_directory() . '/dist/mix-manifest.json';

		if ( ! file_exists( $manifest ) ) {
			return get_template_directory_uri() . '/dist' . $path;
		}

		$manifest = json_decode(
			file_get_contents(
				get_template_directory() . '/dist/mix-manifest.json'
			)
		);

		return get_template_directory_uri() . '/dist' . $manifest->$path;
	}

	/**
	 * Fires on WordPress' enqueue_scripts hook.
	 *
	 * @return void
	 */
	public static function enqueue_scripts() {
		if ( ! is_admin() ) {
			// @phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- we use self::mix for that.
			wp_enqueue_style( 'woo_portal_theme_style', self::mix( '/css/style.css' ), false, null );
			// @phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- we use self::mix for that.
			wp_enqueue_script( 'woo_portal_theme_script', self::mix( '/js/app.js' ), array( 'jquery' ), null, true );

			wp_localize_script(
				'woo_portal_theme_script',
				'wp_variables',
				array(
					'site_name'       => get_bloginfo( 'name' ),
					'home_url'        => home_url(),
					'current_post_id' => get_the_ID(),
					'ajax_url'        => admin_url( 'admin-ajax.php' ),
					'rest_api_url'    => get_rest_url(),
					'search'          => is_search(),
					'search_query'    => get_search_query(),
				)
			);

			wp_enqueue_style( 'wp-mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		} else {
			// @phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- we use self::mix for that.
			wp_enqueue_style( 'woo_portal_theme_style_admin', self::mix( '/css/admin.css' ), false, null );

			$current_screen = get_current_screen();
			if (
				$current_screen instanceof WP_Screen
				&& method_exists( $current_screen, 'is_block_editor' )
				&& $current_screen->is_block_editor()
			) {
				// @phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- we use self::mix for that.
				wp_enqueue_style( 'woo_portal_theme_style', self::mix( '/css/style.css' ), false, null );
			}
		}
	}
}

Assets::instance();
