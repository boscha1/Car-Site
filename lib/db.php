<?php
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
	];
// Connection to the database
$pdo = new PDO($dsn, $user, $pass, $opt);
if (!isset($pdo)) die('error');
// Advantage of PDO:
//		- Write the query once, but can use it multiple times
function query($pdo,$query,$data=[]) {
	$query = $pdo->prepare($query);
	$query->execute($data);
	return $query;
}