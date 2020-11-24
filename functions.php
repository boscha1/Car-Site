<?php

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";
$firstname = $lastname = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["first_name"])) {
		$firstnameErr = "Name is required";
	}
	else {
		$firstname = test_input($_POST["first_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
			$firstnameErr = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["last_name"])) {
		$lastnameErr = "Last name is required";
	}
	else {
		$lastname = test_input($_POST["last_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
			$lastnameErr = "Only letters and white space allowed";
		}
	}
	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
  