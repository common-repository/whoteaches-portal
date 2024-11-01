<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://whoteaches.com
 * @since      1.0.0
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/admin
 * @author     WhoTeaches <no-reply@whoteaches.com>
 */
class Whoteaches_Portal_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in Whoteaches_Portal_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whoteaches_Portal_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */	
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/whoteaches-portal-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'whoteaches_portal_fontawesome', plugin_dir_url( __FILE__ ) . '../public/css/font-awesome.min.css', array(), $this->version, 'all' );

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
		 * defined in Whoteaches_Portal_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whoteaches_Portal_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/whoteaches-portal-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * display_admin_menu($page_title, $menu_title, $capability, $menu-slug, $function)
	 *
	 */
	public function display_whoteaches_portal_admin_page() {

		add_menu_page(
			'WhoTeaches Portal', 													//$page_title
			'WhoTeaches',																	//$menu_title
			'manage_options',															//$capability
			'whoteaches',																	//$menu-slug
			array($this, 'whoteaches_portal_show_page'),	//$function
			'dashicons-welcome-learn-more', 							//$icon-url
			'3.0'																					//$Position number on menu from top
		);

	}
	
	public function whoteaches_portal_show_page() {
		include (plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/whoteaches-portal-admin-display.php');
	}


}
