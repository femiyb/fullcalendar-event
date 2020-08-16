<?php

/*
    Plugin Name: Calendar
    Plugin URI: https://
    Description: Description to come
    Author: Femi
    Version: 0.0.1
    Author URI: https://
    Text Domain: calendar-event
    Domain Path: /languages
 */

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class Devllo_Events_Calendar_Display {
    public function __construct(){   
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_shortcode('mycalendar', array($this, 'display_calendar'));
        include( 'json-events.php');


    }

    function enqueue_scripts() {   
        wp_enqueue_style( 'calendar_css', '/wp-content/plugins/fullcalendar-event/assets/css/calendar.css');	

        wp_register_script( 'calendar_js', '/wp-content/plugins/fullcalendar-event/assets/js/calendar.js' );
        wp_enqueue_script( 'calendar_js');

        wp_register_script( 'jquery_min_js_online', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' );
        wp_enqueue_script( 'jquery_min_js_online');

        wp_register_script( 'jquery_min_js', '/wp-content/plugins/fullcalendar-event/assets/js/jquery.min.js' );
        wp_enqueue_script( 'jquery_min_js');


        wp_register_script( 'jquery_min_js', '/wp-content/plugins/fullcalendar-event/assets/js/jquery.min.js' );
        wp_enqueue_script( 'jquery_min_js');

        wp_register_script( 'fullcalendar_js', '/wp-content/plugins/fullcalendar-event/assets/js/fullcalendar.js' );
        wp_enqueue_script( 'fullcalendar_js');

        wp_register_script( 'fullcalendar_min_js', '/wp-content/plugins/fullcalendar-event/assets/js/fullcalendar.min.js' );
        wp_enqueue_script( 'fullcalendar_min_js');

    }

    function display_calendar(){
   ?>
<html>
    <head>
    <script>

$(document).ready(function() {
	
  $('#calendar').fullCalendar({
  
   // editable: true,

    
    events: '/wp-content/plugins/fullcalendar-event/json-events.php',
    eventDrop: function(event, delta) {
      alert(event.title + ' was moved ' + delta + ' days\n' +
        '(should probably update your database)');
    },
    
    loading: function(bool) {
      if (bool) $('#loading').show();
      else $('#loading').hide();
    }
    
  });
  
});

</script>
<style>
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}
		
	#loading {
		position: absolute;
		top: 5px;
		right: 5px;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
<div id='loading' style='display:none'>loading...</div>
<div id='calendar'></div>
</body>
</html>
<?php
}  

}
new Devllo_Events_Calendar_Display();