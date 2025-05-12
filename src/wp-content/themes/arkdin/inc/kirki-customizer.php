<?php
/**
 * arkdin customizer
 *
 * @package arkdin
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function arkdin_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'arkdin_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Arkdin Customizer', 'arkdin' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'arkdin_default_setting', [
        'title'       => esc_html__( 'Arkdin Default Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'header_info_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Top Bar & Social', 'arkdin' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'arkdin' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'footer_social', [
        'title'       => esc_html__( 'Footer Social', 'arkdin' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'arkdin' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'arkdin' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'arkdin' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'arkdin_customizer',
    ] );
}

add_action( 'customize_register', 'arkdin_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _arkdin_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_preloader',
        'label'    => esc_html__( 'Preloader ON/OFF', 'arkdin' ),
        'section'  => 'arkdin_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_arkdin_default_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {

    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_side_hide',
        'label'    => esc_html__( 'Top Bar', 'arkdin' ),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'arkdin_office_address',
        'label'    => esc_html__( 'Text', 'arkdin' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Welcome to Our ArkdinAir & Services Company', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_contact_link',
        'label'    => esc_html__( 'Social Title', 'arkdin' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Follow Us On:', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'repeater',
        'settings' => 'header_social_repeater',
        'label'    => esc_html__( 'Header Social', 'arkdin' ),
        'section'  => 'header_side_setting',
        'default'  => [
            [
                'link_text'   => esc_html__( 'fa-linkedin-in', 'arkdin' ),
                'link_url'    => '#',
            ],
            [
                'link_text'   => esc_html__( 'fa-twitter', 'arkdin' ),
                'link_url'    => '#',
            ],
            [
                'link_text'   => esc_html__( 'fa-youtube', 'arkdin' ),
                'link_url'    => '#',
            ],
            [
                'link_text'   => esc_html__( 'fa-facebook-f', 'arkdin' ),
                'link_url'    => '#',
            ],                        
        ],
        'fields'   => [
            'link_text'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'arkdin' ),
                'description' => esc_html__( 'Enter item name: (fa-facebook-f)', 'arkdin' ),
                'default'     => '',
            ],
            'link_url'    => [
                'type'        => 'text',
                'label'       => esc_html__( 'Link URL', 'arkdin' ),
                'description' => esc_html__( 'Enter your item link', 'arkdin' ),
                'default'     => '',
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'mobile_logo',
        'label'       => esc_html__( 'Mobile Menu Logo Dark', 'arkdin' ),
        'description' => esc_html__( 'Upload Your Logo.', 'arkdin' ),
        'section'     => 'mobile_menu_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'arkdin_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'arkdin_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'arkdin_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'arkdin_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_mobile_telegram_url',
        'label'    => esc_html__( 'Telegram URL', 'arkdin' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'arkdin_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'arkdin' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'arkdin' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'arkdin' ),
        'description' => esc_html__( 'Upload Your Logo', 'arkdin' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'arkdin' ),
        'description' => esc_html__( 'Upload Your Logo', 'arkdin' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/footer_logo_2.svg',
    ];

     $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_header_right',
        'label'    => esc_html__( 'Header Right Button On/Off', 'arkdin' ),
        'section'  => 'section_header_logo',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

     // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_button_text1',
        'label'    => esc_html__( 'Button Text', 'arkdin' ),
        'section'  => 'section_header_logo',
        'default'  => esc_html__( 'Read More', 'arkdin' ),
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'header_button_link1',
        'label'    => esc_html__( 'Button URL', 'arkdin' ),
        'section'  => 'section_header_logo',
        'default'  => esc_html__( '#', 'arkdin' ),
    ]; 

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'arkdin' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'arkdin' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/breadcumb_bg1.svg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'arkdin_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'arkdin' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'arkdin' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#9cc4f3',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__( 'Breadcrumb Info switch', 'arkdin' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta ON/OFF', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'arkdin_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'arkdin' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'arkdin' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'arkdin' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'arkdin' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2'   => get_template_directory_uri() . '/inc/img/footer/footer-2.png',       
            'footer-style-3'   => get_template_directory_uri() . '/inc/img/footer/footer-3.png',       
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'arkdin' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'arkdin' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '3' => esc_html__( 'Widget Number 3', 'arkdin' ),
            '2' => esc_html__( 'Widget Number 2', 'arkdin' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_3_switch',
        'label'    => esc_html__( 'Footer Style 3 On/Off', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'arkdin' ),
            'off' => esc_html__( 'Disable', 'arkdin' ),
        ],
    ];  

    // Footer 2 
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'arkdin_footer2_profile_image',
        'label'       => esc_html__( 'Logo', 'arkdin' ),
        'description' => esc_html__( 'Upload Your Image', 'arkdin' ),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img//footer_logo.svg',
        'priority' => 10,        
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'arkdin_footer_profile_image',
        'label'       => esc_html__( 'Background Image', 'arkdin' ),
        'description' => esc_html__( 'Upload Your Image', 'arkdin' ),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/footer_bg_1.jpg',
        'priority' => 10,        
    ];

    $fields[] = [
        'type'     => 'repeater',
        'settings' => 'footer_social_repeater',
        'label'    => esc_html__( 'Footer Social', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => [
            [
                'link_text2'   => esc_html__( 'fa-linkedin-in', 'arkdin' ),
                'link_url2'    => '#',
            ],
            [
                'link_text2'   => esc_html__( 'fa-twitter', 'arkdin' ),
                'link_url2'    => '#',
            ],
            [
                'link_text2'   => esc_html__( 'fa-youtube', 'arkdin' ),
                'link_url2'    => '#',
            ],
            [
                'link_text2'   => esc_html__( 'fa-facebook-f', 'arkdin' ),
                'link_url2'    => '#',
            ],                        
        ],
        'fields'   => [
            'link_text2'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'arkdin' ),
                'description' => esc_html__( 'Enter item name: (fa-facebook-f)', 'arkdin' ),
                'default'     => '',
            ],
            'link_url2'    => [
                'type'        => 'text',
                'label'       => esc_html__( 'Link URL', 'arkdin' ),
                'description' => esc_html__( 'Enter your item link', 'arkdin' ),
                'default'     => '',
            ],
        ],
    ];

     // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_button_text',
        'label'    => esc_html__( 'Number Text', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Need Any Cleaning Help', 'arkdin' ),
        'priority' => 13,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_button_number',
        'label'    => esc_html__( 'Number', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '+222 (789) 568 25', 'arkdin' ),
        'priority' => 13,
    ]; 

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_copyright',
        'label'    => esc_html__( 'CopyRight', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => wp_kses_post( 'Copyright © 2024 Arkdin. All rights reserved.', 'arkdin' ),
        'priority' => 12,
    ];

    $fields[] = [
        'type'     => 'repeater',
        'settings' => 'footer_menu_repeater',
        'label'    => esc_html__( 'Footer Menu', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => [
            [
                'link_text3'   => esc_html__( 'Setting & Privacy', 'arkdin' ),
                'link_url3'    => '#',
            ],
            [
                'link_text3'   => esc_html__( 'FAQ', 'arkdin' ),
                'link_url3'    => '#',
            ],
            [
                'link_text3'   => esc_html__( 'Support', 'arkdin' ),
                'link_url3'    => '#',
            ],                       
        ],
        'fields'   => [
            'link_text3'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'arkdin' ),
                'description' => esc_html__( 'Enter item name', 'arkdin' ),
                'default'     => '',
            ],
            'link_url3'    => [
                'type'        => 'text',
                'label'       => esc_html__( 'Link URL', 'arkdin' ),
                'description' => esc_html__( 'Enter your item link', 'arkdin' ),
                'default'     => '',
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'footer_location_text',
        'label'    => esc_html__( 'Footer 2 Location Text', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => arkdin_kses( '6391 Elgin St. Celina, <br>Delaware 10299', 'arkdin' ),
        'priority' => 13,
        'active_callback'  => [
            [
                'setting'  => 'footer_style_3_switch',
                'operator' => '===',
                'value'    => true,
            ],
        ],        
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'footer_number_text',
        'label'    => esc_html__( 'Footer 2 Number Text', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => arkdin_kses( '+222 (789) 568 25 <br>+222 (789) 568 25', 'arkdin' ),
        'priority' => 13,
        'active_callback'  => [
            [
                'setting'  => 'footer_style_3_switch',
                'operator' => '===',
                'value'    => true,
            ],
        ],        
    ];    

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'footer_email_text',
        'label'    => esc_html__( 'Footer 2 Email Text', 'arkdin' ),
        'section'  => 'footer_setting',
        'default'  => arkdin_kses( 'info@gmail.com <br>demo@gmail.com', 'arkdin' ),
        'priority' => 13,
        'active_callback'  => [
            [
                'setting'  => 'footer_style_3_switch',
                'operator' => '===',
                'value'    => true,
            ],
        ],        
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );


/*
Header Social
 */
