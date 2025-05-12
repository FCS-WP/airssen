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
 * Zivan Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Team extends Widget_Base {

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
		return 'tg-team';
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
		return __( 'Team', 'tscore' );
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


        // layout Panel
        $this->start_controls_section(
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tscore'),
            ]
        );
        $this->add_control(
            'tp_design_style',
            [
                'label' => esc_html__('Select Layout', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tscore'),
                    'layout-2' => esc_html__('Layout 2', 'tscore'),
                    'layout-3' => esc_html__('Layout 3', 'tscore'),
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
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Team', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Meet Our Team of Expert', 'tscore'),
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

		// member list
        $this->start_controls_section(
            '_section_teams',
            [
                'label' => __( 'Members', 'tscore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_item'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __( 'Information', 'tscore' ),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Team Image', 'tscore' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Team Name', 'tscore' ),
                'default' => __( 'Kathryn Murphy', 'tscore' ),
                'placeholder' => __( 'Type name here', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Designation', 'tscore' ),
                'default' => __( 'President Of Sales', 'tscore' ),
                'placeholder' => __( 'Type designation here', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Number', 'tscore' ),
                'default' => __( '(+108) 213-1254', 'tscore' ),
                'placeholder' => __( 'Type Number here', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Team URL', 'tscore' ),
                'default' => __( '#', 'tscore' ),
                'placeholder' => __( 'Type url here', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __( 'Links', 'tscore' ),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __( 'Show Options?', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'tscore' ),
                'label_off' => __( 'No', 'tscore' ),
                'return_value' => 'yes',
                'default' => __( 'yes', 'tscore' ),
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Email', 'tscore' ),
                'placeholder' => __( 'Add your email link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Phone', 'tscore' ),
                'placeholder' => __( 'Add your phone link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'tscore' ),
                'default' => __( '#', 'tscore' ),
                'placeholder' => __( 'Add your facebook link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'tscore' ),
                'default' => __( '#', 'tscore' ),
                'placeholder' => __( 'Add your twitter link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'tscore' ),
                'default' => __( '#', 'tscore' ),
                'placeholder' => __( 'Add your instagram link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'tscore' ),
                'default' => __( '#', 'tscore' ),
                'placeholder' => __( 'Add your linkedin link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'tscore' ),
                'placeholder' => __( 'Add your youtube link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'tscore' ),
                'placeholder' => __( 'Add your flickr link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'tscore' ),
                'placeholder' => __( 'Add your vimeo link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'tscore' ),
                'placeholder' => __( 'Add your hehance link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'tscore' ),
                'placeholder' => __( 'Add your dribbble link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'tscore' ),
                'placeholder' => __( 'Add your pinterest link', 'tscore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
        $this->add_control(
            'teams',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Kathryn Murphy', 'tscore'),
                        'designation' => esc_html__('Managing Partner', 'tscore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Marvin McKinney', 'tscore'),
                        'designation' => esc_html__('President Of Sales', 'tscore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Darlene Robertson', 'tscore'),
                        'designation' => esc_html__('Project Manager', 'tscore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Cameron William', 'tscore'),
                        'designation' => esc_html__('Managing Partner', 'tscore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Cameron William', 'tscore'),
                        'designation' => esc_html__('Managing Partner', 'tscore'),
                    ],                    
                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
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
		?>

	    <!-- style 2 -->
	    <?php if ( $settings['tp_design_style'] === 'layout-2' ):
             $this->add_render_attribute( 'title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0' );
         ?>

        <section>
          <div class="cs_height_115 cs_height_lg_70"></div>
          <div class="container">
            <div class="cs_slider cs_style_1 cs_slider_gap_30 cs_remove_overflow">
              <div class="cs_slider_heading_1">
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
                <div class="cs_slider_arrows cs_style_2 cs_hide_md">
                  <div class="cs_left_arrow cs_slider_arrow cs_center">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_5_106w)">
                      <path d="M6.4 1.59961L7.52 2.71961L3.04 7.19961H16V8.79961H3.04L7.52 13.2796L6.4 14.3996L0 7.99961L6.4 1.59961Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_5_106w">
                      <rect width="16" height="16" fill="white" transform="matrix(-1 0 0 1 16 0)"/>
                      </clipPath>
                      </defs>
                    </svg> 
                  </div>
                  <div class="cs_right_arrow cs_slider_arrow cs_center">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_5_66d)">
                      <path d="M9.6 1.59961L8.48 2.71961L12.96 7.19961H0V8.79961H12.96L8.48 13.2796L9.6 14.3996L16 7.99961L9.6 1.59961Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_5_66d">
                      <rect width="16" height="16" fill="white"/>
                      </clipPath>
                      </defs>
                    </svg> 
                  </div>
                </div>
              </div>
              <div class="cs_height_45 cs_height_lg_45"></div>
              <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lg-slides="3" data-add-slides="4">
                <div class="cs_slider_wrapper">
                    <?php foreach ( $settings['teams'] as $item ) :
                        if ( !empty($item['image']['url']) ) {
                            $tp_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                            $tp_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                  <div class="cs_slide">
                    <div class="cs_team_member cs_style_2 text-center">
                      <div class="cs_team_member_thumb">
                        <img src="<?php echo esc_url($tp_team_image_url); ?>" alt="<?php echo esc_attr($tp_team_image_alt); ?>">
                      </div>
                      <div class="cs_member_social_btns_wrap cs_accent_color">
                        <div class="cs_member_social_btns_shapes">
                          <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 12.5L30 0V26H0L16.5 12.5Z" fill="currentColor"/>
                          </svg>
                          <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 13.5L30 26V0H0L16.5 13.5Z" fill="currentColor"/>
                          </svg>
                        </div>

                        <?php if( !empty($item['show_social'] ) ) : ?>
                          <div class="cs_member_social_btns">
                        <?php if( !empty($item['email_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="mailto:<?php echo esc_html( $item['email_title'] ); ?>"><i class="fa fa-envelope"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['phone_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="tell:<?php echo esc_html( $item['phone_title'] ); ?>"><i class="fa fa-phone"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['facebook_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['facebook_title'] ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['twitter_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['twitter_title'] ); ?>"><i class="fa-brands fa-twitter"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['instagram_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['instagram_title'] ); ?>"><i class="fa-brands fa-instagram"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['linkedin_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['linkedin_title'] ); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['youtube_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['youtube_title'] ); ?>"><i class="fa-brands fa-youtube"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['flickr_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['flickr_title'] ); ?>"><i class="fa-brands fa-flickr"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['vimeo_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['vimeo_title'] ); ?>"><i class="fa-brands fa-vimeo-v"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['behance_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['behance_title'] ); ?>"><i class="fa-brands fa-behance"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['dribble_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['dribble_title'] ); ?>"><i class="fa-brands fa-dribbble"></i></a>
                        <?php endif; ?>

                        <?php if( !empty($item['pinterest_title'] ) ) : ?>
                        <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['pinterest_title'] ); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                        <?php endif; ?>                           
                        </div>
                        <?php endif; ?>

                      </div>
                      <div class="cs_team_member_info">
                        <h3 class="cs_team_member_name cs_fs_20 cs_medium mb-0"><?php echo tp_kses( $item['team_name'] ); ?></h3>
                        <p class="cs_team_member_designation cs_fs_14 mb-0"><?php echo tp_kses( $item['designation'] ); ?></p>
                      </div>
                    </div>
                  </div>
                    <?php endforeach; ?>
                </div>
              </div>
              <div class="cs_pagination cs_style_2 cs_type_1 cs_show_md"></div>
            </div>
          </div>
          <div class="cs_height_120 cs_height_lg_80"></div>
        </section>

        <?php elseif ( $settings['tp_design_style'] === 'layout-3' ):
             $this->add_render_attribute( 'title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0' );
         ?>

    <section>
      <div class="cs_height_120 cs_height_lg_80"></div>
      <div class="container">
        <div class="row cs_gap_y_35">
        <?php foreach ( $settings['teams'] as $item ) :
            if ( !empty($item['image']['url']) ) {
                $tp_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                $tp_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
            }
        ?>            
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="cs_team_member cs_style_1 text-center">
              <div class="cs_team_member_in">
                <div class="cs_team_member_thumb">
                  <img src="<?php echo esc_url($tp_team_image_url); ?>" alt="<?php echo esc_attr($tp_team_image_alt); ?>">
                    <?php if( !empty($item['show_social'] ) ) : ?>
                    <div class="cs_member_social_btns">
                        <span class="cs_member_social_item cs_center">
                          <i class="fa-solid fa-share-alt"></i>
                        </span>
                    <?php if( !empty($item['email_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="mailto:<?php echo esc_html( $item['email_title'] ); ?>"><i class="fa fa-envelope"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['phone_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="tell:<?php echo esc_html( $item['phone_title'] ); ?>"><i class="fa fa-phone"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['facebook_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['facebook_title'] ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['twitter_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['twitter_title'] ); ?>"><i class="fa-brands fa-twitter"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['instagram_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['instagram_title'] ); ?>"><i class="fa-brands fa-instagram"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['linkedin_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['linkedin_title'] ); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['youtube_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['youtube_title'] ); ?>"><i class="fa-brands fa-youtube"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['flickr_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['flickr_title'] ); ?>"><i class="fa-brands fa-flickr"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['vimeo_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['vimeo_title'] ); ?>"><i class="fa-brands fa-vimeo-v"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['behance_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['behance_title'] ); ?>"><i class="fa-brands fa-behance"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['dribble_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['dribble_title'] ); ?>"><i class="fa-brands fa-dribbble"></i></a>
                    <?php endif; ?>

                    <?php if( !empty($item['pinterest_title'] ) ) : ?>
                    <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['pinterest_title'] ); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                    <?php endif; ?>                           
                    </div>
                    <?php endif; ?>

                </div>
                <div class="cs_team_member_info">
                  <h3 class="cs_team_member_name cs_fs_24 cs_semibold cs_mb_4">
                    <a href="<?php echo esc_url( $item['team_url'] ); ?>"><?php echo tp_kses( $item['team_name'] ); ?></a>
                  </h3>
                  <p class="cs_team_member_designation cs_fs_14 mb-0"><?php echo tp_kses( $item['designation'] ); ?></p>
                </div>
                <div class="cs_team_member_phone_number cs_fs_18 cs_heading_color">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/phone_icon_2.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>">
                  <?php echo tp_kses( $item['team_number'] ); ?>
                </div>
              </div>
              <div class="cs_team_member_shape cs_accent_color">
                <svg width="300" height="407" viewBox="0 0 300 407" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.498047V407H300V212.548C175.575 177.381 69.7706 101.188 0 0.498047Z" fill="currentColor"/>
                </svg>                                       
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="cs_height_120 cs_height_lg_80"></div>
    </section>


	    <!-- style default -->
	    <?php else :
	        $this->add_render_attribute( 'title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0' );
	    ?>

        <section>
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <div class="cs_slider cs_style_1 cs_slider_gap_30">
                  <div class="cs_slider_heading_1">
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
                    <div class="cs_slider_arrows cs_style_2 cs_hide_md">
                      <div class="cs_left_arrow cs_slider_arrow cs_center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_5_106)">
                          <path d="M6.4 1.59961L7.52 2.71961L3.04 7.19961H16V8.79961H3.04L7.52 13.2796L6.4 14.3996L0 7.99961L6.4 1.59961Z" fill="white"/>
                          </g>
                          <defs>
                          <clipPath id="clip0_5_106">
                          <rect width="16" height="16" fill="white" transform="matrix(-1 0 0 1 16 0)"/>
                          </clipPath>
                          </defs>
                        </svg> 
                      </div>
                      <div class="cs_right_arrow cs_slider_arrow cs_center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_5_66)">
                          <path d="M9.6 1.59961L8.48 2.71961L12.96 7.19961H0V8.79961H12.96L8.48 13.2796L9.6 14.3996L16 7.99961L9.6 1.59961Z" fill="white"/>
                          </g>
                          <defs>
                          <clipPath id="clip0_5_66">
                          <rect width="16" height="16" fill="white"/>
                          </clipPath>
                          </defs>
                        </svg> 
                      </div>
                    </div>
                  </div>
                  <div class="cs_height_45 cs_height_lg_45"></div>
                  <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lg-slides="3" data-add-slides="4">
                    <div class="cs_slider_wrapper">
                    <?php foreach ( $settings['teams'] as $item ) :
                        if ( !empty($item['image']['url']) ) {
                            $tp_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                            $tp_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                      <div class="cs_slide">
                        <div class="cs_team_member cs_style_1 text-center">
                          <div class="cs_team_member_in">
                            <div class="cs_team_member_thumb">
                              <img src="<?php echo esc_url($tp_team_image_url); ?>" alt="<?php echo esc_attr($tp_team_image_alt); ?>">

                            <?php if( !empty($item['show_social'] ) ) : ?>
                              <div class="cs_member_social_btns">
                                <span class="cs_member_social_item cs_center">
                                  <i class="fa-solid fa-share-alt"></i>
                                </span>
                            <?php if( !empty($item['email_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="mailto:<?php echo esc_html( $item['email_title'] ); ?>"><i class="fa fa-envelope"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['phone_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="tell:<?php echo esc_html( $item['phone_title'] ); ?>"><i class="fa fa-phone"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['facebook_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['facebook_title'] ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['twitter_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['twitter_title'] ); ?>"><i class="fa-brands fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['instagram_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['instagram_title'] ); ?>"><i class="fa-brands fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['linkedin_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['linkedin_title'] ); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['youtube_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['youtube_title'] ); ?>"><i class="fa-brands fa-youtube"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['flickr_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['flickr_title'] ); ?>"><i class="fa-brands fa-flickr"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['vimeo_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['vimeo_title'] ); ?>"><i class="fa-brands fa-vimeo-v"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['behance_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['behance_title'] ); ?>"><i class="fa-brands fa-behance"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['dribble_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['dribble_title'] ); ?>"><i class="fa-brands fa-dribbble"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($item['pinterest_title'] ) ) : ?>
                            <a class="cs_member_social_item cs_center" href="<?php echo esc_url( $item['pinterest_title'] ); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                            <?php endif; ?>                           
                            </div>
                            <?php endif; ?>

                            </div>
                            <div class="cs_team_member_info">
                              <h3 class="cs_team_member_name cs_fs_24 cs_semibold cs_mb_4"><?php echo tp_kses( $item['team_name'] ); ?></h3>
                              <p class="cs_team_member_designation cs_fs_14 mb-0"><?php echo tp_kses( $item['designation'] ); ?></p>
                            </div>
                            <div class="cs_team_member_phone_number cs_fs_18 cs_heading_color">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/phone_icon_2.svg" alt="<?php print esc_attr__( 'about1', 'tscore' );?>">
                              <?php echo tp_kses( $item['team_number'] ); ?>
                            </div>
                          </div>
                          <div class="cs_team_member_shape cs_accent_color">
                            <svg width="300" height="407" viewBox="0 0 300 407" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.498047V407H300V212.548C175.575 177.381 69.7706 101.188 0 0.498047Z" fill="currentColor"/>
                            </svg>                                       
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="cs_pagination cs_style_2 cs_type_1"></div>
                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

    	<?php endif; ?>

	<?php
	}
}

$widgets_manager->register( new TG_Team() );