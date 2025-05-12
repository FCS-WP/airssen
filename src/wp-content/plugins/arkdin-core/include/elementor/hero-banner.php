<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;
use \Elementor\Utils;
use \Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Hero_Banner extends Widget_Base {

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
		return 'hero-banner';
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
		return __( 'Hero Banner', 'tscore' );
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

        // tg_award_section
        $this->start_controls_section(
            'tg_award_section1',
            [
                'label' => esc_html__('Slider List', 'tscore'),                 
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Background Image', 'tscore' ),
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
                'name' => 'reviewer_image_size',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater->add_control(
            'tg_award_name',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Repairing Services', 'tscore'),
                'placeholder' => esc_html__('Enter Sub Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_award_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Keeping You Cool All Year Round', 'tscore'),
                'placeholder' => esc_html__('Enter Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_award_list',
            [
                'label' => esc_html__('Content', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Common signs include unusual noises, reduced airflow, uneven cooling, strange odors, and higher energy bills', 'tscore'),
                'placeholder' => esc_html__('Enter Your Content', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_image2',
            [
                'label' => esc_html__( 'Main Image', 'tscore' ),
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
                'name' => 'reviewer_image_size2',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater->add_control(
            'tg_button_text',
            [
                'label' => esc_html__('Button Name', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'tpcore'),
                'placeholder' => esc_html__('Type Button Name', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_button_url',
            [
                'label' => esc_html__('Button Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type Button link', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_button_text2',
            [
                'label' => esc_html__('Video Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Watch Our Story', 'tpcore'),
                'placeholder' => esc_html__('Type Video Name', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_video_link',
            [
                'label' => esc_html__('Video link Url', 'tscore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('PLease Youtube Embed Video Link', 'tscore'),
                'show_external' => false,
                'default' => [
                    'url' => 'https://www.youtube.com/embed/rRid6GCJtgc',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_award_items',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__( 'Items', 'tscore' ),
                'default' => [
                    [
                        'tg_award_title' => tp_kses('Keeping You Cool All Year Round', 'tscore'),
                    ],
                    [
                        'tg_award_title' => tp_kses('Fast & Reliable AC Fixes Hub', 'tscore'),
                    ],  
                    [
                        'tg_award_title' => tp_kses('Expert Cooling Solutions', 'tscore'),
                    ],                                                         
                ]
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_bg_section',
            [
                'label' => esc_html__('Shape Image', 'tscore'), 
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                               
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

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Marquee Text', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_title_1',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Emergency Services', 'tscore'),
                'placeholder' => esc_html__('Type Marquee Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'marquee_list',
            [
                'label' => esc_html__('Marquee List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_title_1' => esc_html__('Emergency Services', 'tscore'),
                    ],
                    [
                        'tg_title_1' => esc_html__('Keep Outdoor Unit Clear', 'tscore'),
                    ],
                    [
                        'tg_title_1' => esc_html__('Filter Replacement', 'tscore'),
                    ],                    
                ],
                'title_field' => '{{{ tg_title_1 }}}',
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
					'{{WRAPPER}} .cs_hero_title' => 'text-transform: {{VALUE}};',
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
    ?>

    <?php if ( $settings['ts_design_style']  == 'layout-2' ):
    if ( !empty($settings['tg_bg']['url']) ) {
        $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
        $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
    }
     ?>

    <section class="cs_hero cs_style_2 cs_bg_filed">
      <div class="cs_slider cs_style_1">
        <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="900" data-center="0" data-variable-width="0" data-slides-per-view="1">
          <div class="cs_slider_wrapper">
            <?php foreach( $settings['tg_award_items'] as $item ) :

            if ( !empty($item['reviewer_image']['url']) ) {
                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
            }
            if ( !empty($item['reviewer_image2']['url']) ) {
                $tg_reviewer_image2 = !empty($item['reviewer_image2']['id']) ? wp_get_attachment_image_url( $item['reviewer_image2']['id'], $item['reviewer_image_size2_size']) : $item['reviewer_image2']['url'];
                $tg_reviewer_image_alt2 = get_post_meta($item["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
            }

             ?>            
            <div class="cs_slide">
              <div class="cs_hero_in cs_center">
                <div class="container wow fadeInRight" data-wow-duration="0.9s" data-wow-delay="0.25s">
                  <div class="cs_hero_text">
                    <h3 class="cs_hero_mini_title cs_white_color cs_fs_18 cs_medium cs_mb_8">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>">
                      <?php echo tp_kses( $item['tg_award_name'] ) ?>
                    </h3>
                    <h1 class="cs_hero_title cs_white_color cs_fs_74 cs_mb_18"><?php echo tp_kses( $item['tg_award_title'] ) ?></h1>
                    <p class="cs_hero_subtitle cs_white_color cs_mb_34"><?php echo tp_kses( $item['tg_award_list'] ) ?></p>
                    <div class="cs_hero_btns">
                     <?php if ( !empty($item['tg_button_text']) ) : ?>
                      <a href="<?php echo esc_url( $item['tg_button_url'] ) ?>" class="cs_btn cs_style_1">
                        <span><?php echo tp_kses( $item['tg_button_text'] ) ?></span>
                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"/>
                        </svg>                
                      </a>
                      <?php endif; ?> 
                    </div>
                  </div>
                </div>
                <div class="cs_hero_bg cs_bg_filed" data-src="<?php echo esc_url($tg_reviewer_image); ?>">
                  <div class="cs_hero_bg_shape_1 position-absolute cs_accent_color">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/hero_icon.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>">
                  </div>
                  <div class="cs_hero_bg_shape_2 position-absolute cs_accent_color">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/hero_icon.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>">
                  </div>
                  <div class="cs_hero_bg_shape_3 position-absolute cs_accent_color">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/hero_icon.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>">
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="cs_pagination cs_style_1"></div>
        </div>
      </div>
      <div class="cs_hero_shape cs_accent_bg cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>"></div>
      <div class="cs_moving_section_wrap">
        <div class="cs_moving_section_in">
          <div class="cs_moving_section cs_moving_duration_40 cs_brand_2_wrap">
            <ul class="cs_hero_feature_list cs_mp_0 cs_fs_30 cs_semibold">
              <?php foreach( $settings['marquee_list'] as $item ) : ?>  
              <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/hero_icon.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>"> 
                <?php echo tp_kses( $item['tg_title_1'] ); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="cs_moving_section cs_moving_duration_40 cs_brand_2_wrap">
            <ul class="cs_hero_feature_list cs_mp_0 cs_fs_30 cs_semibold">
              <?php foreach( $settings['marquee_list'] as $item ) : ?>   
              <li>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/hero_icon.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>"> 
                <?php echo tp_kses( $item['tg_title_1'] ); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>                  
		
        <?php else: ?>

         <section class="cs_slider cs_style_1">
              <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="900" data-center="0" data-variable-width="0" data-slides-per-view="1">
                <div class="cs_slider_wrapper">

                    <?php foreach( $settings['tg_award_items'] as $item ) :

                    if ( !empty($item['reviewer_image']['url']) ) {
                        $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                    }
                    if ( !empty($item['reviewer_image2']['url']) ) {
                        $tg_reviewer_image2 = !empty($item['reviewer_image2']['id']) ? wp_get_attachment_image_url( $item['reviewer_image2']['id'], $item['reviewer_image_size2_size']) : $item['reviewer_image2']['url'];
                        $tg_reviewer_image_alt2 = get_post_meta($item["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
                    }

                     ?>
                  <div class="cs_slide">
                    <div class="cs_hero cs_style_1 cs_bg_filed cs_primary_bg cs_center" data-src="<?php echo esc_url($tg_reviewer_image); ?>">
                      <div class="container">
                        <div class="cs_hero_text wow fadeInRight" data-wow-duration="0.9s" data-wow-delay="0.25s">
                          <h3 class="cs_hero_mini_title cs_accent_color cs_fs_18 cs_medium cs_mb_8">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'image', 'tscore' );?>">
                            <?php echo tp_kses( $item['tg_award_name'] ) ?>
                          </h3>
                          <h1 class="cs_hero_title cs_white_color cs_fs_74 cs_mb_18"><?php echo tp_kses( $item['tg_award_title'] ) ?></h1>
                          <p class="cs_hero_subtitle cs_white_color cs_mb_34"><?php echo tp_kses( $item['tg_award_list'] ) ?></p>
                          <div class="cs_hero_btns">
                            <?php if ( !empty($item['tg_button_text']) ) : ?>
                            <a href="<?php echo esc_url( $item['tg_button_url'] ) ?>" class="cs_btn cs_style_1">
                              <span><?php echo tp_kses( $item['tg_button_text'] ) ?></span>
                              <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"/>
                              </svg>                
                            </a>
                             <?php endif; ?> 
                            <?php if ( !empty($item['tg_button_text2']) ) : ?>
                            <a href="<?php echo esc_url($item['tg_video_link']['url']); ?>" class="cs_hero_player_btn cs_video_open">
                              <span class="cs_player_btn cs_center">
                                <span></span>
                              </span>
                              <span class="cs_hero_play_btn_text"><?php echo tp_kses( $item['tg_button_text2'] ) ?></span>
                            </a>
                            <?php endif; ?> 
                          </div>
                        </div>
                      </div>
                      <div class="cs_hero_img"><img src="<?php echo esc_url($tg_reviewer_image2); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt2); ?>"></div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
                <div class="cs_pagination cs_style_1"></div>
              </div>
            </section>

        <?php endif; ?>

    <?php
	}

}

$widgets_manager->register( new TG_Hero_Banner() );