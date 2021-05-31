<?php 
/*
Plugin Name: Countdown
Author: Asma
Description: This is the very first countdown plugin I ever created.
version: 1.0.1
*/
include 'table.php';
register_activation_hook( __FILE__, 'countdown_create_db' );
function register_my_scripts(){
  wp_enqueue_style('custom-style', plugins_url('styles/style.css',__FILE__ ),'', null);
  wp_enqueue_script('custom-script', plugins_url('scripts/script.js',__FILE__),'', null);
  wp_enqueue_script( 'jquery-script', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js");
}
add_action('admin_enqueue_scripts','register_my_scripts');


function show_in_menu(){
  add_menu_page('Countdown Timmer', 'Countdown Timmer', 'manage_options','countdown', 'init','dashicons-format-quote', 9);
  add_submenu_page('Timer', 'Add New Timer', 'Add new', 'manage_options', 'add-new-timer', 'add_new_timer');
}
add_action('admin_menu','show_in_menu');


function init(){
  include 'timer-list.php';
}


function callback_add_new_timer(){
  include 'add-timer.php';
}