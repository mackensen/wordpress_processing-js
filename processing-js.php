<?php
/*
Plugin Name: Processing.js
Plugin URI: http://www.ramoonus.nl/wordpress/processing-js/
Description: Processing.js is the sister project of the popular Processing visual programming language, designed for the web. Processing.js makes your data visualizations, digital art, interactive animations, educational graphs, video games, etc. work using web standards and without any plug-ins. 
Version: 1.3.0
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
License: GPL2
*/
/* Javascript */
function rw_processing() {
	wp_deregister_script('processing'); // deregister
	wp_register_script('processing', plugins_url('/js/processing-1.3.0.min.js', __FILE__), false, '1.3.0');
	wp_enqueue_script('processing'); // load
}
add_action('init', 'rw_processing');

/* Shortcode */
function rw_processing_sc($attr, $content) {
	// @since 1.2.1.1
	//echo '<script type="application/processing">'; // for the init.js script // deprecated
	// $rw_p_sc_replacement = array("<br />", "<br>", "<p>", "</p>");
	//echo str_replace($rw_p_sc_replacement, '', $content); 
	// replace those strings to nothing
	//echo '</script><canvas width="200" height="200"></canvas></div></p>'; // canvas div
	//echo '<div style="height:0px;width:0px;overflow:hidden;"></div> '; 
	
	// updated for v1.2.3
	// @since 1.2.3
	echo '<script type="text/processing" data-processing-target="targetcanvas">';
	echo '/* processing code here */';
	//string replace
	$rw_p_sc_replacement = array("<br />", "<br>", "<p>", "</p>");
	echo str_replace($rw_p_sc_replacement, '', $content); // replace those strings to nothing
	// closing tags
	echo '</script>';
    echo '<canvas id="targetcanvas"></canvas>';
}
add_shortcode("processing", "rw_processing_sc");
?>