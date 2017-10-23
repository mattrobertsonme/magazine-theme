<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Theme_v1
 */

?>
    
    <nav class="push footer" style="background-color: <?php echo get_theme_mod( 'primary_color', '#FFFFFF' ); ?>">
          <div class="container">
          	<?php magazine_theme_v1_header_nav(); ?>    
          	
          	<ul class="social">
          		<li><a href=""><i class="fa fa-facebook"></i></a></li>
          		<li><a href=""><i class="fa fa-twitter"></i></a></li>
          		<li><a href=""><i class="fa fa-twitch"></i></a></li>
          		<li><a href=""><i class="fa fa-linkedin"></i></a></li>
          		<li><a href=""><i class="fa fa-youtube"></i></a></li>
          		<li><a href=""><i class="fa fa-soundcloud"></i></a></li>
          	</ul></div>
          </nav>
        
        <footer class="push">
            <div class="container">
                <p>&copy; 2017 Magazine Theme v1. MagazinePlus by <a href="">ThemesPlus</a></p>
                
                <nav>
                       <?php magazine_theme_v1_footer_nav(); ?>  
                        
                        <li><a href="#top"><i class="fa fa-arrow-up"></i>Go to top</a></li>
                    </ul>
                </nav>
            </div>
        </footer>

<?php wp_footer(); ?>

</body>
</html>