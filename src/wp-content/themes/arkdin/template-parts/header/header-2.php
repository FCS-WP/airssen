<?php

  /**
  * Template part for displaying header layout one
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package arkdin
  */

  $header_button_text = get_theme_mod( 'header_button_text1', __( 'Request a quote', 'arkdin' ) );
  $header_button_link = get_theme_mod( 'header_button_link1', __( '#', 'arkdin' ) );

  $arkdin_side_hide = get_theme_mod( 'arkdin_side_hide', false );
  $arkdin_office_address = get_theme_mod( 'arkdin_office_address', __( 'Welcome to Our ArkdinAir & Services Company', 'arkdin' ) );
  $arkdin_contact_link = get_theme_mod( 'arkdin_contact_link', __( 'Follow Us On:', 'arkdin' ) );

  $social_menu = [
      [
          'link_text' => esc_html__( 'fa-linkedin-in', 'arkdin' ),
          'link_url'  => '#',
      ],
      [
          'link_text' => esc_html__( 'fa-twitter', 'arkdin' ),
          'link_url'  => '#',
      ],
      [
          'link_text' => esc_html__( 'fa-youtube', 'arkdin' ),
          'link_url'  => '#',
      ], 
      [
          'link_text' => esc_html__( 'fa-facebook-f', 'arkdin' ),
          'link_url'  => '#',
      ],        
  ];
  $header_social_repeater = get_theme_mod('header_social_repeater' , $social_menu);

?>

<!-- Start Header Section -->
<header class="cs_site_header cs_style_1 cs_type_1 cs_heading_color cs_sticky_header">
  <div class="cs_main_header">
    <div class="container">
      <div class="cs_main_header_in">
        <div class="cs_main_header_left">
            <?php arkdin_header_logo(); ?>
          <div class="cs_nav">
              <?php arkdin_header_menu(); ?>
          </div>
        </div>
        <div class="cs_main_header_right">
          <div class="cs_header_social_links">
          <?php foreach ( $header_social_repeater as $item ) : ?>
            <a href="<?php echo esc_url($item['link_url']); ?>" class="cs_social_btn cs_center">
              <i class="fa-brands <?php echo esc_attr($item['link_text']); ?>"></i>
            </a>
           <?php endforeach; ?>
          </div>
          <a href="<?php echo esc_url($header_button_link); ?>" class="cs_btn cs_style_1 cs_color_1">
            <span><?php echo esc_html($header_button_text); ?></span>              
          </a>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End Header Section -->
