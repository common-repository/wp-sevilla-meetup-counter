<?php
/*
Plugin Name: WordPress Sevilla Meetup Counter
Description: Widget counter for WordPress Sevilla Meetup 2011.
Author: Rafael Poveda - RaveN
Version: 0.1
Author URI: http://raven.es
Plugin URI: http://mecus.es/plugins/
*/

// We're putting the plugin's functions in one big function we then
// call at 'plugins_loaded' (add_action() at bottom) to ensure the
// required Sidebar Widget functions are available.
function widget_meetup_init() {

    // Check to see required Widget API functions are defined...
    if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
        return; // ...and if not, exit gracefully from the script.

    // This function prints the sidebar widget--the cool stuff!
    function widget_meetup($args) {

        // $args is an array of strings which help your widget
        // conform to the active theme: before_widget, before_title,
        // after_widget, and after_title are the array keys.
        extract($args);

        // Collect our widget's options, or define their defaults.
        $options = get_option('widget_meetup');
        $title = 'WordPress Sevilla Meetup';
        $text = '<div style="width:195px; text-align:center;" ><iframe  src="http://es.eventbrite.com/countdown-widget?eid=1804897497" frameborder="0" height="522" width="220" marginheight="0" marginwidth="0" scrolling="no" ></iframe><div style="font-family:Helvetica, Arial; font-size:10px; padding:5px 0 5px; margin:2px; width:195px; text-align:center;" ><a style="color:#ddd; text-decoration:none;" target="_blank" href="http://www.eventbrite.com/features?ref=ecount" >Registro de eventos</a><span style="color:#ddd;" > para </span><a style="color:#ddd; text-decoration:none;" target="_blank" href="http://wpsevillameetup.eventbrite.com?ref=ecount" >WordPress Meetup Sevilla</a></div></div>'; 

         // It's important to use the $before_widget, $before_title,
         // $after_title and $after_widget variables in your output.
        echo $before_widget;
        echo $before_title . $title . $after_title;
        echo $text;
        echo $after_widget;
    }


    // This registers the widget. About time.
    register_sidebar_widget('WordPress Meetup Sevilla', 'widget_meetup');

}

// Delays plugin execution until Dynamic Sidebar has loaded first.
add_action('plugins_loaded', 'widget_meetup_init');
?>