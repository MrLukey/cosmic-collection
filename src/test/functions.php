<?php

require '../functions.php';

use PHPUnit\Framework\TestCase; // magic to get PHPUnit testing to work (lookup)

class Functions extends TestCase
{
	public function test_Success_Display_Cosmic_Event() {
		$input = [
			'id' => 1,
			'name' => 'Big Bang',
			'caused_by' => 'Unknown',
			'creates_effect' => 'Fusion'];
		$expected_output = '<div class="cosmic_event"><h2>Big Bang</h2><h3>Caused by: Unknown</h3><h3>Creates: '
			. 'Fusion</h3><h3>Produces: </h3></div>';
		$actual_output = display_Cosmic_Event($input);
		$this->assertEquals($expected_output, $actual_output);
	}
}