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
    add_menu_page('Countdown Timer', 'Countdown Timer', 'manage_options','timer', 'init','dashicons-format-quote', 9);
    add_submenu_page('timer', 'Add New Timmer', 'Add new', 'manage_options', 'add-new-timer', 'add_new_timmer');
}
add_action('admin_menu','show_in_menu');

function init(){
    include 'assets/templates/timmer_list.php';
}
function add_new_timmer(){
    include 'assets/templates/new_timmer.php';
}

/* Plugin's shortcode */
function countdown_timer_shortcode(){
?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<h1>Countdown Timer</h1>

<p id="demo"></p>
<?php
}
add_shortcode('timer_shortcode','countdown_timer_shortcode');