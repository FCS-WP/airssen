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
class TG_Testimonial extends Widget_Base {

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
		return 'testimonial';
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
		return __( 'Testimonial', 'tscore' );
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
                'label' => esc_html__('BG Image', 'tscore'),                              
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
                'label' => esc_html__('Title & Content', 'tscore'),                                                
            ]
        );

        $this->add_control(
            'tp_section_title_show',
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
                'default' => esc_html__('Testimonials', 'tscore'),
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
                'default' => tp_kses('Our Clients Feedback', 'tscore'),
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

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section',
            [
                'label' => esc_html__('Image', 'tscore'),                              
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

        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__( 'Review List', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,              
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Reviewer Image', 'tscore' ),
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
            'reviewer_name', [
                'label' => esc_html__( 'Reviewer Name', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => tp_kses( 'Brooklyn Simmons' , 'tscore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_designation', [
                'label' => esc_html__( 'Reviewer Designation', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Sales Manager' , 'tpcore' ),
                'label_block' => true,
            ]
        );

         $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__( 'Review Content', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => tp_kses( 'Air conditioning services encompass a range of maintenance, repair, installation, and consultation activities designed to ensure the efficient operation and longevity of air conditioning systems' , 'tscore' ),
                'placeholder' => esc_html__( 'Type your review content here', 'tscore' ),
            ]
        );       

        $repeater->add_control(
            'reviewer_comments_title', [
                'label' => esc_html__( 'Sub Title', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Great Services' , 'tpcore' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__( 'Review List', 'tscore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => tp_kses( 'Brooklyn Simmons', 'tscore' ),
                    ],
                    [
                        'reviewer_name' => tp_kses( 'Brooklyn Simmons', 'tscore' ),
                    ],
                    [
                        'reviewer_name' => tp_kses( 'Brooklyn Simmons', 'tscore' ),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
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

		?>

        <?php if ( $settings['ts_design_style']  == 'layout-2' ):
              $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');  
         ?>
         

            <section class="cs_testimonial_1_section cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">

                <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
                <div class="cs_section_heading cs_style_1">
                  <?php if (!empty($settings['tg_sub_title'])) : ?>
                  <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>" class="cs_section_subheading_icon">
                    <?php echo tp_kses( $settings['tg_sub_title'] ); ?>
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

                <div class="cs_slider cs_style_1 cs_slider_gap_30">
                  <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="900" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
                    <div class="cs_slider_wrapper">
                    <?php foreach ($settings['reviews_list'] as $item) :
                    if ( !empty($item['reviewer_image']['url']) ) {
                        $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                    }
                      ?>  
                      <div class="cs_slide">
                        <div class="cs_testimonial cs_style_2 cs_white_bg text-center">
                          <div class="cs_testimonial_in">
                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>" class="cs_testimonial_avatar_img">
                            <h2 class="cs_testimonial_category cs_fs_18 cs_medium cs_mb_2"><?php echo tp_kses($item['reviewer_comments_title']); ?></h2>
                            <div class="cs_rating cs_accent_color" data-rating="4.5">
                              <i class="fa-regular fa-star"></i>
                              <i class="fa-regular fa-star"></i>
                              <i class="fa-regular fa-star"></i>
                              <i class="fa-regular fa-star"></i>
                              <i class="fa-regular fa-star"></i>
                              <div class="cs_rating_percentage">
                                <i class="fa-solid fa-star fa-fw"></i>
                                <i class="fa-solid fa-star fa-fw"></i>
                                <i class="fa-solid fa-star fa-fw"></i>
                                <i class="fa-solid fa-star fa-fw"></i>
                                <i class="fa-solid fa-star fa-fw"></i>
                              </div>
                            </div>
                            <div class="cs_testimonial_blockquote cs_mb_15 cs_fs_16"><?php echo esc_html( $item['review_content'] ); ?></div>
                            <div class="cs_testimonial_avatar_box">
                              <h3 class="cs_fs_24 cs_mb_1"><?php echo tp_kses($item['reviewer_name']); ?></h3>
                              <p class="mb-0"><?php echo tp_kses($item['reviewer_designation']); ?></p>
                            </div>
                          </div>
                          <div class="cs_quore_icon">
                            <svg width="120" height="88" viewBox="0 0 120 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M24.375 87.127C24.1975 87.1251 24.021 87.0999 23.85 87.0519C23.4605 86.9384 23.1184 86.7015 22.875 86.377C22.6316 86.0524 22.5 85.6576 22.5 85.252V48.8113H1.875C1.37772 48.8113 0.900806 48.6138 0.549175 48.2622C0.197544 47.9105 0 47.4336 0 46.9363V2.75195C0 2.25467 0.197544 1.77776 0.549175 1.42613C0.900806 1.0745 1.37772 0.876953 1.875 0.876953H48.75C49.2473 0.876953 49.7242 1.0745 50.0758 1.42613C50.4275 1.77776 50.625 2.25467 50.625 2.75195V46.8988C50.6251 47.254 50.5243 47.6019 50.3344 47.902L25.9594 86.2551C25.7902 86.5222 25.5563 86.7422 25.2792 86.8947C25.0022 87.0471 24.6912 87.127 24.375 87.127ZM3.75 45.0238H24.375C24.8723 45.0238 25.3492 45.2214 25.7008 45.573C26.0525 45.9246 26.25 46.4015 26.25 46.8988V78.7738L46.875 46.3457V4.62695H3.75V45.0238Z" fill="#010F34"/>
                              <path d="M93.75 87.127C93.5725 87.1251 93.396 87.0999 93.225 87.0519C92.8355 86.9384 92.4934 86.7015 92.25 86.377C92.0066 86.0524 91.875 85.6576 91.875 85.252V48.8113H71.25C70.7527 48.8113 70.2758 48.6138 69.9242 48.2622C69.5725 47.9105 69.375 47.4336 69.375 46.9363V2.75195C69.375 2.25467 69.5725 1.77776 69.9242 1.42613C70.2758 1.0745 70.7527 0.876953 71.25 0.876953H118.125C118.622 0.876953 119.099 1.0745 119.451 1.42613C119.802 1.77776 120 2.25467 120 2.75195V46.8988C120 47.254 119.899 47.6019 119.709 47.902L95.3344 86.2551C95.1652 86.5222 94.9313 86.7422 94.6542 86.8947C94.3772 87.0471 94.0662 87.127 93.75 87.127ZM73.125 45.0238H93.75C94.2473 45.0238 94.7242 45.2214 95.0758 45.573C95.4275 45.9246 95.625 46.4015 95.625 46.8988V78.7738L116.25 46.3457V4.62695H73.125V45.0238Z" fill="#010F34"/>
                            </svg>                      
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="cs_pagination cs_style_1 cs_type_1"></div>
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php else:  
            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_white_color cs_fs_48 cs_semibold mb-0');     

             if ( !empty($settings['tg_image2']['url']) ) {
                $tg_image2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
                $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
            }

         ?>
         <section class="cs_testimonial_1_section cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-7">
                    <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
                    <div class="cs_section_heading cs_style_1">
                      <?php if (!empty($settings['tg_sub_title'])) : ?>
                      <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>" class="cs_section_subheading_icon">
                        <?php echo tp_kses( $settings['tg_sub_title'] ); ?>
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
                    <div class="cs_slider cs_style_1">
                      <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="900" data-center="0" data-variable-width="0" data-slides-per-view="1">
                        <div class="cs_slider_wrapper">
                        <?php foreach ($settings['reviews_list'] as $item) :
                        if ( !empty($item['reviewer_image']['url']) ) {
                            $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                            $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                        }
                          ?>                     
                          <div class="cs_slide">
                            <div class="cs_testimonial cs_style_1">
                              <div class="cs_rating cs_accent_color" data-rating="4.5">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <div class="cs_rating_percentage">
                                  <i class="fa-solid fa-star fa-fw"></i>
                                  <i class="fa-solid fa-star fa-fw"></i>
                                  <i class="fa-solid fa-star fa-fw"></i>
                                  <i class="fa-solid fa-star fa-fw"></i>
                                  <i class="fa-solid fa-star fa-fw"></i>
                                </div>
                              </div>
                              <div class="cs_testimonial_blockquote cs_white_color cs_mb_25 cs_fs_16"><?php echo esc_html( $item['review_content'] ); ?></div>
                              <div class="cs_testimonial_avatar_box">
                                <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>" class="cs_testimonial_avatar_img">
                                <div class="cs_testimonial_avatar_right">
                                  <h3 class="cs_fs_24 cs_accent_color cs_mb_1"><?php echo tp_kses($item['reviewer_name']); ?></h3>
                                  <p class="mb-0"><?php echo tp_kses($item['reviewer_designation']); ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                        </div>
                        <div class="cs_pagination cs_style_2"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cs_testimonial_1_thumb" data-src="<?php echo esc_url($tg_image2); ?>">
                <div class="cs_testimonial_1_quote_wrap">
                  <div class="cs_testimonial_1_quote cs_accent_bg cs_center wow zoomIn" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <svg width="40" height="30" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15 0H3.75C1.68213 0 0 1.68213 0 3.75V15C0 17.0679 1.68213 18.75 3.75 18.75H8.79578L6.89819 28.5114C6.82678 28.8782 6.92321 29.2572 7.16064 29.5453C7.39806 29.8334 7.75146 30 8.125 30H12.1747C13.2617 30 14.2279 29.2889 14.5569 28.2593L18.1958 19.6277C18.2165 19.5783 18.2342 19.5276 18.2483 19.4763C18.5815 18.2788 18.75 17.0404 18.75 15.7959V3.75C18.75 1.68213 17.0679 0 15 0Z" fill="white"/>
                      <path d="M36.25 0H25C22.9321 0 21.25 1.68213 21.25 3.75V15C21.25 17.0679 22.9321 18.75 25 18.75H30.0464L28.1482 28.5114C28.0762 28.8782 28.1726 29.2572 28.4106 29.5453C28.6475 29.8334 29.0015 30 29.375 30H33.4253C34.5129 30 35.4785 29.2889 35.8069 28.2587L39.4458 19.6277C39.4665 19.5782 39.4836 19.5276 39.4983 19.4763C39.8315 18.2776 40 17.0392 40 15.7959V3.75C40 1.68213 38.3179 0 36.25 0Z" fill="white"/>
                    </svg>            
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php endif; ?>


    <?php
	}
}

$widgets_manager->register( new TG_Testimonial() );