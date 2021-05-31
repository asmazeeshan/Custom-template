<?php
/*
    Plugin Name: CountDown
    Description: This is a countdown timmer plugin.
    Author: Asma
    Version: 1.0
*/
include 'assets/templates/table.php';

register_activation_hook( __FILE__, 'countdown_create_db' );
add_action('wp_ajax_insertdata_in_database', 'insertdata_in_database');
function custom_admin_scripts() {
    
    wp_enqueue_style('custom-css', plugins_url('assets/css/style.css',__FILE__ ),'', null);
    wp_enqueue_script('custom-js', plugins_url('assets/js/script.js?v=123',__FILE__),'', null);
    wp_localize_script( 'custom-js', 'frontend_ajax_object',
    array( 
        'ajaxurl' => plugins_url('ajax_working.php',__FILE__)
    )
);
    wp_enqueue_style( 'bootstrap-style', "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css");   
    wp_enqueue_script( 'jquery-script', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js");
    wp_enqueue_script( 'bootstrap-script', "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js");

 
}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts');
//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'remove_jquery_migrate');

function show_in_menu(){
    add_menu_page('Countdown Timer', 'Countdown Timer', 'manage_options','review', 'init','dashicons-format-quote', 9);
    add_submenu_page('review', 'Add New Timmer', 'Add new', 'manage_options', 'add-new-review', 'add_new_timmer');
}
add_action('admin_menu','show_in_menu');

function init(){
    include 'assets/templates/timmer_list.php';
}
function add_new_timmer(){
    include 'assets/templates/new_timmer.php';
}
  