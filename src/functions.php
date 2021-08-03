<?php

function format_Event_Elements(array $elements): array {
	$elements_produced = [];
	foreach ($elements as $element){
		$elements_produced[] = $element['name'];
	}
	return $elements_produced;
}

function display_Cosmic_Event(array $db_row, array $event_elements): string {
	$html = '<div class="cosmic_event"><h2>' . $db_row['name'] . '</h2><h3>Caused by: ' . $db_row['caused_by']
		. '</h3><h3>Creates: ' . $db_row['creates_effect'] . '</h3><h3>Produces:</h3><p>';
	foreach ($event_elements as $element){
		$html .= $element . ', ';
	}
	return $html . '</p></div>';
}