<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arkdin
 */

$arkdin_blog_btn = get_theme_mod('arkdin_blog_btn', __( 'Read More', 'arkdin' ) );
$arkdin_blog_btn_switch = get_theme_mod( 'arkdin_blog_btn_switch', true );

?>

<?php if ( !empty( $arkdin_blog_btn_switch ) ): ?>  

  <a href="<?php the_permalink(); ?>" class="cs_btn cs_style_1">
    <span><?php print esc_html($arkdin_blog_btn); ?></span>
    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"/>
    </svg>                
  </a>

<?php endif;?>