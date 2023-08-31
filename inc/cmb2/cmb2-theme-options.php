<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category WOO_Portal_Theme
 * @package  Acato\WOO_Portal_Theme
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

add_action( 'cmb2_admin_init', 'woo_portal_theme_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function woo_portal_theme_register_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box(
		array(
			'id'           => 'woo_portal_theme_options_page',
			'title'        => esc_html__( 'Theme Options', 'woo-portal-theme' ),
			'object_types' => array( 'options-page' ),
			'option_key'   => 'woo_portal_theme_options', // The option key and admin menu page slug.
			'icon_url'     => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		)
	);

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Header', 'woo-portal-theme' ),
			'desc' => esc_html__( 'Set site name and contact-page', 'woo-portal-theme' ),
			'id'   => 'woo_portal_theme_header',
			'type' => 'title',
		)
	);

	/**
	 * Get pages for page select field Contact page.
	 *
	 * @param $argument $argument post type page.
	 */
	function woo_portal_theme_get_pages( $argument ) {

		$get_post_args = array(
			'post_type'      => $argument,
			'posts_per_page' => -1,
		);

		foreach ( get_posts( $get_post_args ) as $post ) {
			$post_type             = get_post_type( $post->ID );
			$title                 = get_the_title( $post->ID );
			$permalink             = get_permalink( $post->ID );
			$options[ $permalink ] = $title . ' : ' . $post_type;
		}

		return $options;
	}

	$cmb_options->add_field(
		array(
			'name'             => esc_html__( 'Contact page', 'woo-portal-theme' ),
			'desc'             => esc_html__( 'Contact page url', 'woo-portal-theme' ),
			'id'               => 'woo_portal_theme_contact_page',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => woo_portal_theme_get_pages( 'page' ),
		)
	);

	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Footer', 'woo-portal-theme' ),
			'desc' => esc_html__( 'Set logo image and contact email address', 'woo-portal-theme' ),
			'id'   => 'woo_portal_theme_footer',
			'type' => 'title',
		)
	);
	$cmb_options->add_field(
		array(
			'name'         => esc_html__( 'Footer logo image', 'woo-portal-theme' ),
			'desc'         => esc_html__( 'Logo', 'woo-portal-theme' ),
			'id'           => 'woo_portal_theme_logo',
			'type'         => 'file',
			// query_args are passed to wp.media's library query.
			'query_args'   => array(
				// Only allow gif, jpg, or png images.
				'type' => array(
					'image/gif',
					'image/jpg',
					'image/jpeg',
					'image/png',
				),
			),
			'preview_size' => 'large', // Image size to use when previewing in the admin.
		)
	);
	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Footer column 2 contact email address', 'woo-portal-theme' ),
			'desc' => esc_html__( 'Contact email address', 'woo-portal-theme' ),
			'id'   => 'woo_portal_theme_email',
			'type' => 'text_email',
		)
	);
}
