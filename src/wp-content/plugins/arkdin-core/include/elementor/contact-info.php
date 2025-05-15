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
class TG_Contact_Info extends Widget_Base {

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
		return 'contact-info';
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
		return __( 'Contact Info', 'tscore' );
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


    protected static function get_profile_names()
    {
        return [
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


        // Contact Map group
        $this->start_controls_section(
            '_TG_contact_title1',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Contact Information', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_subtitle',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Our QuickCool Installation service provides fast and efficient installation of new air conditioning units. Our certified technicians will ensure your system is air an  installed correctly and safely,', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Case Box group
        $this->start_controls_section(
            'tg_case_box1',
            [
                'label' => esc_html__('Contact Info List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Image', 'tscore' ),
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
            'tg_repeater_title', [
                'label' => esc_html__('Our Address', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('New Territories', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_repeater_desc', [
                'label' => esc_html__('Description', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => tp_kses('6391 Elgin St. Celina, <br>Delaware 10299', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_repeater_list',
            [
                'label' => esc_html__('Lists', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_repeater_title' => esc_html__('Our Address', 'tpcore'),
                        'tg_repeater_desc' => tp_kses('6391 Elgin St. Celina, <br>Delaware 10299', 'tpcore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Phone Number', 'tpcore'),
                        'tg_repeater_desc' => tp_kses('+(163)-5565-0697 <br>(+578) 587 89168', 'tpcore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Email Address', 'tpcore'),
                        'tg_repeater_desc' => tp_kses('info@gmail.com <br>demo@gmail.com', 'tpcore'),
                    ],
                    [
                        'tg_repeater_title' => esc_html__('Working Time:', 'tpcore'),
                        'tg_repeater_desc' => tp_kses('Work Time: Sun - Fri <br>10AM - 6PM', 'tpcore'),
                    ],                                         
                ],
            ]
        );

        $this->end_controls_section();

        // _banner_social
        $this->start_controls_section(
            '_tg_social_section',
            [
                'label' => esc_html__('Social Section', 'tpcore'),              
            ]
        );

        $this->add_control(
            'tg_title1',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Follow The Social Media:', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'tg_sub_title2',
            [
                'label' => esc_html__('Sub Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Ensure your AC system is ready for the hottest days with our Comfort Check Tune-Up', 'tscore'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_social_text',
            [
                'label' => esc_html__('Social Name', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('fa-linkedin-in', 'tpcore'),
                'placeholder' => esc_html__('Type: fa-linkedin-in', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_social_url',
            [
                'label' => esc_html__('Social Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type social link', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list',
            [
                'label' => esc_html__('Social List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_social_text' => esc_html__('fa-linkedin-in', 'tpcore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('fa-twitter', 'tpcore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('fa-youtube', 'tpcore'),
                    ], 
                    [
                        'tg_social_text' => esc_html__('fa-facebook-f', 'tpcore'),
                    ],                                      
                ],
                'title_field' => '{{{ tg_social_text }}}',
            ]
        );

        $this->end_controls_section();

        // Contact Form group
        $this->start_controls_section(
            '_TG_contact_form',
            [
                'label' => esc_html__('Contact Form', 'tscore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_Paly_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Book An Appointment', 'tscore'),
                'placeholder' => esc_html__('Type Heading Text', 'tscore'),
                'label_block' => true,
            ]
        );


        $this->add_control(
        'contact_shortCode',
            [
                'label' => __( 'Contact Short Code', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('[Add your short code]', 'tscore'),
                'label_block' => true,
                'default' => __('','tscore'),
            ]
        );

        $this->end_controls_section();



        // Contact Map group
        $this->start_controls_section(
            '_TG_contact_map',
            [
                'label' => esc_html__('Contact Map', 'tscore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
        'contact_map',
            [
                'label' => __( 'Contact Map Iframe', 'tscore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Add Map Iframe', 'tscore'),
                'label_block' => true,
                'default' => __('','tscore'),
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

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'tocore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

            if ( !empty($settings['tg_bg']['url']) ) {
                $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
                $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
            }        
		?>

    <!-- Start Contact Section -->
    <section>
      <div class="cs_height_120 cs_height_lg_80"></div>
      <div class="container">
        <div class="row cs_gap_y_50">
          <div class="col-xxl-6 col-lg-7">
            <?php if(!empty( $settings['tg_title'] )) : ?>
            <h2 class="cs_fs_48 cs_semibold cs_mb_22"><?php echo tp_kses( $settings['tg_title'] ) ?></h2>
            <?php endif; ?>
            <?php if(!empty( $settings['tg_subtitle'] )) : ?>
            <p class="cs_mb_30"><?php echo tp_kses( $settings['tg_subtitle'] ) ?></p>
            <?php endif; ?>
            <div class="row cs_gap_y_30 cs_row_gap_30">
                <?php foreach( $settings['tg_repeater_list'] as $item ) :

                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }

                 ?>
              <div class="col-xl-6">
                <div class="cs_iconbox cs_style_3">
                  <div class="cs_iconbox_icon cs_center">
                    <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                  </div>
                  <div class="cs_iconbox_right">
                    <h3 class="cs_fs_20 cs_medium cs_mb_5"><?php echo tp_kses( $item['tg_repeater_title'] ) ?></h3>
                    <p class="mb-0"><?php echo tp_kses( $item['tg_repeater_desc'] ) ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
            <div class="cs_height_35 cs_height_lg_35"></div>

            <?php if(!empty( $settings['tg_title1'] )) : ?>
                <h3 class="cs_fs_24 cs_semibold cs_mb_10"><?php echo tp_kses( $settings['tg_title1'] ) ?></h3>
            <?php endif; ?>
            <?php if(!empty( $settings['tg_sub_title2'] )) : ?>
               <p class="cs_mb_20"><?php echo tp_kses( $settings['tg_sub_title2'] ) ?></p>
            <?php endif; ?>
            <div class="cs_social_btns cs_style_1 cs_type_1">
                <?php foreach ($settings['tg_social_list'] as $item) : ?>
              <a href="<?php echo esc_url( $item['tg_social_url'] ); ?>" class="cs_social_btn cs_center">
                <i class="fa-brands <?php echo esc_html( $item['tg_social_text'] ); ?>"></i>
              </a>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-xxl-5 offset-xxl-1 col-lg-5">
            <?php if(!empty( $settings['contact_shortCode'] )) : ?>
            <div action="#" class="cs_contact_form">
              <h2 class="text-center cs_fs_36 cs_semibold"><?php echo tp_kses( $settings['tg_Paly_title'] ) ?></h2>
                <?php echo do_shortcode( $settings['contact_shortCode'] ) ?>
            </div>
            <?php endif; ?>
          </div>

        </div>
      </div>
      <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Contact Section -->
    <!-- Start Map Section -->
    <?php if(!empty( $settings['contact_map'] )) : ?>
    <div class="cs_map">
      <?php echo tp_kses( $settings['contact_map'] ) ?>
    </div>
    <?php endif; ?>
    <!-- End Map Section -->


    <?php
	}
}

$widgets_manager->register( new TG_Contact_Info() );