<?php

add_filter( 'nh-events-featured-story', 'nh_events_get_featured_story', 99, 2 );
add_filter( 'nh-events-listing-story', 'nh_events_get_listing_story', 99, 2 );




function nh_events_get_featured_story( $story, $post )
{
	unset($story['description']['excerpt']);

	$datetime = NH_CustomEventPostType::get_datetime( $post->ID );
	$story['datetime'] = $datetime['datetime'];
	$story['description']['datetime'] = $datetime['date'].', '.$datetime['time'];
	$story['description']['datetime'] = nh_event_get_datetime( $post->ID, true );
	$story['description']['location'] = NH_CustomEventPostType::get_location( $post->ID );
	
	return $story;
}

function nh_events_get_listing_story( $story, $post )
{
	$datetime = NH_CustomEventPostType::get_datetime( $post->ID );
	$story['datetime'] = $datetime['datetime'];
	$story['description']['event-info'] = array();
	$story['description']['event-info']['datetime'] = $datetime['date'].', '.$datetime['time'];
	$story['description']['event-info']['datetime'] = nh_event_get_datetime( $post->ID, true );
	$story['description']['event-info']['location'] = NH_CustomEventPostType::get_location( $post->ID );
	
	return $story;
}
	

function nh_event_get_datetime( $post_id, $format = false )
{
	$datetime = '';
	$datetime = get_post_meta( $post_id, 'datetime', true );
	if( !empty($datetime) )
	{
		$datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
		if( $format !== false )
		{
			if( is_string($format) )
				$datetime = $datetime->format($format);
			else
				$datetime = $datetime->format('F d, Y g:i A');
		}
	}
	else
	{
		$datetime = null;
		if( $format ) $datetime = 'No date provided.';
	}
	
	return $datetime;
}


