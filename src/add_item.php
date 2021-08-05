<?php

require 'functions.php';
require 'db_functions.php';
$display_string = '';
if (isset($_POST['cosmic_event'])){
	$db = new PDO('mysql:host=db; dbname=cosmic_collector', 'root', 'password');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$insert_query = $db->prepare(
		"INSERT INTO `cosmic_events` (`name`, `caused_by`, `creates_effect`) VALUES (:name, :caused_by, :creates_effect)"
	);
	$insert_query->bindParam(':name', $_POST['cosmic_event']);
	$insert_query->bindParam(':caused_by', $_POST['caused_by']);
	$insert_query->bindParam(':creates_effect', $_POST['creates_effect']);
	$insert_query->execute();
	$display_string = $_POST['cosmic_event'] . ' was added to the collection';
	unset($_POST);
}?>


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
<div class="collectable_form">
	<form action="add_item.php" method="post">
        <h2>New Item:</h2>
        <label for="cosmic_event">Enter Cosmic Event:</label>
		<input type="text" name="cosmic_event" id="cosmic_event" placeholder="e.g Supernova" required>

        <label for="caused_by">Enter Cause:</label>
		<input type="text" name="caused_by" id="caused_by" placeholder="e.g Gravity" required>

        <label for="creates_effect">Enter Effect:</label>
		<input type="text" name="creates_effect" id="creates_effect" placeholder="e.g New Elements" required>
		<input type="submit" class="submit">
	</form>
</div>
<footer>
	<?php echo $display_string?>
</footer>
</body>
</html>