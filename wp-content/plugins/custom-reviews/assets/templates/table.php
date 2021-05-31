<?php

function table_create()
{
  global $wpdb;
  $table_name = $wpdb->prefix . "custom_review"; 
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    review varchar(255) NOT NULL,
    client_name varchar(255) NOT NULL,
    designation varchar(255) NOT NULL,
    created_at datetime NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate";
  require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
}

function insertdata($title, $review, $client_name, $designation, $date)
{
  global $wpdb;
  $table_name = $wpdb->prefix . "custom_review"; 
  $result = $wpdb->insert('wp_custom_review',
    array(
      'title'=>$title,
      'review'=>$review,
      'client_name'=>$client_name,
      'designation'=>$designation,
      'created_at'=> $date),
    array('%s','%s')
  );

  if($result){
    return 'Review has been inserted succesfully.';
  }
}

?>