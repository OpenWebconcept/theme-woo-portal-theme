<?php
/**
 * Base class for singletons.
 * Should not be invoked but extended.
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Core
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

/**
 * Base class for all modules
 */
abstract class Singleton {
	/**
	 * Create and return a Singleton of the class that extends this base clas.
	 *
	 * @return self|false
	 */
	public static function instance() {
		static $instances;
		if ( static::class === self::class ) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output will be escaped by _doing_it_wrong. And it is a php generated function name, not User Input.
			_doing_it_wrong( self::class, 'Please extend the ' . esc_html( self::class ) . ' class, do not use it directly.', '0.0.1' );

			return false;
		}
		if ( ! $instances ) {
			$instances = array();
		}
		if ( empty( $instances[ static::class ] ) ) {
			$instances[ static::class ] = new static();
		}

		return $instances[ static::class ];
	}

	/**
	 * Constructor.
	 *
	 * Invokes the public static method 'init' in a module, if it exists, on the WordPress init hook.
	 */
	public function __construct() {
		if ( is_callable( array( static::class, 'init' ) ) ) {
			add_action( 'init', array( static::class, 'init' ) );
		}
	}
}
