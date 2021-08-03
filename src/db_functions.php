<?php

function create_PDO(): PDO {
	$db = new PDO('mysql:host=db; dbname=cosmic_collector', 'root', 'password');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	return $db;
}

function extract_Cosmic_Events(PDO $db): array {
	$cosmic_event_query = $db->prepare('SELECT * FROM `cosmic_events`;');
	$cosmic_event_query->execute();
	return $cosmic_event_query->fetchAll();
}

function extract_Event_Elements(PDO $db, array $db_row): array {
	$elements_query = $db->prepare("
		SELECT elements.name
		FROM event_elements
	    INNER JOIN cosmic_events 
	        ON event_elements.event_id = cosmic_events.id
	    INNER JOIN elements 
	        ON event_elements.element_id = elements.id
	    WHERE cosmic_events.name = '" . $db_row['name'] . "'");
	$elements_query->execute();
	return $elements_query->fetchAll();
}
