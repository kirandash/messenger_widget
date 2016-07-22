<?php
error_reporting(E_ALL);
/*
Plugin Name: Messenger Widget
Plugin URI: http://bgwebagency.com
Version: 1.0
Author: Kiran Dash
Plugin URI: http://bgwebagency.com
*/

class KD_Messenger extends WP_Widget {
	function __construct()
	{
		$params = array(
			'description' => 'Display messages to readers',
			'name' => 'Messenger'
		);
		//bring construct of parent class wp_widget and avoid our construct to overwrite it
		parent::__construct('Messenger','',$params);//id name and parameters
	}
	
	public function form()
	{
		
	}
	
	public function widget()
	{
		
	}
}

add_action('widgets_init', kd_register_messenger);

function kd_register_messenger(){
	register_widget('KD_Messenger');
}

?>