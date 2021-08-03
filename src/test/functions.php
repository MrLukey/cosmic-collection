<?php

require '../functions.php';

use PHPUnit\Framework\TestCase; // magic to get PHPUnit testing to work (lookup)

class Functions extends TestCase
{
	public function test_Success_Display_Cosmic_Event() {
		$db_row_input = [
			'id' => 1,
			'name' => 'Big Bang',
			'caused_by' => 'Unknown',
			'creates_effect' => 'Fusion'];
		$event_elements = ['Unit', 'Testing', 'Is', 'Super', 'Fun'];
		$expected_output = '<div class="cosmic_event"><h2>Big Bang</h2><h3>Caused by: Unknown</h3><h3>Creates: '
			. 'Fusion</h3><h3>Produces:</h3><p>Unit, Testing, Is, Super, Fun, </p></div>';
		$actual_output = display_Cosmic_Event($db_row_input, $event_elements);
		$this->assertEquals($expected_output, $actual_output);
	}

	public function test_Malformed_Display_Cosmic_Event() {
		$db_row_input = 1;
		$event_elements = [1, 2, 5, 7];
		$this->expectException(TypeError::class);
		$output = display_Cosmic_Event($db_row_input, $event_elements);
	}
}