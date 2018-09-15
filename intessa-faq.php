<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://www.intessaclinic.com
 * @since             1.0.0
 * @package           intessa_faq
 *
 * @wordpress-plugin
 * Plugin Name:       Intessa FAQ
 * Plugin URI:        http://www.intessaclinic.com
 * Description:       Question and Answer Metaboxes for FAQ Page
 * Version:           1.0.0
 * Author:            Zach
 * Author URI:        http://www.intessaclinic.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aa_basic_shortcodes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}




/**
 * 
 * Including all the different shortcode modules here
 *
 */
	require_once plugin_dir_path( __FILE__ ) . 'includes/intessa-faq-metaboxes.php';
	require_once plugin_dir_path( __FILE__ ) . 'shortcodes/intessa_faq.php';

 ?>