<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arkdin_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', false );
    $footer_style_3_switch = get_theme_mod( 'footer_style_3_switch', false );

    /**
     * Blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'arkdin' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="blog-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="cs-widget_title cs_semibold">',
        'after_title'   => '</h3>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // Footer Default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer widget no. %1$s', 'arkdin' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'arkdin' ), $num ),
            'before_widget' => '<div id="%1$s" class="cs-footer_item footer-widget column-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="cs-widget_title cs_semibold">',
            'after_title'   => '</h2>',
        ] );
    }

    $footer_widgets2 = get_theme_mod( 'footer_widget_number', 4 );

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets2; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'arkdin' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'arkdin' ), $num ),
                'before_widget' => '<div id="%1$s" class="footer__widget cs_footer_widget cs_footer_item footer__widget-2 footer-col-2-'.$num.' mb-50 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="cs_footer_widget_title cs_fs_24 cs_semibold cs_white_color cs_mb_10 cs_text_widget">',
                'after_title'   => '</h3><div class="cs_footer_widget_seperator"><span class="cs_accent_bg"></span><span class="cs_white_bg"></span><span class="cs_white_bg"></span></div>',
            ] );
        }
    }  

    $footer_widgets3 = get_theme_mod( 'footer_widget_number', 4 );

    // footer 3
    if ( $footer_style_3_switch ) {
        for ( $num = 1; $num <= $footer_widgets3; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'arkdin' ), $num ),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'arkdin' ), $num ),
                'before_widget' => '<div id="%1$s" class="footer__widget cs_footer_widget cs_footer_item footer__widget-3 footer-col-3-'.$num.' mb-50 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="cs_footer_widget_title cs_fs_24 cs_semibold cs_white_color cs_mb_10 cs_text_widget">',
                'after_title'   => '</h3><div class="cs_footer_widget_seperator"><span class="cs_accent_bg"></span><span class="cs_white_bg"></span><span class="cs_white_bg"></span></div>',
            ] );
        }
    }       


}
add_action( 'widgets_init', 'arkdin_widgets_init' );