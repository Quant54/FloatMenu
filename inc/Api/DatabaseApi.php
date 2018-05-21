<?php

/**
 * 
 */
namespace Inc\Api;

class DatabaseApi
{
	
	public function getParams() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'floatmenudb';
		$myrows = $wpdb->get_results( "SELECT name, value FROM $table_name" );
		foreach ($myrows as $key => $value) {
			$result[$value->name] = $value->value;
		}
		return $result;
	}

		public function getParamsItems() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'floatmenuitemsdb';
		$myrows = $wpdb->get_results( "SELECT * FROM $table_name" );
		// foreach ($myrows as $key => $value) {
		// 	$result[$value->name] = $value->value;
		// }
		// return $result;
		return $myrows;
	}

	public function setParam($param, $value) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'floatmenudb';

		return $wpdb->update( $table_name,
		array( 'value' => sanitize_text_field($value) ),
		array( 'name' => sanitize_text_field($param) ),
		array( '%s' ),
		array( '%s' )
		);


	}
public function addItem($param) {
		global $wpdb;
		$table_name2 = $wpdb->prefix . 'floatmenuitemsdb';

		return $wpdb->insert( 
			$table_name2, 
			array( 
				'title' => sanitize_text_field($param["title"]), 
				'icon' => sanitize_text_field($param["icon"]), 
				'iconaf'=>sanitize_text_field($param["iconaf"]), 
				'url' =>sanitize_text_field($param["url"]), 
			));
}
		public function delete($id){
		global $wpdb;
		$table_name = $wpdb->prefix . 'floatmenuitemsdb';
 return $wpdb->delete( $table_name,array( 'id' => $id ) );
		}

}
