<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       //allmarketingsolutions.co.uk
 * @since      1.0.0
 *
 * @package    Slide_Everything
 * @subpackage Slide_Everything/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Slide_Everything
 * @subpackage Slide_Everything/admin
 * @author     All Marketing Solutions <talha@wpminds.com>
 */
class Slide_Everything_Admin {

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
		 * defined in Slide_Everything_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slide_Everything_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slide-everything-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'block-css', plugin_dir_url( __FILE__ ) . 'css/block.css', array(), $this->version, 'all' );
	
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
		 * defined in Slide_Everything_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slide_Everything_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slide-everything-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'block-js', plugin_dir_url( __FILE__ ) . 'js/block.js', array( 'wp-blocks', 'wp-element' ), $this->version, false );

	}
	// Slider anything post type function
	function wp_slide_anything() {
  
    register_post_type( 'slide_anything',
    // CPT Options
        array(
            'labels' => array(
                'name' 			=> __( 'Slide Anything' ),
                'singular_name' => __( 'Slide Anything' )
            ),
            'public' => true,
            'has_archive' 	=> true,
            'rewrite'		=> array('slug' => 'slide-anything'),
            'show_in_rest'	=> true,
			'menu_icon'		=> 'dashicons-embed-photo'
  
        )
    );
}

	function wps_plugin_settings_page() {
							
		$parent_slug = 'edit.php?post_type=slide_anything';
		$page_title = 'Slider Settings';
		$menu_title = 'Slider Settings';
		$capability = 'manage_options';
		$slug = 'slider-settings';
		$callback = array( $this, 'wp_slider_settings_page' );
		
		add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $slug, $callback);	
	}
	function wps_tools_page() {
		$parent_slug = 'edit.php?post_type=slide_anything';
		$page_title = 'Slider Tools';
		$menu_title = 'Tools';
		$capability = 'manage_options';
		$slug = 'tools-page';
		$callback = array( $this, 'wps_tools_page_content' );
		
		add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $slug, $callback);	
	}
	function wps_about_us_page() {
		$parent_slug = 'edit.php?post_type=slide_anything';
		$page_title = 'About Us';
		$menu_title = 'About Us';
		$capability = 'manage_options';
		$slug = 'about-us-page';
		$callback = array( $this, 'wps_about_us_page_content' );
		
		add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $slug, $callback);	
	}
	function wp_slider_settings_page() {
		?>
		<h1> <?php esc_html_e( 'Welcome to WP Slider Settings page', 'my-plugin-textdomain' ); ?> </h1>
		<div class="wrap">
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'wps_settings_page' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wps_settings_page' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
		<?php
	}
	function wps_tools_page_content() {
		?>
		<h1> <?php esc_html_e( 'Welcome to WP Slider Tools page', 'my-plugin-textdomain' ); ?> </h1>
		<div class="wrap">
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'wps_tools_settings_page' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wps_tools_settings_page' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
		<?php
	}
	function wps_about_us_page_content() {
		?>
		<h1> <?php esc_html_e( 'Welcome to About Us page', 'my-plugin-textdomain' ); ?> </h1>
		<div class="wrap">
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'wps_about_us_settings_page' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wps_about_us_settings_page' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
		<?php
	}


// Shortcode to display Owl Carousel slider
function slider_shortcode() {

	$shortcodee_html = '';
	$shortcodee_args = array(
		'posts_per_page' => 10,
		'post_type'      => 'slide_anything',
	);
	
	$shortcodee_query = new WP_Query( $shortcodee_args );
	
	if( $shortcodee_query->have_posts() ) {
		$shortcodee_html .= '<div class="wp-slide-carousel owl-carousel owl-theme">';
		while( $shortcodee_query->have_posts() ) {
			   $shortcodee_query->the_post();
			   $shortcodee_html .= '<div class="wp-slide-block-column item">';
			   $shortcodee_html .= '<div class="item"><h1 class="wp-slide_heading">' . get_the_title() .'</h1></div>';
			   $shortcodee_html .= '<div class="item"><p class="wp-slide-content">'. get_the_content() .'</p></div>';
			   $shortcodee_html .= '</div>';
		}
		$shortcodee_html .= '</div>';
		wp_reset_query();
	}
	return $shortcodee_html;
	
}
	
}
