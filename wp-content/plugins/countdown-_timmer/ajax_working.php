<?php
require 'assets/my_functions.php';

if(isset($_POST['submit']))
{
    // var_dump(date("Y-m-d H:i:s"));die;
    $title          = $_POST['title'];
    $time           = $_POST['date'];
    $after_expiry   = $_POST['after_expire'];
    $message        = $_POST['expiry_msg'];
    $created_at     = date("Y-m-d H:i:s");

    // global $wpdb;
    // $table_name   = $wpdb->prefix . "countdown";
    // $data         =  array(
    //     'id'            => '',
    //     'title'         =>$title,
    //     'time'          =>$time,
    //     'after_expiry'  =>$after_expiry,
    //     'message'       =>$message,
    //     'created_at'    => $created_at
    // );
    //     $result = $wpdb->insert('wp_countdown', $data);
    
    $result = insertdata_in_database($title, $time, $after_expiry, $message, $created_at);
    if($result){
        echo $result;
    }
    // if(!empty(trim($title)) && !empty(trim($time)) && !empty(trim($after_expiry))  )
    // {
    //     $result = insertdata($title, $time, $after_expiry, $message, $created_at);
    // }
}