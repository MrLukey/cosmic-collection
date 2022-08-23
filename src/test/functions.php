<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
	public function test_success_display_cosmic_event() {
		$db_row_input = [
			'id' => 1,
			'name' => 'Big Bang',
			'caused_by' => 'Unknown',
			'creates_effect' => 'Fusion'];
		$event_elements = ['Unit', 'Testing', 'Is', 'Super', 'Fun'];
		$expected_output = '<div class="cosmic_event"><h2>Big Bang</h2><h3>Caused by: Unknown</h3><h3>Creates: '
			. 'Fusion</h3><h3>Produces:</h3><p>Unit, Testing, Is, Super, Fun, </p></div>';
		$actual_output = display_cosmic_event($db_row_input, $event_elements);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_failure_display_cosmic_events() {
		$db_row_input = [
			'id' => 1,
			'name' => 'Big Bang',
			'caused_by' => 'Unknown',
			'will_wonker' => 'Fusion'];
		$event_elements = ['Unit', 'Testing', 'Is', 'Super', 'Fun'];
		$expected_output = 'FAIL';
		$actual_output = display_cosmic_event($db_row_input, $event_elements);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_malformed_display_cosmic_event() {
		$db_row_input = 1;
		$event_elements = [1, 2, 5, 7];
		$this->expectException(TypeError::class);
		$output = display_cosmic_event($db_row_input, $event_elements);
	}

	public function test_malformed_2_display_cosmic_event() {
		$db_row_input = [
			'id' => 1,
			'name' => 'Big Bang',
			'caused_by' => 'Unknown',
			'creates_effect' => 'Fusion'];
		$event_elements = 1;
		$this->expectException(TypeError::class);
		$output = display_cosmic_event($db_row_input, $event_elements);
	}

	public function test_success_format_event_elements() {
		$input = [
			['name' => 'Hydrogen'],
			['name' => 'Helium'],
			['name' => 'Lithium']];
		$expected_output = ['Hydrogen', 'Helium', 'Lithium'];
		$actual_output = format_event_elements($input);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_failure_format_event_elements() {
		$input = [
			['timmy' => 'Hydrogen'],
			['was' => 'Helium'],
			['green' => 'Lithium']];
		$expected_output = ['FAIL'];
		$actual_output = format_event_elements($input);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_malformed_format_event_elements() {
		$input = 'NOOOOOO!';
		$this->expectException(TypeError::class);
		$output = format_event_elements($input);
	}

	public function test_success_create_element_checkbox() {
		$input = 'Hydrogen';
		$expected_output = '<div class="p_element"><input type="checkbox" class="element_input" name="Hydrogen" id="'
			. 'Hydrogen"><label class="element_label" for="Hydrogen">Hydrogen</label></div>';
		$actual_output = create_element_checkbox($input);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_malformed_create_element_checkbox() {
		$input = [1, 2, 3];
		$this->expectException(TypeError::class);
		$output = create_element_checkbox($input);
	}

}