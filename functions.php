<?php
/**
 * Theme functions.
 *
 * @package Acato\WOO_Portal_Theme
 * @author  Acato
 */

// theme setup translations and add custom logo.
require_once 'inc/theme-setup.php';

// cmb2.
require_once 'inc/cmb2/cmb2-theme-options.php';

// Make sure loaded as first component.
require_once 'components/class-singleton.php';

// Include other components.
foreach ( glob( __DIR__ . '/components/*php' ) as $woo_portal_theme_component ) {
	require_once $woo_portal_theme_component;
}


