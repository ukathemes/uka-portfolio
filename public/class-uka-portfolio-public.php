<?php
/**
 * The public-facing functionality of the plugin
 *
 * @since      1.0.0
 *
 * @package    Uka_Portfolio
 * @subpackage Uka_Portfolio/public
 */

class Uka_Portfolio_Public {

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
	 * Modifies archive title.
	 *
	 * @since    1.0.0
	 */
	public function modify_portfolo_archive_titles( $title ) {

		if ( is_post_type_archive( 'portfolio' ) ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax( 'portfolio-category' ) ) {
			$title = single_term_title( '', false );
		} elseif ( is_tax( 'portfolio-tag' ) ) {
			$title = single_term_title( esc_html__( 'Tag: ', 'uka-portfolio' ), false );
		}
		return $title;

	}

}
