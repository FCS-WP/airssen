<?php
namespace TSCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Blog_Post extends Widget_Base {

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
		return 'blogpost';
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
		return __( 'Blog Post', 'tscore' );
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
                'default' => esc_html__('Our news updates', 'tscore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tscore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tscore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Latest Articles & News from <br>The Blogs', 'tscore'),
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


        // Blog Query
		$this->start_controls_section(
            'tp_post_query',
            [
                'label' => esc_html__('Blog Query', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_social_share_show',
            [
                'label' => esc_html__( 'Social Share Show', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tscore' ),
                'label_off' => esc_html__( 'Hide', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $post_type = 'post';
        $taxonomy = 'category';

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'tscore'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'tscore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '3',
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Include Categories', 'tscore'),
                'description' => esc_html__('Select a category to include or leave blank for all.', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tp_get_categories($taxonomy),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Categories', 'tscore'),
                'description' => esc_html__('Select a category to exclude', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tp_get_categories($taxonomy),
                'label_block' => true
            ]
        );

        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude Item', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'options' => tp_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'tscore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
			        'ID' => 'Post ID',
			        'author' => 'Post Author',
			        'title' => 'Title',
			        'date' => 'Date',
			        'modified' => 'Last Modified Date',
			        'parent' => 'Parent Id',
			        'rand' => 'Random',
			        'comment_count' => 'Comment Count',
			        'menu_order' => 'Menu Order',
			    ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'tscore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'tscore' ),
                    'desc' 	=> esc_html__( 'Descending', 'tscore' )
                ],
                'default' => 'desc',

            ]
        );

        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__( 'Ignore Sticky Posts', 'tscore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tscore' ),
                'label_off' => esc_html__( 'No', 'tscore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tp_blog_title_word',
            [
                'label' => esc_html__('Title Word Count', 'tscore'),
                'description' => esc_html__('Set how many word you want to displa!', 'tscore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '12',
            ]
        );

        $this->add_control(
            'tp_post_content',
            [
                'label' => __('Content', 'tscore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'tscore'),
                'label_off' => __('Hide', 'tscore'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'tp_post_content_limit',
            [
                'label' => __('Content Limit', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '10',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'tp_post_content' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                // 'default' => 'tp-post-thumb',
            ]
        );

        $this->end_controls_section();

      // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tscore'),
            ]
        );

        $this->add_control(
            'tg_btn_button_show',
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
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'tscore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('VIEW  all post', 'tscore'),
                'title' => esc_html__('Enter button text', 'tscore'),
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
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
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link',
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
                    'tg_btn_link_type' => '1',
                    'tg_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tscore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'tg_btn_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section01',
            [
                'label' => esc_html__('Footer Image', 'tscore'),                 
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

        // style control
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

            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } else if (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            // include_categories
            $category_list = '';
            if (!empty($settings['category'])) {
                $category_list = implode(", ", $settings['category']);
            }
            $category_list_value = explode(" ", $category_list);

            // exclude_categories
            $exclude_categories = '';
            if(!empty($settings['exclude_category'])){
                $exclude_categories = implode(", ", $settings['exclude_category']);
            }
            $exclude_category_list_value = explode(" ", $exclude_categories);

            $post__not_in = '';
            if (!empty($settings['post__not_in'])) {
                $post__not_in = $settings['post__not_in'];
                $args['post__not_in'] = $post__not_in;
            }
            $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
            $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
            $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
            $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';
            $ignore_sticky_posts = (! empty( $settings['ignore_sticky_posts'] ) && 'yes' == $settings['ignore_sticky_posts']) ? true : false ;


            // number
            $off = (!empty($offset_value)) ? $offset_value : 0;
            $offset = $off + (($paged - 1) * $posts_per_page);
            $p_ids = array();

            // build up the array
            if (!empty($settings['post__not_in'])) {
                foreach ($settings['post__not_in'] as $p_idsn) {
                    $p_ids[] = $p_idsn;
                }
            }

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'offset' => $offset,
                'paged' => $paged,
                'post__not_in' => $p_ids,
                'ignore_sticky_posts' => $ignore_sticky_posts
            );

            // exclude_categories
            if ( !empty($settings['exclude_category'])) {

                // Exclude the correct cats from tax_query
                $args['tax_query'] = array(
                    array(
                        'taxonomy'	=> 'category',
                        'field'	 	=> 'slug',
                        'terms'		=> $exclude_category_list_value,
                        'operator'	=> 'NOT IN'
                    )
                );

                // Include the correct cats in tax_query
                if ( !empty($settings['category'])) {
                    $args['tax_query']['relation'] = 'AND';
                    $args['tax_query'][] = array(
                        'taxonomy'	=> 'category',
                        'field'		=> 'slug',
                        'terms'		=> $category_list_value,
                        'operator'	=> 'IN'
                    );
                }

            } else {
                // Include the cats from $cat_slugs in tax_query
                if (!empty($settings['category'])) {
                    $args['tax_query'][] = [
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $category_list_value,
                    ];
                }
            }

            $filter_list = $settings['category'];

            // The Query
            $query = new \WP_Query($args);
        ?>

        <?php if ( $settings['tp_design_style']  == 'layout-2' ):
         $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0'); 
         ?>

        <?php if ($query->have_posts()) : ?>
        <section>
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                <div class="cs_section_heading cs_style_1 text-center">
                    <?php if( !empty($settings['tg_sub_title']) ) : ?>
                  <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'shpae', 'tscore' );?>" class="cs_section_subheading_icon">
                    <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                  </h3>
                  <?php endif; ?>
                    <?php
                        if ( !empty($settings['tg_title' ]) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title' ] )
                            );
                        endif;
                    ?>                  
                </div>
                <div class="cs_height_45 cs_height_lg_45"></div>
                <?php endif; ?>
                <div class="row cs_gap_y_30">
                <?php $counter = 1; while ($query->have_posts()) :
                    $query->the_post();
                    global $post;
                    $categories = get_the_category($post->ID);
                ?>
                  <div class="col-lg-4">
                    <div class="cs_post cs_style_3">
                      <div class="cs_post_thumb_out">
                        <div class="cs_post_thumb_wrap">
                          <a href="<?php the_permalink(); ?>" class="cs_post_thumb"><?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?></a>
                        </div>
                        <span class="cs_posted_by cs_fs_24 cs_semibold cs_heading_color cs_heading_font">
                          <i class="fa-regular fa-calendar-alt"></i> <?php the_time( 'M' ); ?> <?php the_time( 'j' ); ?>, <?php the_time( 'Y' ); ?>
                        </span>
                      </div>
                      <div class="cs_post_info">
                        <div class="cs_post_meta cs_mb_14">
                          <div class="cs_post_admin cs_post_admin_img2">
                            <?php echo get_avatar(get_the_author_meta('ID'), 50) ?>
                            <div class="cs_post_admin_right">
                                <span><?php print esc_html__( 'Post', 'tscore' );?></span><br> <?php print get_the_author();?>
                            </div>
                          </div>
                          <span class="cs_post_comment"><i class="fa-regular fa-comments"></i><?php comments_number();?></span>
                        </div>
                        <h2 class="cs_fs_24 cs_semibold cs_mb_15">
                          <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a>
                        </h2>
                        <?php if (!empty($settings['tp_post_content'])):
                            $tp_post_content_limit = (!empty($settings['tp_post_content_limit'])) ? $settings['tp_post_content_limit'] : '';
                        ?>
                        <p class="cs_mb_21"><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $tp_post_content_limit, ''); ?></p>
                        <?php endif; ?>
                        <hr>
                        <a href="<?php the_permalink(); ?>" class="cs_text_btn cs_fs_16 text-uppercase cs_heading_color cs_bold">
                          <?php print esc_html__( 'READ MORE', 'tscore' );?>
                          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.28125 1.21875L13.7812 6.46875C13.9271 6.61458 14 6.79167 14 7C14 7.20833 13.9271 7.38542 13.7812 7.53125L8.28125 12.7812C7.90625 13.0729 7.55208 13.0729 7.21875 12.7812C6.92708 12.4062 6.92708 12.0521 7.21875 11.7188L11.375 7.75H0.75C0.291667 7.70833 0.0416667 7.45833 0 7C0.0416667 6.54167 0.291667 6.29167 0.75 6.25H11.375L7.21875 2.28125C6.92708 1.94792 6.92708 1.59375 7.21875 1.21875C7.55208 0.927083 7.90625 0.927083 8.28125 1.21875Z" fill="currentColor"></path>
                          </svg>                    
                        </a>
                      </div>
                    </div>
                  </div>
                   <?php endwhile; wp_reset_query(); ?>

                </div>
              </div>
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php endif; ?>


        <?php else:
        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_fs_48 cs_semibold mb-0'); 
            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

         ?>
        
        
        <?php if ($query->have_posts()) : ?>

        <section class="cs_blog_section_wrap">
              <div class="cs_height_115 cs_height_lg_70"></div>
              <div class="container">
                 <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                <div class="cs_section_heading cs_style_1 text-center">
                    <?php if( !empty($settings['tg_sub_title']) ) : ?>
                  <h3 class="cs_section_subtitle cs_accent_color text-uppercase cs_medium cs_fs_20 cs_mb_10 wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fan.svg" alt="<?php print esc_attr__( 'shpae', 'tscore' );?>" class="cs_section_subheading_icon">
                    <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                  </h3>
                  <?php endif; ?>
                    <?php
                        if ( !empty($settings['tg_title' ]) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title' ] )
                            );
                        endif;
                    ?>                    
                </div>
                <div class="cs_height_45 cs_height_lg_45"></div>
                <?php endif; ?>
                <div class="row cs_gap_y_30">

                <?php $counter = 1; while ($query->have_posts()) :
                    $query->the_post();
                    global $post;
                    $categories = get_the_category($post->ID);
                ?>

                <?php if ($counter == 2 ) : ?>

                  <div class="col-lg-6">
                    <div class="cs_post cs_style_2">
                      <a href="<?php the_permalink(); ?>" class="cs_post_thumb"><?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?></a>
                      <div class="cs_post_info">
                        <div class="cs_post_info_in">
                          <div class="cs_post_meta cs_mb_13">
                            <span class="cs_posted_by cs_center"><?php the_time( 'M' ); ?><br><?php the_time( 'j' ); ?></span>
                            <span class="cs_post_admin"><i class="fa-regular fa-user"></i><?php print esc_html__( 'By', 'tscore' );?> <?php print get_the_author();?></span>
                            <span class="cs_post_comment"><i class="fa-regular fa-comments"></i><?php comments_number();?></span>
                          </div>
                          <h2 class="cs_fs_24 cs_semibold cs_mb_10 cs_white_color">
                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a>
                          </h2>
                          <a href="<?php the_permalink(); ?>" class="cs_text_btn cs_fs_16 text-uppercase cs_heading_color cs_bold">
                            <?php print esc_html__( 'READ MORE', 'tscore' );?>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.28125 1.21875L13.7812 6.46875C13.9271 6.61458 14 6.79167 14 7C14 7.20833 13.9271 7.38542 13.7812 7.53125L8.28125 12.7812C7.90625 13.0729 7.55208 13.0729 7.21875 12.7812C6.92708 12.4062 6.92708 12.0521 7.21875 11.7188L11.375 7.75H0.75C0.291667 7.70833 0.0416667 7.45833 0 7C0.0416667 6.54167 0.291667 6.29167 0.75 6.25H11.375L7.21875 2.28125C6.92708 1.94792 6.92708 1.59375 7.21875 1.21875C7.55208 0.927083 7.90625 0.927083 8.28125 1.21875Z" fill="currentColor"></path>
                            </svg>                    
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php else : ?>

                  <div class="col-lg-3">
                    <div class="cs_post cs_style_1">
                      <div class="cs_post_meta cs_mb_13">
                        <span class="cs_posted_by cs_center"><?php the_time( 'M' ); ?><br><?php the_time( 'j' ); ?></span>
                        <span class="cs_post_comment"><i class="fa-regular fa-comments"></i><?php comments_number();?></span>
                      </div>
                      <h2 class="cs_fs_24 cs_semibold cs_mb_10">
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a>
                      </h2>
                      <a href="<?php the_permalink(); ?>" class="cs_post_thumb"><?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?></a>
                      <a href="<?php the_permalink(); ?>" class="cs_text_btn cs_fs_16 text-uppercase cs_heading_color cs_bold">
                        <?php print esc_html__( 'READ MORE', 'tscore' );?>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8.28125 1.21875L13.7812 6.46875C13.9271 6.61458 14 6.79167 14 7C14 7.20833 13.9271 7.38542 13.7812 7.53125L8.28125 12.7812C7.90625 13.0729 7.55208 13.0729 7.21875 12.7812C6.92708 12.4062 6.92708 12.0521 7.21875 11.7188L11.375 7.75H0.75C0.291667 7.70833 0.0416667 7.45833 0 7C0.0416667 6.54167 0.291667 6.29167 0.75 6.25H11.375L7.21875 2.28125C6.92708 1.94792 6.92708 1.59375 7.21875 1.21875C7.55208 0.927083 7.90625 0.927083 8.28125 1.21875Z" fill="currentColor"></path>
                        </svg>                    
                      </a>
                    </div>
                  </div>

                  <?php endif; ?>

                <?php $counter++; endwhile; wp_reset_query(); ?>

                </div>
              </div>
              <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>" class="cs_blog_section_img wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
              <div class="cs_height_120 cs_height_lg_80"></div>
            </section>

        <?php endif; ?>


        <?php endif; ?>


       <?php
	}

}

$widgets_manager->register( new TP_Blog_Post() );