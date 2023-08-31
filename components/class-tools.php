<?php
/**
 * A selection of tools
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Tools
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

use enshrined\svgSanitize\Sanitizer;
use safe_svg_attributes;
use safe_svg_tags;

/**
 * The Tools class.
 */
class Tools extends Singleton {
	/**
	 * Return or print the content of an SVG included in the theme.
	 *
	 * @param string $name The name of an SVG, see the /svg/ folder in the theme for possible values.
	 * @param bool   $echo If true, prints the SVG.
	 *
	 * @return string|false
	 */
	public static function svg( $name, $echo = true ) {
		$file = get_stylesheet_directory() . '/svg/' . $name . '.svg';

		$data = self::sanitize_svg( $file );

		if ( $echo ) {
			// @phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already sanitized
			print $data;
		}

		return $data;
	}

	/**
	 * Get SVG "HTML" for an attachment. Requires a WordPress Upload ID.
	 *
	 * @param int           $attachment_id The WordPress Attachment/Upload ID.
	 * @param bool          $echo          If true, prints the SVG.
	 * @param callable|null $svg_filter    Optional post-processing-filter.
	 *
	 * @return string|false
	 */
	public static function svg_from_upload( $attachment_id, $echo = true, $svg_filter = null ) {
		$file = get_attached_file( $attachment_id );

		$data = self::sanitize_svg( $file );

		if ( is_callable( $svg_filter ) ) {
			$data = call_user_func( $svg_filter, $data, $attachment_id );
		}

		if ( $echo ) {
			// @phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already sanitized
			print $data;
		}

		return $data;
	}

	/**
	 * Returns sanitized SVG content for a given file.
	 *
	 * @param string $file Filename of an SVG.
	 *
	 * @return false|string
	 */
	private static function sanitize_svg( $file ) {
		static $sanitizer;

		if ( file_exists( $file ) ) {
			// @phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			$data = file_get_contents( $file );

			if ( ! $sanitizer && class_exists( Sanitizer::class ) ) {
				$sanitizer = new Sanitizer();
				$sanitizer->minify( true );
				$sanitizer->setAllowedTags( new safe_svg_tags() );
				$sanitizer->setAllowedAttrs( new safe_svg_attributes() );
			}

			if ( $sanitizer instanceof Sanitizer ) {
				$data = $sanitizer->sanitize( $data );
			}

			return $data;
		}

		return false;
	}
}

Tools::instance();
