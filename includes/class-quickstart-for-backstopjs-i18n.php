<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://christoflee.co.uk
 * @since      1.0.0
 *
 * @package    Quickstart_For_Backstopjs
 * @subpackage Quickstart_For_Backstopjs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Quickstart_For_Backstopjs
 * @subpackage Quickstart_For_Backstopjs/includes
 * @author     Christof Lee <christof@christoflee.co.uk>
 */
class Quickstart_For_Backstopjs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'quickstart-for-backstopjs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
