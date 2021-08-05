<?php

function format_event_elements(array $elements): array {
	$elements_produced = [];
	foreach ($elements as $element){
		if (array_key_exists('name', $element)) $elements_produced[] = $element['name'];
		else return ['FAIL'];
	}
	return $elements_produced;
}

function display_cosmic_event(array $db_row, array $event_elements): string {
	if (!array_key_exists('name', $db_row) || !array_key_exists('caused_by', $db_row) ||
		!array_key_exists('creates_effect', $db_row))
		return 'FAIL';
	$html = '<div class="cosmic_event"><h2>' . $db_row['name'] . '</h2><h3>Caused by: ' . $db_row['caused_by']
		. '</h3><h3>Creates: ' . $db_row['creates_effect'] . '</h3><h3>Produces:</h3><p>';
	foreach ($event_elements as $element){
		$html .= $element . ', ';
	}
	return $html . '</p></div>';
}

function create_element_checkbox(string $element): string {
	return '<div class="p_element"><input type="checkbox" class="element_input" name="' . $element . '" id="'
		. $element . '"><label class="element_label" for="' . $element . '">' . $element . '</label></div>';
}