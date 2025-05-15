<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Zivan Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Services extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'services';
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
    public function get_title()
    {
        return __('Services', 'tscore');
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
    public function get_icon()
    {
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
    public function get_categories()
    {
        return ['tscore'];
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
    public function get_script_depends()
    {
        return ['tscore'];
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
    protected function register_controls()
    {


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
            '_tg_bg_section',
            [
                'label' => esc_html__('Background Image', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_bg',
            [
                'label' => esc_html__('Choose Image', 'tscore'),
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
                'label' => esc_html__('Section Title & Content', 'tscore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'tscore'),
                'label_off' => esc_html__('Hide', 'tscore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('our bast servicses', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Breathe Easy Air Quality <br>Assessment', 'tscore'),
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


        // _custom_post
        $this->start_controls_section(
            '_tg_post_section',
            [
                'label' => esc_html__('Service List', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-1']
                ]
            ]
        );

        $post = new \Elementor\Repeater();

        $post->add_control(
            'select_post',
            [
                'label' => __('Select a Service', 'tscore'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_services(),
            ]
        );

        $post->add_control(
            'tg_post_number',
            [
                'label' => esc_html__('Number', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('01', 'tscore'),
                'placeholder' => esc_html__('Type Services Number', 'tscore'),
                'label_block' => true,
            ]
        );

        $post->add_control(
            'tg_post_content',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Marketing repurpose success in professions whereas in services sapien maximus design.', 'tscore'),
                'placeholder' => esc_html__('Type Services Description', 'tscore'),
                'label_block' => true,
            ]
        );

        $post->add_control(
            'reviewer_image',
            [
                'label' => esc_html__('Service Image', 'tscore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $post->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'tg_post_list',
            [
                'label' => esc_html__('All Service Post List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $post->get_controls(),
            ]
        );

        $this->end_controls_section();


        // _custom_post
        $this->start_controls_section(
            '_tg_post_section2',
            [
                'label' => esc_html__('Service List', 'tscore'),
                'condition' => [
                    'ts_design_style' => ['layout-2']
                ]
            ]
        );

        $post2 = new \Elementor\Repeater();

        $post2->add_control(
            'select_post',
            [
                'label' => __('Select a Service', 'tscore'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_services(),
            ]
        );

        $post2->add_control(
            'reviewer_image2',
            [
                'label' => esc_html__('Icon', 'tscore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $post2->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size2',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $post2->add_control(
            'tg_post_subtitle',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Reliable Cooling Exceptional Service', 'tscore'),
                'placeholder' => esc_html__('Type Services Sub Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_content',
            [
                'label' => esc_html__('Description', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Air conditioners can develop various issues over time,  as refrigerant <br>leaks, compressor problems, or electrical issues.', 'tscore'),
                'placeholder' => esc_html__('Type Services Description', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'reviewer_image',
            [
                'label' => esc_html__('Service Image', 'tscore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $post2->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $post2->add_control(
            'tg_post_list_title1',
            [
                'label' => esc_html__('List Title 1', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('AirFlow Optimization', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_list_title2',
            [
                'label' => esc_html__('List Title 2', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('AirFlow Optimization', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_list_title3',
            [
                'label' => esc_html__('List Title 3', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('FreezeGuard Installation', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_list_title4',
            [
                'label' => esc_html__('List Title 4', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Cool Care Maintenance', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_list_title5',
            [
                'label' => esc_html__('List Title 5', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ClimateControl Checkup', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $post2->add_control(
            'tg_post_list_title6',
            [
                'label' => esc_html__('List Title 6', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ChillOut Emergency Services', 'tscore'),
                'placeholder' => esc_html__('Type Services List Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_post_list2',
            [
                'label' => esc_html__('All Service Post List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $post2->get_controls(),
            ]
        );

        $this->end_controls_section();


        // TAB_STYLE
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'tscore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'tscore'),
                    'uppercase' => __('UPPERCASE', 'tscore'),
                    'lowercase' => __('lowercase', 'tscore'),
                    'capitalize' => __('Capitalize', 'tscore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-main-title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    // Get All Services
    public function get_all_services()
    {

        $wp_query = get_posts([
            'post_type' => 'services',
            'orderby' => 'date',
            'posts_per_page' => -1,
        ]);

        $options = ['none' => 'None'];
        foreach ($wp_query as $services) {
            $options[$services->ID] = $services->post_name;
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['tg_bg']['url'])) {
            $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url($settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
            $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
        }

        ?>

        <?php if ($settings['ts_design_style'] == 'layout-2'):
            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
            ?>


            <section class="cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
                <div class="cs_height_115 cs_height_lg_70"></div>
                <div class="container">
                    <?php if (!empty($settings['tg_section_title_show'])): ?>
                        <div class="cs_slider_heading_1">
                            <div class="cs_section_heading cs_style_1">
                                <?php if (!empty($settings['tg_sub_title'])): ?>
                                    <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg"
                                            alt="<?php print esc_attr__('icon', 'tscore'); ?>" class="cs_section_subheading_icon">
                                        <?php echo esc_html($settings['tg_sub_title']); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php
                                if (!empty($settings['tg_title'])):
                                    printf(
                                        '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['tg_title_tag']),
                                        $this->get_render_attribute_string('title_args'),
                                        tp_kses($settings['tg_title'])
                                    );
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="cs_height_45 cs_height_lg_45"></div>
                    <?php endif; ?>
                    <div class="cs_tabs">
                        <div class="cs_service_product_nav2 cs_tab_links cs_slider_gap_30 wow fadeInUp" data-wow-duration="0.9s"
                            data-wow-delay="0.25s">
                            <?php foreach ($settings['tg_post_list2'] as $key => $items):
                                if (!empty($items['reviewer_image']['url'])) {
                                    $tg_reviewer_image = !empty($items['reviewer_image']['id']) ? wp_get_attachment_image_url($items['reviewer_image']['id'], $items['reviewer_image_size_size']) : $items['reviewer_image']['url'];
                                    $tg_reviewer_image_alt = get_post_meta($items["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                }
                                if (!empty($items['reviewer_image2']['url'])) {
                                    $tg_reviewer_image2 = !empty($items['reviewer_image2']['id']) ? wp_get_attachment_image_url($items['reviewer_image2']['id'], $items['reviewer_image_size2_size']) : $items['reviewer_image2']['url'];
                                    $tg_reviewer_image_alt2 = get_post_meta($items["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
                                }

                                $active = ($key == 0) ? 'active' : '';

                                ?>
                                <?php
                                $args = new \WP_Query(array(
                                    'post_type' => 'services',
                                    'post_status' => 'publish',
                                    'post__in' => [
                                        $items['select_post']
                                    ]
                                ));

                                /* Start the Loop */
                                while ($args->have_posts()):
                                    $args->the_post();
                                    ?>
                                    <li class="<?php echo esc_attr($active); ?>">
                                        <a href="#tab_<?php echo esc_attr($key); ?>">
                                            <div class="cs_slide_item_sm2">
                                                <div class="cs_service_card cs_style_2 text-center cs_center">
                                                    <div class="cs_service_card_in">
                                                        <div class="cs_service_card_icon cs_mb_20">
                                                            <img src="<?php echo esc_url($tg_reviewer_image2); ?>"
                                                                alt="<?php echo esc_url($tg_reviewer_image_alt2); ?>">
                                                        </div>
                                                        <h3 class="cs_service_card_title cs_fs_24 cs_semibold mb-0"><?php the_title(); ?>
                                                        </h3>
                                                    </div>
                                                    <div class="cs_service_card_bg">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shapes/service_shape_1.svg"
                                                            alt="" class="cs_service_card_shape_1">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shapes/service_shape_1.svg"
                                                            alt="" class="cs_service_card_shape_2">
                                                        <svg width="282" height="229" viewBox="0 0 282 229" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M0 9C0 6.23858 2.23858 4 5 4H277C279.761 4 282 6.23858 282 9V189.6C282 196.796 276.889 202.979 269.821 204.332L163.569 224.678C148.658 227.534 133.342 227.534 118.431 224.678L12.1789 204.332C5.11085 202.979 0 196.796 0 189.6V9Z"
                                                                fill="#FF5500" />
                                                            <path
                                                                d="M0 5C0 2.23857 2.23858 0 5 0H277C279.761 0 282 2.23858 282 5V187.426C282 194.7 276.781 200.925 269.619 202.195L161.95 221.285C148.091 223.743 133.909 223.743 120.05 221.285L12.3813 202.195C5.21895 200.925 0 194.7 0 187.426V5Z"
                                                                fill="white" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endforeach; ?>

                        </div>
                        <div class="cs_height_40 cs_height_lg_40"></div>
                        <div class="cs_tab_body">
                            <div class="cs_service_product_thumb2">
                                <?php foreach ($settings['tg_post_list2'] as $key => $items):
                                    if (!empty($items['reviewer_image']['url'])) {
                                        $tg_reviewer_image = !empty($items['reviewer_image']['id']) ? wp_get_attachment_image_url($items['reviewer_image']['id'], $items['reviewer_image_size_size']) : $items['reviewer_image']['url'];
                                        $tg_reviewer_image_alt = get_post_meta($items["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                    }
                                    if (!empty($items['reviewer_image2']['url'])) {
                                        $tg_reviewer_image2 = !empty($items['reviewer_image2']['id']) ? wp_get_attachment_image_url($items['reviewer_image2']['id'], $items['reviewer_image_size2_size']) : $items['reviewer_image2']['url'];
                                        $tg_reviewer_image_alt2 = get_post_meta($items["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
                                    }

                                    $active = ($key == 0) ? 'active' : '';
                                    ?>
                                    <?php
                                    $args = new \WP_Query(array(
                                        'post_type' => 'services',
                                        'post_status' => 'publish',
                                        'post__in' => [
                                            $items['select_post']
                                        ]
                                    ));

                                    /* Start the Loop */
                                    while ($args->have_posts()):
                                        $args->the_post();
                                        ?>
                                        <div class="cs_tab <?php echo esc_attr($active); ?>" id="tab_<?php echo esc_attr($key); ?>">
                                            <div class="cs_slide_item_lg2">
                                                <div class="cs_service_card_2_details cs_white_bg">
                                                    <div class="cs_service_card_2_details_left">
                                                        <h2 class="cs_fs_36 cs_semibold cs_mb_14">
                                                            <?php echo tp_kses($items['tg_post_subtitle']) ?>
                                                        </h2>
                                                        <p class="cs_mb_30"><?php echo tp_kses($items['tg_post_content']) ?></p>
                                                        <ul class="cs_list cs_style_1 cs_mp_0 cs_fs_18 cs_medium cs_heading_font">

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title1']) ?>
                                                            </li>

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title2']) ?>
                                                            </li>

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title3']) ?>
                                                            </li>

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title4']) ?>
                                                            </li>

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title5']) ?>
                                                            </li>

                                                            <li>
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="2" />
                                                                    <g>
                                                                        <path
                                                                            d="M13.7676 5.63463C13.4582 5.32482 12.9558 5.32501 12.646 5.63463L7.59787 10.683L5.35419 8.4393C5.04438 8.12949 4.54217 8.12949 4.23236 8.4393C3.92255 8.74912 3.92255 9.25132 4.23236 9.56113L7.03684 12.3656C7.19165 12.5204 7.39464 12.598 7.59765 12.598C7.80067 12.598 8.00386 12.5206 8.15867 12.3656L13.7676 6.75644C14.0775 6.44684 14.0775 5.94443 13.7676 5.63463Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="10" height="10" fill="white"
                                                                                transform="translate(4 4)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <?php echo tp_kses($items['tg_post_list_title6']) ?>
                                                            </li>


                                                        </ul>
                                                        <a href="<?php the_permalink(); ?>" class="cs_btn cs_style_1">
                                                            <span> <?php print esc_html__('READ MORE', 'tscore'); ?></span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.28125 0.71875L13.7812 5.96875C13.9271 6.11458 14 6.29167 14 6.5C14 6.70833 13.9271 6.88542 13.7812 7.03125L8.28125 12.2812C7.90625 12.5729 7.55208 12.5729 7.21875 12.2812C6.92708 11.9062 6.92708 11.5521 7.21875 11.2188L11.375 7.25H0.75C0.291667 7.20833 0.0416667 6.95833 0 6.5C0.0416667 6.04167 0.291667 5.79167 0.75 5.75H11.375L7.21875 1.78125C6.92708 1.44792 6.92708 1.09375 7.21875 0.71875C7.55208 0.427083 7.90625 0.427083 8.28125 0.71875Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="cs_service_card_2_details_thumb">
                                                        <img src="<?php echo esc_url($tg_reviewer_image); ?>"
                                                            alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php else:
            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0');
            ?>

            <!-- Start Service Section -->
            <section class="cs_bg_filed" data-src="<?php echo esc_url($tg_bg_url); ?>">
                <div class="cs_height_115 cs_height_lg_70"></div>
                <div class="container">
                    <?php if (!empty($settings['tg_section_title_show'])): ?>
                        <div class="cs_section_heading cs_style_1 text-center">
                            <?php if (!empty($settings['tg_sub_title'])): ?>
                                <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInUp"
                                    data-wow-duration="0.9s" data-wow-delay="0.25s">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg"
                                        alt="<?php print esc_attr__('icon', 'tscore'); ?>" class="cs_section_subheading_icon">
                                    <?php echo esc_html($settings['tg_sub_title']); ?>
                                </h3>
                            <?php endif; ?>
                            <?php
                            if (!empty($settings['tg_title'])):
                                printf(
                                    '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['tg_title_tag']),
                                    $this->get_render_attribute_string('title_args'),
                                    tp_kses($settings['tg_title'])
                                );
                            endif;
                            ?>
                        </div>
                        <div class="cs_height_45 cs_height_lg_45"></div>
                    <?php endif; ?>
                    <div class="row cs_gap_y_30">

                        <?php foreach ($settings['tg_post_list'] as $items):
                            if (!empty($items['reviewer_image']['url'])) {
                                $tg_reviewer_image = !empty($items['reviewer_image']['id']) ? wp_get_attachment_image_url($items['reviewer_image']['id'], $items['reviewer_image_size_size']) : $items['reviewer_image']['url'];
                                $tg_reviewer_image_alt = get_post_meta($items["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                            }
                            ?>
                            <?php
                            $args = new \WP_Query(array(
                                'post_type' => 'services',
                                'post_status' => 'publish',
                                'post__in' => [
                                    $items['select_post']
                                ]
                            ));

                            /* Start the Loop */
                            while ($args->have_posts()):
                                $args->the_post();
                                ?>

                                <div class="col-lg-4 col-md-6">
                                    <div class="cs_service_card cs_style_1 text-center">
                                        <div class="cs_service_card_in">
                                            <div class="top">
                                                <p class="cs_service_card_number cs_center cs_fs_48 cs_bold cs_mb_22">
                                                    <?php echo tp_kses($items['tg_post_number']) ?>
                                                </p>
                                            </div>
                                            <div class="body">
                                                <h3 class="cs_service_card_title cs_fs_24 cs_semibold cs_mb_15"><?php the_title(); ?></h3>
                                                <div class="cs_service_card_subtitle"><?php echo tp_kses($items['tg_post_content']) ?>
                                                </div>
                                                <?php if (!empty($items['reviewer_image']['url'])): ?>
                                                <div class="cs_service_card_icon cs_center">
                                                    <img src="<?php echo esc_url($tg_reviewer_image); ?>"
                                                        alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                            <div class="bottom"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php endif; ?>

        <?php
    }
}

$widgets_manager->register(new TG_Services());