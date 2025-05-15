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
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Award extends Widget_Base {

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
		return 'tp-award';
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
		return __( 'Process', 'tscore' );
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
            'tp_layout',
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
                'condition' => [
                    'ts_design_style' => ['layout-1']
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
                'default' => esc_html__('Who To Work', 'tscore'),
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
                'default' => tp_kses('Simple Working Process', 'tscore'),
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
                'default' => esc_html__('Keeping the outdoor unit clean, and sealing any you leaks in your home can improve efficiency', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
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

        // tg_award_section
        $this->start_controls_section(
            'tg_award_section',
            [
                'label' => esc_html__('List', 'tscore'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Image', 'tscore' ),
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
            'tg_award_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Cool Wave System', 'tscore'),
                'placeholder' => esc_html__('Enter Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_award_list',
            [
                'label' => esc_html__('Content', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Upgrade to the latest energy and efficient air conditioning Frost technology with Eco Cool', 'tscore'),
                'placeholder' => esc_html__('Enter Your Award Content', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_award_link',
            [
                'label' => esc_html__('Url', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tscore'),
                'placeholder' => esc_html__('Enter url Text', 'tscore'),
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
                        'tg_award_title' => esc_html__('Cool Wave System', 'tscore'),
                    ],
                    [
                        'tg_award_title' => esc_html__('Arctic Installations', 'tscore'),
                    ], 
                    [
                        'tg_award_title' => esc_html__('Air Flow Solutions', 'tscore'),
                    ],
                    [
                        'tg_award_title' => esc_html__('Emergency Service', 'tscore'),
                    ],                                                                              
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
					'{{WRAPPER}} .section-main-title' => 'text-transform: {{VALUE}};',
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

            <section class="cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                <div class="cs_section_heading_1_with_sub">
                  <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>
                    <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'shpae', 'tscore' );?>" class="cs_section_subheading_icon">
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
                  <?php if ( !empty($settings['tg_description']) ) : ?>
                  <p class="mb-0"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                  <?php endif; ?>
                </div>
                <div class="cs_height_45 cs_height_lg_45"></div>
                <?php endif; ?>
                <div class="cs_card_1_wrap">

                <?php $counter = 1; foreach( $settings['tg_award_items'] as $item ) :

                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }
                 ?>

                <?php if ($counter == 1 || $counter == 3  ) : ?>
                  <div class="cs_card_1_col">
                    <div class="cs_card cs_style_1">
                      <div class="cs_card_in cs_white_bg">

                        <div class="cs_card_icon cs_center cs_mb_30">
                          <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                        </div>

                        <h3 class="cs_fs_24 cs_semibold cs_mb_6"><?php echo tp_kses( $item['tg_award_title'] ) ?></h3>
                        <p class="cs_fs_14 cs_mb_25"><?php echo tp_kses( $item['tg_award_list'] ) ?></p>
                        <a href="<?php echo esc_url( $item['tg_award_link'] ) ?>" class="cs_text_btn cs_fs_14 text-uppercase cs_heading_color cs_bold">
                          <?php print esc_html__( 'READ MORE', 'tscore' );?>
                          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.28125 1.21875L13.7812 6.46875C13.9271 6.61458 14 6.79167 14 7C14 7.20833 13.9271 7.38542 13.7812 7.53125L8.28125 12.7812C7.90625 13.0729 7.55208 13.0729 7.21875 12.7812C6.92708 12.4062 6.92708 12.0521 7.21875 11.7188L11.375 7.75H0.75C0.291667 7.70833 0.0416667 7.45833 0 7C0.0416667 6.54167 0.291667 6.29167 0.75 6.25H11.375L7.21875 2.28125C6.92708 1.94792 6.92708 1.59375 7.21875 1.21875C7.55208 0.927083 7.90625 0.927083 8.28125 1.21875Z" fill="currentColor"></path>
                          </svg>                    
                        </a>
                      </div>
                      <div class="cs_card_shape">
                        <svg width="305" height="145" viewBox="0 0 305 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M274.465 30.698L35.5518 41.3918L0 6.19539V120.27C0 133.924 11.1913 145 24.9875 145H280.012C293.809 145 305 133.924 305 120.27V0.478516L274.465 30.698Z" fill="currentColor"/>
                        </svg>                  
                      </div>
                    </div>
                  </div>

                  <?php else : ?>
                 
                  <div class="cs_card_1_col">
                    <div class="cs_card cs_style_1 cs_type_1">
                      <div class="cs_card_in cs_white_bg">
                        <h3 class="cs_fs_24 cs_semibold cs_mb_6"><?php echo tp_kses( $item['tg_award_title'] ) ?></h3>
                        <p class="cs_fs_14 cs_mb_25"><?php echo tp_kses( $item['tg_award_list'] ) ?></p>
                        <a href="<?php echo esc_url( $item['tg_award_link'] ) ?>" class="cs_text_btn cs_fs_14 text-uppercase cs_heading_color cs_bold cs_mb_30">
                          <?php print esc_html__( 'READ MORE', 'tscore' );?>
                          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.28125 1.21875L13.7812 6.46875C13.9271 6.61458 14 6.79167 14 7C14 7.20833 13.9271 7.38542 13.7812 7.53125L8.28125 12.7812C7.90625 13.0729 7.55208 13.0729 7.21875 12.7812C6.92708 12.4062 6.92708 12.0521 7.21875 11.7188L11.375 7.75H0.75C0.291667 7.70833 0.0416667 7.45833 0 7C0.0416667 6.54167 0.291667 6.29167 0.75 6.25H11.375L7.21875 2.28125C6.92708 1.94792 6.92708 1.59375 7.21875 1.21875C7.55208 0.927083 7.90625 0.927083 8.28125 1.21875Z" fill="currentColor"></path>
                          </svg>                    
                        </a>

                        <div class="cs_card_icon cs_center">
                          <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                        </div>
                        
                      </div>
                      <div class="cs_card_shape">
                        <svg width="305" height="146" viewBox="0 0 305 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M274.465 115.014L35.5518 104.253L0 139.669V24.883C0 11.1442 11.1913 -0.000549316 24.9875 -0.000549316H280.012C293.809 -0.000549316 305 11.1442 305 24.883V145.422L274.465 115.014Z" fill="currentColor"/>
                        </svg>                                   
                      </div>
                    </div>
                  </div>

                  <?php endif; ?>

                  <?php $counter++; endforeach; ?>


                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_70"></div>
            </section>

    <?php
	}
}

$widgets_manager->register( new TG_Award() );