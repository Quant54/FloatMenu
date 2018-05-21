<?php 

/*
Trigger this file  on Plugin uninstall


@package QuantPlugin
*/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' )) {
	die; 
}
global $wpdb; 

// Clear Database stored data
$table_name = $wpdb->prefix . 'floatmenudb';
$table_name2 = $wpdb->prefix . 'floatmenuitemsdb';
$wpdb->query( "DROP TABLE IF EXISTS $table_name" );
$wpdb->query( "DROP TABLE IF EXISTS $table_name2" );
delete_option("fm_db_version");

