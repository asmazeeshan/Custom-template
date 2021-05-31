<?php 
/*
Plugin Name: Movies
Author: Asma
 Description: This is the very first plugin I ever created.
 Version: 1.0
*/



function custom_post_type() {


    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'Divichild' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'Divichild' ),
        'menu_name'           => __( 'Movies', 'Divichild' ),
        'parent_item_colon'   => __( 'Parent Movie', 'Divichild' ),
        'all_items'           => __( 'All Movies', 'Divichild' ),
        'view_item'           => __( 'View Movie', 'Divichild' ),
        'add_new_item'        => __( 'Add New Movie', 'Divichild' ),
        'add_new'             => __( 'Add New', 'Divichild' ),
        'edit_item'           => __( 'Edit Movie', 'Divichild' ),
        'update_item'         => __( 'Update Movie', 'Divichild' ),
        'search_items'        => __( 'Search Movie', 'Divichild' ),
        'not_found'           => __( 'Not Found', 'Divichild' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Divichild' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'Divichild' ),
        'description'         => __( 'Movie news and reviews', 'Divichild' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Subjects', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'all_items' => __( 'Subjects' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Edit Subject' ), 
    'update_item' => __( 'Update Subject' ),
    'add_new_item' => __( 'Add New Subject' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Subjects' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('subjects',array('movies'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'subject' ),
  ));
 
}
// >> Create Shortcode to Display Movies Post Types
 
function diwp_create_shortcode_movies_post_type(){
  
  $args = array(
                  'post_type'      => 'movies',
                  'posts_per_page' => '-1',
                  'publish_status' => 'published',
                  
               );

  $query = new WP_Query($args);
  $result = '';
  if($query->have_posts()) :
    while($query->have_posts()) :$query->the_post() ;
                   
      $result .= '<div class="movie-item">';
      $result .= '<div class="movie-name">' . get_the_title() . '</div>';
      $result .= '<div class="movie-desc">' . get_the_content() . '</div>'; 
      $result .= '</div>';

      endwhile;

      wp_reset_postdata();

  endif;    

  return $result;            
}

add_shortcode( 'movies-list', 'diwp_create_shortcode_movies_post_type' ); 

// shortcode code ends here
function call_movies_archive(){
  $args = array(
      'post_type'     => 'movies',
      'tax_query'     => array(
          array(
              'taxonomy'  => 'subjects',
              'operator'  => 'EXISTS'
          )
      )
      
  );
  $query = new WP_Query($args);
  // var_dump($query);die;

  $html = '';
  if($query->have_posts()) :
      while($query->have_posts()) : $query->the_post();
          $html .= '<h2><strong>'. the_title(). '</strong></h2>';
          $html .= '<div><p>'. the_content(). '</p>';
      endwhile;
  endif;
  return $html;
}
add_shortcode('all_movies', 'call_movies_archive');

?>