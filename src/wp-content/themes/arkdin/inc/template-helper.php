<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package arkdin
 */


/**
 *
 * arkdin Header
 */

function arkdin_check_header() {
    $arkdin_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $arkdin_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $arkdin_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    }
    elseif ( $arkdin_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    }   
    else {

        /** Default Header Style **/
        if ( $arkdin_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }       
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'arkdin_header_style', 'arkdin_check_header', 10 );


/**
 * [arkdin_header_lang description]
 * @return [type] [description]
 */
function arkdin_header_lang_default() {
    $arkdin_header_lang = get_theme_mod( 'arkdin_header_lang', false );
    if ( $arkdin_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'English', 'arkdin' );?> <i class="fa-light fa-angle-down"></i></a>
        <?php do_action( 'arkdin_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [arkdin_language_list description]
 * @return [type] [description]
 */
function _arkdin_language( $mar ) {
    return $mar;
}
function arkdin_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="lang-list">';
        $mar .= '<li><a href="#">' . esc_html__( 'IND', 'arkdin' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'SPA', 'arkdin' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'GRE', 'arkdin' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'CIN', 'arkdin' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _arkdin_language( $mar );
}
add_action( 'arkdin_language', 'arkdin_language_list' );


// Header Logo
function arkdin_header_logo() { ?>
      <?php
        $arkdin_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $arkdin_logo = get_template_directory_uri() . '/assets/img/logo.svg';
        $arkdin_logo_black = get_template_directory_uri() . '/assets/img/footer_logo_2.svg';

        $arkdin_site_logo = get_theme_mod( 'logo', $arkdin_logo );
        $arkdin_secondary_logo = get_theme_mod( 'secondary_logo', $arkdin_logo_black );
      ?>

      <?php if ( !empty( $arkdin_logo_on ) ) : ?>
         <a class="cs_site_branding" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $arkdin_secondary_logo );?>" alt="<?php print esc_attr__( 'Logo', 'arkdin' );?>" />
         </a>
      <?php else : ?>
         <a class="cs_site_branding" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $arkdin_site_logo );?>" alt="<?php print esc_attr__( 'Logo', 'arkdin' );?>" />
         </a>
      <?php endif; ?>
   <?php
}

// Header Sticky Logo
function arkdin_header_sticky_logo() {?>
    <?php
        $arkdin_logo = get_template_directory_uri() . '/assets/img/logo.svg';
        $arkdin_site_logo = get_theme_mod( 'logo', $arkdin_logo );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $arkdin_site_logo );?>" alt="<?php print esc_attr__( 'Logo', 'arkdin' );?>" />
      </a>
    <?php
}

// Side Menu Logo
function arkdin_side_logo() {

    $arkdin_side_logo = get_template_directory_uri() . '/assets/img/logo.svg';
    $side_logo = get_theme_mod('side_logo', $arkdin_side_logo);
    ?>
    <a class="cs-site_branding" href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $side_logo ); ?>" alt="<?php print esc_attr__( 'Logo', 'arkdin' );?>" />
    </a>

<?php }


/**
 * [arkdin_header_social_profiles description]
 * @return [type] [description]
 */
function arkdin_header_social_profiles() {
    $arkdin_header_fb_url = get_theme_mod( 'arkdin_header_fb_url', __( '#', 'arkdin' ) );
    $arkdin_header_twitter_url = get_theme_mod( 'arkdin_header_twitter_url', __( '#', 'arkdin' ) );
    $arkdin_header_linkedin_url = get_theme_mod( 'arkdin_header_linkedin_url', __( '#', 'arkdin' ) );
    ?>
    <ul>
        <?php if ( !empty( $arkdin_header_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $arkdin_header_fb_url );?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $arkdin_header_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $arkdin_header_twitter_url );?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $arkdin_header_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $arkdin_header_linkedin_url );?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif;?>
    </ul>

<?php
}

