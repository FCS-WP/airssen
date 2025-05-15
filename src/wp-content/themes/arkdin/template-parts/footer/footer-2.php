<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arkdin
*/

// Footer Columns
$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-2-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'cs_footer_col';
    break;
case '2':
    $footer_class[1] = 'cs_footer_col';
    $footer_class[2] = 'cs_footer_col';
    break;
case '3':
    $footer_class[1] = 'cs_footer_col';
    $footer_class[2] = 'cs_footer_col';
    $footer_class[3] = 'cs_footer_col';
    break;
case '4':
    $footer_class[1] = 'cs_footer_col';
    $footer_class[2] = 'cs_footer_col';
    $footer_class[3] = 'cs_footer_col';
    $footer_class[4] = 'cs_footer_col';
    break;     
default:
    $footer_class = 'cs_footer_col';
    break;
}

$arkdin_number_icon = get_template_directory_uri() . '/assets/img/icons/call.svg';

$arkdin_footer_logo = get_template_directory_uri() . '/assets/img/footer_logo.svg';
$arkdin_footer2_profile_image = get_theme_mod( 'arkdin_footer2_profile_image', $arkdin_footer_logo );

$arkdin_footer_profile = get_template_directory_uri() . '/assets/img/footer_bg_1.jpg';
$arkdin_footer_profile_image = get_theme_mod( 'arkdin_footer_profile_image', $arkdin_footer_profile );

$header_button_text = get_theme_mod( 'header_button_text', __( 'Need Any Cleaning Help', 'arkdin' ) );
$header_button_number = get_theme_mod( 'header_button_number', __( '+222 (789) 568 25', 'arkdin' ) );

$footer_social = [
  [
      'link_text2' => esc_html__( 'fa-linkedin-in', 'arkdin' ),
      'link_url2'  => '#',
  ],
  [
      'link_text2' => esc_html__( 'fa-twitter', 'arkdin' ),
      'link_url2'  => '#',
  ],
  [
      'link_text2' => esc_html__( 'fa-youtube', 'arkdin' ),
      'link_url2'  => '#',
  ], 
  [
      'link_text2' => esc_html__( 'fa-facebook-f', 'arkdin' ),
      'link_url2'  => '#',
  ],        
];
$footer_social_repeater = get_theme_mod('footer_social_repeater' , $footer_social);

$footer_menu = [
  [
      'link_text3' => esc_html__( 'Setting & Privacy', 'arkdin' ),
      'link_url3'  => '#',
  ],
  [
      'link_text3' => esc_html__( 'FAQ', 'arkdin' ),
      'link_url3'  => '#',
  ],
  [
      'link_text3' => esc_html__( 'Support', 'arkdin' ),
      'link_url3'  => '#',
  ],         
];
$footer_menu_repeater = get_theme_mod('footer_menu_repeater' , $footer_menu);
?>

<!-- Start Footer -->
<footer class="cs_footer cs_style_1">
  <div class="cs_footer_top">
    <div class="container">
      <div class="cs_footer_top_in">
        <div class="cs_social_btns cs_style_1">
          <?php foreach ( $footer_social_repeater as $item ) : ?>  
          <a href="<?php echo esc_url($item['link_url2']); ?>" class="cs_social_btn cs_center">
            <i class="fa-brands <?php echo esc_attr($item['link_text2']); ?>"></i>
          </a>
          <?php endforeach; ?>
        </div>
        <div class="cs_footer_logo wow zoomIn" data-wow-duration="0.9s" data-wow-delay="0.25s"><img src="<?php print esc_url( $arkdin_footer2_profile_image );?>" alt="<?php print esc_attr__( 'Logo', 'arkdin' );?>"></div>
        <div class="cs_footer_contact_card">
          <div class="cs_footer_contact_card_icon cs_white_bg cs_center">
            <img src="<?php print esc_url( $arkdin_number_icon );?>" alt="<?php print esc_attr__( 'Icon', 'arkdin' );?>">
          </div>
          <div>
            <p class="cs_white_color cs_fs_14 mb-0"><?php echo esc_html($header_button_text); ?></p>
            <h3 class="mb-0 cs_fs_24 cs_semibold cs_white_color"><a><?php echo esc_html($header_button_number); ?></a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php if ( is_active_sidebar( 'footer-2-1' ) OR is_active_sidebar( 'footer-2-2' ) OR is_active_sidebar( 'footer-2-3' ) OR is_active_sidebar( 'footer-2-4' )  ): ?>
  <div class="cs_main_footer cs_bg_filed cs_primary_bg cs_white_color" data-src="<?php print esc_url( $arkdin_footer_profile_image );?>">
    <div class="container">
      <div class="cs_footer_row cs_type_1">
            <?php
                if ( $footer_columns < 4 ) {
                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-2-1' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-2-2' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-2-3' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-2-4' );
                print '</div>'; 

                } else {
                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                        if ( !is_active_sidebar( 'footer-2-' . $num ) ) {
                            continue;
                        }
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-2-' . $num );
                        print '</div>';
                    }
                }
            ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="cs_footer_bottom cs_accent_bg cs_white_color">
    <div class="container">
      <div class="cs_footer_bottom_in">
        <div class="cs_footer_copyright"><?php print arkdin_copyright_text(); ?></div>
        <ul class="cs_footer_menu cs_mp_0">
          <?php foreach ( $footer_menu_repeater as $item ) : ?>  
          <li><a href="<?php echo esc_url($item['link_url3']); ?>"><?php echo esc_html($item['link_text3']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer -->



