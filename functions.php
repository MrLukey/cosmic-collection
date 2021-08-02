<?php

function display_Cosmic_Event(array $db_row): string {
	return '<div class="cosmic_event"><h2>' . $db_row['name'] . '</h2><h3>Caused by: ' . $db_row['caused_by']
		. '</h3><h3>Creates: ' . $db_row['creates_effect'] . '</h3><h3>Produces: </h3></div>';
}

function extract_Event_Elements(array $db_query_results): array {
	$event_elements = [];
	foreach ($db_query_results as $row){
		$event_elements[] = $row['name'] . '-' . $row['atomic-mass'];
	}
	return $event_elements;
}