<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
use TSCore\Elementor\Controls\Group_Control_TPBGGradient;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Arino Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Team_Details extends Widget_Base {

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
		return 'team-details';
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
		return __( 'Team Details', 'tscore' );
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

    protected static function get_profile_names()
    {
        return [
            '500px' => esc_html__('500px', 'tscore'),
            'apple' => esc_html__('Apple', 'tscore'),
            'behance' => esc_html__('Behance', 'tscore'),
            'bitbucket' => esc_html__('BitBucket', 'tscore'),
            'codepen' => esc_html__('CodePen', 'tscore'),
            'delicious' => esc_html__('Delicious', 'tscore'),
            'deviantart' => esc_html__('DeviantArt', 'tscore'),
            'digg' => esc_html__('Digg', 'tscore'),
            'dribbble' => esc_html__('Dribbble', 'tscore'),
            'email' => esc_html__('Email', 'tscore'),
            'facebook' => esc_html__('Facebook', 'tscore'),
            'flickr' => esc_html__('Flicker', 'tscore'),
            'foursquare' => esc_html__('FourSquare', 'tscore'),
            'github' => esc_html__('Github', 'tscore'),
            'houzz' => esc_html__('Houzz', 'tscore'),
            'instagram' => esc_html__('Instagram', 'tscore'),
            'jsfiddle' => esc_html__('JS Fiddle', 'tscore'),
            'linkedin' => esc_html__('LinkedIn', 'tscore'),
            'medium' => esc_html__('Medium', 'tscore'),
            'pinterest' => esc_html__('Pinterest', 'tscore'),
            'product-hunt' => esc_html__('Product Hunt', 'tscore'),
            'reddit' => esc_html__('Reddit', 'tscore'),
            'slideshare' => esc_html__('Slide Share', 'tscore'),
            'snapchat' => esc_html__('Snapchat', 'tscore'),
            'soundcloud' => esc_html__('SoundCloud', 'tscore'),
            'spotify' => esc_html__('Spotify', 'tscore'),
            'stack-overflow' => esc_html__('StackOverflow', 'tscore'),
            'tripadvisor' => esc_html__('TripAdvisor', 'tscore'),
            'tumblr' => esc_html__('Tumblr', 'tscore'),
            'twitch' => esc_html__('Twitch', 'tscore'),
            'twitter' => esc_html__('Twitter', 'tscore'),
            'vimeo' => esc_html__('Vimeo', 'tscore'),
            'vk' => esc_html__('VK', 'tscore'),
            'website' => esc_html__('Website', 'tscore'),
            'whatsapp' => esc_html__('WhatsApp', 'tscore'),
            'wordpress' => esc_html__('WordPress', 'tscore'),
            'xing' => esc_html__('Xing', 'tscore'),
            'yelp' => esc_html__('Yelp', 'tscore'),
            'youtube' => esc_html__('YouTube', 'tscore'),
        ];
    }


	protected function register_controls() {

        // tp_section_title
        $this->start_controls_section(
            'tg_section_title',
            [
                'label' => esc_html__('Title & Content', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Darlene Robertson', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Ace Technician', 'tscore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description01',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Professional consultation services to help you choose the right air and of conditioning system for your home or business needs. Site evaluation, as load calculation', 'tscore'),
                'placeholder' => esc_html__('Type section description here', 'tscore'),
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

    // _banner_social
        $this->start_controls_section(
            '_tg_social_section',
            [
                'label' => esc_html__('Social Section', 'tscore'),
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_social_text',
            [
                'label' => esc_html__('Social Name', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('fa-facebook-f', 'tscore'),
                'placeholder' => esc_html__('Type: fab fa-twitter', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_social_url',
            [
                'label' => esc_html__('Social Url', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tscore'),
                'placeholder' => esc_html__('Type social link', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list',
            [
                'label' => esc_html__('Social List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_social_text' => esc_html__('fa-linkedin-in', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('fa-twitter', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('fa-youtube', 'tscore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('fa-facebook-f', 'tscore'),
                    ],                                       
                ],
                'title_field' => '{{{ tg_social_text }}}',
            ]
        );

        $this->end_controls_section();


    // _banner_social
        $this->start_controls_section(
            '_tg_contact_section',
            [
                'label' => esc_html__('Contact Info', 'tscore'),
            ]
        );

        $repeater4 = new \Elementor\Repeater();

        $repeater4->add_control(
            'tg_social_text01',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Phone Number:', 'tscore'),
                'placeholder' => esc_html__('Type Title', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater4->add_control(
            'tg_social_content',
            [
                'label' => esc_html__('Content', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('(+270) 555-0117', 'tscore'),
                'placeholder' => esc_html__('Type Content', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list02',
            [
                'label' => esc_html__('List', 'tscore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater4->get_controls(),
                'default' => [
                    [
                        'tg_social_text01' => esc_html__('Phone Number:', 'tscore'),
                        'tg_social_content' => esc_html__('(+270) 555-0117', 'tscore'),
                    ],
                    [
                        'tg_social_text01' => esc_html__('Email:', 'tscore'),
                        'tg_social_content' => esc_html__('example@gmail.com', 'tscore'),
                    ],
                    [
                        'tg_social_text01' => esc_html__('Website:', 'tscore'),
                        'tg_social_content' => esc_html__('http://www.zoomit.com', 'tscore'),
                    ],
                    [
                        'tg_social_text01' => esc_html__('Address:', 'tscore'),
                        'tg_social_content' => esc_html__('4140 Parker Rd. Allentown, New Mexico 31134', 'tscore'),
                    ],    
                    [
                        'tg_social_text01' => esc_html__('Experience:', 'tscore'),
                        'tg_social_content' => esc_html__('20 Years', 'tscore'),
                    ],                                                        
                ],
                'title_field' => '{{{ tg_social_text01 }}}',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section1',
            [
                'label' => esc_html__('About', 'tscore'),               
            ]
        );

        $this->add_control(
            'tg_goal_sub_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Me', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_goal_description',
            [
                'label' => esc_html__('Content', 'tscore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Professional consultation services Site evaluation, load calculation, system recommendations, and detailed cost estimates  Rapid response, on-site an diagnostics, immediate repairs, and follow-up check Fast and efficient is for installation of new air conditioning units <br><br>Comprehensive system scan, fault detection, detailed report, and conditionin recommended solutions Precision calibration services to ensure your air for conditioning system is operating at its optimal settings for maximum comfort and efficiency', 'tscore'),
                'placeholder' => esc_html__('Type Content here', 'tscore'),
            ]
        );

        $this->end_controls_section();


       // tp_section_tab03
        $this->start_controls_section(
            'tp_section_tab03',
            [
                'label' => esc_html__('Skill', 'tscore'),                 
            ]
        );

        $this->add_control(
            'tg_social_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Personal Skills', 'tscore'),
                'placeholder' => esc_html__('Type Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_skill_description01',
            [
                'label' => esc_html__('Description', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Thorough cleaning services to remove dirt, dust, and debris from your air conditioning system, improving air quality and system efficiency.', 'tscore'),
                'placeholder' => esc_html__('Type section description here', 'tscore'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Name', 'tscore' ),
                'default' => esc_html__( 'Digital Marketing', 'tscore' ),
                'placeholder' => esc_html__( 'Type a skill name', 'tscore' ),
            ]
        );

        $repeater->add_control(
            'level',
            [
                'label' => esc_html__( 'Level (Out Of 100)', 'tscore' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                    'size' => 95
                ],
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'skills',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print((name || level.size) ? (name || "Skill") + " - " + level.size + level.unit : "Skill - 0%") #>',
                'default' => [
                    [
                        'name' => 'React Development',
                        'level' => ['size' => 75, 'unit' => '%']
                    ],
                    [
                        'name' => 'Front-End Development',
                        'level' => ['size' => 85, 'unit' => '%']
                    ],
                     [
                        'name' => 'Sql Database',
                        'level' => ['size' => 80, 'unit' => '%']
                    ],                   
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

        if ( !empty($settings['tg_image']['url']) ) {
            $tg_image_url = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        }

            $this->add_render_attribute('title_args', 'class', 'cs_fs_48 cs_semibold cs_mb_8');

		?>

        <section>
          <div class="cs_height_120 cs_height_lg_80"></div>
          <div class="cs_team_member_details">
            <div class="container">
              <div class="row align-items-center cs_gap_y_30">
                <div class="col-lg-6">
                  <div class="cs_team_member_thumb">
                    <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                <?php
                    if ( !empty($settings['tg_title']) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['tg_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            tp_kses( $settings['tg_title'] )
                            );
                    endif;
                ?>      
                <?php if (!empty($settings['tg_sub_title'])) : ?>                
                  <p class="cs_member_designation cs_accent_color cs_mb_30"><?php echo esc_html( $settings['tg_sub_title'] ); ?></p>
                  <?php endif; ?>
                  <div class="cs_social_btns cs_style_1 cs_type_1 cs_mb_35">
                    <?php foreach ($settings['tg_social_list'] as $item) : ?>  
                    <a href="<?php echo esc_url( $item['tg_social_url'] ); ?>" class="cs_social_btn cs_center">
                      <i class="fa-brands <?php echo esc_attr( $item['tg_social_text'] ); ?>"></i>
                    </a>
                    <?php endforeach; ?>
                  </div>
                  <?php if (!empty($settings['tg_description01'])) : ?>  
                  <p class="cs_mb_25"><?php echo tp_kses( $settings['tg_description01'] ) ?></p>
                  <?php endif; ?>
                  <ul class="cs_mp_0 cs_member_info_list">
                    <?php foreach ($settings['tg_social_list02'] as $item) : ?>
                    <li>
                      <span class="cs_fs_18 cs_medium cs_heading_font cs_heading_color"><?php echo esc_html( $item['tg_social_text01'] ); ?></span>
                      <span><?php echo esc_html( $item['tg_social_content'] ); ?></span>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <div class="cs_height_72 cs_height_lg_72"></div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="cs_pr_30">
                    <?php if (!empty($settings['tg_goal_sub_title'])) : ?>  
                    <h3 class="cs_fs_30 cs_semibold cs_mb_25"><?php echo esc_html( $settings['tg_goal_sub_title'] ); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['tg_goal_description'])) : ?>  
                    <p class="mb-0"><?php echo tp_kses( $settings['tg_goal_description'] ); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <h2 class="cs_fs_30 cs_semibold cs_mb_25"><?php echo esc_html( $settings['tg_social_title'] ); ?></h2>
                  <p class="cs_mb_24"><?php echo tp_kses( $settings['tg_skill_description01'] ); ?></p>
                  <ul class="cs_progress_list cs_mp_0">
                    <?php foreach ( $settings['skills'] as $index => $skill ) : ?>
                    <li>
                      <div class="cs_progress_head cs_fs_18 cs_heading_color cs_heading_font">
                        <span><?php echo esc_html( $skill['name'] ); ?></span>
                        <span><?php echo esc_attr( $skill['level']['size'] ); ?>%</span>
                      </div>
                      <div class="cs_progress" data-progress="<?php echo esc_attr( $skill['level']['size'] ); ?>">
                        <div class="cs_progress_in cs_accent_bg"></div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
         <div class="cs_height_120 cs_height_lg_80"></div>

		<?php
	}

}

$widgets_manager->register( new TG_Team_Details() );