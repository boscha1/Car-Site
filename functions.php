<?php
require_once('../settings.php');
require_once('../lib/db.php');

function validate_carInfo($query_to_execute) {
	if (empty($_POST['make'])) {
			die('Please enter the make');
	}
	elseif (empty($_POST['model'])) {
		die('Please enter the model');
	}
	elseif (empty($_POST['year'])) {
		die('Please enter the year');
	}
	elseif (empty($_POST['miles'])) {
		die('Please enter amount of miles');
	}
	elseif (empty($_POST['price'])) {
		die('Please enter a price');
	}
	elseif (!is_numeric($_POST['year']) || count($_POST['year']) > 4) {
		die('Please enter a valid year');
	}
	else {
		$query_to_execute;
		header('location:index.php');
	}
}	