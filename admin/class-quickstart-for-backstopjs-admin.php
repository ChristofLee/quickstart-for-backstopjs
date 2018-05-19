<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://christoflee.co.uk
 * @since      1.0.0
 *
 * @package    Quickstart_For_Backstopjs
 * @subpackage Quickstart_For_Backstopjs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Quickstart_For_Backstopjs
 * @subpackage Quickstart_For_Backstopjs/admin
 * @author     Christof Lee <christof@christoflee.co.uk>
 */
class Quickstart_For_Backstopjs_Admin {

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
		 * defined in Quickstart_For_Backstopjs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quickstart_For_Backstopjs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quickstart-for-backstopjs-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	// public function enqueue_scripts() {

	// 	/**
	// 	 * This function is provided for demonstration purposes only.
	// 	 *
	// 	 * An instance of this class should be passed to the run() function
	// 	 * defined in Quickstart_For_Backstopjs_Loader as all of the hooks are defined
	// 	 * in that particular class.
	// 	 *
	// 	 * The Quickstart_For_Backstopjs_Loader will then create the relationship
	// 	 * between the defined hooks and the functions defined in this
	// 	 * class.
	// 	 */

	// 	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/quickstart-for-backstopjs-admin.js', array( 'jquery' ), $this->version, false );

	// }

	public function qfb_add_submenu_page() {
		add_submenu_page(
			'tools.php',
			'BackstopJS',
			'BackstopJS',
			'manage_options',
			'backstop-js',
			array( $this, 'create_submenu_page' )
		);
	}

	public function create_submenu_page(){
		include( plugin_dir_path( __FILE__ ) . 'partials/'.$this->plugin_name.'-admin-display.php' );
	}

	public function qfb_localise_config_variables() {
		// Register the script
		wp_register_script( 'backstop_custom_config_vars', plugin_dir_url( __FILE__ ) . 'js/quickstart-for-backstopjs-admin.js' );

		// Initialise empty array to add our scenrios to
		$scenarios = array();

		// Get a list of all pages on the site
		$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_date',
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'child_of' => 0,
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		);
		$pages = get_pages($args);

		// Turn the list of pages into scenarios backstopjs can read
		foreach ($pages as $page) {

			$scenario = array(
				"label" => $page->post_title . " (" . $page->ID . ")",
				"url" => get_permalink($page->ID),
			);

			array_push($scenarios, $scenario);
		}

		// Get a list of all pages on the site
		$args = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);
		$posts = get_posts($args);

		// Turn the list of pages into scenarios backstopjs can read
		foreach ($posts as $post) {

			$scenario = array(
				"label" => $post->post_title . " (" . $post->ID . ")",
				"url" => get_permalink($post->ID),
			);

			array_push($scenarios, $scenario);
		}

		// Localize the script with new data
		$custom_config = array(
				"id" => get_bloginfo( 'name' ),
				"scenarios" => $scenarios,
		);
		wp_localize_script( 'backstop_custom_config_vars', 'custom_config', $custom_config );

		// Enqueued script with localized data.
		wp_enqueue_script( 'backstop_custom_config_vars' );
	}

}
