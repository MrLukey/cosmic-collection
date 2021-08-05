<?php

require 'functions.php';
require 'db_functions.php';

$db = new PDO('mysql:host=db; dbname=cosmic_collector', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$all_elements_assoc = extract_all_elements($db);
$all_elements = format_event_elements($all_elements_assoc);

$display_string = '';

if (isset($_POST['cosmic_event'])){
    $event_name = $_POST['cosmic_event'];
	$insert_query = $db->prepare(
		"INSERT INTO `cosmic_events` (`name`, `caused_by`, `creates_effect`) VALUES (:name, :caused_by, :creates_effect)"
	);
	$insert_query->bindParam(':name', $_POST['cosmic_event']);
	unset($_POST['cosmic_event']);
	$insert_query->bindParam(':caused_by', $_POST['caused_by']);
	unset($_POST['caused_by']);
	$insert_query->bindParam(':creates_effect', $_POST['creates_effect']);
	unset($_POST['creates_effect']);
	$success = $insert_query->execute();
	if ($success) {
		$event_id = extract_event_id($db, $event_name)['id'];
		$elements_added = array_keys($_POST);
		foreach ($elements_added as $element) {
			$element_id = array_search($element, $all_elements) + 1;
			$insert_event_element = $db->prepare(
				"INSERT INTO `event_elements` (`event_id`, `element_id`) VALUES ($event_id, $element_id)");
			$insert_event_element->execute();
		}
		unset($_POST);
		$display_string = $event_name . ' was added to the database';
	} else $display_string = $event_name . ' was NOT added to the database.<br>Only unique cosmic events can be stored.'
        . '<br>Please try again.';
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
<nav>
    <a href="index.php">Display Collection</a>
</nav>
<div class="insert_message">
	<?php echo $display_string?>
</div>
<div class="collectable_form">
	<form action="add_item.php" method="post" class="input_form">
        <h2>New Item:</h2>
        <label for="cosmic_event" class="event_label">Enter Cosmic Event:</label>
		<input type="text" name="cosmic_event" id="cosmic_event" class="event_input"
               placeholder="e.g Supernova" required>

        <label for="caused_by" class="event_label">Enter Cause:</label>
		<input type="text" name="caused_by" id="caused_by" class="event_input"
               placeholder="e.g Gravity" required>

        <label for="creates_effect" class="event_label">Enter Effect:</label>
		<input type="text" name="creates_effect" id="creates_effect" class="event_input"
               placeholder="e.g New Elements" required>
        <input type="submit" class="submit">
        <div class="elements_checkbox">
            <?php foreach ($all_elements as $element){
                echo create_element_checkbox($element);
            }?>
        </div>
	</form>
</div>
</body>
</html>