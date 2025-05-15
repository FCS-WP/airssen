<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Gallery_Tab extends Widget_Base {

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
		return 'portfolio-tab';
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
		return __( 'Project Tab', 'tscore' );
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


        // Tab Section
        $this->start_controls_section(
            '_section_gallery',
            [
                'label' => esc_html__( 'Project Lists', 'tscore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
        'select_post',
            [
                'label' => __( 'Select a Project', 'tscore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_doctor(),
            ]
        );

         $repeater->add_control(
            'tg_team_content',
            [
                'label' => esc_html__('Category Name', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Marketing , Software', 'tscore'),
                'placeholder' => esc_html__('Type Category Text', 'tscore'),
                'label_block' => true,
            ]
        );              

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Project Image', 'tscore' ),
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
            'filter',
            [
                'label' => esc_html__( 'Filter Name (Category)', 'tscore' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type gallery filter name', 'tscore' ),
                'description' => esc_html__( 'Filter name will be used in filter menu. Added more category by , separator.', 'tscore' ),
                'default' => esc_html__( 'Filter Name', 'tscore' ),
            ]
        );



        $this->add_control(
            'gallery',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'title_field' => sprintf( esc_html__( 'Filter Group: %1$s', 'tscore' ), '{{filter}}' ),
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label' => esc_html__( 'Show Filter', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tscore' ),
                'label_off' => esc_html__( 'No', 'tscore' ),
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'show_all_filter',
            [
                'label' => esc_html__( 'Show "All Project" Filter?', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tscore' ),
                'label_off' => esc_html__( 'No', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__( 'Enable to display "All Project" filter in filter menu.', 'tscore' ),
                'condition' => [
                    'show_filter' => 'yes'
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'all_filter_label',
            [
                'label' => esc_html__( 'Filter Label', 'tscore' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'SEE ALL', 'tscore' ),
                'placeholder' => esc_html__( 'Type filter label', 'tscore' ),
                'description' => esc_html__( 'Type "All Project" filter label.', 'tscore' ),
                'condition' => [
                    'show_all_filter' => 'yes',
                    'show_filter' => 'yes'
                ]
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
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

    // Get All Portfolio
    public function get_all_doctor() {

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

            if ( empty( $settings['gallery'] ) ) {
                return;
            }

            $categories = array();
            $cats = array();
            foreach ($settings['gallery'] as $index => $gallery) :

                $cats = explode(",", $gallery['filter']);

                foreach ($cats as $i => $cat){
                    $categories[tp_slugify( $cat )] = $cat;
                }
            endforeach;

            $this->add_render_attribute('title_args', 'class', 'cs-section_title');

		?>
 
        <div class="case-study-area">
            <div class="container">
                <?php if ( $settings['show_filter'] === 'yes' ) : ?>
                <div class="row case-study-bg">
                    <div class="col-lg-12 col-sm-12">
                        <div class="case_study_nav">
                            <div class="case_study_menu">
                                <ul class="menu-filtering">
                                    <?php if ( $settings['show_all_filter'] === 'yes' ) : ?>
                                    <li data-filter="*" class="current_menu_item"><?php echo esc_html( $settings['all_filter_label'] ); ?></li>
                                    <?php endif; ?>
                                    <?php foreach ( $categories as $key => $val ) :?>
                                    <li data-filter=".<?php echo esc_attr($key); ?>"><?php echo esc_html( $val ); ?></li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row image_load">
             <?php
                $cars = array();
                foreach ($settings['gallery'] as $index => $gallery) :
                    $cars = explode(",",  $gallery['filter']);

                if ( !empty($gallery['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($gallery['reviewer_image']['id']) ? wp_get_attachment_image_url( $gallery['reviewer_image']['id'], $gallery['reviewer_image_size_size']) : $gallery['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($gallery["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }
                ?>

                <?php foreach ($cars as $key => $value) : ?>
                    <?php
                        $item_classes = tp_slugify($value);
                    ?>
                <?php endforeach; ?>

                     <?php
                        $args = new \WP_Query( array(
                            'post_type' => 'project',
                            'post_status' => 'publish',
                            'post__in' => [
                                $gallery['select_post']
                            ]
                        ));

                        /* Start the Loop */
                        while ( $args->have_posts() ) : $args->the_post();
                        global $post;
                    ?> 
                    <div class="col-lg-6 col-sm-6 grid-item <?php echo esc_attr($item_classes); ?>">
                        <div class="case-study-single-box">
                            <div class="case-study-thumb">
                                <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                            </div>
                            <div class="case-study-content">
                                <div class="case-study-title">
                                    <h5><?php echo tp_kses( $gallery['tg_team_content'] ); ?></h5>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                                <div class="case-study-icon">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

	<?php
	}


}

$widgets_manager->register( new TG_Gallery_Tab() );