function _footer_social_fields( $fields ) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_footer_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'arkdin' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_footer_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'arkdin' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_footer_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'arkdin' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_footer_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'arkdin' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_footer_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'arkdin' ),
        'section'  => 'footer_social',
        'default'  => esc_html__( '#', 'arkdin' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_footer_social_fields' );


// color
function arkdin_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'arkdin_color_option',
        'label'       => __( 'Theme Color', 'arkdin' ),
        'description' => esc_html__( 'This is a Theme color control.', 'arkdin' ),
        'section'     => 'color_setting',
        'default'     => '#ff5500',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'arkdin_color_option_2',
        'label'       => __( 'Secondary Color', 'arkdin' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'arkdin' ),
        'section'     => 'color_setting',
        'default'     => '#4d4d4d',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'arkdin_color_fields' );

// 404
function arkdin_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_error_text',
        'label'    => esc_html__( '404 Text', 'arkdin' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'arkdin' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'arkdin_error_title',
        'label'    => esc_html__( 'Not Found Title', 'arkdin' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Sorry, the page you are looking for could not be found', 'arkdin' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'arkdin' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'arkdin' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'arkdin_404_fields' );


/**
 * Added Fields
 */
function arkdin_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'arkdin' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'arkdin_typo_fields' );


/**
 * Added Fields
 */
function arkdin_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'arkdin' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'arkdin' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'arkdin_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'arkdin' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'arkdin' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'arkdin_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function ARKDIN_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'arkdin' ) ) {
        $value = Kirki::get_option( arkdin_get_theme(), $name );
    }

    return apply_filters( 'ARKDIN_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function arkdin_get_theme() {
    return 'arkdin';
}