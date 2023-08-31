<?php
/**
 * Post-Type Page Template - Default.
 *
 * @package    Acato\WOO_Portal_Theme
 * @subpackage Acato\WOO_Portal_Theme\Templates
 * @author     Acato
 */

get_header();
if ( ! is_front_page() || is_home() ) { ?>
<div class="container">
	<?php the_content(); ?>
</div>
	<?php
} else {
	the_content(); }
get_footer();