function arkdin_footer_social_profiles() {
    $arkdin_footer_fb_url = get_theme_mod( 'arkdin_footer_fb_url', __( '#', 'arkdin' ) );
    $arkdin_footer_twitter_url = get_theme_mod( 'arkdin_footer_twitter_url', __( '#', 'arkdin' ) );
    $arkdin_footer_linkedin_url = get_theme_mod( 'arkdin_footer_linkedin_url', __( '#', 'arkdin' ) );
    $arkdin_footer_instagram_url = get_theme_mod( 'arkdin_footer_instagram_url', __( '#', 'arkdin' ) );
    $arkdin_footer_youtube_url = get_theme_mod( 'arkdin_footer_youtube_url', __( '#', 'arkdin' ) );
    ?>
        <?php if ( !empty( $arkdin_footer_fb_url ) ): ?>
         <a href="<?php print esc_url( $arkdin_footer_fb_url );?>"><i class="fa-brands fa-facebook-f"></i></a>
        <?php endif;?>
        <?php if ( !empty( $arkdin_footer_youtube_url ) ): ?>
            <a href="<?php print esc_url( $arkdin_footer_youtube_url );?>"><i class="fa-brands fa-youtube"></i></a>
        <?php endif;?>
        <?php if ( !empty( $arkdin_footer_linkedin_url ) ): ?>
         <a href="<?php print esc_url( $arkdin_footer_linkedin_url );?>"><i class="fa-brands fa-linkedin-in"></i></a>
        <?php endif;?>
        <?php if ( !empty( $arkdin_footer_twitter_url ) ): ?>
         <a href="<?php print esc_url( $arkdin_footer_twitter_url );?>"><i class="fa-brands fa-twitter"></i></a>
        <?php endif;?>
        <?php if ( !empty( $arkdin_footer_instagram_url ) ): ?>
            <a href="<?php print esc_url( $arkdin_footer_instagram_url );?>"><i class="fa-brands fa-instagram"></i></a>
        <?php endif;?>
<?php
}

/**
 * [arkdin_mobile_social_profiles description]
 * @return [type] [description]
 */
function arkdin_mobile_social_profiles() {
    $arkdin_mobile_fb_url           = get_theme_mod('arkdin_mobile_fb_url', __('#','arkdin'));
    $arkdin_mobile_twitter_url      = get_theme_mod('arkdin_mobile_twitter_url', __('#','arkdin'));
    $arkdin_mobile_instagram_url    = get_theme_mod('arkdin_mobile_instagram_url', __('#','arkdin'));
    $arkdin_mobile_linkedin_url     = get_theme_mod('arkdin_mobile_linkedin_url', __('#','arkdin'));
    $arkdin_mobile_telegram_url      = get_theme_mod('arkdin_mobile_telegram_url', __('#','arkdin'));
    ?>

    <ul class="clearfix">
        <?php if (!empty($arkdin_mobile_fb_url)): ?>
        <li class="facebook">
            <a href="<?php print esc_url($arkdin_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($arkdin_mobile_twitter_url)): ?>
        <li class="twitter">
            <a href="<?php print esc_url($arkdin_mobile_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($arkdin_mobile_instagram_url)): ?>
        <li class="instagram">
            <a href="<?php print esc_url($arkdin_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($arkdin_mobile_linkedin_url)): ?>
        <li class="linkedin">
            <a href="<?php print esc_url($arkdin_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($arkdin_mobile_telegram_url)): ?>
        <li class="telegram">
            <a href="<?php print esc_url($arkdin_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
        </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [arkdin_header_menu description]
 * @return [type] [description]
 */
function arkdin_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'cs_nav_list',
            'container'      => '',
            'fallback_cb'    => 'arkdin_Navwalker_Class::fallback',
            'walker'         => new arkdin_Navwalker_Class,
        ] );
    ?>
    <?php
}


/**
 * [arkdin_header_menu description]
 * @return [type] [description]
 */
function arkdin_mobile_menu() {
    ?>
    <?php
        $arkdin_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $arkdin_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $arkdin_menu );
        echo wp_kses_post( $arkdin_menu );
    ?>
    <?php
}

/**
 * [arkdin_blog_mobile_menu description]
 * @return [type] [description]
 */
function arkdin_blog_mobile_menu() {
    ?>
    <?php
        $arkdin_menu = wp_nav_menu( [
            'theme_location' => 'blog-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $arkdin_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $arkdin_menu );
        echo wp_kses_post( $arkdin_menu );
    ?>
    <?php
}

/**
 * [arkdin_search_menu description]
 * @return [type] [description]
 */
function arkdin_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'arkdin_Navwalker_Class::fallback',
            'walker'         => new arkdin_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [arkdin_footer_menu description]
 * @return [type] [description]
 */
function arkdin_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'arkdin_Navwalker_Class::fallback',
        'walker'         => new arkdin_Navwalker_Class,
    ] );
}


