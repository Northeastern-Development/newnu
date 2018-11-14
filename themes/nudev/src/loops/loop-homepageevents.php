<?php

	// Trim $text to $maxchar - to nearest word, no word breaking - and insert $end after

	/**
	 * @param string $text (to trim)
	 * @param int $maxchar (rounded to nearest word)
	 * @param string $end (defaults to ...)
	 * @return string
	 */
	function substrwords($text, $maxchar, $end='...') {
		if (strlen($text) > $maxchar || $text == '') {
			$words = preg_split('/\s/', $text);
			$output = '';
			$i = 0;
			while (1) {
				$length = strlen($output)+strlen($words[$i]);
				if ($length > $maxchar) {
					break;
				}
				else {
					$output .= " " . $words[$i];
					++$i;
				}
			}
			$output .= $end;
		}
		else {
			$output = $text;
		}
		return $output;
	}

	$upcoming_events = '';

	$maxItems = 8;

	// grab the data from localist
	$data = wp_remote_get('http://calendar.northeastern.edu/api/2.2/events?pp='.$maxItems.'&days=60&sort=ranking&distinct=true');

	if(gettype($data) == "array"){	// if we don't have an array, something went wrong so don't build anything

		// Decode the returned JSON string
		$decoded = json_decode($data['body'], true);

		// let's check to make sure that we actually have an array of events to work with
		if(isset($decoded['events']) && count($decoded['events']) > 0){

			$upcoming_events .= '<hr class="events"><div id="nu__events">';

			// If using the TRENDING fetch, set this to true!
			$sort_trending = true;
			// When using TRENDING, sort the results by date (so its 8 trending results, then sorted by date here)
			if( $sort_trending === true ){
			  usort($decoded['events'], function($a, $b){
			    $timeStamp1 = strtotime($a['event']['event_instances'][0]['event_instance']['start']);
			    $timeStamp2 = strtotime($b['event']['event_instances'][0]['event_instance']['start']);
			    return $timeStamp1 - $timeStamp2;
			  });
			}

			// Open the Grid Wrapper (flex parent)
			$upcoming_events .= '<div class="eventgrid">';

			$guide = '<div class="eventgrid-item"><a class="eventgrid-item--linkwrap" href="%s" target="_blank" title="Click to learn more about %s [will open in new tab/window]" aria-label="Click to learn more about %s [will open in new tab/window]"><h3 class="eventgrid-item-date">%s</h3><h4 class="eventgrid-item-title">%s</h4><p class="eventgrid-item-description">%s</p><div class="chevron">&#xe5cc;</div></a></div>';

			// Concat. all the grid items
			foreach( $decoded['events'] as $i => $event ){

					// var containing all 8 events (not their grid wrapper / flex parent!)
					$upcoming_events .= sprintf(
						$guide
						,$event['event']['localist_url']
						,substrwords($event['event']['title'], 55)
						,substrwords($event['event']['title'], 55)
						,date( 'M d',strtotime($event['event']['event_instances'][0]['event_instance']['start']))
						,substrwords($event['event']['title'], 55)
						,substrwords(strip_tags($event['event']['description']), 200)
					);

			}

			// Add the view all button and close the grid wrapper (flex parent)
			$upcoming_events .= '</div><div class="eventgrid-viewall"><a class="eventgrid-viewall-link" href="http://calendar.northeastern.edu/" target="_blank" title="Click here to view full calendar [will open in new tab/window]" aria-label="Click here to view full calendar [will open in new tab/window]">View Full Calendar</a></div></div></div>';

		}
	}

	echo $upcoming_events;

?>
