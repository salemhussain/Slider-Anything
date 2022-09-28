<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       //allmarketingsolutions.co.uk
 * @since      1.0.0
 *
 * @package    Slide_Everything
 * @subpackage Slide_Everything/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Slide_Everything
 * @subpackage Slide_Everything/public
 * @author     All Marketing Solutions <talha@wpminds.com>
 */
class Slide_Everything_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
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
		 * defined in Slide_Everything_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slide_Everything_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slide-everything-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'owl-carousel-min-css', plugin_dir_url( __FILE__ ) .'css/owlCssFiles/owl.carousel.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'owl-animate-css', plugin_dir_url( __FILE__ ) .'css/owlCssFiles/animate.css', array(), $this->version, 'all' );
		// enqueue style for custom gutenberg block
		wp_enqueue_style( 'block-css', plugin_dir_url( __FILE__ ) . 'css/block.css', array(), $this->version, 'all' );
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
		 * defined in Slide_Everything_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slide_Everything_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slide-everything-public.js', array( 'jquery' ), $this->version, false );
		
		// Enqueue scrips for owl carousel slider
		wp_enqueue_script( 'owl-min-js', plugin_dir_url( __FILE__ ) .'js/owlJsFiles/owl.carousel.min.js', array('jquery'), $this->version, false );
		wp_enqueue_script( 'owl-custom-js', plugin_dir_url( __FILE__ ) .'js/owl-custom.js', array('jquery'), $this->version, false );
		wp_enqueue_script( 'owl-video-js', plugin_dir_url( __FILE__ ) .'js/owlJsFiles/owl.video.js', array('jquery'), $this->version, false );
	}
	
}
