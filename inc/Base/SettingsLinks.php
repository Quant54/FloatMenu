<?php 
/**
*@package QuantDevPlugin Tutorial Alecaddd
*/
namespace Inc\Base;

class SettingsLinks extends BaseController
{
	// protected $plugin;
	// public function __construct ()
	// {
	// 	$this->plugin = PLUGIN;	
	// }
	public  function register(){

		add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_links'));

	}
	public function settings_links ($links ){
		$settings_link = '<a href="admin.php?page=quant_plugin">Настройки</a>';
		array_push($links, $settings_link);
		return $links;

	}
}
