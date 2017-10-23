<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magazine_Theme_v1
 */

get_header(); ?>
    
    <?php if ( true == get_theme_mod( '404_background', false ) ) : ?>
    <?php $image = get_theme_mod( '404_background_image', '' ); ?>
    <main class="push has-image" style="background-image: url('<?php echo esc_url( $image ); ?>')">
    <?php else : ?>            
    <main class="push">
    <?php endif; ?>        
	
        <div class="container">
            <div class="row">

        
        <div class="col-xs-12 col-md-12 main">
			<section class="error-404 not-found">
				<header class="page-header">
				
				<?php if ( true == get_theme_mod( '404_picture', false ) ) : ?>
                <?php $image = get_theme_mod( '404_image', '' ); ?>
                <img src="<?php echo esc_url( $image ); ?>">
                <?php else : ?>   
                <?php endif; ?> 
				    
					<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'magazine-theme-v1' ); ?></h1>
				    <p class="">The requested page could not be found</p>
				    
				    <?php if ( true == get_theme_mod( '404_search', true ) ) : ?>
                    <?php get_template_part( 'searchform'); ?>
                    <?php else : ?><?php endif; ?>                      
                    
                    <?php if ( true == get_theme_mod( '404_button', true ) ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <button style="background-color: <?php echo get_theme_mod( 'primary_color', '#FFFFFF' ); ?>">
                            <?php if ( true == get_theme_mod( '404_button_text', true ) ) : ?> 
                                <?php echo get_theme_mod( '404_button_text', 'Return Home?' ); ?>
                            <?php else : ?>
                                Return Home?   
                            <?php endif; ?>  
                            </button>
                        <?php else : ?>
                        </a>
                        <?php endif; ?> 
                     
                    
                    
				    </header><!-- .page-header -->
			</section><!-- .error-404 -->
                </div>
                </div></div></main>

<?php
get_footer();