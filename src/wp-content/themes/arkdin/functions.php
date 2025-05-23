<?php

/**
 * arkdin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package arkdin
 */

if ( !function_exists( 'arkdin_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function arkdin_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on arkdin, use a find and replace
         * to change 'arkdin' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'arkdin', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( [
            'main-menu' => esc_html__( 'Main Menu', 'arkdin' ),
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'arkdin_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable custom header
        add_theme_support( 'custom-header' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ] );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        remove_theme_support( 'widgets-block-editor' );

        add_image_size( 'arkdin-case-details', 1170, 600, [ 'center', 'center' ] );
    }
endif;
add_action( 'after_setup_theme', 'arkdin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arkdin_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'arkdin_content_width', 640 );
}
add_action( 'after_setup_theme', 'arkdin_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */

define( 'ARKDIN_THEME_DIR', get_template_directory() );
define( 'ARKDIN_THEME_URI', get_template_directory_uri() );
define( 'ARKDIN_THEME_CSS_DIR', ARKDIN_THEME_URI . '/assets/css/' );
define( 'ARKDIN_THEME_JS_DIR', ARKDIN_THEME_URI . '/assets/js/' );
define( 'ARKDIN_THEME_INC', ARKDIN_THEME_DIR . '/inc/' );



// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
require ARKDIN_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ARKDIN_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require ARKDIN_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once ARKDIN_THEME_INC . 'kirki-customizer.php';
include_once ARKDIN_THEME_INC . 'class-arkdin-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require ARKDIN_THEME_INC . 'jetpack.php';
}


/**
 * include arkdin functions file
 */
require_once ARKDIN_THEME_INC . 'class-navwalker.php';
require_once ARKDIN_THEME_INC . 'class-tgm-plugin-activation.php';
require_once ARKDIN_THEME_INC . 'add_plugin.php';
require_once ARKDIN_THEME_INC . '/common/arkdin-breadcrumb.php';
require_once ARKDIN_THEME_INC . '/common/arkdin-scripts.php';
require_once ARKDIN_THEME_INC . '/common/arkdin-widgets.php';


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function arkdin_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'arkdin_pingback_header' );

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function arkdin_move_comment_textarea_to_bottom( $fields ) {
    $comment_field       = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'arkdin_move_comment_textarea_to_bottom' );


// arkdin_comment
if ( !function_exists( 'arkdin_comment' ) ) {
    function arkdin_comment( $comment, $args, $depth ) {
        $GLOBAL['comment'] = $comment;
        extract( $args, EXTR_SKIP );
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr( $depth );
        ?>
            <li id="comment-<?php comment_ID();?>">

                <div class="comments-box">

                    <?php if( get_comment_type($comment) === 'comment' ):?>
                    <div class="comments-avatar">
                        <?php print get_avatar( $comment, 110, null, null, [ 'class' => [] ] );?>
                    </div>
                    <?php endif; ?>

                    <div class="comment-text">
                        <div class="avatar-name mb-10">
                            <h6 class="name">
                                <?php print get_comment_author_link();?>
                                <?php comment_reply_link( array_merge($args,
                                    array(
                                        'reply_text' => __('<i class="fas fa-reply-all"></i> Reply', 'arkdin'),
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth']
                                    )
                                )); ?>
                            </h6>
                            <span class="date"><?php comment_time( get_option( 'date_format' ) );?></span>
                        </div>

                        <?php comment_text();?>

                    </div>
                </div>
        <?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'arkdin_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function arkdin_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// arkdin_search_filter_form
if ( !function_exists( 'arkdin_search_filter_form' ) ) {
    function arkdin_search_filter_form( $form ) {

        $form = sprintf(
            '<div class="sidebar-search-form position-relative"><form action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_search_query() ),
            esc_html__( 'Search', 'arkdin' )
        );

        return $form;
    }
    add_filter( 'get_search_form', 'arkdin_search_filter_form' );
}

add_action( 'admin_enqueue_scripts', 'arkdin_admin_custom_scripts' );

function arkdin_admin_custom_scripts() {
    wp_enqueue_media();
    wp_enqueue_style( 'customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css',array());
    wp_register_script( 'arkdin-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'arkdin-admin-custom' );
}


// Archive count on rightside
function arkdin_archive_count_on_rightside($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="float-right">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
add_filter( 'get_archives_link', 'arkdin_archive_count_on_rightside' );


// Categories count on rightside
function arkdin_categories_count_on_rightside($links) {

	$links = str_replace('<span class="count">(', '</a> <span class="float-right">', $links);
	// For blog
	$links = str_replace('</a> (', '</a> <span class="float-right">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
add_filter( 'wp_list_categories', 'arkdin_categories_count_on_rightside',10,2 );
