<?php 
namespace Inc\Base;
use \Inc\Api\DatabaseApi;






class Enqueue extends BaseController 
{

	function register () {

		 		add_action( 'admin_enqueue_scripts', array($this, 'adminenqueue'));
		 		add_action( 'wp_enqueue_scripts', array($this, 'enqueue'));
	}

			function adminenqueue () {

		  wp_enqueue_style( 'colorpicker',$this->plugin_url . 'assets/tinycolorpicker.css');
      wp_enqueue_script( 'jquery-js-latest','https://code.jquery.com/jquery-latest.min.js');
			wp_enqueue_script( 'colorpicker-js',$this->plugin_url . 'assets/jquery.tinycolorpicker.js');


			wp_enqueue_style( 'load-fa', $this->plugin_url . 'assets/css/font-awesome.css' );
 	  	wp_enqueue_script( 'font-awesome-js',$this->plugin_url . 'assets/fontawesome-selector.js');
			wp_enqueue_style( 'adminfloat-css',$this->plugin_url . 'assets/adminfloat.css');


			wp_enqueue_script( 'adminfloat-js',$this->plugin_url . 'assets/adminfloat.js');
			$params = array(
				'ajax_nonce' => wp_create_nonce('protect_me_please'),
			);


wp_localize_script( 'adminfloat-js', 'ajax_object', $params );



			

		}
					function enqueue () {
						$fmdb = new DatabaseApi;
						$params =  $fmdb->getParams();
if($params["moblie-show"]!=1)  wp_enqueue_style( 'nomobile',$this->plugin_url . 'assets/nomobile.css');
			wp_enqueue_style( 'floatmenu-css',$this->plugin_url . 'assets/floatmenu.css');
			wp_enqueue_script( 'floatmenu-js',$this->plugin_url . 'assets/floatmenu.js',array('jquery'),'1.0',true);
			 wp_enqueue_style( 'load2-fa', $this->plugin_url . 'assets/css/font-awesome.css' );
		}
}