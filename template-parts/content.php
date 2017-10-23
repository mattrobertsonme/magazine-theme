<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Theme_v1
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<div class="image" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
		<?php
        if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
        
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
	    <span><?php echo get_the_date(); ?></span>
	</footer><!-- .entry-footer -->
</li><!-- #post-<?php the_ID(); ?> -->
