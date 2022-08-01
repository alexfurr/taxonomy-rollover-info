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
define( 'TAX_ROLLOVER_ACADEMIC_YEARS_ID', 'academic_year' ); // the term id



// Confif
$psa_version  = "0.1"; // Increment this to force load new versions of JS and CSS

\taxonomy_rollover\init::init();

/* Some dummy questions
PWS-1 :- 181
PWS-2 :- 210
PWS-3 :- 213
PWS-4 :- 233
*/

?>
