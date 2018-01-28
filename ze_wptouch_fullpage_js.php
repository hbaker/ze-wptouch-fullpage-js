<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hoseabaker
 * @since             1.0.0
 * @package           Ze_wptouch_fullpage_js
 *
 * @wordpress-plugin
 * Plugin Name:       Fullpage.js for WPtouch
 * Plugin URI:        https://hoseabaker
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hosea Baker
 * Author URI:        https://hoseabaker
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ze_wptouch_fullpage_js
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ze_wptouch_fullpage_js-activator.php
 */
function activate_ze_wptouch_fullpage_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ze_wptouch_fullpage_js-activator.php';
	Ze_wptouch_fullpage_js_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ze_wptouch_fullpage_js-deactivator.php
 */
function deactivate_ze_wptouch_fullpage_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ze_wptouch_fullpage_js-deactivator.php';
	Ze_wptouch_fullpage_js_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ze_wptouch_fullpage_js' );
register_deactivation_hook( __FILE__, 'deactivate_ze_wptouch_fullpage_js' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ze_wptouch_fullpage_js.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ze_wptouch_fullpage_js() {

	$plugin = new Ze_wptouch_fullpage_js();
	$plugin->run();

  // ADD SCRIPTS TO THE HEADER
  add_action( 'wp_head', 'ze_header_scripts' );
  function ze_header_scripts(){
    ?>

    <?php if (function_exists('wptouch_is_mobile_theme_showing')  && wptouch_is_mobile_theme_showing() ) { ?>
    <!-- DO STUFF FOR WP TOUCH PAGES -->
    <?php
    add_action( 'wp_enqueue_scripts', 'load_fullpage_js' );
    function load_fullpage_js(){
      wp_enqueue_script( 'fullpage_js', get_stylesheet_directory_uri() . '/custom-scripts', array( 'jquery' ) );
    }
    ?>
    <!-- END DO STUFF FOR WP TOUCH PAGES-->

    <?php
    }
  }

  // ADD SCRIPTS TO THE FOOTER
  add_action( 'wp_footer', 'ze_footer_scripts' );
  function ze_footer_scripts(){
    ?>
    
    <?php if (function_exists('wptouch_is_mobile_theme_showing')  && wptouch_is_mobile_theme_showing() ) { ?>
    <!-- DO STUFF FOR WP TOUCH PAGES -->
    <script></script>
    <!-- END DO STUFF FOR WP TOUCH PAGES-->
    
    <?php
    }
  }

}
run_ze_wptouch_fullpage_js();