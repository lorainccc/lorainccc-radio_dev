<?php
/**
 * Template Name: Sub Page No Left Navigation
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<div class="row page-content">
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
	<div class="small-12 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>	
<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php get_footer(); ?>
