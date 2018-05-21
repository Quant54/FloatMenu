<?php


namespace Inc\Pages;


use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
 * 
 */
class Admin extends BaseController {
	
	public $settings;
	public $pages=[];
	public $subpages=[];
	public $callbacks;


public	function register () {

$this->settings = new SettingsApi ();
$this->callbacks = new AdminCallbacks();
		// add_action( 'admin_menu', array($this,'add_admin_pages'));
				$this->setPages();
		// $this->settings->addPages($this->page)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
		$this->settings->addPages($this->page)->addSubPages($this->subpages)->register();

	}

public	function setPages(){

		$this->page = [
			[
'page_title' =>'Quant Plugin', 
'menu_title' => 'Float Menu',
'capability'=> 'manage_options',
'menu_slug' => 'quant_plugin', 
'callback' => array($this->callbacks, 'adminDashboard'),
'icon_url'=>'dashicons-store', 
'position' => 110 ,
		],
			
	];
	}

}

