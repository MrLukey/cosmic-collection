<?php
require 'functions.php';
require 'db_functions.php';

$db = create_PDO();
$cosmic_events = extract_Cosmic_Events($db);
$elements_produced = [];
foreach ($cosmic_events as $event) {
    $event_elements = extract_Event_Elements($db, $event);
    $elements_produced[$event['name']] = format_Event_Elements($event_elements);
}
?>

<html lang="en-gb">
<head>
	<meta charset="utf-8">
	<title>Cosmic Collector</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="cosmic_collector.css">
</head>
<body>
	<div class="cosmic_events">
		<?php
		foreach ($cosmic_events as $event) {
			echo display_Cosmic_Event($event, $elements_produced[$event['name']]);
		}?>
	</div>
</body>
</html>