<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Zivan Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Pricing extends Widget_Base {

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
		return 'tp-pricing';
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
		return __( 'Pricing', 'tscore' );
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

        // Header
        $this->start_controls_section(
            '_section_header',
            [
                'label' => __('Header', 'tscore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label' => __('Package Name', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Standard', 'tscore'),
                'dynamic' => [
                    'active' => true
                ],
            ]
        );

        $this->end_controls_section();

        // Price
        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => __('Pricing', 'tscore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __('Currency', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => __('None', 'tscore'),
                    'baht' => '&#3647; ' . _x('Baht', 'Currency Symbol', 'tscore'),
                    'bdt' => '&#2547; ' . _x('BD Taka', 'Currency Symbol', 'tscore'),
                    'dollar' => '&#36; ' . _x('Dollar', 'Currency Symbol', 'tscore'),
                    'euro' => '&#128; ' . _x('Euro', 'Currency Symbol', 'tscore'),
                    'franc' => '&#8355; ' . _x('Franc', 'Currency Symbol', 'tscore'),
                    'guilder' => '&fnof; ' . _x('Guilder', 'Currency Symbol', 'tscore'),
                    'krona' => 'kr ' . _x('Krona', 'Currency Symbol', 'tscore'),
                    'lira' => '&#8356; ' . _x('Lira', 'Currency Symbol', 'tscore'),
                    'peseta' => '&#8359 ' . _x('Peseta', 'Currency Symbol', 'tscore'),
                    'peso' => '&#8369; ' . _x('Peso', 'Currency Symbol', 'tscore'),
                    'pound' => '&#163; ' . _x('Pound Sterling', 'Currency Symbol', 'tscore'),
                    'real' => 'R$ ' . _x('Real', 'Currency Symbol', 'tscore'),
                    'ruble' => '&#8381; ' . _x('Ruble', 'Currency Symbol', 'tscore'),
                    'rupee' => '&#8360; ' . _x('Rupee', 'Currency Symbol', 'tscore'),
                    'indian_rupee' => '&#8377; ' . _x('Rupee (Indian)', 'Currency Symbol', 'tscore'),
                    'shekel' => '&#8362; ' . _x('Shekel', 'Currency Symbol', 'tscore'),
                    'won' => '&#8361; ' . _x('Won', 'Currency Symbol', 'tscore'),
                    'yen' => '&#165; ' . _x('Yen/Yuan', 'Currency Symbol', 'tscore'),
                    'custom' => __('Custom', 'tscore'),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => __('Custom Symbol', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Price', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => '150',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'package_duration',
            [
                'label' => __('Duration', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Monthly', 'tscore'),
                'dynamic' => [
                    'active' => true
                ],
            ]
        );

        
        $this->end_controls_section();

        // Pricing List
        $this->start_controls_section(
            '_section_price_list',
            [
                'label' => __('Pricing List', 'tscore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_item',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('List Item', 'tscore'),
                'default' => __('Refrigerant leak detection & repair', 'tscore'),
				'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'list_items',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_item' => esc_html__('Refrigerant leak detection & repair', 'tscore'),
                    ],
                    [
                        'list_item' => esc_html__('Thermostat replacement', 'tscore'),
                    ],
                    [
                        'list_item' => esc_html__('Clean condenser coil', 'tscore'),
                    ],
                    [
                        'list_item' => esc_html__('Air filter replacement', 'tscore'),
                    ],
                    [
                        'list_item' => esc_html__('Clean condenser coil', 'tscore'),
                    ],  
                    [
                        'list_item' => esc_html__('AC fan replacement', 'tscore'),
                    ],                                      
                ],
                'title_field' => '{{ list_item }}',
            ]
        );

        $this->end_controls_section();

        // tp_btn_button_group
        $this->start_controls_section(
            'tp_btn_button_group',
            [
                'label' => esc_html__('Button', 'tscore'),
            ]
        );

        $this->add_control(
            'tp_btn_button_show',
            [
                'label' => esc_html__( 'Show Button', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tscore' ),
                'label_off' => esc_html__( 'Hide', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tp_btn_text',
            [
                'label' => esc_html__('Button Text', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Choose Plan', 'tscore'),
                'title' => esc_html__('Enter button text', 'tscore'),
                'label_block' => true,
                'condition' => [
                    'tp_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tp_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tp_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tp_btn_link',
            [
                'label' => esc_html__('Button link', 'tscore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'tscore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tp_btn_link_type' => '1',
                    'tp_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tp_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tp_btn_link_type' => '2',
                    'tp_btn_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

	}

    private static function get_currency_symbol($symbol_name)
    {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset($symbols[$symbol_name]) ? $symbols[$symbol_name] : '';
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

            // Link
            if ('2' == $settings['tp_btn_link_type']) {
                $this->add_render_attribute('tp-button-arg', 'href', get_permalink($settings['tp_btn_page_link']));
                $this->add_render_attribute('tp-button-arg', 'target', '_self');
                $this->add_render_attribute('tp-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tp-button-arg', 'class', 'cs_btn cs_style_1 cs_type_1');
            } else {
                if ( ! empty( $settings['tp_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tp-button-arg', $settings['tp_btn_link'] );
                    $this->add_render_attribute('tp-button-arg', 'class', 'cs_btn cs_style_1 cs_type_1');
                }
            }

	        if ($settings['currency'] === 'custom') {
	            $currency = $settings['currency_custom'];
	        } else {
	            $currency = self::get_currency_symbol($settings['currency']);
	        }

		?>

          <div class="cs_pricing_plan cs_style_1">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shapes/price_shape.svg" alt="<?php print esc_attr__( 'icon', 'tscore' );?>" class="cs_pricing_shape">
            <div class="cs_pricing_plan_head">
              <div class="cs_price">
                <div class="cs_price_in">
                  <h3 class="cs_fs_36 cs_white_color cs_semibold"><span><?php echo esc_html($currency); ?></span><?php echo tp_kses($settings['price']); ?></h3>
                  <p class="cs_fs_18 cs_medium cs_white_color"><?php echo tp_kses($settings['package_duration']); ?></p>
                </div>
                <svg width="120" height="94" viewBox="0 0 120 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 0H110L120 15H0L10 0Z" fill="#010F34"/>
                  <path d="M13 0H106V79L59.5 94L13 79V0Z" fill="#FF5500"/>
                </svg>       
              </div>
              <?php if ( !empty( $settings['main_title'] ) ) : ?>
              <h2 class="cs_pricing_plan_heading mb-0 cs_fs_20 cs_medium"><?php echo tp_kses( $settings['main_title'] ); ?></h2>
            </div>
            <?php endif; ?>
            <ul class="cs_pricing_features cs_mp_0 cs_heading_color">
             <?php foreach( $settings['list_items'] as $item ) : ?>   
              <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/tick.svg" alt="<?php print esc_attr__( 'icon', 'tscore' );?>"><?php echo esc_html( $item['list_item'] ); ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if (!empty($settings['tp_btn_button_show'])) : ?>
            <a <?php echo $this->get_render_attribute_string( 'tp-button-arg' ); ?> >
              <span><?php echo esc_html( $settings['tp_btn_text'] ) ?></span>              
            </a>
            <?php endif; ?>
          </div>

    <?php
	}

}

$widgets_manager->register( new TP_Pricing() );