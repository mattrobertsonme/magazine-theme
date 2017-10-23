<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Theme_v1
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://use.fontawesome.com/423d3c2999.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav class="pushy pushy-left">
           <?php magazine_theme_v1_mobile_nav(); ?>  
        </nav>
       
        
        <header class="navbar-fixed-top header" id="container" style="background-color: <?php echo get_theme_mod( 'primary_color', '#FFFFFF' ); ?>">
        	<div class="header-left">
        		<div class="button menu-btn">
					<i class="fa fa-bars"></i>				
				</div>
				
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo_link" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
				</div>
			</div>
			
			<nav class="navigation">
				<?php magazine_theme_v1_header_nav(); ?>       
                <button class="search"><a href="#search-fs"><i class="fa fa-search"></i></a></button>
			</nav>
		</header>


<div id="search-fs">
    <button type="button" class="close">×</button>
    <form role="search" method="get" class="search-form" action="http://localhost/magazine/technology/?s=">
    <h3>Search</h3>
        <input type="search" class="search-field" placeholder="Type and hit enter" value="" name="s">
        <input type="submit" class="search-submit" value="Search" style="background-color: <?php echo get_theme_mod( 'primary_color', '#FFFFFF' ); ?>">
    </form>
</div>
        
        <div class="site-overlay"></div>
    