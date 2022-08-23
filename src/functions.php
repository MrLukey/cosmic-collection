<?php

function format_event_elements(array $elements): array {
	$elements_produced = [];
	foreach ($elements as $element){
		if (array_key_exists('name', $element)) $elements_produced[] = $element['name'];
		else return ['FAIL'];
	}
	return $elements_produced;
}

function display_cosmic_event(array $db_row, array $event_elements, string $pic_class): string {
	if (!array_key_exists('name', $db_row) || !array_key_exists('caused_by', $db_row) ||
		!array_key_exists('creates_effect', $db_row))
		return 'FAIL';
	$html = '<div class="cosmic_event"><h2>' . $db_row['name'] . '</h2><p><span>Cause: </span>'
		. $db_row['caused_by'] . '</p><p><span>Effect: </span>' . $db_row['creates_effect']
		. '</p><p><span>Produces: </span>';
	if (count($event_elements) > 0){
		$last_element = array_pop($event_elements);
		foreach ($event_elements as $element){
			$html .= $element . ', ';
		}
		$html .= $last_element;
	}
	return $html . '</p><div class="picture ' . $pic_class . '"></div></div>';
}

function create_element_checkbox(string $element): string {
	return '<div class="p_element"><input type="checkbox" class="element_input" name="' . $element . '" id="'
		. $element . '"><label class="element_label" for="' . $element . '">' . $element . '</label></div>';
}

function generate_html_class(string $event_name): string {
	if ($event_name === 'Big Bang') return 'big_bang';
	if ($event_name === 'Cosmic Rays') return 'cosmic_rays';
	if ($event_name === 'Exploding Massive Stars') return 'massive_stars';
	if ($event_name === 'Dying Low Mass Stars') return 'low_mass_stars';
	if ($event_name === 'Merging Neutron Stars') return 'neutron_stars';
	if ($event_name === 'Exploding White Dwarfs') return 'white_dwarfs';
	if ($event_name === 'Biological Life') return 'bio_life';
	if ($event_name === 'Synthetic Life') return 'synth_life';
	return 'default';
}