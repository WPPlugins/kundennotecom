<?php
/*
 * Plugin Name: Kundennote.com Bewertungssiegel
 * Plugin URI: https://kundennote.com
 * Description: Fügen Sie Ihr kundennote.com Bewertungssiegel über Shortcode oder Widget ein.
 * Version: 2.0
 * Author: Thomas Mühl
 * Author URI: http://muto.at
 * License: GPLv2 or later
 */

 define( 'KUNDENNOTE_VERSION', '2.0' ); 
 define( 'KUNDENNOTE_FILE', __FILE__ ); // this file 
 define( 'KUNDENNOTE_BASENAME', plugin_basename( KUNDENNOTE_FILE ) ); // plugin name as known by WP 
 define( 'KUNDENNOTE_DIR', dirname( KUNDENNOTE_FILE ) ); // our directory 
 
require_once(plugin_dir_path(__FILE__) . 'kundennote_options.php');
require_once(plugin_dir_path(__FILE__) . 'kundennote_shortcode.php');
require_once(plugin_dir_path(__FILE__) . 'kundennote_widget.php');



?>
