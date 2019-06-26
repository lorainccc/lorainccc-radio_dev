<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'section-divider-btm' ); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

?>
		</header><!-- .entry-header -->

	<div class="entry-content">
  <div class="row">
   <div class="small-12 medium-2 columns">
    <a href="<?php echo get_the_permalink() ?>">
    <?php the_post_thumbnail( 'thumbnail' ); ?> 
   </div>
   <div class="small-12 medium-10 columns">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'lorainccc' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
    <?php echo '  <p><a href="' . get_the_permalink() . '">Read more about ' . get_the_title() . '</a></p>'; ?>
    </div>
   </div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
