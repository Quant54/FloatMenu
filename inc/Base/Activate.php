<?php 
/**
*@package QuantDevPlugin Tutorial Alecaddd
*/
namespace Inc\Base;

class Activate 
{





	public static function activate(){
		global $wpdb;
		/**
		 * Create table
		 */
		if ( get_site_option( 'fm_db_version' ) != '1.0' ) {
			$table_name = $wpdb->prefix . 'floatmenudb';

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,

			name tinytext NOT NULL,

			value varchar(55) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

			$table_name2 = $wpdb->prefix . 'floatmenuitemsdb';

			$charset_collate2 = $wpdb->get_charset_collate();

			$sql2 = "CREATE TABLE $table_name2 (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			title tinytext NOT NULL,
			icon tinytext NOT NULL,
			iconaf tinytext NOT NULL,
			url varchar(155) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate2;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql2 );


		add_option( 'fm_db_version', '1.0' );

		/**
		 * Insert initial data 
		 */
$param = [
"shape"=>"1",
"structure"=>"2",
"icon"=>"1",
"font-color"=>"black",
"bg-color"=>"#FEFE33",
"border-color"=>"#D0EA2B",
"symbol"=>"Z",
"icon-awesome"=>"fa fa-address-book-o",
"font-size"=>"1.8rem",
"menu-position"=>"0",
"moblie-show"=>"1",
"duration"=>"700",
"margin"=>"39",
"wpmenu-slug"=>"xmenux",
"iswpmenu"=>"0",
];



		
foreach ($param as $key => $value) 
		$wpdb->insert( 
			$table_name, 
			array( 
				'name' => $key, 
				'value' => $value, 
			));
	for ($i=0; $i <6 ; $i++) { 
	$wpdb->insert( 
			$table_name2, 
			array( 
				'title' => "Z", 
				'icon' => "0", 
				'iconaf'=>'fa fa-address-book-o',
				'url' =>'http://google.com'
			));
	}

	}

}



	



}
