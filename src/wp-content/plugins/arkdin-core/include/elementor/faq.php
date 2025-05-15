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
 * Solutek Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_FAQ extends Widget_Base {

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
		return 'tp-faq';
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
		return __( 'FAQ', 'tscore' );
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


        // _tg_image
        $this->start_controls_section(
            '_tg_image_section01',
            [
                'label' => esc_html__('Main Image With Experience', 'tscore'),                
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


        $this->add_control(
            'tg_goal_sub_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('25+', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Years <br>Experience', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_goal_sub_title2',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Best ArkdinAir Company', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_image2',
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
                'name' => 'tg_image_size2',
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
                'label' => esc_html__('Title & Content', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Faq', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Frequently Asked Questions', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

       $this->add_control(
            'tg_faq_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Air conditioning system is best for your home Our FrostFree Consultation air a  service provides expert guidance tailored to your specific needs.', 'tscore'),
                'placeholder' => esc_html__('Type Goal description here', 'tscore'),
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
            'tp_align',
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

        // Accordion
		$this->start_controls_section(
            '_accordion',
            [
                'label' => esc_html__( 'Accordion', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title', [
                'label' => esc_html__( 'Accordion Item', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'What should I do in an electrical emergency?' , 'tscore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Signs that you may need to rewire your home include frequent electrical problems, such as blown fuses or tripped breakers, outdated wiring kinds discolored outlets, or a burning smell near outlets or switches.', 'tscore' ),
            ]
        );

        $this->add_control(
            'accordions',
            [
                'label' => esc_html__( 'Repeater Accordion', 'tscore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__( 'What should I do in an electrical emergency?', 'tscore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'What are the signs that I need to rewire my home?', 'tscore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'What should I do in an electrical emergency?', 'tscore' ),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style
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

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }
            
             if ( !empty($settings['tg_image2']['url']) ) {
                $tg_image2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
                $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
            }             

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
          ?>        

         <section>
              <div class="cs_height_120 cs_height_lg_80"></div>
              <div class="container">
                <div class="row cs_gap_y_40">
                  <div class="col-xl-6 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <div class="cs_faq_thumb">
                      <div class="cs_faq_thumb_1">
                        <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                      </div>
                      <div class="cs_faq_thumb_2">
                        <div class="cs_faq_thumb_2_in">
                          <div class="cs_faq_experience_box cs_accent_bg text-center">
                           <?php if (!empty($settings['tg_goal_sub_title'])) : ?>
                            <h3 class="cs_fs_48 cs_white_color"><?php echo esc_html( $settings['tg_goal_sub_title'] ); ?></h3>
                            <?php endif; ?>
                           <?php if ( !empty($settings['tg_goal_description']) ) : ?>
                            <p class="cs_white_color mb-0"><?php echo tp_kses( $settings['tg_goal_description'] ); ?></p>
                            <?php endif; ?>
                            <svg width="72" height="42" viewBox="0 0 72 42" class="cs_accent_color" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 42V0L72 42H0Z" fill="currentColor"/>
                            </svg>                      
                          </div>
                          <img src="<?php echo esc_url($tg_image2); ?>" alt="<?php echo esc_url($tg_image_alt2); ?>">
                        </div>
                      </div>
                      <?php if (!empty($settings['tg_goal_sub_title2'])) : ?>
                      <div class="cs_thumb_text"><?php echo esc_html( $settings['tg_goal_sub_title2'] ); ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="cs_section_heading cs_style_1">
                        <?php if (!empty($settings['tg_sub_title'])) : ?>
                      <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="" class="cs_section_subheading_icon">
                        <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                      </h3>
                      <?php endif; ?>
                         <?php
                            if ( !empty($settings['tg_title' ]) ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['tg_title_tag'] ),
                                    $this->get_render_attribute_string( 'title_args' ),
                                    tp_kses( $settings['tg_title' ] )
                                );
                            endif;
                        ?> 
                    <?php if (!empty($settings['tg_faq_description'])) : ?>                     
                      <p class="cs_section_text"><?php echo tp_kses( $settings['tg_faq_description'] ); ?></p>
                      <?php endif; ?>
                    </div>
                    <div class="cs_height_45 cs_height_lg_45"></div>
                    <div class="cs_accordians cs_style_1">
                        <?php foreach ( $settings['accordions'] as $index => $item) :
                            $show = ($index == '0' ) ? "active" : "";
                        ?>
                      <div class="cs_accordian <?php echo esc_attr($show); ?>">
                        <div class="cs_accordian_head">
                          <h2 class="cs_accordian_title cs_fs_18 cs_medium mb-0"><?php echo esc_html($item['accordion_title']); ?></h2>
                          <span class="cs_accordian_toggle"></span>
                        </div>
                        <div class="cs_accordian_body">
                          <p><?php echo tp_kses($item['accordion_description']); ?></p>
                        </div>
                      </div><!-- .cs_accordian -->
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

	<?php
	}

}

$widgets_manager->register( new TP_FAQ() );