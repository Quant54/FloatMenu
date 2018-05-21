<?php 
/*
Plugin Name: Quant Plugin Dev 
Plugin URI: https://quant54.github.io/
Description: This is Float Menu Plugin
Version: 1.0.0
Author: Vadim "Quant" Farrakhov
Author URI: https://quant54.github.io/
License: GPL 
Text Domain: quant-plugin
*/

// if ( ! defined( 'ABSPATH' ) ) {
// 	die;
// }

// defined ( 'ABSPATH' ) or die ('Hey, you can\'t access this file, you silly human!' );

if ( ! function_exists( 'add_action' ) ) {
	echo 'Hey, you can\'t access this file, you silly human!'; 
	exit;
}

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}





function activate_quant_plugin(){
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__,'activate_quant_plugin' );

function deactivate_quant_plugin(){
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__,'deactivate_quant_plugin' );

if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}