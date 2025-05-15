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
 * Arino Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_SERVICE_DETAILS extends Widget_Base {

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
		return 'service-details';
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
		return __( 'Service Detail', 'tscore' );
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
            '_tg_image_section',
            [
                'label' => esc_html__('Image', 'tscore'),                
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
                'label' => esc_html__('Tilte & Content', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Cooling You Can Count On', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description01',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Fast and efficient installation of new air conditioning units. Our certified technicians ensure your system is properly installed for optimal performance Site assessment, equipment delivery air an complete installation. <br><br>Regular maintenance services to keep your air conditioning system running smoothly and  for as efficiently, preventing an breakdowns and extending its lifespan  Filter replacement, coil cleaning, refrigerant check, thermostat calibration, and system inspection air conditioning Upgrading your existing air conditioning system.', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

  // info group
        $this->start_controls_section(
            'portfolio_info_list01',
            [
                'label' => esc_html__( 'Content Middle', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_sub_title2',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Your Comfort, Our Mission', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description02',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Upgrading your existing air conditioning system to more energy-efficient models, helping you save on energy bills and reduce your carbon footprint  Lubrication of moving parts, electrical connection inspection,', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

       // info group
        $this->start_controls_section(
            'portfolio_info_list2',
            [
                'label' => esc_html__( 'Image', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_image2',
            [
                'label' => esc_html__( 'Choose Image 1', 'tscore' ),
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
            'tg_image3',
            [
                'label' => esc_html__( 'Choose Image 2', 'tscore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size3',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );



        $this->end_controls_section();

 // info group
        $this->start_controls_section(
            'portfolio_info_list03',
            [
                'label' => esc_html__( 'Content', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
          $this->add_control(
            'tg_description005',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Energy assessment, old unit removal, new unit installation, and energy efficiency optimization a Advanced diagnostic services using the latest technology to detect and address issues in your air conditioning system before they become major problems', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_sub_title4',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Air Conditioning & Heating Services', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

          $this->add_control(
            'tg_description04',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Comprehensive system scan, fault detection, detailed report, and recommended solutions. Tha Precision calibration services to ensure your air conditioning system is operating at its optimal settings for maximum comfort and efficiency', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // info group
        $this->start_controls_section(
            'portfolio_info_list',
            [
                'label' => esc_html__( 'List', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

    
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_text', [
                'label' => esc_html__( 'Info Text', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Precision Installations' , 'tscore' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_list',
            [
                'label' => esc_html__( 'Info Repeater', 'tscore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'info_text' => esc_html__( 'Precision Installations', 'tscore' ),
                    ],
                    [
                        'info_text' => esc_html__( 'FrostWave Duct Cleaning', 'tscore' ),
                    ],
                    [
                        'info_text' => esc_html__( 'CoolCare Maintenance', 'tscore' ),
                    ],
                    [
                        'info_text' => esc_html__( 'CoolFlow Inspection', 'tscore' ),
                    ],
                    [
                        'info_text' => esc_html__( 'TempGuard Emergency', 'tscore' ),
                    ],
                    [
                        'info_text' => esc_html__( 'FrostGuard Inspection', 'tscore' ),
                    ],

                ],
                'title_field' => '{{{ info_text }}}',
            ]
        );

        $this->end_controls_section();


        // tg_section_title
        $this->start_controls_section(
            'tg_section_title3',
            [
                'label' => esc_html__('FAQ', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title3',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('We help you with the dedication & affection', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description03',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Thorough cleaning services to remove dirt, dust, and debris from your air conditioning system, improving air quality and system efficiency', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater4 = new \Elementor\Repeater();

        $repeater4->add_control(
            'accordion_title', [
                'label' => esc_html__( 'Accordion Item', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'How often should I have my air conditioner serviced?' , 'tscore' ),
                'label_block' => true,
            ]
        );

        $repeater4->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'It is recommended to service your air conditioner at least once a year to ensure it runs efficiently and effectively. Common signs include unusual noises, weak airflow, warm air instead of cool, and a sudden increase in energy bills.', 'tscore' ),
            ]
        );

        $this->add_control(
            'accordions',
            [
                'label' => esc_html__( 'Repeater Accordion', 'tscore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater4->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__( 'How often should I have my air conditioner serviced?', 'tscore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'What are the signs that my air conditioner needs repair?', 'tscore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'How can I improve the efficiency of my air conditionin', 'tscore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'What size air conditioner do I need for my home?', 'tscore' ),
                    ],                    
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );

        $this->end_controls_section();

   // _banner_social
        $this->start_controls_section(
            '_tg_social_section1',
            [
                'label' => esc_html__('Sidebar List', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title5',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Categories', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
            'tg_social_text',
            [
                'label' => esc_html__('Name', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('BreezeCheck Maintenance', 'tscore'),
                'placeholder' => esc_html__('Type: fab fa-twitter', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater3->add_control(
            'tg_social_url',
            [
                'label' => esc_html__('Url', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tscore'),
                'placeholder' => esc_html__('Type social link', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list',
            [
                'label' => esc_html__('List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'tg_social_text' => esc_html__('BreezeCheck Maintenance', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('ChillMax Cleaning', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('CoolFlow Inspection', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('FrostWave Duct Cleaning', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('CoolPro Installation', 'tscore'),
                    ], 
                    [
                        'tg_social_text' => esc_html__('RapidRepair Services', 'tscore'),
                    ], 
                     [
                        'tg_social_text' => esc_html__('Emergency CoolFix', 'tscore'),
                    ],                                                                                                    
                ],
                'title_field' => '{{{ tg_social_text }}}',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section07',
            [
                'label' => esc_html__('Sidebar Button', 'tscore'),               
            ]
        );

        $this->add_control(
            'tg_button_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Downloads', 'tscore'),
                'placeholder' => esc_html__('Type Contact Text', 'tscore'),
                'label_block' => true,
            ]
        );        

        $this->add_control(
            'tg_button_one',
            [
                'label' => esc_html__('Button One Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('DOWNLOAD PDF', 'tscore'),
                'placeholder' => esc_html__('Type Contact Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_button_one_url',
            [
                'label' => esc_html__('Url', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tscore'),
                'placeholder' => esc_html__('Type social link', 'tscore'),
                'label_block' => true,
            ]
        );    

        $this->add_control(
            'tg_button_two',
            [
                'label' => esc_html__('Button Two Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('DOWNLOAD DOC', 'tscore'),
                'placeholder' => esc_html__('Type Contact Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_button_two_url',
            [
                'label' => esc_html__('Url', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tscore'),
                'placeholder' => esc_html__('Type social link', 'tscore'),
                'label_block' => true,
            ]
        ); 


        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section04',
            [
                'label' => esc_html__('Sidebar Contact', 'tscore'),               
            ]
        );

        $this->add_control(
            'tg_sub_title6',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Ask Question', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
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
					'{{WRAPPER}} .cs-section_title' => 'text-transform: {{VALUE}};',
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

        $this->add_render_attribute('title_args', 'class', 'cs-section_title');

         if ( !empty($settings['tg_image']['url']) ) {
            $tg_image_url = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        } 

         if ( !empty($settings['tg_image2']['url']) ) {
            $tg_image_url2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
            $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
        } 

         if ( !empty($settings['tg_image3']['url']) ) {
            $tg_image_url3 = !empty($settings['tg_image3']['id']) ? wp_get_attachment_image_url( $settings['tg_image3']['id'], $settings['tg_image_size3_size']) : $settings['tg_image3']['url'];
            $tg_image_alt3 = get_post_meta($settings["tg_image3"]["id"], "_wp_attachment_image_alt", true);
        } 

	?>

    <section>
      <div class="cs_height_120 cs_height_lg_80"></div>
      <div class="container">
        <div class="row cs_gap_y_60">
          <div class="col-lg-8">
            <div class="cs_pr_30">
              <div class="cs_service_details">
                <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                <?php if(!empty( $settings['tg_sub_title'] )) : ?>
                <h2 class="cs_fs_48 cs_mb_20"><?php echo tp_kses( $settings['tg_sub_title'] ) ?></h2>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_description01'] )) : ?>
                <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description01'] ) ?></p>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_sub_title2'] )) : ?>
                <h3 class="cs_fs_30 cs_mb_15"><?php echo tp_kses( $settings['tg_sub_title2'] ) ?></h3>
                 <?php endif; ?>
                 <?php if(!empty( $settings['tg_description02'] )) : ?>
                <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description02'] ) ?></p>
                 <?php endif; ?>
                <div class="row">
                  <div class="col-lg-6">
                    <img src="<?php echo esc_url($tg_image_url2); ?>" alt="<?php echo esc_url($tg_image_alt2); ?>">
                  </div>
                  <div class="col-lg-6">
                    <img src="<?php echo esc_url($tg_image_url3); ?>" alt="<?php echo esc_url($tg_image_alt3); ?>">
                  </div>
                </div>
                <?php if(!empty( $settings['tg_description04'] )) : ?>
                <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description005'] ) ?></p>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_sub_title4'] )) : ?>
                <h3 class="cs_fs_30 cs_mb_15"><?php echo tp_kses( $settings['tg_sub_title4'] ) ?></h3>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_description04'] )) : ?>
                <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description04'] ) ?></p>
                <?php endif; ?>
                <ul class="cs_list cs_style_1 cs_mp_0 cs_fs_18 cs_medium cs_heading_font">
                    <?php foreach ( $settings['info_list'] as $item ) : ?>
                  <li>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.5 10.5C7.16667 10.8125 6.82292 10.8125 6.46875 10.5L4.71875 8.75C4.42708 8.41667 4.42708 8.07292 4.71875 7.71875C5.07292 7.42708 5.41667 7.42708 5.75 7.71875L7 8.9375L9.96875 5.96875C10.3229 5.67708 10.6667 5.67708 11 5.96875C11.3125 6.32292 11.3125 6.66667 11 7L7.5 10.5ZM10.75 1.34375C11.8333 1.21875 12.8021 1.55208 13.6562 2.34375C14.4479 3.17708 14.7812 4.14583 14.6562 5.25C15.4896 5.91667 15.9375 6.83333 16 8C15.9375 9.16667 15.4896 10.0833 14.6562 10.75C14.7812 11.8333 14.4479 12.8021 13.6562 13.6562C12.8021 14.4479 11.8333 14.7812 10.75 14.6562C10.0833 15.4896 9.16667 15.9375 8 16C6.83333 15.9375 5.91667 15.4896 5.25 14.6562C4.14583 14.7812 3.17708 14.4479 2.34375 13.6562C1.55208 12.8021 1.21875 11.8333 1.34375 10.75C0.489583 10.0833 0.0416667 9.16667 0 8C0.0416667 6.83333 0.489583 5.91667 1.34375 5.25C1.21875 4.14583 1.55208 3.17708 2.34375 2.34375C3.17708 1.55208 4.14583 1.21875 5.25 1.34375C5.91667 0.489583 6.83333 0.0416667 8 0C9.16667 0.0416667 10.0833 0.489583 10.75 1.34375ZM5.9375 3.09375L5.375 2.90625C4.625 2.69792 3.96875 2.86458 3.40625 3.40625C2.86458 3.96875 2.69792 4.625 2.90625 5.375L3.09375 5.9375L2.5625 6.25C1.89583 6.625 1.54167 7.20833 1.5 8C1.54167 8.79167 1.89583 9.375 2.5625 9.75L3.09375 10.0312L2.90625 10.5938C2.69792 11.3438 2.86458 12.0104 3.40625 12.5938C3.96875 13.1354 4.625 13.3021 5.375 13.0938L5.9375 12.9062L6.25 13.4688C6.625 14.1146 7.20833 14.4583 8 14.5C8.79167 14.4583 9.375 14.1146 9.75 13.4688L10.0312 12.9062L10.5938 13.0938C11.3438 13.3021 12.0104 13.1354 12.5938 12.5938C13.1354 12.0104 13.3021 11.3438 13.0938 10.5938L12.9062 10.0312L13.4688 9.75C14.1146 9.375 14.4583 8.79167 14.5 8C14.4583 7.20833 14.1146 6.625 13.4688 6.25L12.9062 5.9375L13.0938 5.375C13.3021 4.625 13.1354 3.96875 12.5938 3.40625C12.0104 2.86458 11.3438 2.69792 10.5938 2.90625L10.0312 3.09375L9.75 2.5625C9.375 1.89583 8.79167 1.54167 8 1.5C7.20833 1.54167 6.625 1.89583 6.25 2.5625L5.9375 3.09375Z" fill="currentColor"/>
                    </svg>                                                 
                    <?php echo tp_kses( $item['info_text'] ) ?>
                  </li>
                  <?php endforeach; ?>
                  
                </ul>
                <?php if(!empty( $settings['tg_sub_title3'] )) : ?>
                <h3 class="cs_fs_30 cs_mb_15"><?php echo tp_kses( $settings['tg_sub_title3'] ) ?></h3>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_description03'] )) : ?>
                <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description03'] ) ?></p>
                <?php endif; ?>
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
          <div class="col-lg-4">
            <div class="cs_right_sidebar">
              <div class="cs_sidebar_widget cs_color_1">
                <form  method="get" action="<?php print esc_url( home_url( '/' ) );?>" class="cs_search_form">
                  <input type="text" name="s" placeholder="<?php print esc_attr__( 'Enter Keyword', 'tscore' );?>" value="<?php print esc_attr( get_search_query() )?>" class="cs_search_input">
                  <button class="cs_search_submit_btn"><i class="fa-solid fa-search"></i></button>
                </form>
              </div>
              <div class="cs_sidebar_widget">
                <?php if(!empty( $settings['tg_sub_title5'] )) : ?>
                <h2 class="cs_sidebar_widget_heading cs_fs_24 cs_semibold"><?php echo tp_kses( $settings['tg_sub_title5'] ) ?></h2>
                <?php endif; ?>                
                <ul class="cs_category_widget">
                    <?php foreach ($settings['tg_social_list'] as $item) : ?> 
                  <li>
                    <a href="<?php echo esc_url( $item['tg_social_url'] ); ?>">
                      <i class="fa-solid fa-folder-open"></i>
                      <span><?php echo esc_html( $item['tg_social_text'] ); ?></span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </div>
              <div class="cs_sidebar_widget">
                 <?php if(!empty( $settings['tg_button_title'] )) : ?>
                <h2 class="cs_sidebar_widget_heading cs_fs_24 cs_semibold"><?php echo tp_kses( $settings['tg_button_title'] ) ?></h2>
                 <?php endif; ?>
                <div>
                    <?php if(!empty( $settings['tg_button_one'] )) : ?>
                  <a href="<?php echo esc_url( $settings['tg_button_one_url'] ) ?>" class="cs_btn cs_style_1 w-100 cs_mb_15">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span><?php echo tp_kses( $settings['tg_button_one'] ) ?></span>          
                  </a>
                  <?php endif; ?>
                  <?php if(!empty( $settings['tg_button_two'] )) : ?>
                  <a href="<?php echo esc_url( $settings['tg_button_two_url'] ) ?>" class="cs_btn cs_style_1 cs_color_2 w-100">
                    <i class="fa-solid fa-file"></i>
                    <span><?php echo tp_kses( $settings['tg_button_two'] ) ?></span>                
                  </a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="cs_sidebar_widget">
                 <?php if(!empty( $settings['tg_sub_title6'] )) : ?>
                <h2 class="cs_sidebar_widget_heading cs_fs_24 cs_semibold"><?php echo tp_kses( $settings['tg_sub_title6'] ) ?></h2>
                <?php endif; ?>
                <?php if(!empty( $settings['contact_shortCode'] )) : ?>
                <div>
                    <?php echo do_shortcode( $settings['contact_shortCode'] ) ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cs_height_120 cs_height_lg_80"></div>
    </section>


    <?php
	}
}

$widgets_manager->register( new TG_SERVICE_DETAILS() );