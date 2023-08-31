<?php
/**
 * Removes and adds stuff to clean up the admin interface and front-end
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Cleanup
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

use WP_Admin_Bar;

/**
 * The Cleanup class.
 */
class Cleanup extends Singleton {
	/**
	 * Runs on WordPress' init action.
	 *
	 * @return void
	 */
	public static function init() {
		// Remove emoji stuff.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Disable default post-post type.
		add_action( 'admin_menu', array( self::class, 'remove_default_post_type' ) );
		add_action( 'admin_bar_menu', array( self::class, 'remove_default_post_type_menu_bar' ), 999 );
		add_action( 'wp_dashboard_setup', array( self::class, 'remove_draft_widget' ), 999 );
	}

	/**
	 * Callback handler for hook admin_menu, removes the menu-item for "Posts".
	 *
	 * @return void
	 */
	public static function remove_default_post_type() {
		remove_menu_page( 'edit.php' );
	}

	/**
	 * Callback handler for hook admin_bar_menu, removes the menu-item for "New Post".
	 *
	 * @param WP_Admin_Bar $wp_admin_bar The WP Admin Bar.
	 *
	 * @return void
	 */
	public static function remove_default_post_type_menu_bar( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'new-post' );
	}

	/**
	 * Callback handler for hook wp_dashboard_setup, removes the Quick Press widget.
	 *
	 * @return void
	 */
	public static function remove_draft_widget() {
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	}

}

Cleanup::instance();
