<?php
/*
Plugin Name: 	Taxonomy Rollover for OM Info
Description: 	Rollover taxonomies such as academic year etc.
Version: 		0.1
Author :        Barrington Innovation
*/

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die();
}


// Server path to the plugin's directory.
define( 'TAX_ROLLOVER_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define( 'TAX_ROLLOVER_PLUGIN_URL', plugins_url('taxonomy-rollver-info' , dirname( __FILE__ )) );


include_once( TAX_ROLLOVER_PLUGIN_DIR . '/classes/init.php' );
include_once( TAX_ROLLOVER_PLUGIN_DIR . '/classes/class-actions.php' );

define( 'TAX_ROLLOVER_MENU_SLUG', 'taxonomy-rollover-admin' );
define( 'TAX_ROLLOVER_ACADEMIC_YEARS_ID', 'years' ); // the term id



\taxonomy_rollover\init::init();


?>
