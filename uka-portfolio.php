<?php
/**
 * Plugin Name:       Uka Portfolio
 * Plugin URI:        https://ukathemes.com/
 * Description:       Adds Portfolio Post Type to your site.
 * Version:           1.0.0
 * Author:            UkaThemes
 * Author URI:        https://ukathemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       uka-portfolio
 * Domain Path:       /languages
 *
 * @since             1.0.0
 * @package           Uka_Portfolio
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'UKA_PORTFOLIO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-uka-portfolio-activator.php
 */
function activate_uka_portfolio() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-uka-portfolio-activator.php';
	Uka_Portfolio_Activator::activate();

}
register_activation_hook( __FILE__, 'activate_uka_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-uka-portfolio.php';

/**
 * Create link for settings page.
 *
 * @since    1.0.0
 */
function uka_portfolio_settings_link( $settings ) {

	$settings[] = '<a href="'. get_admin_url( null, 'options-general.php?page=portfolio' ) .'">' . esc_html__( 'Settings', 'uka-portfolio' ) . '</a>';
	return $settings;

}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'uka_portfolio_settings_link' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_uka_portfolio() {

	$plugin = new Uka_Portfolio();
	$plugin->run();

}
run_uka_portfolio();
