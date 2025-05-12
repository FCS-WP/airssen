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
class TP_About extends Widget_Base {

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
		return 'about';
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
		return __( 'About', 'tscore' );
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

        // _tg_video
        $this->start_controls_section(
            '_tg_video_url',
            [
                'label' => esc_html__('Video', 'tscore'),
                 'condition' => [
                    'ts_design_style' => ['layout-1']
                ]                              
            ]
        );

        $this->add_control(
            'tp_video_url_show',
            [
                'label' => esc_html__( 'Video Link Url', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tscore' ),
                'label_off' => esc_html__( 'Hide', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
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

        $this->end_controls_section();

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
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
                'default' => esc_html__('About us', 'tscore'),
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
                'default' => tp_kses('Where every breath feels fresh and cool', 'tscore'),
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
                'default' => esc_html__('Prompt diagnosis and repair of any issues with your air conditioning unit your ensure optimal performance Inspection of ductwork for leaks or damage air followed by sealing to improve energy efficiency', 'tscore'),
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

        // tg_award_section
        $this->start_controls_section(
            'tg_award_section',
            [
                'label' => esc_html__('Tab One content', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_tab_title1',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mission', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
                'condition' => [
                    'ts_design_style' => ['layout-1']
                ]                 
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tg_award_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('AirFlow Optimizatio', 'tscore'),
                'placeholder' => esc_html__('Enter Title Text', 'tscore'),
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
                        'tg_award_title' => esc_html__('AirFlow Optimization', 'tscore'),
                    ],
                    [
                        'tg_award_title' => esc_html__('AirFlow Optimization', 'tscore'),
                    ],
                    [
                        'tg_award_title' => esc_html__('FreezeGuard Installation', 'tscore'),
                    ],     
                    [
                        'tg_award_title' => esc_html__('Cool Care Maintenance', 'tscore'),
                    ],     
                    [
                        'tg_award_title' => esc_html__('ClimateControl Checkup', 'tscore'),
                    ],  
                    [
                        'tg_award_title' => esc_html__('ChillOut Emergency Services', 'tscore'),
                    ],                                                                                                           
                ]
            ]
        );

        $this->end_controls_section();

        // tg_award_section
        $this->start_controls_section(
            'tg_award_section2',
            [
                'label' => esc_html__('Tab Two content', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-1']
                ] 
            ]
        );

        $this->add_control(
            'tg_tab_title2',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Vislon', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'tg_award_title2',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Total Comfort Installation', 'tscore'),
                'placeholder' => esc_html__('Enter Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_award_items2',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'title_field' => esc_html__( 'Items', 'tscore' ),
                'default' => [
                    [
                        'tg_award_title2' => esc_html__('Total Comfort Installation', 'tscore'),
                    ],
                    [
                        'tg_award_title2' => esc_html__('RapidRepair Services', 'tscore'),
                    ],
                    [
                        'tg_award_title2' => esc_html__('PureAir Quality Testing', 'tscore'),
                    ],     
                    [
                        'tg_award_title2' => esc_html__('CoolBreeze Cleaning', 'tscore'),
                    ],     
                    [
                        'tg_award_title2' => esc_html__('FrostGuard Inspection', 'tscore'),
                    ],  
                    [
                        'tg_award_title2' => esc_html__('EcoCool Upgrades', 'tscore'),
                    ],                                      
                ]
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            '_tg_tab_section3',
            [
                'label' => esc_html__('Tab Three Content', 'tscore'),   
                'condition' => [
                    'ts_design_style' => ['layout-1']
                ]                             
            ]
        );

        $this->add_control(
            'tg_tab_title3',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Values', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description3',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Common signs include unusual noises, reduced airflow, uneven cooling, strange odors, and higher energy bills. <br>Prompt diagnosis and repair of any issues with your air conditioning unit your ensure optimal performance Inspection of ductwork for leaks.', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
            ]
        );

        $this->end_controls_section();       

        $this->start_controls_section(
            '_tg_tab_section4',
            [
                'label' => esc_html__('Experience', 'tscore'),   
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
                'default' => esc_html__('Experience', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description4',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('25+', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
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
                'default' => esc_html__('Read More', 'tscore'),
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

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section',
            [
                'label' => esc_html__('Image with Content', 'tscore'),               
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

        $this->add_control(
            'tg_goal_sub_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Call any time for Freseir services', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('(+578) 587 89168', 'tscore'),
                'placeholder' => esc_html__('Type description here', 'tscore'),
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

		?>

        <?php if ( $settings['ts_design_style']  == 'layout-2' ): 
            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

             if ( !empty($settings['tg_image2']['url']) ) {
                $tg_image2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
                $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
            }           

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
                }
            }

        ?>

        <section>
              <div class="cs_height_120 cs_height_lg_80"></div>
              <div class="cs_about cs_style_1">
                <div class="container">
                  <div class="row align-items-center cs_gap_y_40">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                      <div class="cs_about_thumb">
                        <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="cs_about_content">
                        <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                        <div class="cs_section_heading cs_style_1 cs_mb_22">
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
                         <?php if ( !empty($settings['tg_description']) ) : ?>
                        <p class="cs_mb_30"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                        <?php endif; ?>
                        <?php endif; ?>

                        <div class="cs_list_2_wrap">
                          <ul class="cs_list cs_style_2 cs_mp_0 cs_fs_24 cs_semibold cs_heading_font">
                          <?php foreach( $settings['tg_award_items'] as $item ) :  ?>
                            <li><?php echo tp_kses( $item['tg_award_title'] ) ?></li>
                           <?php endforeach; ?>
                          </ul>
                          <div class="cs_list_experience">
                             <?php if (!empty($settings['tg_tab_title4'])) : ?>
                            <h3 class="cs_mb_8 cs_fs_24 cs_semibold"><?php echo esc_html( $settings['tg_tab_title4'] ); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($settings['tg_goal_description4'])) : ?>
                            <h2 class="mb-0 cs_fs_80 cs_body_font"><?php echo tp_kses( $settings['tg_goal_description4'] ); ?></h2>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div class="cs_height_40 cs_height_lg_30"></div>
                        <div class="cs_about_btns">
                          <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?>>
                            <span><?php echo $settings['tg_btn_text']; ?></span>
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"></path>
                            </svg>                
                          </a>
                          <div class="cs_about_avatar">
                            <div class="cs_about_avatar_thumb">
                              <img src="<?php echo esc_url($tg_image2); ?>" alt="<?php echo esc_url($tg_image_alt2); ?>">
                            </div>
                            <div class="cs_about_phone_number_right">
                               <?php if (!empty($settings['tg_goal_sub_title'])) : ?>
                              <h3 class="cs_fs_20 cs_medium cs_mb_5"><?php echo esc_html( $settings['tg_goal_sub_title'] ); ?></h3>
                              <?php endif; ?>
                              <?php if (!empty($settings['tg_goal_description'])) : ?>
                              <p class="mb-0"><?php echo tp_kses( $settings['tg_goal_description'] ); ?></p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>       


        <?php else:

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

             if ( !empty($settings['tg_image2']['url']) ) {
                $tg_image2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
                $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
            }           

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
                }
            }

         ?>

        <section>
              <div class="cs_height_120 cs_height_lg_80"></div>
              <div class="cs_about cs_style_1">
                <div class="container">
                  <div class="row align-items-center cs_gap_y_40">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                      <div class="cs_about_thumb">
                        <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                        <?php if ( !empty($settings['tp_video_url_show']) ) : ?>
                        <a href="<?php echo esc_url($settings['tg_video_link']['url']); ?>" class="cs_about_player_btn cs_video_open">
                          <span class="cs_player_btn cs_center">
                            <span></span>
                          </span>
                        </a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="cs_about_content">
                        <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                        <div class="cs_section_heading cs_style_1 cs_mb_22">
                            <?php if (!empty($settings['tg_sub_title'])) : ?>
                          <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'about1', 'solutek' );?>" class="cs_section_subheading_icon">
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
                        <p class="cs_mb_30"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="cs_tabs">
                          <ul class="cs_tab_links cs_style_1 cs_fs_20 cs_medium cs_heading_font cs_mp_0 cs_heading_color">
                            <?php if ( !empty($settings['tg_tab_title1']) ) : ?>
                            <li><a href="#tab_1"><?php echo esc_html( $settings['tg_tab_title1'] ); ?></a></li>
                            <?php endif; ?>
                            <?php if ( !empty($settings['tg_tab_title2']) ) : ?>
                            <li class="active"><a href="#tab_2"><?php echo esc_html( $settings['tg_tab_title2'] ); ?></a></li>
                            <?php endif; ?>
                            <?php if ( !empty($settings['tg_tab_title3']) ) : ?>
                            <li><a href="#tab_3"><?php echo esc_html( $settings['tg_tab_title3'] ); ?></a></li>
                            <?php endif; ?>
                          </ul>
                          <div class="cs_height_33 cs_height_lg_30"></div>
                          <div class="cs_tab_body">

                            <div class="cs_tab" id="tab_1">
                              <ul class="cs_list cs_style_1 cs_mp_0 cs_fs_18 cs_medium cs_heading_font">
                             <?php foreach( $settings['tg_award_items'] as $item ) :  ?>
                                <li>
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2"/>
                                    <g>
                                    <path d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z" fill="currentColor"/>
                                    </g>
                                    <defs>
                                    <clipPath>
                                    <rect width="10" height="10" fill="white" transform="translate(4 4)"/>
                                    </clipPath>
                                    </defs>
                                  </svg>
                                  <?php echo tp_kses( $item['tg_award_title'] ) ?>
                                </li>
                                <?php endforeach; ?>
                              </ul>
                            </div>

                            <div class="cs_tab active" id="tab_2">
                              <ul class="cs_list cs_style_1 cs_mp_0 cs_fs_18 cs_medium cs_heading_font">
                                <?php foreach( $settings['tg_award_items2'] as $item ) :  ?>
                                <li>
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.46667 13.3333H3.86667C2.66667 13.3333 2 13.3333 1.46667 13.0667C0.933333 12.8 0.533333 12.4 0.333333 11.9333C0 11.3333 0 10.6667 0 9.46667V3.86667C0 2.66667 5.96046e-08 2 0.266667 1.46667C0.533333 0.933333 0.933333 0.533333 1.4 0.333333C2 0 2.66667 0 3.86667 0H9.33333C9.73333 0 10 0.266667 10 0.666667C10 1.06667 9.73333 1.33333 9.33333 1.33333H3.86667C2.86667 1.33333 2.33333 1.33333 2.06667 1.46667C1.8 1.6 1.6 1.8 1.46667 2.06667C1.33333 2.33333 1.33333 2.86667 1.33333 3.86667V9.46667C1.33333 10.4667 1.33333 11 1.46667 11.2667C1.6 11.5333 1.8 11.7333 2.06667 11.8667C2.33333 12 2.86667 12 3.86667 12H9.46667C10.4667 12 11 12 11.2667 11.8667C11.5333 11.7333 11.7333 11.5333 11.8667 11.2667C12 11 12 10.4667 12 9.46667V6.66667C12 6.26667 12.2667 6 12.6667 6C13.0667 6 13.3333 6.26667 13.3333 6.66667V9.46667C13.3333 10.6667 13.3333 11.3333 13.0667 11.8667C12.8 12.4 12.4 12.8 11.9333 13C11.3333 13.3333 10.6667 13.3333 9.46667 13.3333ZM6.66667 8.66667C6.46667 8.66667 6.33333 8.6 6.2 8.46667L4.2 6.46667C3.93333 6.2 3.93333 5.8 4.2 5.53333C4.46667 5.26667 4.86667 5.26667 5.13333 5.53333L6.66667 7.06667L12.8667 0.866667C13.1333 0.6 13.5333 0.6 13.8 0.866667C14.0667 1.13333 14.0667 1.53333 13.8 1.8L7.13333 8.46667C7 8.6 6.86667 8.66667 6.66667 8.66667Z" fill="currentColor"/>
                                  </svg>                            
                                  <?php echo tp_kses( $item['tg_award_title2'] ) ?>
                                </li>
                               <?php endforeach; ?>
                              </ul>
                            </div>
                           <?php if ( !empty($settings['tg_goal_description3']) ) : ?>
                            <div class="cs_tab" id="tab_3">
                              <?php echo tp_kses( $settings['tg_goal_description3'] ); ?>
                            </div>
                             <?php endif; ?>
                          </div>
                        </div>
                        <div class="cs_height_33 cs_height_lg_30"></div>
                        <div class="cs_about_btns">
                          <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> >
                            <span><?php echo $settings['tg_btn_text']; ?></span>
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z" fill="currentColor"></path>
                            </svg>                
                          </a>
                          <div class="cs_about_phone_number">
                            <div class="cs_about_phone_number_icon cs_accent_bg cs_center">
                              <img src="<?php echo esc_url($tg_image2); ?>" alt="<?php echo esc_url($tg_image_alt2); ?>">
                            </div>
                            <div class="cs_about_phone_number_right">
                            <?php if (!empty($settings['tg_goal_sub_title'])) : ?>
                              <p class="mb-0"><?php echo esc_html( $settings['tg_goal_sub_title'] ); ?></p>
                              <?php endif; ?>
                              <?php if ( !empty($settings['tg_goal_description']) ) : ?>
                              <h3 class="cs_heading_color cs_fs_18 cs_medium mb-0"><a><?php echo tp_kses( $settings['tg_goal_description'] ); ?></a></h3>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>
            <!-- End About Section -->

        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TP_About() );