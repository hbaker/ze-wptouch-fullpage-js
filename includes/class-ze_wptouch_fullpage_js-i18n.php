<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://hoseabaker
 * @since      1.0.0
 *
 * @package    Ze_wptouch_fullpage_js
 * @subpackage Ze_wptouch_fullpage_js/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ze_wptouch_fullpage_js
 * @subpackage Ze_wptouch_fullpage_js/includes
 * @author     Hosea Baker <hosea.baker@gmail.com>
 */
class Ze_wptouch_fullpage_js_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ze_wptouch_fullpage_js',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
