<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://whoteaches.com
 * @since      1.0.0
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Whoteaches_Portal
 * @subpackage Whoteaches_Portal/public
 * @author     WhoTeaches <no-reply@whoteaches.com>
 */
class Whoteaches_Portal_Public {

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
	 * @since		1.0.0
	 * @param		string		$plugin_name				The name of the plugin.
	 * @param		string		$version						The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		wp_enqueue_style( 'whoteaches-portal-fontawesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'whoteaches-portal-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/whoteaches-portal-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'whoteaches-portal-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array(), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/whoteaches-portal-public.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * WhoTeaches Portal API Call
	 *
	 * @since    1.0.0
	 */
	
	public function whoteaches_portal_api_get_as_json( $controller, $slug, $action, $params, $endpoint ) {
		// Call API only in public view
		if ( ! is_admin() ) {

		 		if ( null == $params ) {
		 			$params = array();
		 		}
 
		 		// Create URL with params
		 		$url = $endpoint . $controller . $slug . $action . '?' . http_build_query($params);
		 		// echo $url;
 
		 		// Use curl to make the query
		 		$ch = curl_init();
 
		 		curl_setopt_array(
		 			$ch, array( 
		 				CURLOPT_URL => $url,
		 				CURLOPT_RETURNTRANSFER => true
		 			)
		 		);
 
		 		$output = curl_exec($ch);
 
		 		// Decode output into an array
		 		$json_data = json_decode( $output, true );
 
		 		curl_close( $ch );
 
		 		return $json_data;
				 
		};
	}
	
	/**
	 * Shortcodes
	 *
	 * @since    1.0.0
	 */
	
	public function whoteaches_portal_shortcode( $atts ) {
		//turn on output buffering to capture script output
		ob_start();
		
		// Get attributes from shortcode
		$attributes = shortcode_atts( array(
			'slug' => 'profile slug',
			'packages' => ['not_showing_individual_packages']
		), $atts, 'WhoTeaches_Portal' );
		/* 
			Send API calls to WhoTeaches, get profile and Packages 
		*/
		// $host = "http://localhost:3000/";
		$host = "https://whoteaches.com/";
		// If Packages attribute exists, send an API call to Packages, otherwise load profile with packages.
		if ($attributes['packages'][0] != 'not_showing_individual_packages') {
			//echo "Packages embed";
			$packages_array = explode(',', $attributes['packages']);
			$whoteaches_packages = $this->whoteaches_portal_api_get_as_json('packages/', null, 'collection', $packages_array, $host . "api/");
		} else {
			//echo "Profile embed";
			$whoteaches_profile = $this->whoteaches_portal_api_get_as_json('users/', $attributes['slug'], null, null, $host . "api/");
			$whoteaches_packages = $this->whoteaches_portal_api_get_as_json('users/', $attributes['slug'], '/packages', null, $host . "api/");
		};
		
		// Load the view
		include (plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/whoteaches-portal-public-display.php');
		
		// Get content from buffer and return it
		$output = ob_get_clean();
		return $output;
		
		// Clear the buffer
		ob_end_flush();
	}

}
