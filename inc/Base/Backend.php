<?php 
/**	
 * 
 */
namespace Inc\Base;
use \Inc\Api\DatabaseApi;



class Backend extends BaseController
{

	function register (){
		add_action('wp_ajax_save_settings',array($this,'fm_save_settings'));
		add_action('wp_ajax_delete_item',array($this,'fm_delete_item'));
		add_action('wp_ajax_add_item',array($this,'fm_add_item'));
	}


	function fm_save_settings(){
	check_ajax_referer( 'protect_me_please', 'security' );
		$fmdb = new DatabaseApi;

		if (isset($_POST["savedata"])) $param=$_POST["savedata"];

		$success = 0;
		foreach ($param as $key => $value) {
			$one = $fmdb->setParam($key, $value);
			$success = 	$success | $one;
		}
		echo $success;
		wp_die();
	}

	function  fm_add_item(){

	check_ajax_referer( 'protect_me_please', 'security' );
		$fmdb = new DatabaseApi;
		if (isset($_POST["savedata"])) $param=$_POST["savedata"];
		echo $fmdb->addItem($param);
		wp_die();
	}

	function fm_delete_item(){
		check_ajax_referer( 'protect_me_please', 'security' );
		$fmdb = new DatabaseApi;
		if (isset($_POST["id"])) $param=$_POST["id"];
		echo $fmdb->delete($param);
		wp_die();
	}
}