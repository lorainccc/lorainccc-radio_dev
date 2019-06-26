<?php
/**
 * @package LCCC Framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding:5px;">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lccc-framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lorainccc_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->