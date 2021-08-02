<?php
require 'functions.php';

echo produce_HTML_Head();
$db = new PDO('mysql:host=db; dbname=cosmic_collector', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$cosmic_event_query = $db->prepare('SELECT * FROM `cosmic_events`;');
$cosmic_event_query->execute();
$cosmic_events = $cosmic_event_query->fetchAll();

echo '<div class="cosmic_events">';
foreach ($cosmic_events as $event) {
	echo display_Cosmic_Event($event);
}
echo '</div>';

//print_r($cosmic_event);
//display_Cosmic_Event($cosmic_events);