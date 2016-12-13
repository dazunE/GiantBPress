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

	public function giant_bomb_api_connection() {

    $game_data = $this->api_loader->games();

	}

}
