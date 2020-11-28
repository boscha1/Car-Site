<?php
	// PDO = PHP Data Objects
	// PDO is a Database Access Abstraction Layer
	// PDO Benefits:
	//		- security (usable prepared statements)
	//		- usability (many helper functions to automate routine operations)
	//		- reusability (unified API to access multitude of databases, from SQLite to Oracle)

$host = 'localhost';
$db = 'midtermdb';
$user = 'root';
$pass = '';
$charset = 'utf8';

echo('<pre>');
if ($_SERVER['SERVER_NAME']=='localhost') 
	$base_URL = 'http://localhost:8080/Final%20Project/';
else
	$base_URL = 'https://nku-car-site.herokuapp.com/';

session_start();