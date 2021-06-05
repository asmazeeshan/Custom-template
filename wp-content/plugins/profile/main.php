<?php
/*
Plugin Name: Profile
Description: Profile Plugin
Author: Asma
Version: 1.0
*/

require 'assets/templates/my_functions.php';

register_activation_hook( __FILE__, 'new_profile_create_db' );

//Add menu page 
function show_profile_in_menu(){
  add_menu_page('Profile', 'Profile', 'manage_options','profile', 'init','dashicons-format-quote', 9);
  add_submenu_page('profile', 'Add New Staff', 'Add new', 'manage_options', 'add-new-staff', 'add_new_staff');
}
add_action('admin_menu','show_profile_in_menu');

function init(){
  require 'assets/templates/profile_list.php';
}

function add_new_staff(){
  require 'assets/templates/add_new.php';
}

function custom_admin_scripts() {
  
  wp_enqueue_style('custom-css', plugins_url('assets/css/style.css',__FILE__ ),'', null);
  wp_enqueue_script('custom-js', plugins_url('assets/js/script.js',__FILE__),'', rand(100,1000));

  wp_enqueue_style( 'bootstrap-style', "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css");   
  wp_enqueue_script( 'jquery-script', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js");
  wp_enqueue_script( 'bootstrap-script', "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js");


}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts');
add_shortcode( 'profile_form_data','profile_form_data_callback');
?>