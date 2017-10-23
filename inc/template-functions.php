<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Magazine_Theme_v1
 */

/* -----------------------------------------------------------------------------
    
    =CUSTOM POSTS TYPE
  
----------------------------------------------------------------------------- */
    
    /*------------------------------------*\
        =VIDEOS
    \*------------------------------------*/
    
    function _magazine_theme_v1_videos() {
        register_taxonomy_for_object_type('category', '_magazine_theme_v1_');
        register_taxonomy_for_object_type('post_tag', '_magazine_theme_v1_');
        register_post_type('videos',
            array(
            'labels' => array(
                'name' => __('Videos', '_magazine_theme_v1_'), // Rename these to suit
                'singular_name' => __('Video Post', '_magazine_theme_v1_'),
                'add_new' => __('Add New', '_magazine_theme_v1_'),
                'add_new_item' => __('Add New Video Post', '_magazine_theme_v1_'),
                'edit' => __('Edit', '_magazine_theme_v1_'),
                'edit_item' => __('Edit Videos Post', '_magazine_theme_v1_'),
                'new_item' => __('New Video Post', '_magazine_theme_v1_'),
                'view' => __('View Videos Post', '_magazine_theme_v1_'),
                'view_item' => __('View video Post', '_magazine_theme_v1_'),
                'search_items' => __('Search Videos Post', '_magazine_theme_v1_'),
                'not_found' => __('No Videos Found', '_magazine_theme_v1_'),
                'not_found_in_trash' => __('No Videos Found in Trash', '_magazine_theme_v1_')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'menu_icon'   => 'dashicons-video-alt2',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), 
            'can_export' => true,
            'taxonomies' => array(
            ) 
        ));
    }
    
    // add_action('init', '_magazine_theme_v1_videos');
    
/* -----------------------------------------------------------------------------
    
    =GLOBAL
  
----------------------------------------------------------------------------- */
    
    /*------------------------------------*\
       =CHANGE SEARCH URL
    \*------------------------------------*/  
    
    function magazine_theme_v1_search_url_rewrite() {
        if ( is_search() && ! empty( $_GET['s'] ) ) {
            wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
            exit();
        }	
    }
    
    add_action( 'template_redirect', 'magazine_theme_v1_search_url_rewrite' );
    
    /*------------------------------------*\
       =ADD CUSTOM CLASS TO BODY CLASSES
    \*------------------------------------*/  
    
    function magazine_theme_v1_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }  
        return $classes;
    }
    
    add_filter( 'body_class', 'magazine_theme_v1_body_classes' );
    
    /*------------------------------------*\
       =Add a pingback url auto-discovery header for singularly identifiable articles
    \*------------------------------------*/
    
    function magazine_theme_v1_pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
    }
    
    add_action( 'wp_head', 'magazine_theme_v1_pingback_header' );
    
    /*------------------------------------*\
       =MODIFY EXCERPT
    \*------------------------------------*/  
    
    function magazine_theme_v1_excerpt_length( $length ) {
        return 20;
    }
    
    function magazine_theme_v1_excerpt_more( $more ) {
        return '<a href="'.get_the_permalink().'" rel="nofollow">...</a>';
    }
    
    add_filter( 'excerpt_length', 'magazine_theme_v1_excerpt_length', 999 );
    add_filter( 'excerpt_more', 'magazine_theme_v1_excerpt_more' );
    
/* -----------------------------------------------------------------------------
    
    =HEADER
  
----------------------------------------------------------------------------- */
    
    /*------------------------------------*\
       =REMOVE DIV SURROUNDING NAVIGATION
    \*------------------------------------*/    
    
    function magazine_theme_v1_nav_menu_args($args = '') {
        $args['container'] = false;
        return $args;
    }
    
    add_filter('wp_nav_menu_args', 'magazine_theme_v1_nav_menu_args');
    
    /*------------------------------------*\
       =REGISTER NAVS
    \*------------------------------------*/   

    function magazine_theme_v1_header_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
            'depth'           => 0,
            'walker'            => new WP_Bootstrap_Navwalker()
            )
        );
    }
    
    function magazine_theme_v1_mobile_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'mobile-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'            => new WP_Pushy_Navwalker()
            )
        );
    }
    
    function magazine_theme_v1_footer_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'footer-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="nav navbar-nav">%3$s',
            'depth'           => 0,
            'walker'            => new WP_Bootstrap_Navwalker()
            )
        );
    }
    
    function register_magazine_theme_v1_menu() {
        register_nav_menus(array(
            'header-menu' => __('Header Menu', 'magazine_theme_v1'),
            'footer-menu' => __('Footer Menu', 'magazine_theme_v1'),
            'mobile-menu' => __('Mobile Menu', 'magazine_theme_v1')
        ));
    }
    
    add_action('init', 'register_magazine_theme_v1_menu');
    
/* -----------------------------------------------------------------------------
    
    =WIDGETS
  
----------------------------------------------------------------------------- */
    
    /*------------------------------------*\
       =SORT RECENTS POSTS BY DATE 
    \*------------------------------------*/
    
    function magazine_theme_v1_widget_recent_posts($params) {
       $params['orderby'] = 'date';
       return $params;
    }
    
    add_filter('widget_posts_args', 'magazine_theme_v1_widget_recent_posts'); 
    
    /*------------------------------------*\
       =SHOW TIME IN RECENT POSTS WIDGET
    \*------------------------------------*/
    
    add_filter( 'widget_display_callback', function ( $instance, $widget_instance ) {
    if (    $widget_instance->id_base === 'recent-posts'
         && $instance['show_date']    === true
    ) {
         
        add_filter( 'get_the_date', function ( $the_date, $d, $post )
        {
            // Set new date format
            $d = 'F j, Y';
            // Set new value format to $the_date
            $the_date = mysql2date( $d, $post->post_date );
            
            return $the_date . ' at ' . get_the_time(); ;   
        }, 10, 3 );
        
        }
        return $instance;
    }, 10, 2 );
    
/* -----------------------------------------------------------------------------
    
    =PEOPLE
  
----------------------------------------------------------------------------- */

    /*------------------------------------*\
       =AUTHOR SOCIAL MEDIA
    \*------------------------------------*/
    
    function magazine_theme_v1_author_profile( $contactmethods ) {
	   
        $contactmethods['rss_url'] = 'RSS URL';
        $contactmethods['google_profile'] = 'Google Profile URL';
        $contactmethods['twitter_profile'] = 'Twitter Profile URL';
        $contactmethods['facebook_profile'] = 'Facebook Profile URL';
        $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
        
        return $contactmethods;
    }
    
    add_filter( 'user_contactmethods', 'magazine_theme_v1_author_profile', 10, 1);
    
    /*------------------------------------*\
       =COMMENTS
    \*------------------------------------*/
    
    function magazine_theme_v1_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
    ?>

    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-header">
	<div class="comment-picture vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['60'] ); ?>
	</div>
    <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
    <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
    <?php endif; ?>
	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		
	<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div></div>
    
    <div class="comment-message">
	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div></div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
    <?php }