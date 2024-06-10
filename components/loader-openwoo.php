<?php
/**
 * @file           Loader for OpenWOO components.
 *
 * This file is loaded by the theme's functions.php file. Set-up for autoloader of OpenWOO components as instructed on github.
 * Code adapted to not use a namespace.
 *
 * @see            https::github.com/OpenWebconcept/openwoo-theme-implementation.git
 * @author         OpenWOO
 * @implementation Acato, Remon Pel <remon@acato.nl>
 */

/**
 * Hook into Gravity Forms submission.
 */
add_action( 'gform_after_submission', function ( array $entry, array $form ) {
	\OpenWOO\SubmissionHandler::make( $entry, $form )->handle();
}, 10, 2 );

/**
 * Autoload OpenWOO classes.
 */
spl_autoload_register( function ( $class ) {
	$base_dir = trailingslashit( __DIR__ );
	if ( ! str_starts_with( $class, 'OpenWOO\\' ) ) {
		return;
	}
	$class = str_replace( '\\', '/', $class );
	$file  = $base_dir . $class . '.php';

	if ( file_exists( $file ) ) {
		require_once $file;
	}
} );
