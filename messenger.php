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
	
	public function form($instance)
	{
		//print_r($instance);
		extract($instance);
		?>
        <p>
        	<label for="<?php echo $this->get_field_id('title');?>">Title: </label>
            <input 
            	class="widefat" 
                id="<?php echo $this->get_field_id('title'); ?>" 
                name="<?php echo $this->get_field_name('title'); ?>" 
                value="<?php if(isset($title)) echo esc_attr($title); ?>">
        </p>
        
        <p>
        	<label for="<?php echo $this->get_field_id('description');?>">Description: </label>
            <textarea
            	class="widefat"
                rows="10"
                id="<?php echo $this->get_field_id('description'); ?>"
                name="<?php echo $this->get_field_name('description'); ?>"><?php if(isset($description)) echo esc_attr($description); ?></textarea>
        </p>
        <?php //widefat built in css class and get_field_id and get_field_name are from WP_Widget class
	}
	
	public function widget($args, $instance)
	{
		//print_r($args);	
		//print_r($intance);	
		extract($args);
		extract($instance);
		
		//apply filter for escaping etc.
		$title = apply_filters('widget_title', $title);
		$description = apply_filters('widget_title', $description);
		
		if(empty($title)) $title = "Default title: ";
		
		echo $before_widget;
			echo $before_title.$title.$after_title;
			echo '<p>'.$description.'</p>';
		echo $after_widget;	
	}
}

add_action('widgets_init', 'kd_register_messenger');

function kd_register_messenger(){
	register_widget('KD_Messenger');
}

?>