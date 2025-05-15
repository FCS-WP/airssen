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
class TG_Case_Study extends Widget_Base {

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
		return 'case-study';
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
		return __( 'Case Study', 'tscore' );
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
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Case Study', 'tscore'),
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
                'default' => tp_kses('Our latest Case Studies', 'tscore'),
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
                'label' => esc_html__('Case Study List', 'tscore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tscore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,               
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
        'select_post',
            [
                'label' => __( 'Select a Case Study', 'tscore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_case_study(),
            ]
        );

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Case Study Image', 'tscore' ),
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
            'tg_post_btn',
            [
                'label' => esc_html__('Category Name', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Marketing', 'tscore'),
                'placeholder' => esc_html__('Type Button Text', 'tscore'),
                'label_block' => true,
            ]
        ); 

        $this->add_control(
            'tg_portfolio_list',
            [
                'label' => esc_html__('Portfolio List', 'tscore'),
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
					'{{WRAPPER}} .section-main-title2' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

    // Get All Portfolio
    public function get_all_case_study() {

        $wp_query = get_posts([
            'post_type' => 'case',
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

        $this->add_render_attribute('title_args', 'class', 'section-main-title2');
         ?>

        <div class="case-studies-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                        <div class="section-title text-center">
                            <?php if (!empty($settings['tg_sub_title'])) : ?>
                            <h6 class="section-sub-title"><?php echo esc_html( $settings['tg_sub_title'] ); ?></h6>
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
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
            <?php $counter = 1; foreach( $settings['tg_portfolio_list'] as $item ) :
            if ( !empty($item['reviewer_image']['url']) ) {
                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
            }
             ?>
            <?php
                $args = new \WP_Query( array(
                    'post_type' => 'case',
                    'post_status' => 'publish',
                    'post__in' => [
                        $item['select_post']
                    ]
                ));

                /* Start the Loop */
                while ( $args->have_posts() ) : $args->the_post();
            ?>
            <?php if ($counter == 1 ) : ?>
                    <div class="case-studies-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-case-studies-box">
                                    <div class="case-studies-content">
                                        <h4><a href="project-details.html"><?php the_title(); ?></a></h4>
                                        <h5><?php echo tp_kses( $item['tg_post_btn'] ) ?></h5>
                                    </div>
                                    <div class="case-studies-btn">
                                        <a href="<?php the_permalink(); ?>"><?php print esc_html__( 'View More Details', 'tscore' );?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="case-studies-thumb">
                                    <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_attr($tg_reviewer_image_alt); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="col-lg-6">
                        <div class="case-studies-single-box">
                            <div class="case-studies-thumb">
                                <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_attr($tg_reviewer_image_alt); ?>">
                                <div class="case-studie-content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <h6><?php echo tp_kses( $item['tg_post_btn'] ) ?></h6>
                                </div>
                                <div class="case-studies-icon">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php $counter++; endforeach; ?>

                </div>
            </div>
        </div>

    <?php
	}
}

$widgets_manager->register( new TG_Case_Study() );