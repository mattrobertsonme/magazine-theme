<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Theme_v1
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside class="col-xs-12 col-md-3 right">

                        
                    <section>
                        <h2>Most Commented</h2>
                        
                         <ul>  
                        <?php 
// the query
$my_query = new WP_Query ( array( 'post_type' => 'post', 'posts_per_page' => '5', 'orderby' => 'comment_count', 'ignore_sticky_posts' => -1 ) ); ?>

<?php if ( $my_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		<?php get_template_part( 'template-parts/content-comments'); ?>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content-comments'); ?>
<?php endif; ?>
                        
                       
</ul> 
                                               
                    </section>
                        
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
    
</aside><!-- #secondary -->