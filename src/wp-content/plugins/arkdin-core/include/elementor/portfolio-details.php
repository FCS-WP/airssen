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
class TG_PORTFOLIO_DETAILS extends Widget_Base {

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
		return 'portfolio-details';
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
		return __( 'Project Detail', 'tscore' );
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


        // tg_section_title
        $this->start_controls_section(
            'tg_section_title007',
            [
                'label' => esc_html__('Content Row One', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Professional conditioning Replacement', 'tscore'),
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
                'default' => tp_kses('High-efficiency units can significantly reduce energy consumption, lower utility bills, provide better cooling, and have a smaller environmental footprint Professional consultation, <br><br>
                Comprehensive repair services for all types of air conditioning units. From minor fixes to major overhauls, our services technicians are equipped to handle any issue Diagnostic testing, component repair or replacement, system you all a rebalancing, and air for  performance <br><br>
                It is recommended to service your air conditioner at least once a year to ensure it runs efficiently and effectively and replacing filters, keeping the outdoor unit clean, and sealing any leaks in your home can improve efficiency A for an  professional team your assessment is recommended', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // info group
        $this->start_controls_section(
            'portfolio_info_list',
            [
                'label' => esc_html__( 'Info List', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_sub', [
                'label' => esc_html__( 'Info Subject', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Clients:' , 'tscore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'info_text', [
                'label' => esc_html__( 'Info Text', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Marvin McKinney' , 'tscore' ),
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
                        'info_sub' => esc_html__( 'Clients:', 'tscore' ),
                        'info_text' => esc_html__( 'Marvin McKinney', 'tscore' ),
                    ],
                    [
                        'info_sub' => esc_html__( 'Category:', 'tscore' ),
                        'info_text' => esc_html__( 'Conditioning Replacement', 'tscore' ),
                    ],
                    [
                        'info_sub' => esc_html__( 'Date:', 'tscore' ),
                        'info_text' => esc_html__( '12 May, 2024', 'tscore' ),
                    ],

                ],
                'title_field' => '{{{ info_sub }}}',
            ]
        );

        $this->end_controls_section();

        // tg_section_title
        $this->start_controls_section(
            'tg_gallery_title1',
            [
                'label' => esc_html__('Gallary 1', 'tscore'),
            ]
        );

         $this->add_control(
            'gallery1',
            [
                'label' => esc_html__( 'Add Gallery Images', 'tscore' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],
            ]
        ); 

        $this->end_controls_section();

        // tg_section_title
        $this->start_controls_section(
            'tg_section_title2',
            [
                'label' => esc_html__('Content Row Two', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title2',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Project Challenges', 'tscore'),
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
                'default' => tp_kses('Our expert technicians will assess your space and recommend the best air conditioning unit for your needs. We handle the entire installation process, ensuring your properplacement, wiring, and setup for optimal performance replacing', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // tg_section_title
        $this->start_controls_section(
            'tg_gallery_title02',
            [
                'label' => esc_html__('Gallary 2', 'tscore'),
            ]
        );

         $this->add_control(
            'gallery2',
            [
                'label' => esc_html__( 'Add Gallery Images', 'tscore' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],
            ]
        ); 


        $this->end_controls_section();

 // tg_section_title
        $this->start_controls_section(
            'tg_section_title3',
            [
                'label' => esc_html__('Content Row Three', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_sub_title3',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Final Result', 'tscore'),
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
                'default' => tp_kses('Full system setup, ductwork connection thermostat integration and a thorough system test to ensure everything is working perfectly and ensure it operates at peak efficiency during the hottest months Regular maintenance <br>
              Filter replacement, coil cleaning, lubrication of moving parts, system calibration, and a complete system inspection A thorough tune-up service designed to enhance the performance of your air conditioner and ensure it operates at peak efficiency during the hottest months', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // tg_section_title
        $this->start_controls_section(
            'tg_section_titlee',
            [
                'label' => esc_html__('Next / Prev Pagination', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_prev_text',
            [
                'label' => esc_html__('Prev Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Prev Project', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_next_text',
            [
                'label' => esc_html__('Next Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Next Project', 'tpcore'),
                'label_block' => true,
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
	?>

    <section>
      <div class="cs_height_110 cs_height_lg_75"></div>
      <div class="container">
        <div class="cs_project_details">
          <div class="row cs_mb_45 cs_reverse_col cs_gap_y_50">
            <div class="col-xl-9 col-lg-8">
              <div class="cs_pr_30">
                <?php if(!empty( $settings['tg_sub_title'] )) : ?>
                <h2 class="cs_fs_48 cs_semibold cs_mb_22"><?php echo tp_kses( $settings['tg_sub_title'] ) ?></h2>
                 <?php endif; ?>
                 <?php if(!empty( $settings['tg_description01'] )) : ?>
                <p><?php echo tp_kses( $settings['tg_description01'] ) ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4">
              <div class="cs_project_info_card">
                <h2 class="cs_sidebar_widget_heading cs_fs_24 cs_semibold">Categories</h2>
                <ul class="cs_mp_0">
                    <?php foreach ( $settings['info_list'] as $item ) : ?>
                  <li>
                    <p class="cs_fs_14 mb-0"><?php echo tp_kses( $item['info_sub'] ) ?></p>
                    <h3 class="mb-0 cs_fs_18 cs_medium"><?php echo tp_kses( $item['info_text'] ) ?></h3>
                  </li>
                    <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="cs_project_details_in">
            <div class="row">
                <?php foreach ( $settings['gallery1'] as $image ) { ?>
              <div class="col-md-6">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Gallery Image','tpcore') ?>">
              </div>
            <?php } ?>
            </div>
            <?php if(!empty( $settings['tg_sub_title2'] )) : ?>
            <h3><?php echo tp_kses( $settings['tg_sub_title2'] ) ?></h3>
            <?php endif; ?>
            <?php if(!empty( $settings['tg_description02'] )) : ?>
            <p><?php echo tp_kses( $settings['tg_description02'] ) ?></p>
            <?php endif; ?>
            <div class="row">
            <?php foreach ( $settings['gallery2'] as $image ) { ?>
              <div class="col-md-4">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Gallery Image','tpcore') ?>">
              </div>
              <?php } ?>
            </div>                      
            <?php if(!empty( $settings['tg_sub_title3'] )) : ?>
            <h3><?php echo tp_kses( $settings['tg_sub_title3'] ) ?></h3>
             <?php endif; ?>
                <?php if(!empty( $settings['tg_description03'] )) : ?>
            <p>
              <?php echo tp_kses( $settings['tg_description03'] ) ?>
            </p>
            <?php endif; ?>
          </div>
        </div>
        <div class="cs_page_nav">
         <?php
            $prev_post = get_previous_post();
            if ( $prev_post ):
        ?>
          <div class="cs_page_nav_left">
            <div class="cs_page_nav_item">
              <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="cs_page_nav_btn cs_center">
                <i class="fa-solid fa-arrow-left"></i>
              </a>
              <div>
                <p class="mb-0 cs_fs_14"><?php echo tp_kses( $settings['tg_prev_text'] ) ?></p>
              </div>
            </div>
          </div>
          <?php endif;?>
        <?php
            $next_post = get_next_post();
            if ( $next_post ):
        ?>          
          <div class="cs_page_nav_right">
            <div class="cs_page_nav_item">
              <div>
                <p class="mb-0 cs_fs_14"><?php echo tp_kses( $settings['tg_next_text'] ) ?></p>
              </div>
              <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="cs_page_nav_btn cs_center">
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        <?php endif;?>         
        </div>
      </div>
      <div class="cs_height_120 cs_height_lg_80"></div>
    </section>

    <?php
	}
}

$widgets_manager->register( new TG_PORTFOLIO_DETAILS() );