<?php
class TpCasePost
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'case_template_include' ) );
	}

	public function case_template_include( $template ) {
		if ( is_singular( 'case' ) ) {
			return $this->get_template( 'single-case.php');
		}
		return $template;
	}

	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		}
		else {
			$file = TSCORE_ADDONS_DIR . '/include/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}


	public function register_custom_post_type() {
		// $medidove_mem_slug = get_theme_mod('medidove_mem_slug','member');
		$labels = array(
			'name'                  => esc_html_x( 'Case Study', 'Post Type General Name', 'tscore' ),
			'singular_name'         => esc_html_x( 'Case Study', 'Post Type Singular Name', 'tscore' ),
			'menu_name'             => esc_html__( 'Case Study', 'tscore' ),
			'name_admin_bar'        => esc_html__( 'Case Study', 'tscore' ),
			'archives'              => esc_html__( 'Item Archives', 'tscore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'tscore' ),
			'all_items'             => esc_html__( 'All Items', 'tscore' ),
			'add_new_item'          => esc_html__( 'Add New Case', 'tscore' ),
			'add_new'               => esc_html__( 'Add New', 'tscore' ),
			'new_item'              => esc_html__( 'New Item', 'tscore' ),
			'edit_item'             => esc_html__( 'Edit Item', 'tscore' ),
			'update_item'           => esc_html__( 'Update Item', 'tscore' ),
			'view_item'             => esc_html__( 'View Item', 'tscore' ),
			'search_items'          => esc_html__( 'Search Item', 'tscore' ),
			'not_found'             => esc_html__( 'Not found', 'tscore' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'tscore' ),
			'featured_image'        => esc_html__( 'Featured Image', 'tscore' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'tscore' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'tscore' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'tscore' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'tscore' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'tscore' ),
			'items_list'            => esc_html__( 'Items list', 'tscore' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'tscore' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'tscore' ),
		);

		$args   = array(
			'label'                 => esc_html__( 'Case Study', 'tscore' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-format-image',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'case', $args );
	}

	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Case Categories', 'Taxonomy General Name', 'tscore' ),
			'singular_name'              => esc_html_x( 'Case Categories', 'Taxonomy Singular Name', 'tscore' ),
			'menu_name'                  => esc_html__( 'Case Categories', 'tscore' ),
			'all_items'                  => esc_html__( 'All Case Category', 'tscore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'tscore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'tscore' ),
			'new_item_name'              => esc_html__( 'New Case Category Name', 'tscore' ),
			'add_new_item'               => esc_html__( 'Add New Case Category', 'tscore' ),
			'edit_item'                  => esc_html__( 'Edit Case Category', 'tscore' ),
			'update_item'                => esc_html__( 'Update Case Category', 'tscore' ),
			'view_item'                  => esc_html__( 'View Case Category', 'tscore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'tscore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'tscore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'tscore' ),
			'popular_items'              => esc_html__( 'Popular Case Category', 'tscore' ),
			'search_items'               => esc_html__( 'Search Case Category', 'tscore' ),
			'not_found'                  => esc_html__( 'Not Found', 'tscore' ),
			'no_terms'                   => esc_html__( 'No Case Category', 'tscore' ),
			'items_list'                 => esc_html__( 'Case Category list', 'tscore' ),
			'items_list_navigation'      => esc_html__( 'Case Category list navigation', 'tscore' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy('case-cat','case', $args );
	}

}

new TpCasePost();