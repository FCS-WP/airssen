<?php

/**
 * arkdin_scripts description
 * @return [type] [description]
 */
function arkdin_scripts() {


    /**
     * ALL CSS FILES
    */
    wp_enqueue_style( 'arkdin-fonts', arkdin_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', ARKDIN_THEME_CSS_DIR.'bootstrap.rtl.min.css', array(), '5.3.2' );
    }else{
        wp_enqueue_style( 'bootstrap', ARKDIN_THEME_CSS_DIR.'bootstrap.min.css', array(), '5.3.2' );
    }
    wp_enqueue_style( 'font-awesome-free', ARKDIN_THEME_CSS_DIR . 'fontawesome.min.css', array(), '6.2.1' );
    wp_enqueue_style( 'animate', ARKDIN_THEME_CSS_DIR . 'animate.css', array(), '3.7.0' );
    wp_enqueue_style( 'slickcss', ARKDIN_THEME_CSS_DIR . 'slick.min.css', array(), '3.5.1' );        
    wp_enqueue_style( 'arkdin-core', ARKDIN_THEME_CSS_DIR . 'arkdin-core.css', array(), '1.0' );
    wp_enqueue_style( 'arkdin-update', ARKDIN_THEME_CSS_DIR . 'arkdin-update.css', array(), '1.0' );
    wp_enqueue_style( 'arkdin-unit', ARKDIN_THEME_CSS_DIR . 'arkdin-unit.css', array(), '1.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'arkdin-rtl', ARKDIN_THEME_CSS_DIR.'arkdin-rtl.css', array(), '1.0' );
    }
    wp_enqueue_style( 'arkdin-style', get_stylesheet_uri() );


    // ALL JS FILES
    wp_enqueue_script( 'wowjs', ARKDIN_THEME_JS_DIR . 'wow.min.js', array('jquery'), '1.1.2', true );
    wp_enqueue_script( 'slickjs', ARKDIN_THEME_JS_DIR . 'jquery.slick.min.js', array('jquery'), '3.5.1', true );        
    wp_enqueue_script( 'arkdin-main', ARKDIN_THEME_JS_DIR . 'main.js', array('jquery'), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'arkdin_scripts' );

/*
Register Fonts
*/
function arkdin_fonts_url() {

    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'arkdin' ) ) {
        $font_url = add_query_arg( 'family', 'DM+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900|Outfit:wght@400,500,600,700,800,900' , "//fonts.googleapis.com/css");
    }
    return $font_url;
}

