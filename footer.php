<?php
/**
 * Base footer
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Footer
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

use Acato\WOO_Portal_Theme\Tools;

$site_title = get_bloginfo('name');
?>

</main>

<footer class="footer">
	<div class="footer__nav container">
		<div class="nav__item nav__logo">
			<a class="logo" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>" aria-label="Ga naar <?php echo $sitename ?>">
			<?php
			$image = wp_get_attachment_image( cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_logo_id' ), 'medium' );
			if ( ! empty( $image ) ) {
				echo wp_kses_post( $image );
			} else {
				echo '<div>' . esc_html( $site_title ) . '</div>';
			}
			?>
			</a>
		</div>
		<div class="nav__item">
            <div class="nav__content">
		<?php
            $text2 = cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_col_2_text' );
            if ( ! empty( $text2 ) ) {
                echo wp_kses_post( $text2 );
            }?>
		    </div>
		</div>
        <div class="nav__item">
            <div class="nav__content">
        <?php
            $text3      = cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_col_3_text' );
            $btn_text   = cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_col_3_woogle_button_text' );
            $btn_url    = cmb2_get_option( 'woo_portal_theme_options', 'woo_portal_theme_col_3_woogle_button_url' );
            if ( ! empty( $text3 ) ) {
                echo wp_kses_post( $text3 );
            } ?>
			    <a class="footer__btn" href="<?php echo esc_url( $btn_url ) ?>" target="_blank">
                <?php
                echo esc_html( $btn_text );
                Tools::svg( 'external-link' );
                ?>
                </a>
            </div>
		</div>
	</div>

	<div class="legal">
		<div class="footer__nav container">
			<span>
				<?php
				// translators: disclaimer.
				printf( esc_html__( 'This website is part of municipal %s, in support of the Wet Open Overheid.', 'woo-portal-theme' ), esc_html( get_bloginfo( 'name' ) ) );
				?>
			</span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
