<?php

function extract_cosmic_events(PDO $db): array {
	$cosmic_event_query = $db->prepare('SELECT * FROM `cosmic_events`;');
	$cosmic_event_query->execute();
	return $cosmic_event_query->fetchAll();
}

function extract_event_elements(PDO $db, array $db_row): array {
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
