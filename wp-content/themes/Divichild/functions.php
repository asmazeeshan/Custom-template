<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child', get_stylesheet_directory_uri(). '/style.css',array( 'parent'),rand(111,9999));
    
}
function copyright_notice(){
    echo 'Copyright 2021.All Rights Reserved.';
}
add_action('wp_footer','copyright_notice');

/* Add a paragraph only to Pages. */
function my_added_page_content ( $content ) {
    if ( is_page() ) {
        return $content . '<p>Your content added to all pages (not posts).</p>';
    }
 
    return $content;
}
add_filter( 'the_content', 'my_added_page_content');
//function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 );
?>