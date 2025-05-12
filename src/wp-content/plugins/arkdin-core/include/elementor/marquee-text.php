<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Zivan Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Marquee_Text extends Widget_Base {

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
        return 'marquee-text';
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
        return __( 'Marquee Text', 'tscore' );
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

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title', 'tscore'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Experience Seamless IT Solutions', 'tscore'),
                'placeholder' => esc_html__('Type Marquee Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'marquee_list',
            [
                'label' => esc_html__('Marquee List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_title' => esc_html__('Experience Seamless IT Solutions', 'tscore'),
                    ],
                    [
                        'tg_title' => esc_html__('Experience Seamless IT Solutions', 'tscore'),
                    ],
                    [
                        'tg_title' => esc_html__('Experience Seamless IT Solutions', 'tscore'),
                    ],                    
                ],
                'title_field' => '{{{ tg_title }}}',
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

        <section class="marquee-section">
            <div class="inner-container">
                <div class="marquee">
                    <div class="marquee-block"> 
                        <?php foreach( $settings['marquee_list'] as $item ) : ?>
                        <!-- content-box -->
                        <div class="content-box">
                            <h6 class="title"><a href="#"><i class="fas fa-star-of-life"></i><?php echo tp_kses( $item['tg_title'] ); ?></a></h6>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="marquee-block"> 
                        <?php foreach( $settings['marquee_list'] as $item ) : ?>
                        <!-- content-box -->
                        <div class="content-box">
                            <h6 class="title"><a href="#"><i class="fas fa-star-of-life"></i><?php echo tp_kses( $item['tg_title'] ); ?></a></h6>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>

    <?php
    }

}

$widgets_manager->register( new TG_Marquee_Text() );