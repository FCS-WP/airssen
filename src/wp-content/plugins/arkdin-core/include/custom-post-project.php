<?php 
class TpProjectPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'portfolio_template_include' ) );
	}
	
	public function portfolio_template_include( $template ) {
		if ( is_singular( 'project' ) ) {
			return $this->get_template( 'single-project.php');
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
			'name'                  => esc_html_x( 'Projects', 'Post Type General Name', 'tscore' ),
			'singular_name'         => esc_html_x( 'Project', 'Post Type Singular Name', 'tscore' ),
			'menu_name'             => esc_html__( 'Projects', 'tscore' ),
			'name_admin_bar'        => esc_html__( 'Project', 'tscore' ),
			'archives'              => esc_html__( 'Item Archives', 'tscore' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'tscore' ),
			'all_items'             => esc_html__( 'All Items', 'tscore' ),
			'add_new_item'          => esc_html__( 'Add New Project', 'tscore' ),
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
			'label'                 => esc_html__( 'Project', 'tscore' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'project', $args );
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Project Categories', 'Taxonomy General Name', 'tscore' ),
			'singular_name'              => esc_html_x( 'Project Categories', 'Taxonomy Singular Name', 'tscore' ),
			'menu_name'                  => esc_html__( 'Project Categories', 'tscore' ),
			'all_items'                  => esc_html__( 'All Project Category', 'tscore' ),
			'parent_item'                => esc_html__( 'Parent Item', 'tscore' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'tscore' ),
			'new_item_name'              => esc_html__( 'New Project Category Name', 'tscore' ),
			'add_new_item'               => esc_html__( 'Add New Project Category', 'tscore' ),
			'edit_item'                  => esc_html__( 'Edit Project Category', 'tscore' ),
			'update_item'                => esc_html__( 'Update Project Category', 'tscore' ),
			'view_item'                  => esc_html__( 'View Project Category', 'tscore' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'tscore' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'tscore' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'tscore' ),
			'popular_items'              => esc_html__( 'Popular Project Category', 'tscore' ),
			'search_items'               => esc_html__( 'Search Project Category', 'tscore' ),
			'not_found'                  => esc_html__( 'Not Found', 'tscore' ),
			'no_terms'                   => esc_html__( 'No Project Category', 'tscore' ),
			'items_list'                 => esc_html__( 'Project Category list', 'tscore' ),
			'items_list_navigation'      => esc_html__( 'Project Category list navigation', 'tscore' ),
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

		register_taxonomy('project-cat','project', $args );
	}

}

new TpProjectPost();