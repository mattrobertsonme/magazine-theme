<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magazine_Theme_v1
 */

get_header(); ?>

	<main class="push">
        <div class="container">
            <div class="row">
                <?php get_sidebar();?>   
                
                <div class="col-xs-12 col-md-6 main">
                       
                       

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );
                    
            get_template_part( 'template-parts/content', 'author' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
                    
                   
                    </div>
		
<?php get_sidebar('right'); ?>
		
	</div><!-- #primary -->
        </div>
	</main><!-- #main -->

<?php
get_footer();