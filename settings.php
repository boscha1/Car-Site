<?php
	// PDO = PHP Data Objects
	// PDO is a Database Access Abstraction Layer
	// PDO Benefits:
	//		- security (usable prepared statements)
	//		- usability (many helper functions to automate routine operations)
	//		- reusability (unified API to access multitude of databases, from SQLite to Oracle)
	

$charset = 'utf8';


if ($_SERVER['SERVER_NAME']=='localhost') {
	$host = 'localhost';
	$db = 'midtermdb';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';
	$base_URL = 'http://localhost:8080/Final%20Project/';
}
else {
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$host = $url["host"];
	$db = substr($url["path"], 1);
	$user = $url["user"];
	$pass = $url["pass"];
	$base_URL = 'https://nku-carsite.herokuapp.com/';
	$host = 'us-cdbr-east-02.cleardb.com';
	$user = 'b1e54e97eee6b1';
	$pass = '585bed36';
}

session_start();
