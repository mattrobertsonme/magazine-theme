<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Theme_v1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
        
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
		    <p class="date"><?php echo get_the_date(); ?></p>            
		</div>
		<?php
		endif; ?>
		
		<a href="<?php the_post_thumbnail_url(); ?>"><?php the_post_thumbnail(); ?></a>
		
        <!--<div class="col-xs-12 col-md-12 is-featured-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>-->
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magazine-theme-v1' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magazine-theme-v1' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <?php magazine_theme_v1_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
