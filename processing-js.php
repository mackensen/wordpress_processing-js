<?php
/*
Plugin Name: Processing.js
Plugin URI: http://www.ramoonus.nl/wordpress/processing-js/
Description: Processing.js is the sister project of the popular Processing visual programming language, designed for the web. Processing.js makes your data visualizations, digital art, interactive animations, educational graphs, video games, etc. work using web standards and without any plug-ins. 
Version: 1.2.1
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
License: GPL2
*/

function rw_processing() {
		wp_deregister_script('processing-init'); // deregister
		wp_register_script('processing-init', plugins_url('/js/init.js', __FILE__),  array('jquery'), '1.2.1');
		wp_enqueue_script('processing-init'); // load
		
		wp_deregister_script('processing'); // deregister
		wp_register_script('processing', plugins_url('/js/processing-1.2.1.min.js', __FILE__), false, '1.2.1');
		wp_enqueue_script('processing'); // load
}
add_action('init', 'rw_processing');
?>