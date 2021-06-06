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
function testing_callback(){
?>
<center>
    <div id="countdown-container">
        <div id="countdown">
            <span id="days">0d</span> : <span id="hours">0h</span> :
            <span id="minutes">0m</span> : <span id="seconds">0s</span>
        </div>
    </div>
</center>
<script>
let days = 2; //starting number of days
let hours = 0; // starting number of hours
let minutes = 2; // starting number of minutes
let seconds = 5; // starting number of seconds

// converts all to seconds
let totalSeconds =
days * 60 * 60 * 24 + hours * 60 * 60 + minutes * 60 + seconds;

//temporary seconds holder
let tempSeconds = totalSeconds;

// calculates number of days, hours, minutes and seconds from a given number of seconds
const convert = (value, inSeconds) => {
if (value > inSeconds) {
    let x = value % inSeconds;
    tempSeconds = x;
    return (value - x) / inSeconds;
} else {
    return 0;
}
};

//sets seconds
const setSeconds = (s) => {
document.querySelector("#seconds").textContent = s + "s";
};

//sets minutes
const setMinutes = (m) => {
document.querySelector("#minutes").textContent = m + "m";
};

//sets hours
const setHours = (h) => {
document.querySelector("#hours").textContent = h + "h";
};

//sets Days
const setDays = (d) => {
document.querySelector("#days").textContent = d + "d";
};

// Update the count down every 1 second
var x = setInterval(() => {
//clears countdown when all seconds are counted
if (totalSeconds <= 0) {
    clearInterval(x);
}
setDays(convert(tempSeconds, 24 * 60 * 60));
setHours(convert(tempSeconds, 60 * 60));
setMinutes(convert(tempSeconds, 60));
setSeconds(tempSeconds == 60 ? 59 : tempSeconds);
totalSeconds--;
tempSeconds = totalSeconds;
}, 1000);
</script>
<?php
}
add_shortcode('test','testing_callback');
?>
