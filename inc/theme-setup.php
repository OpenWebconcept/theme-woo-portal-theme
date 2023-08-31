<?php
/**
 * Theme-setup.
 *
 * @category WOO_Portal_Theme
 * @package  Acato\WOO_Portal_Theme
 */

/**
 * Set up translations
 */
define( 'WOO_PORTAL_THEME', 'woo-portal-theme' );

/**
 * Load translations form textdomain
 */
function woo_portal_theme_translations() {
	load_theme_textdomain( WOO_PORTAL_THEME, get_template_directory() . '/languages' );
}

add_action( 'init', 'woo_portal_theme_translations' );

/**
 * Development.
 * add_filter( 'http_request_host_is_external', function( $is_external, $host, $url ) { return $is_external || 'openwebconcept.test' === $host; }, 10, 3 );
*/
