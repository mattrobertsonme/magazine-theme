<?php
/**
 * Magazine_Theme_v1 Theme Customizer
 *
 * @package Magazine_Theme_v1
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazine_theme_v1_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'magazine_theme_v1_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'magazine_theme_v1_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'magazine_theme_v1_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magazine_theme_v1_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magazine_theme_v1_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazine_theme_v1_customize_preview_js() {
	wp_enqueue_script( 'magazine-theme-v1-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magazine_theme_v1_customize_preview_js' );

/**
 * Add the theme configuration
 */
magazine_theme_v1_Kirki::add_config( 'magazine_theme_v1', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/* -----------------------------------------------------------------------------
    
    =SECTIONS
  
----------------------------------------------------------------------------- */

/**
 * Add the Featured section
 */
magazine_theme_v1_Kirki::add_section( 'featured', array(
	'title'      => esc_attr__( 'Home Page Featured Section', 'magazine-theme-v1' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the typography section
 */
magazine_theme_v1_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'magazine-theme-v1' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the Colors section
 */
magazine_theme_v1_Kirki::add_section( 'colors', array(
	'title'      => esc_attr__( 'Colors', 'magazine-theme-v1' ),
	'priority'   => 3,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the body-typography control
 */
magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_attr__( 'Body Typography', 'magazine-theme-v1' ),
	'description' => esc_attr__( 'Select the main typography options for your site.', 'magazine-theme-v1' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'magazine-theme-v1' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Hind',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => 'body', 'h2', 'h3', 'h4', 'h5', 'h6',
		),
	),
) );

/* -----------------------------------------------------------------------------
    
    =COLORS
  
----------------------------------------------------------------------------- */

magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => __( 'Primary Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#0088CC',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
) );

magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
	'type'        => 'select',
	'settings'    => 'choose_posts',
	'label'       => __( 'Choose Featured Posts', 'magazine-theme-v1' ),
	'section'     => 'featured',
	'default'     => 'option-1',
	'priority'    => 10,
	'multiple'    => 4,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' =>2, 'post_type' => 'post' ) ),
) );

/**
 * Add the body-typography control
 */
magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'magazine-theme-v1' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'magazine-theme-v1' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'magazine-theme-v1' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '700',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#333',
	),
	'output' => array(
		array(
			'element' => array( 'header.header', 'h1' ),
		),
	),
) );

/* -----------------------------------------------------------------------------
    
    =ERROR 404
  
----------------------------------------------------------------------------- */
    
    magazine_theme_v1_Kirki::add_section( '404', array(
        'title'      => esc_attr__( 'Error 404', 'magazine-theme-v1' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
    ) );
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'        => 'toggle',
        'settings'    => '404_search',
        'label'       => __( 'Show Search Form', 'magazine-theme-v1' ),
        'section'     => '404',
        'default'     => '1',
        'priority'    => 10,
    ) );

    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'        => 'toggle',
        'settings'    => '404_button',
        'label'       => __( 'Show Button', 'magazine-theme-v1' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 20,
    ) );
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'      => 'text',
        'settings'  => '404_button_text',
        'label'     => esc_html__( 'Button Text' , 'magazine-theme-v1' ),
        'section'   => '404',
        'default'   => esc_html__( 'Return Home?', 'magazine-theme-v1' ),
        'priority'  => 21,
        'active_callback' => array(
            array(
                'setting'  => '404_button',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'        => 'toggle',
        'settings'    => '404_picture',
        'label'       => __( 'Show An Image', 'magazine-theme-v1' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 30,
    ) );
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'      => 'image',
        'settings'  => '404_image',
        'label'     => esc_html__( 'Image' , 'magazine-theme-v1' ),
        'description' => __( 'Choose an image to display alongside your text', 'magazine-theme-v1' ),
        'help'        => __( 'This is some extra help text.', 'magazine-theme-v1' ),
        'section'   => '404',
        'default'   => esc_html__( '', 'magazine-theme-v1' ),
        'priority'  => 31,
        'active_callback' => array(
            array(
                'setting'  => '404_picture',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );  
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'        => 'toggle',
        'settings'    => '404_background',
        'label'       => __( 'Show Background Image', 'magazine-theme-v1' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 40,
    ) );
    
    magazine_theme_v1_Kirki::add_field( 'magazine_theme_v1', array(
        'type'      => 'image',
        'settings'  => '404_background_image',
        'label'     => esc_html__( 'Background Image' , 'magazine-theme-v1' ),
        'description' => __( 'Choose a full sized image background', 'magazine-theme-v1' ),
        'help'        => __( 'This is some extra help text.', 'magazine-theme-v1' ),
        'section'   => '404',
        'default'   => esc_html__( '', 'magazine-theme-v1' ),
        'priority'  => 41,
        'active_callback' => array(
            array(
                'setting'  => '404_background',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );  