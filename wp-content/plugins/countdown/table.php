<?php
function countdown_create_db() {

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'countdown';

$sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    time datetime NOT NULL,
    after_expiry varchar(255) NOT NULL,
    message varchar(255) NOT NULL,
    created_at datetime NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}

function insertdata_in_database($title, $time, $after_expiry, $message, $created_at){
    global $wpdb;
    $wpdb->insert('wp_countdown', array(
                'id'            => '',
                'title'         =>$title,
                'time'          =>$time,
                'after_expiry'  =>$after_expiry,
                'message'       =>$message,
                'created_at'    => $created_at
              ),array('%s')
    );
}
