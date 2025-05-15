<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_CTA extends Widget_Base {

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
		return 'arkdin-cta';
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
		return __( 'CTA', 'tscore' );
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
		return [ 'tscore' ];
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

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section',
            [
                'label' => esc_html__('Mian Image', 'tscore'),                              
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

        // tg_section_title
        $this->start_controls_section(
            'tg_section_title',
            [
                'label' => esc_html__('Title', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Free to Contact Us', 'tscore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Get Premium Air Services <br>From With Us!', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
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
                'default' => 'h2',
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

        // _tg_image
        $this->start_controls_section(
            '_tg_shortcode_section',
            [
                'label' => esc_html__('Shortcode', 'tscore'), 
                 'condition' => [
                    'ts_design_style' => ['layout-2']
                ]                                              
            ]
        );

        $this->add_control(
        'contact_shortCode',
            [
                'label' => __( 'Contact Short Code', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('[Add your short code]', 'tscore'),
                'label_block' => true,
                'default' => __('','tscore'),
            ]
        );

        $this->end_controls_section();


        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tscore'),               
            ]
        );

        $this->add_control(
            'tg_btn_button_show',
            [
                'label' => esc_html__( 'Show Button', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tscore' ),
                'label_off' => esc_html__( 'Hide', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Describe More', 'tscore'),
                'title' => esc_html__('Enter button text', 'tscore'),
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link',
            [
                'label' => esc_html__('Button link', 'tscore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'tscore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tg_btn_link_type' => '1',
                    'tg_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'tg_btn_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

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
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

        if ( !empty($settings['tg_image']['url']) ) {
            $tg_image_url = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        }
         if ( !empty($settings['tg_bg']['url']) ) {
            $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
            $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
        }         

	?>

    <?php if ( $settings['ts_design_style']  == 'layout-2' ):
        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
     ?>

     <section class="cs_get_quote cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
          <div class="cs_height_120 cs_height_lg_80"></div>
          <div class="container">
            <div class="row align-items-center cs_gap_y_40">
              <div class="col-xl-5 col-lg-6 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                <div class="cs_get_quote_thumb">
                  <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_url( $tg_image_alt ); ?>">
                </div>
              </div>
              <div class="col-xl-7 col-lg-6">
                <div class="cs_get_quote_content">
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
                  <?php if(!empty( $settings['contact_shortCode'] )) : ?>
                    <?php echo do_shortcode( $settings['contact_shortCode'] ) ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_120 cs_height_lg_80"></div>
        </section>

        <?php else:
                // Link
                if ('2' == $settings['tg_btn_link_type']) {
                    $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                    $this->add_render_attribute('tg-button-arg', 'target', '_self');
                    $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1 cs_color_1');
                } else {
                    if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                        $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                        $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1 cs_color_1');
                    }
                }

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_white_color cs_fs_48 cs_semibold mb-0');

         ?>

        <section class="cs_cta cs_style_1 cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
          <div class="container">
            <div class="cs_cta_in">
              <div class="cs_section_heading cs_style_1">
                <?php if (!empty($settings['tg_sub_title'])) : ?>
                <h3 class="cs_section_subtitle cs_white_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
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
              <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?>>
                <span><?php echo $settings['tg_btn_text']; ?></span>
                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"></path>
                </svg>                
              </a>
            </div>
          </div>
          <div class="cs_cta_img"><img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_url( $tg_image_alt ); ?>"></div>
        </section>


        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TP_CTA() );