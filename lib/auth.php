<?php
//session_start();
if(count($_POST) > 0 && isset($_POST['action']{0})){
	if($_POST['action'] == 'signup') 
		signup();
	else
		signin();
}

function signin(){
	require_once('../settings.php');
	require_once('db.php');
	
	// retrieve any user with the email entered by the user
	$result = query($pdo, 'SELECT * FROM users WHERE email=?',[$_POST['email']]);
	
// if there are no records, the user does not exist
	if ($result->rowCount()==0) die('The user is not registered');

	$result = $result->fetch();
	
	if (!password_verify($_POST['password'],$result['password']))
		die('The password is not correct');
	
	$_SESSION['user/ID'] = $result['ID'];
	// sprintf is like a format specifier
	$_SESSION['user/name'] = sprintf('%s %s',$result['first_name'], $result['last_name']);
	$_SESSION['user/role'] = $result['role'];
	
	header('location: ../sellers/details.php?id='.$result['ID']);
}

// store the users information in some kind of database
function signup() {
	require_once('../settings.php');
	require_once('db.php');
	// retrieve any user with the email entered by the user
	$result = query($pdo, 'SELECT * FROM users WHERE email=?',[$_POST['email']]);

	// if the result of the query has some rows --> meaning we have a user
	// then the email is already registered
	
	$email = $_POST['email'];
	
	if ($result->rowCount()>0) 
		die('The email address is already registered');
	
	
	if (empty($_POST['first_name'])) {
		die('Please enter first name');
	}
	elseif (empty($_POST['last_name'])) {
		die('Please enter last name');
	}
	elseif (empty($_POST['email'])) {
		die('Please enter email');
	}
	elseif (empty($_POST['password'])) {
		die('Please enter password');
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		die("$email is not a valid email address");
	}
	
	else { // otherwise, insert and redirect the user
		query($pdo, 'INSERT INTO users(first_name, last_name, email,password) VALUES(?,?,?,?)',[ucfirst($_POST['first_name']),ucfirst($_POST['last_name']),
		$_POST['email'], password_hash($_POST['password'],PASSWORD_DEFAULT)]);
		header('location: ../index.php');
	}
}

function signout() {
	require_once('settings.php');
	session_destroy();
	header('location: index.php');
}

