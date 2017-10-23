<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine_Theme_v1
 */

get_header(); ?>
    
    <main class="push">
        <div class="container">
            <div class="row">
                <section class="col-xs-12 col-md-12 top-content">
                    <div class="row no-margin">
                        <?php $sticky = get_option( 'sticky_posts' );
rsort( $sticky );

$args = array(
	'posts_per_page' => 4,
	'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 4

    );

$sticky_query = new WP_Query( $args );

while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
               <?php get_template_part( 'template-parts/top-content'); ?>
               <?php endwhile; ?>
                
                
               
                        </div>
                    </section>
                    
                    <?php get_sidebar();?>   
                    
                    <div class="col-xs-12 col-md-6 main">
                        
                        <section class="feed">
                            <h2>Top Stories</h2>
                            
                            <ul>
                                <?php
                                if ( have_posts() ) :
                                
                                if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
                               
                                
 		
		</ul>
        	</section>
                    </div>
           
            <aside class="col-xs-12 col-md-3">
                <div class="row">
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
                    
                    <section class="social col-xs-12 col-md-12">
                        <h2>Advertisement</h2>
                        
                        <div class="image"></div>
                    </section>
                
        	<section class="social col-xs-12 col-md-12">  
               <h2>Social Media</h2>
               
        		<ul>
        			<li class="facebook">
        				<a href=""><i class="fa fa-facebook"></i></a>
                        <div>Facebook <span>1,007 Fans</span></div>
                    </li>
        			
        			<li class="twitter">
        				<a href=""><i class="fa fa-twitter"></i></a>
                        <div>Twitter <span>254 Followers</span></div>
        			</li>
        			
        			<li class="google-plus">
        				<a href=""><i class="fa fa-google-plus"></i></a>
                        <div>Google+ <span>24 Followers</span></div>
        			</li>
        			
        			<li class="instagram">
        				<a href=""><i class="fa fa-instagram"></i></a>
                        <div>Instagram <span>24 Followers</span></div>
        			</li>
                   
                   <li class="twitch">
        				<a href=""><i class="fa fa-twitch"></i></a>
                        <div>Twitch <span>51 Subscribers</span></div>
        			</li>
        			
        			<li class="youtube">
        				<a href=""><i class="fa fa-youtube"></i></a>
                        <div>YouTube <span>5,452 Subscribers</span></div>
        			</li>
        			
        			<li class="soundcloud">
        				<a href=""><i class="fa fa-soundcloud"></i></a>
                        <div>Sound Cloud <span>453 Listeners</span></div>
        			</li>
                   
                    <li class="linked-in">
        				<a href=""><i class="fa fa-linkedin"></i></a>
                        <div>Linked In <span>199 Followers</span></div>
        			</li>
                    
                    <li class="tumblr">
        				<a href=""><i class="fa fa-tumblr"></i></a>
                        <div>Tumblr <span>199 Followers</span></div>
        			</li>
                  
                    <li class="pinterest">
        				<a href=""><i class="fa fa-pinterest"></i></a>
                        <div>Pinterest <span>199 Followers</span></div>
        			</li>
                  
                    <li class="skype">
        				<a href=""><i class="fa fa-skype"></i></a>
                        <div>Skype <span>199 Followers</span></div>
        			</li>
                   
                    <li class="dribbble">
        				<a href=""><i class="fa fa-dribbble"></i></a>
                        <div>Dribble <span>199 Followers</span></div>
        			</li>
                  
                    <li class="apple">
        				<a href=""><i class="fa fa-apple"></i></a>
                        <div>Apple <span>199 Followers</span></div>
        			</li>
                   
                    <li class="rss">
        				<a href=""><i class="fa fa-rss"></i></a>
                        <div>RSS <span>199 Followers</span></div>
        			</li>
                </ul>
        			
        			
        	</section>  
                
        
        	
                   
                   <section> 
        			
        			<h2>Our Experts</h2>
        			<ul>
        			<li>
        				<a href="">1. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, sint.</a>
        				<span>March 26, 2016 at 11:37 PM</span>
        			</li>
        			
        			<li>
        				<a href="">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, sint.</a>
        				<span>March 26, 2016 at 11:37 PM</span>
        			</li>
        			
        			<li>
        				<a href="">3. Jack Ziebell appointed new captain of North Melbourne</a>
        				<span>March 26, 2016 at 11:37 PM</span>
        			</li>
        			<li>
        				<a href="">4. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, sint.</a>
        				<span>March 26, 2016 at 11:37 PM</span>
        			</li>
        			
        			<li>
        				<a href="">5. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, sint.</a>
        				<span>March 26, 2016 at 11:37 PM</span>
        			</li>
        		</ul>
                    </section> </div> 
        	
        	</aside></div></div>
		</main>

<?php
get_sidebar();
get_footer();