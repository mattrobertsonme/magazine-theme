<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Theme_v1
 */

get_header(); ?>

	<main class="push">
        <div class="container">
            <div class="row" style="margin: 0;">
            
            <?php get_sidebar(); ?>

        
        <div class="col-xs-12 col-md-6 main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
                </div>
                
                
                <?php get_sidebar('right'); ?>
            </div></div>
</main>
            



<?php
get_footer();