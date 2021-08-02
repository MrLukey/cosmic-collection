<?php

$db = new PDO('mysql:host=db; dbname=lukes_cosmic_events', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare('SELECT * FROM `cosmic_events`;');
$query->execute();
$cosmic_events = $query->fetchAll();
print_r($cosmic_events);