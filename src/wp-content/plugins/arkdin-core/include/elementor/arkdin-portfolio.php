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
class TG_Portfolio extends Widget_Base {

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
		return 'arkdin-portfolio';
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
		return __( 'Project', 'tscore' );
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

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-1']
                ]                
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
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Latest Projects', 'tscore'),
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
                'default' => tp_kses('Keeping Your Cool Is Our <br>Specialty', 'tscore'),
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

        // Service group
        $this->start_controls_section(
            'tg_portfolio',
            [
                'label' => esc_html__('Project List', 'tscore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,               
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
        'select_post',
            [
                'label' => __( 'Select a Portfolio', 'tscore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_portfolio(),
            ]
        );

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Portfolio Image', 'tscore' ),
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
            'tg_post_content',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Thorough cleaning of air ducts to remove dust, debris', 'tscore'),
                'placeholder' => esc_html__('Type Description', 'tscore'),
                'label_block' => true,
            ]
        );       

        $this->add_control(
            'tg_portfolio_list',
            [
                'label' => esc_html__('Project List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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

    // Get All Portfolio
    public function get_all_portfolio() {

        $wp_query = get_posts([
            'post_type' => 'project',
            'orderby' => 'date',
            'posts_per_page' => -1,
        ]);

        $options = ['none' => 'None'];
        foreach(  $wp_query as $portfolios ){
            $options[$portfolios->ID] = $portfolios->post_name;
        }

        return $options;
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
         ?>
        <section>
          <div class="cs_height_120 cs_height_lg_80"></div>
          <div class="container">
            <div class="row cs_gap_y_30 cs_row_gap_30">
            <?php foreach( $settings['tg_portfolio_list'] as $item ) :
            if ( !empty($item['reviewer_image']['url']) ) {
                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
            }
             ?>
            <?php
                $args = new \WP_Query( array(
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'post__in' => [
                        $item['select_post']
                    ]
                ));

                /* Start the Loop */
                while ( $args->have_posts() ) : $args->the_post();
            ?>
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="cs_project cs_style_1 text-center">
                  <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>" class="w-100">
                  <div class="cs_project_info">
                    <div class="cs_project_info_in">
                      <h3 class="cs_fs_24 cs_semibold cs_white_color cs_mb_10"><?php the_title(); ?></h3>
                      <p class="cs_fs_14 cs_white_color cs_mb_22"><?php echo tp_kses( $item['tg_post_content'] ) ?></p>
                      <a href="<?php the_permalink(); ?>" class="cs_project_btn cs_center">
                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.6952 5.70203L11.6932 9.69579C11.318 10.1014 10.6615 10.1014 10.2863 9.69579C9.87982 9.32137 9.87982 8.66615 10.2863 8.29173L12.5686 5.98284H1.00049C0.437714 5.98284 0 5.54602 0 4.9844C0 4.39158 0.437714 3.98596 1.00049 3.98596H12.5686L10.2863 1.70827C9.87982 1.33385 9.87982 0.678627 10.2863 0.304212C10.6615 -0.101404 11.318 -0.101404 11.6932 0.304212L15.6952 4.29797C16.1016 4.67239 16.1016 5.32761 15.6952 5.70203Z" fill="currentColor"/>
                        </svg>                        
                      </a>
                    </div>
                  </div>
                </div>
              </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php endforeach; ?>

            </div>
          </div>
          <div class="cs_height_120 cs_height_lg_80"></div>
        </section>

        <?php else:
        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
         ?>
            <section>
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                <div class="cs_section_heading cs_style_1 text-center">
                <?php if (!empty($settings['tg_sub_title'])) : ?>
                  <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'shape', 'tscore' );?>" class="cs_section_subheading_icon">
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
                <div class="cs_slider_2_wrap">
                  <div class="cs_slider cs_style_2 cs_slider_gap_30">
                    <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                      <div class="cs_slider_wrapper">
                        <?php foreach( $settings['tg_portfolio_list'] as $item ) :
                        if ( !empty($item['reviewer_image']['url']) ) {
                            $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                            $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                        }
                         ?>
                        <?php
                            $args = new \WP_Query( array(
                                'post_type' => 'project',
                                'post_status' => 'publish',
                                'post__in' => [
                                    $item['select_post']
                                ]
                            ));

                            /* Start the Loop */
                            while ( $args->have_posts() ) : $args->the_post();
                        ?>
                        <div class="cs_slide">
                          <div class="cs_project cs_style_1 text-center">
                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>" class="w-100">
                            <div class="cs_project_info">
                              <div class="cs_project_info_in">
                                <h3 class="cs_fs_24 cs_semibold cs_white_color cs_mb_10"><?php the_title(); ?></h3>
                                <p class="cs_fs_14 cs_white_color cs_mb_22"><?php echo tp_kses( $item['tg_post_content'] ) ?></p>
                                <a href="<?php the_permalink(); ?>" class="cs_project_btn cs_center">
                                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.6952 5.70203L11.6932 9.69579C11.318 10.1014 10.6615 10.1014 10.2863 9.69579C9.87982 9.32137 9.87982 8.66615 10.2863 8.29173L12.5686 5.98284H1.00049C0.437714 5.98284 0 5.54602 0 4.9844C0 4.39158 0.437714 3.98596 1.00049 3.98596H12.5686L10.2863 1.70827C9.87982 1.33385 9.87982 0.678627 10.2863 0.304212C10.6615 -0.101404 11.318 -0.101404 11.6932 0.304212L15.6952 4.29797C16.1016 4.67239 16.1016 5.32761 15.6952 5.70203Z" fill="currentColor"/>
                                  </svg>                        
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="cs_pagination cs_style_2 cs_type_1 cs_show_md"></div>
                  </div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TG_Portfolio() );