<?php

function extract_cosmic_events(PDO $db): array {
	$cosmic_event_query = $db->prepare('SELECT * FROM `cosmic_events`;');
	$cosmic_event_query->execute();
	return $cosmic_event_query->fetchAll();
}

function extract_event_elements(PDO $db, array $db_row): array {
	$elements_query = $db->prepare("
		SELECT DISTINCT elements.name
		FROM event_elements
	    INNER JOIN cosmic_events 
	        ON event_elements.event_id = cosmic_events.id
	    INNER JOIN elements 
	        ON event_elements.element_id = elements.id
	    WHERE cosmic_events.name = '" . $db_row['name'] . "'");
	$elements_query->execute();
	return $elements_query->fetchAll();
}

function extract_all_elements(PDO $db): array {
	$elements_query = $db->prepare("
		SELECT name
		FROM elements
		ORDER BY id ASC");
	$elements_query->execute();
	return $elements_query->fetchAll();
}

function extract_event_id(PDO $db, string $event_name): array {
	$id_query = $db->prepare("
		SELECT id
		FROM cosmic_events
		WHERE name = '" . $event_name . "'");
	$id_query->execute();
	return $id_query->fetch();
}
