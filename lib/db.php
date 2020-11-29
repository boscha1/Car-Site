<?php
// Advantage of PDO:
//		- Write the query once, but can use it multiple times
function query($pdo,$query,$data=[]) {
	$query = $pdo->prepare($query);
	$query->execute($data);
	return $query;
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
	];
try {
	// Connection to the database
	$pdo = new PDO($dsn, $user, $pass, $opt);

	query($pdo, 'CREATE TABLE IF NOT EXISTS `cars` (
	  `ID` int(11) NOT NULL AUTO_INCREMENT,
	  `make` varchar(48) DEFAULT NULL,
	  `model` varchar(48) DEFAULT NULL,
	  `year` int(4) DEFAULT NULL,
	  `miles` int(11) DEFAULT NULL,
	  `price` double DEFAULT NULL,
	  `userID` int(10) UNSIGNED DEFAULT NULL,
	  `state_code` varchar(2) NOT NULL,
	  PRIMARY KEY (`ID`)
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;');
	die('table created');

}
catch(Exception $e) {
	print_r($e);
	die();
}