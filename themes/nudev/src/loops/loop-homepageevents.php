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

// Setup cURL request to Localist API
$ch = curl_init();

// Return 8 events, starting "today", looking forward at most 7 days
// curl_setopt($ch, CURLOPT_URL, 'http://calendar.northeastern.edu/api/2.2/events?pp=8&days=7');
curl_setopt($ch, CURLOPT_URL, 'http://calendar.northeastern.edu/api/2.2/events?pp=8&days=60&sort=ranking&distinct=true');

// TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// TRUE to follow any "Location: " header that the server sends as part of the HTTP header
// (note this is recursive, PHP will follow as many "Location: " headers that it is sent, unless CURLOPT_MAXREDIRS is set).
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// The maximum number of seconds to allow CURL functions to execute.
curl_setopt($ch, CURLOPT_TIMEOUT, 5);

// The number of seconds to wait whilst trying to connect. Use 0 to wait indefinitely.
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

// Returns TRUE on success or FALSE on failure.
// However, if the CURLOPT_RETURNTRANSFER option is set, (which it is)
// it will return the result on success, FALSE on failure.
$data = curl_exec($ch);

curl_close($ch);

// Decode the returned JSON string
$decoded = json_decode($data, true);

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
$upcoming_events = "<div class=\"eventgrid\">";

// Concat. all the grid items
foreach( $decoded['events'] as $i => $event ){

		// The Permalink to the Event
		$event_permalink_url = $event['event']['localist_url'];

		// The 'start' date of this 'instance' of this 'event'  (can be a little confusing)
				// Note: The start timestamp always includes a time, even if none was specified on the event. The all_day flag will be true if there is no defined start time.
				// recurring	true if the event is recurring (has more than 5 instances)
		$event_date = date( 'M d',strtotime($event['event']['event_instances'][0]['event_instance']['start']));

		// Event Title, trimmed to 55 characters (nearest word)
		$event_title = substrwords($event['event']['title'], 55);

		// Event description, trimmed to 200 characters (nearest word)
		$event_description = substrwords(strip_tags($event['event']['description']), 200);

		// var containing all 8 events (not their grid wrapper / flex parent!)
		$upcoming_events .=
				"
						<div class=\"eventgrid-item\">
								<a class=\"eventgrid-item--linkwrap\" href=\"$event_permalink_url\" target=\"_blank\" title=\"Click to learn more\">
										<h3 class=\"eventgrid-item-date\">$event_date</h3>
										<h5 class=\"eventgrid-item-title\">$event_title</h5>
										<p class=\"eventgrid-item-description\">$event_description</p>
								</a>
						</div>
				"
		;
}
// Add the view all button and close the grid wrapper (flex parent)
$upcoming_events .=
		"
				</div><div class=\"eventgrid-viewall\">
								<a class=\"eventgrid-viewall-link\" href=\"http://calendar.northeastern.edu/\" target=\"_blank\" title=\"Click here to view full calendar\">View Full Calendar</a>
						</div>
				</div>
		";

		echo $upcoming_events;

?>
