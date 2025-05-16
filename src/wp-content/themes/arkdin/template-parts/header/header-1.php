<?php

	/**
	* Template part for displaying header layout one
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package arkdin
	*/

  $arkdin_header_right = get_theme_mod( 'arkdin_header_right', false );
  $arkdin_menu_col = $arkdin_header_right ? 'cs_main_header_center' : 'cs_main_header_right';

  $header_button_text = get_theme_mod( 'header_button_text1', __( 'Read More', 'arkdin' ) );
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
    <header class="cs_site_header cs_style_1 cs_heading_color cs_sticky_header">
     <?php if (!empty( $arkdin_side_hide )) : ?>
      <div class="cs_top_header">
        <div class="container">
          <div class="cs_top_header_in">
            <?php if ( !empty( $arkdin_office_address ) ): ?>
            <div class="cs_top_header_left"><?php echo esc_html( $arkdin_office_address ) ?></div>
            <?php endif;?>
            <div class="cs_top_header_left">
              <div class="cs_header_social_links_wrap">
                <?php if ( !empty( $arkdin_contact_link ) ): ?>
                <p class="mb-0"><?php echo esc_html( $arkdin_contact_link ) ?> </p>
                <?php endif;?>
                <div class="cs_header_social_links">
                  <?php foreach ( $header_social_repeater as $item ) : ?>
                  <a href="<?php echo esc_url($item['link_url']); ?>" class="cs_social_btn cs_center">
                    <i class="fa-brands <?php echo esc_attr($item['link_text']); ?>"></i>
                  </a>
                 <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>

      <div class="cs_main_header cs_accent_bg">
        <div class="container">
          <div class="cs_main_header_in">
            <div class="cs_main_header_left">
              <?php arkdin_header_logo(); ?>
            </div>
            <div class="<?php echo esc_attr($arkdin_menu_col); ?>">
              <div class="cs_nav">
                  <?php arkdin_header_menu(); ?>
              </div>
            </div>
            <?php if ( !empty( $arkdin_header_right ) ): ?>
            <div class="cs_main_header_right">
              <!-- <a href="<?php echo esc_url($header_button_link); ?>" class="cs_btn cs_style_1">
                <span><?php echo esc_html($header_button_text); ?></span>
                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"></path>
                </svg>                
              </a> -->
              <ul>
                <li>
                  <a href="/cart">
                    <i class="fa fa-shopping-cart"></i>
                  </a>
                </li>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header>
    <div class="cs_site_header_spacing_130"></div>
    <!-- End Header Section -->

