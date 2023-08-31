<?php
/**
 * Page Template - 404.
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Templates
 * @author     Acato
 */

namespace Acato\WOO_Portal_Theme;

get_header();
?>
	<section class="page-404">
		<div class="container">
			<div class="page-404--content">
				<h1>
					<?php esc_html_e( 'Page not found', 'woo-portal-theme' ); ?>
				</h1>

				<div class="button-group">
					<a
						class="button button--primary"
						href="<?php echo esc_url( home_url() ); ?>">
						<?php esc_html_e( 'Back to home', 'woo-portal-theme' ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>
	<?php

	// And now the footer.
	get_footer();
