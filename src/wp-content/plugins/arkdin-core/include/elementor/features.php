<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Solutek Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Features extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'features';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Features', 'tscore' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'tscore' ];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends() {
        return [ 'tscore-slider' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls() {

        // layout Panel
        $this->start_controls_section(
            'tg_layout',
            [
                'label' => esc_html__('Design Layout', 'tscore'),
            ]
        );
        $this->add_control(
            'ts_design_style',
            [
                'label' => esc_html__('Select Layout', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tscore'),
                    'layout-2' => esc_html__('Layout 2', 'tscore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section01',
            [
                'label' => esc_html__('Main Image', 'tscore'),  
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                                
            ]
        );

        $this->add_control(
            'tg_image',
            [
                'label' => esc_html__( 'Choose Image', 'tscore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_tg_tab_section4',
            [
                'label' => esc_html__('Project Box', 'tscore'),   
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                             
            ]
        );

        $this->add_control(
            'tg_tab_title4',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('80%', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description4',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Success Project', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
            ]
        );

        $this->end_controls_section(); 

   // _tg_image
        $this->start_controls_section(
            '_tg_bg_section',
            [
                'label' => esc_html__('Background Image', 'tscore'),                                               
            ]
        );

        $this->add_control(
            'tg_bg',
            [
                'label' => esc_html__( 'Choose Image', 'tscore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_bg_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        // tg_section_title
        $this->start_controls_section(
            'tg_section_title',
            [
                'label' => esc_html__('Title & Content', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_section_title_show',
            [
                'label' => esc_html__( 'Section Title & Content', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tscore' ),
                'label_off' => esc_html__( 'Hide', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Why Choose Us', 'tscore'),
                'placeholder' => esc_html__('Type Sub Text', 'tscore'),
                'label_block' => true,                
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Relax we ve got your air climate covered', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

       $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Air conditioning system is best for your home Our FrostFree Consultaservice provides expert guidance', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                 
            ]
        );

        $this->add_control(
            'tg_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tscore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tscore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tscore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tscore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tscore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tscore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tscore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'tg_align',
            [
                'label' => esc_html__('Alignment', 'tscore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'tscore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'tscore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'tscore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();


        // Working Box group
        $this->start_controls_section(
            'tg_case_box',
            [
                'label' => esc_html__('Feature List', 'tscore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,           
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_repeater_img',
            [
                'label' => __( 'Image', 'tscore' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater->add_control(
            'tg_repeater_title', [
                'label' => esc_html__('Title', 'tscore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('24/7 Online Support', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_repeater_desc', [
                'label' => esc_html__('Description', 'tscore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => tp_kses('Our Cool Care Emergency and Service is available 24/7', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_repeater_list',
            [
                'label' => esc_html__('Feature Lists', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_repeater_title' => esc_html__('24/7 Online Support', 'tscore'),
                        'tg_repeater_desc' => tp_kses('Our Cool Care Emergency and Service is available 24/7', 'tscore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Expert Cleaning Team', 'tscore'),
                        'tg_repeater_desc' => tp_kses('Proper calibration of your AC system ensures even cooling', 'tscore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Expert Cleaning Team', 'tscore'),
                        'tg_repeater_desc' => tp_kses('Air conditioning system is best for your home cooling', 'tscore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Affordable Price', 'tscore'),
                        'tg_repeater_desc' => tp_kses('Proper calibration of your AC system ensures even coolings', 'tscore'),
                    ],                                          
                ],
            ]
        );

        $this->end_controls_section();

        // TAB_STYLE
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'tscore' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __( 'Text Transform', 'tscore' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __( 'None', 'tscore' ),
                    'uppercase' => __( 'UPPERCASE', 'tscore' ),
                    'lowercase' => __( 'lowercase', 'tscore' ),
                    'capitalize' => __( 'Capitalize', 'tscore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .cs_section_title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }


    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

         if ( !empty($settings['tg_bg']['url']) ) {
            $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
            $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
        } 

        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');

         ?>

        <?php if ( $settings['ts_design_style']  == 'layout-2' ):

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

         ?>

         <section class="cs_why_chose_us cs_style_2 cs_bg_filed overflow-hidden">
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <div class="row cs_gap_y_40">
                  <div class="col-xl-7 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <div class="cs_why_chose_us_thumb">
                      <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                      <div class="cs_success_box text-center">
                        <?php if (!empty($settings['tg_tab_title4'])) : ?>
                        <h3 class="cs_fs_36 cs_white_color cs_semibold mb-0"><?php echo esc_html( $settings['tg_tab_title4'] ); ?></h3>
                         <?php endif; ?>
                         <?php if (!empty($settings['tg_goal_description4'])) : ?>
                        <p class="cs_white_color mb-0"><?php echo tp_kses( $settings['tg_goal_description4'] ); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-5">
                     <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                    <div class="cs_section_heading cs_style_1 cs_type_1">
                        <?php if (!empty($settings['tg_sub_title'])) : ?>
                      <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>" class="cs_section_subheading_icon">
                        <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                      </h3>
                      <?php endif; ?>
                        <?php
                            if ( !empty($settings['tg_title']) ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['tg_title_tag'] ),
                                    $this->get_render_attribute_string( 'title_args' ),
                                    tp_kses( $settings['tg_title'] )
                                );
                            endif;
                        ?>                      
                    </div>
                    <div class="cs_height_40 cs_height_lg_40"></div>
                     <?php if ( !empty($settings['tg_description']) ) : ?>
                    <p class="mb-0"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                     <?php endif; ?>
                    <div class="cs_height_45 cs_height_lg_45"></div>
                     <?php endif; ?>
                    <div class="cs_iconbox_2_list">
                      <?php foreach( $settings['tg_repeater_list'] as $item ) :
                          if ( !empty($item['tg_repeater_img']['url']) ) {
                              $tg_image_url = !empty($item['tg_repeater_img']['id']) ? wp_get_attachment_image_url( $item['tg_repeater_img']['id'], $item['tg_image_size_size']) : $item['tg_repeater_img']['url'];
                              $tg_image_alt = get_post_meta($item["tg_repeater_img"]["id"], "_wp_attachment_image_alt", true);
                          }
                      ?>   
                      <div class="cs_iconbox cs_style_2">
                        <div class="cs_iconbox_icon">
                          <img src="<?php echo esc_url( $tg_image_url ) ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                        </div>
                        <div class="cs_iconbox_right">
                          <h3 class="cs_iconbox_title cs_fs_24 cs_semibold cs_mb_10"><?php echo tp_kses( $item['tg_repeater_title'] ) ?></h3>
                          <p class="cs_iconbox_subtitle mb-0"><?php echo tp_kses( $item['tg_repeater_desc'] ) ?></p>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cs_why_chose_us_img">
                <img src="<?php echo esc_url($tg_bg_url); ?>" alt="<?php echo esc_url($tg_bg_alt); ?>">
              </div>
              <div class="cs_height_120 cs_height_lg_70"></div>
            </section>


        <?php else: ?>

        <section class="cs_why_chose_us cs_style_1 cs_bg_filed overflow-hidden" data-src="<?php echo esc_url($tg_bg_url); ?>">
          <div class="cs_height_115 cs_height_lg_70"></div>
          <div class="container wow fadeInRight" data-wow-duration="0.9s" data-wow-delay="0.25s">
            <div class="cs_why_chose_us_in">
                <?php if( !empty($settings['tg_section_title_show']) ) : ?>
              <div class="cs_section_heading cs_style_1">
                <?php if (!empty($settings['tg_sub_title'])) : ?>
                <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>" class="cs_section_subheading_icon">
                  <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                </h3>
                <?php endif; ?>
                <?php
                    if ( !empty($settings['tg_title']) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['tg_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            tp_kses( $settings['tg_title'] )
                        );
                    endif;
                ?>
              </div>
              <div class="cs_height_45 cs_height_lg_45"></div>
              <?php endif; ?>
              <div class="row cs_gap_y_30 cs_row_gap_60">
              <?php foreach( $settings['tg_repeater_list'] as $item ) :
                  if ( !empty($item['tg_repeater_img']['url']) ) {
                      $tg_image_url = !empty($item['tg_repeater_img']['id']) ? wp_get_attachment_image_url( $item['tg_repeater_img']['id'], $item['tg_image_size_size']) : $item['tg_repeater_img']['url'];
                      $tg_image_alt = get_post_meta($item["tg_repeater_img"]["id"], "_wp_attachment_image_alt", true);
                  }
              ?>   
                <div class="col-sm-6">
                  <div class="cs_iconbox cs_style_1">
                    <div class="cs_iconbox_icon cs_mb_17">
                      <img src="<?php echo esc_url( $tg_image_url ) ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                    </div>
                    <h3 class="cs_iconbox_title cs_fs_24 cs_semibold cs_mb_6"><?php echo tp_kses( $item['tg_repeater_title'] ) ?></h3>
                    <p class="cs_iconbox_subtitle mb-0"><?php echo tp_kses( $item['tg_repeater_desc'] ) ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="cs_height_115 cs_height_lg_70"></div>
        </section>   

        <?php endif; ?>   

    <?php
    }
}

$widgets_manager->register( new TG_Features() );