<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dasun.ediris.in/ghe
 * @since      1.0.0
 *
 * @package    Giantb_Press
 * @subpackage Giantb_Press/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Giantb_Press
 * @subpackage Giantb_Press/admin
 * @author     Dasun Edirisinghe <dazunj4me@gmail.com>
 */
class Giantb_Press_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	* This is to load api connector
	*
	* @since 1.0.0
	* @access protected
	* @var Object  The api return objects
	*/

	protected $api_loader;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_admin_dependecies();

	}

	/**
	* Load dependencies
	*/

	private function load_admin_dependecies(){

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-giantb-press-api.php';

			$this->api_loader = new Giantb_Press_Api('4b8c6b8c6e5f7595ee18949b31ca8eaa3110b8d1');
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Giantb_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Giantb_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/giantb-press-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Giantb_Press_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Giantb_Press_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/giantb-press-admin.js', array( 'jquery' ), $this->version, false );

	}


    public function giant_bomb_post_types() {

		$labels = array(
			'name'                  => _x( 'Games', 'Post Type General Name', 'giantb-press' ),
			'singular_name'         => _x( 'Game', 'Post Type Singular Name', 'giantb-press' ),
			'menu_name'             => __( 'Game', 'giantb-press' ),
			'name_admin_bar'        => __( 'Game', 'giantb-press' ),
			'archives'              => __( 'Game Archives', 'giantb-press' ),
			'attributes'            => __( 'Game Attributes', 'giantb-press' ),
			'parent_item_colon'     => __( 'Game Item:', 'giantb-press' ),
			'all_items'             => __( 'All Games', 'giantb-press' ),
			'add_new_item'          => __( 'Add New Game', 'giantb-press' ),
			'add_new'               => __( 'Add New', 'giantb-press' ),
			'new_item'              => __( 'New Game', 'giantb-press' ),
			'edit_item'             => __( 'Edit Game', 'giantb-press' ),
			'update_item'           => __( 'Update Game', 'giantb-press' ),
			'view_item'             => __( 'View Game', 'giantb-press' ),
			'view_items'            => __( 'View Games', 'giantb-press' ),
			'search_items'          => __( 'Search Game', 'giantb-press' ),
			'not_found'             => __( 'Not found', 'giantb-press' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'giantb-press' ),
			'featured_image'        => __( 'Game Image', 'giantb-press' ),
			'set_featured_image'    => __( 'Set game image', 'giantb-press' ),
			'remove_featured_image' => __( 'Remove game image', 'giantb-press' ),
			'use_featured_image'    => __( 'Use as game image', 'giantb-press' ),
			'insert_into_item'      => __( 'Insert into game', 'giantb-press' ),
			'uploaded_to_this_item' => __( 'Uploaded to this game', 'giantb-press' ),
			'items_list'            => __( 'Games list', 'giantb-press' ),
			'items_list_navigation' => __( 'Games list navigation', 'giantb-press' ),
			'filter_items_list'     => __( 'Filter games list', 'giantb-press' ),
		);
		$rewrite = array(
			'slug'                  => 'games-data',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Game', 'giantb-press' ),
			'description'           => __( 'This is to store game data', 'giantb-press' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-album',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rest_controller_class' => 'WP_REST_Games_Controller',
		);
		register_post_type( 'gbp_games', $args );

	}


	

	public function giant_bomb_api_connection() {

    $game_data = $this->api_loader->games(10,10);

	}

	public function giant_bomb_game_meta_data( $meta_boxes ){
		
		$fields = array(
		array(
			'id'     => 'gaintb-expected_relese_data',
			'name'   => __('Game Update / Added Details','giantb-press'),
			'type'   => 'group',
			'fields' => array(
					array( 
						'id' 	=> 'giantb-date_added',
						'name' 	=> __('Added Date','giantb-press'),
						'type' 	=> 'date',
						'cols'	=> 6 
					),
					array( 
						'id' 	=> 'giantb-date_last_updated',
						'name' 	=> __('Last updated date','giantb-press'), 
						'type' 	=> 'date', 
						'cols'	=> 6 
					),
					array( 
						'id' => 'gaintb-dec',  
						'name' => __('Dec','giantb-press'), 
						'type' => 'wysiwyg', 
						'options' => array( 'editor_height' => '100' ), 
					),
				)
			),
			array(
				'id'     => 'gaintb-expected_relese_data',
				'name'   => __('Expected Release Infromation','giantb-press'),
				'type'   => 'group',
				'fields' => array(
					array( 
						'id' => 'giantb-expected_release_month',  
						'name' => __('Month','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-expected_release_quarter',  
						'name' => __('Quater', 'giantb-press' ), 
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-expected_release_year',  
						'name' => __('Year','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
				),
			),
			array(
				'id'     => 'gaintb-expected_other_data',
				'name'   => __('Other Data','giantb-press'),
				'type'   => 'group',
				'fields' => array(
					array( 
						'id' => 'giantb-franchises',  
						'name' => __('Franchises','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-genres',  
						'name' => __('Genres', 'giantb-press' ), 
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-publishers',  
						'name' => __('Publishers','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-platforms',  
						'name' => __('Platforms','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-developers',  
						'name' => __('Developers', 'giantb-press' ), 
						'type' => 'text',
						'cols' => 4,
						),
					array( 
						'id' => 'giantb-themes',  
						'name' => __('Themes','giantb-press' ),  
						'type' => 'text',
						'cols' => 4,
						),
				),
			),
			array( 'id' => 'field-2', 'name' => 'Read-only text input field', 'type' => 'text', 'readonly' => true, 'default' => 'READ ONLY' ),
			array( 'id' => 'field-3', 'name' => 'Repeatable text input field', 'type' => 'text', 'desc' => 'Add up to 5 fields.', 'repeatable' => true, 'repeatable_max' => 5, 'sortable' => true ),
			array( 'id' => 'field-4',  'name' => 'Small text input field', 'type' => 'text_small' ),
			array( 'id' => 'field-5',  'name' => 'URL field', 'type' => 'url' ),
			array( 'id' => 'field-6',  'name' => 'Radio input field', 'type' => 'radio', 'options' => array( 'Option 1', 'Option 2' ) ),
			array( 'id' => 'field-7',  'name' => 'Checkbox field', 'type' => 'checkbox' ),
			array( 'id' => 'field-8',  'name' => 'WYSIWYG field', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'repeatable' => true, 'sortable' => true ),
			array( 'id' => 'field-9',  'name' => 'Textarea field', 'type' => 'textarea' ),
			array( 'id' => 'field-10',  'name' => 'Code textarea field', 'type' => 'textarea_code' ),
			array( 'id' => 'field-11', 'name' => 'File field', 'type' => 'file', 'file_type' => 'image', 'repeatable' => 1, 'sortable' => 1 ),
			array( 'id' => 'field-12', 'name' => 'Image upload field', 'type' => 'image', 'repeatable' => true, 'show_size' => true ),
			array( 'id' => 'field-13', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'allow_none' => true, 'sortable' => true, 'repeatable' => true ),
			array( 'id' => 'field-14', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'multiple' => true ),
			array( 'id' => 'field-15', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category' ),
			array( 'id' => 'field-15b', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category',  'multiple' => true ),
			array( 'id' => 'field-16', 'name' => 'Post select field', 'type' => 'post_select', 'use_ajax' => false, 'query' => array( 'cat' => 1 ) ),
			array( 'id' => 'field-17', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true ),
			array( 'id' => 'field-17b', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'posts_per_page' => 8 ), 'multiple' => true ),
			array( 'id' => 'field-18', 'name' => 'Date input field', 'type' => 'date' ),
			array( 'id' => 'field-19', 'name' => 'Time input field', 'type' => 'time' ),
			array( 'id' => 'field-20', 'name' => 'Date (unix) input field', 'type' => 'date_unix' ),
			array( 'id' => 'field-21', 'name' => 'Date & Time (unix) input field', 'type' => 'datetime_unix' ),
			array( 'id' => 'field-22', 'name' => 'Color', 'type' => 'colorpicker' ),
			array( 'id' => 'field-23', 'name' => 'Location', 'type' => 'gmap', 'google_api_key' => '{CUSTOM_KEY}' ),
			array( 'id' => 'field-24', 'name' => 'Title Field', 'type' => 'title' ),
		);
		$meta_boxes[] = array(
			'title' => __('Gaint Bomb Game Data','giantb-press'),
			'pages' => 'gbp_games',
			'fields' => $fields,
		);
		return $meta_boxes;
	}

	public function ginat_bomb_feed_games (){

		// Initialize the page ID to -1. This indicates no action has been taken.
		$post_id = -1;

		// Setup the author, slug, and title for the post
		$author_id = 1;
		$slug = 'example-post';
		$title = 'My Example Post';

		// If the page doesn't already exist, then create it
		if( null == get_page_by_title( $title ) ) {

			// Set the post ID so that we know the post was created successfully
			$post_id = wp_insert_post(
				array(
					'comment_status'	=>	'closed',
					'ping_status'		=>	'closed',
					'post_author'		=>	$author_id,
					'post_name'			=>	$slug,
					'post_title'		=>	$title,
					'post_status'		=>	'publish',
					'post_type'		=>	'post'
				)
			);

		// Otherwise, we'll stop
		} else {

	    		// Arbitrarily use -2 to indicate that the page with the title already exists
	    		$post_id = -2;

		} // end if
	}


}
