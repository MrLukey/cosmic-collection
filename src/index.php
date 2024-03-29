<?php
require 'functions.php';
require 'db_functions.php';

$db = new PDO('mysql:host=db; dbname=cosmic_collector', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$cosmic_events = extract_cosmic_events($db);
$elements_produced = [];
foreach ($cosmic_events as $event) {
    $event_elements = extract_event_elements($db, $event);
    $elements_produced[$event['name']] = format_event_elements($event_elements);
}
?>

<html lang="en-gb">
<head>
	<meta charset="utf-8">
	<title>Cosmic Collector</title>
	<link rel="stylesheet" type="text/css" href="cosmic_collector.css">
    <link rel="stylesheet" type="text/css" href="event_styling.css">
</head>
<body>
<nav>
    <a href="add_item.php">Add Item</a>
</nav>
<h1>Cosmic Events</h1>
<div class="cosmic_events">
    <?php
    foreach ($cosmic_events as $event) {
        $class = generate_html_class($event['name']);
        echo display_cosmic_event($event, $elements_produced[$event['name']], $class);
    }?>
</div>
</body>
</html>