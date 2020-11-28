<?php
	// PDO = PHP Data Objects
	// PDO is a Database Access Abstraction Layer
	// PDO Benefits:
	//		- security (usable prepared statements)
	//		- usability (many helper functions to automate routine operations)
	//		- reusability (unified API to access multitude of databases, from SQLite to Oracle)

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
echo $server;
die();

if ($_SERVER['SERVER_NAME']=='localhost') {
	$host = 'localhost';
	$db = 'midtermdb';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';
	$base_URL = 'http://localhost:8080/Final%20Project/';
}
else {
	$host = 'localhost';
	$db = 'heroku_1ad6155d62809e0';
	$user = 'b533c8afed0280';
	$pass = 'f199a65e ';
	$charset = 'utf8';
	$base_URL = 'https://nku-car-site.herokuapp.com/';
}

session_start();