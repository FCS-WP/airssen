<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Zivan Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Advanced_Tab extends Widget_Base {

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
        return 'advanced-tab';
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
        return __( 'Advanced Tab', 'tscore' );
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
                'default' => esc_html__('Our price plan', 'tscore'),
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
                'default' => tp_kses('Where Comfort Meets <br>Efficiency', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'base_color',
            [
                'label' => esc_html__( 'Background Color', 'tscore' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cs_gray_bg_2' => 'background-color: {{VALUE}};',
                ],
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
                'default' => 'h2',
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

        $this->start_controls_section(
            '_section_price_tabs',
            [
                'label' => __('Advanced Tabs', 'tscore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'tscore'),
                'default' => __('Tab Title', 'tscore'),
                'label_block' => true,
                'placeholder' => __('Type Tab Title', 'tscore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'template',
            [
                'label' => __('Section Template', 'tscore'),
                'placeholder' => __('Select a section template for as tab content', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => get_elementor_templates()
            ]
        );

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{title}}',
                'default' => [
                    [
                        'title' => 'Monthly',
                    ],
                    [
                        'title' => 'Yearly',
                    ]
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
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
        ?>

        <section>
          <div class="cs_height_115 cs_height_lg_70"></div>
          <div class="container">
            <div class="cs_tabs">
              <div class="cs_slider_heading_1">
                <?php if(!empty( $settings['tg_section_title_show'] )) : ?>
                <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>
                  <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="" class="cs_section_subheading_icon">
                    <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                  </h3>
                  <?php endif; ?>
                    <?php
                        if ( !empty($settings['tg_title']) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title' ] )
                            );
                        endif;
                    ?>              
                </div>
                <?php endif; ?>
                <ul class="cs_tab_links cs_style_2 cs_semibold cs_heading_font cs_mp_0 cs_heading_color">
                    <?php $flag = true; foreach ($settings['tabs'] as $key => $tab):
                        $active = ($key == 0) ? 'active' : '';
                        $cs_switch = ($key == 0) ? 'cs_switch' : '';
                    ?>                
                  <li class="<?php echo esc_attr($active); ?>"><a href="#<?php echo esc_attr($key); ?>"><?php echo tp_kses($tab['title']); ?></a></li>
                  <?php $flag = false; endforeach; ?>
                </ul>
              </div>
              <div class="cs_height_45 cs_height_lg_45"></div>
              <div class="cs_tab_body">
                <?php foreach ($settings['tabs'] as $key => $tab):
                    $active = ($key == 0) ? 'active' : '';
                ?>
                <div class="cs_tab <?php echo esc_attr($active); ?>" id="<?php echo esc_attr($key); ?>">
                    <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="cs_height_120 cs_height_lg_80"></div>
        </section>

        <?php
    }

}
$widgets_manager->register( new TG_Advanced_Tab() );