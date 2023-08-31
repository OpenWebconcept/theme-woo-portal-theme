<?php
/**
 * Base header
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Header
 * @author     Acato
 */

$site_title = ('openwebconcept' === strtolower(get_bloginfo('name')) ? '' : esc_html__('Open', 'woo-portal-theme')) . esc_html(get_bloginfo('name'));
if ( empty( $site_title ) ) {
    $site_title = $_SERVER['HTTP_HOST'];
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo esc_html($site_title) ?></title>
    <meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0">
	<meta
		http-equiv="X-UA-Compatible"
		content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
do_action( 'wp_body_open' );
?>

<a
	id="skip-to-content"
	href="#main-content">
	<?php echo esc_html__( 'Skip directly to content', 'woo-portal-theme' ); ?>
</a>

<div class="header">
	<div class="container">
		<a class="logo" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'description' ) ); ?>">
		<div class="header__title"><?php echo ( 'openwebconcept' === strtolower( get_bloginfo( 'name' ) ) ? '' : esc_html__( 'Open', 'woo-portal-theme' ) ) . esc_html( get_bloginfo( 'name' ) ); ?></div>
		</a>
		<div class="header-right">
			<?php
			$contact = cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_contact_page' );
			if ( ! empty( $contact ) ) {
				?>
			<a href="<?php echo esc_url( $contact ); ?>"><?php echo esc_html__( 'Contact', 'woo-portal-theme' ); ?></a>
			<?php } ?>
		</div>
	</div>
</div>

<main
	id="main-content"
	class="page">
