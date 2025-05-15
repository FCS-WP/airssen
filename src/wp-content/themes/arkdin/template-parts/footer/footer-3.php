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
    if ( is_active_sidebar( 'footer-3-' . $num ) ) {
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


$arkdin_footer_profile = get_template_directory_uri() . '/assets/img/footer_bg_1.jpg';
$arkdin_footer_profile_image = get_theme_mod( 'arkdin_footer_profile_image', $arkdin_footer_profile );

$footer_location_text = get_theme_mod( 'footer_location_text', __( '6391 Elgin St. Celina, <br>Delaware 10299', 'arkdin' ) );
$footer_number_text = get_theme_mod( 'footer_number_text', __( '+222 (789) 568 25 <br>+222 (789) 568 25', 'arkdin' ) );
$footer_email_text = get_theme_mod( 'footer_email_text', __( 'info@gmail.com <br>demo@gmail.com', 'arkdin' ) );

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
    <footer class="cs_footer cs_style_2 cs_bg_filed cs_primary_bg cs_white_color" data-src="<?php print esc_url( $arkdin_footer_profile_image );?>">
      <div class="container">
        <div class="cs_footer_contact_info cs_accent_bg">
          <?php if ( !empty( $footer_location_text ) ): ?>
          <div class="cs_footer_contact_list">
            <div class="cs_footer_contact_list_icon cs_center">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="cs_footer_contact_list_right">
              <?php echo arkdin_kses($footer_location_text); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if ( !empty( $footer_number_text ) ): ?>
          <div class="cs_footer_contact_list">
            <div class="cs_footer_contact_list_icon cs_center">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="cs_footer_contact_list_right">
              <?php echo arkdin_kses($footer_number_text); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if ( !empty( $footer_email_text ) ): ?>
          <div class="cs_footer_contact_list">
            <div class="cs_footer_contact_list_icon cs_center">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="cs_footer_contact_list_right">
              <?php echo arkdin_kses($footer_email_text); ?>
            </div>
          </div>
         <?php endif; ?>
        </div>
      </div>
    <?php if ( is_active_sidebar( 'footer-3-1' ) OR is_active_sidebar( 'footer-3-2' ) OR is_active_sidebar( 'footer-3-3' ) OR is_active_sidebar( 'footer-3-4' )  ): ?>
      <div class="cs_main_footer">
        <div class="container">
          <div class="cs_footer_row">
              <?php
                if ( $footer_columns < 4 ) {
                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-3-1' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-3-2' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-3-3' );
                print '</div>';

                print '<div class="cs_footer_col">';
                dynamic_sidebar( 'footer-3-4' );
                print '</div>'; 

                } else {
                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                        if ( !is_active_sidebar( 'footer-3-' . $num ) ) {
                            continue;
                        }
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-3-' . $num );
                        print '</div>';
                    }
                }
            ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="cs_footer_bottom cs_white_color">
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



