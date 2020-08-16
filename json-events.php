<?php

global $post;
   $args = array( 
        'post_type' => 'post', 
        'post_status' => 'publish', 
        'nopaging' => true,
    ); 
  
	$posts = get_posts( $args );
	
    $output = array();
   foreach( $posts as $post ) {  
	$post_date = get_the_date('Y-m-d');
        // Pluck the id and title attributes
		$output[] = array( 'id' => $post->ID, 'title' => $post->post_title, 'start' => $post_date, 'end' => $post_date );
		
	} 

	echo json_encode( $output );
	

	

	////////////////////////////////////////////////////////////
	// THIS WORKS IF YOU COMMEMNT OUT THE REST OF THE CODE ABOVE
/*
	
	$year = date('Y');
	$month = date('m');

	echo json_encode(array(
	
		array(
			'id' => 11,
			'title' => "Event1",
			'start' => "$year-$month-10",
			'url' => "http://yahoo.com/"
		),
		
		array(
			'id' => 22,
			'title' => "Event2",
			'start' => "$year-$month-20",
			'end' => "$year-$month-22",
			'url' => "http://yahoo.com/"
		),

		array(
			'id' => 32,
			'title' => "Test Event",
			'start' => "2020-9-2",
			'end' => "2020-9-22",
			'url' => "http://yahoo.com/"
		)
	
	)); 
	
	*/