/**
 * [arkdin_category_menu description]
 * @return [type] [description]
 */
function arkdin_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'arkdin_Navwalker_Class::fallback',
        'walker'         => new arkdin_Navwalker_Class,
    ] );
}

/**
 *
 * arkdin footer
 */
add_action( 'arkdin_footer_style', 'arkdin_check_footer', 10 );

function arkdin_check_footer() {

    $footer_show = 1;
    $is_footer = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_footer') : '';
    if( !empty($_GET['s']) ) {
      $is_footer = null;
    }


    if ( empty( $is_footer ) && $footer_show == 1 ) {
        $arkdin_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
        $arkdin_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

        if ( $arkdin_footer_style == 'footer-style-1' ) {
            get_template_part( 'template-parts/footer/footer-1' );
        } 
        elseif ( $arkdin_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        }
        elseif ( $arkdin_footer_style == 'footer-style-3' ) {
            get_template_part( 'template-parts/footer/footer-3' );
        }                       
        else {

            /** default footer style **/
            if ( $arkdin_default_footer_style == 'footer-style-2' ) {
                get_template_part( 'template-parts/footer/footer-2' );
            } 
            elseif ( $arkdin_default_footer_style == 'footer-style-3' ) {
                get_template_part( 'template-parts/footer/footer-3' );
            }                                            
            else {
                get_template_part( 'template-parts/footer/footer-1' );
            }
        }

    }

}

// arkdin_copyright_text
function arkdin_copyright_text() {
   print get_theme_mod( 'arkdin_copyright', wp_kses_post( 'Copyright © 2024 arkdin . All rights reserved.', 'arkdin' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'arkdin_pagination' ) ) {

    function _arkdin_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function arkdin_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="pagination">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _arkdin_pagi_callback( $pagi );
    }
}


// theme color
function arkdin_custom_color() {

    // Theme color
    $color_code = get_theme_mod( 'arkdin_color_option', '#ff5500' );
    wp_enqueue_style( 'arkdin-custom', ARKDIN_THEME_CSS_DIR . 'arkdin-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --accent: " . $color_code . "}";
        $custom_css .= "html:root { --accent: " . $color_code . "}";
        wp_add_inline_style( 'arkdin-custom', $custom_css );
    }

    // Secondary color
    $color_code2 = get_theme_mod( 'arkdin_color_option_2', '#102039' );
    wp_enqueue_style( 'arkdin-custom', ARKDIN_THEME_CSS_DIR . 'arkdin-custom.css', [] );
    if ( $color_code2 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --primary: " . $color_code2 . "}";
        $custom_css .= "html:root { --primary: " . $color_code2 . "}";
        wp_add_inline_style( 'arkdin-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'arkdin_custom_color' );


// arkdin_kses_intermediate
function arkdin_kses_intermediate( $string = '' ) {
    return wp_kses( $string, arkdin_get_allowed_html_tags( 'intermediate' ) );
}

function arkdin_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function arkdin_kses($raw){

   $allowed_tags = array(
      'a'      => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'   => array(
         'title' => array(),
      ),
      'b'    => array(),
      'blockquote'   => array(
         'cite' => array(),
      ),
      'cite'   => array(
         'title' => array(),
      ),
      'code'  => array(),
      'del'   => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'     => array(),
      'div'    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'   => array(),
      'dt'   => array(),
      'em'   => array(),
      'h1'   => array(),
      'h2'   => array(),
      'h3'   => array(),
      'h4'   => array(),
      'h5'   => array(),
      'h6'   => array(),
      'i'    => array(
        'class' => array(),
      ),
      'img'   => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'   => array(
         'class' => array(),
      ),
      'ol'   => array(
         'class' => array(),
      ),
      'p'    => array(
         'class' => array(),
      ),
      'q'    => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'  => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'   => array(
         'width'        => array(),
         'height'       => array(),
         'scrolling'    => array(),
         'frameborder'  => array(),
         'allow'        => array(),
         'src'          => array(),
      ),
      'strike'  => array(),
      'br'      => array(),
      'strong'    => array(),
      'data-wow-duration'   => array(),
      'data-wow-delay'   => array(),
      'data-wallpaper-options'  => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'   => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}