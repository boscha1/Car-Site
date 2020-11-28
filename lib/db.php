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
	
	query($pdo, '
	CREATE DATABASE IF NOT EXISTS `midtermdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `midtermdb`');


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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4');

query($pdo, 'INSERT INTO `cars` (`ID`, `make`, `model`, `year`, `miles`, `price`, `userID`, `state_code`) VALUES
(44, \'Chevy\', \'Malibu\', 2005, 80000, 15000, 21, \'\'),
(45, \'Lexus\', \'RX\', 2013, 2000, 25000, 28, \'\'),
(46, \'Honda\', \'Civic\', 2020, 80000, 200000, 28, \'\'),
(47, \'Mercedes\', \'Benz\', 2010, 59448, 10000, 31, \'\')');

query($pdo, 'CREATE TABLE IF NOT EXISTS `states` (
  `state_code` varchar(2) NOT NULL,
  `state_name` varchar(32) NOT NULL,
  PRIMARY KEY (`state_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');

query($pdo, 'INSERT INTO `states` (`state_code`, `state_name`) VALUES
(\'AK\', \'Alaska\'),
(\'AL\', \'Alabama\'),
(\'AR\', \'Arkansas\'),
(\'AZ\', \'Arizona\'),
(\'CA\', \'California\'),
(\'CO\', \'Colorado\'),
(\'CT\', \'Connecticut\'),
(\'DC\', \'District of Columbia\'),
(\'DE\', \'Delaware\'),
(\'FL\', \'Florida\'),
(\'GA\', \'Georgia\'),
(\'HI\', \'Hawaii\'),
(\'IA\', \'Iowa\'),
(\'ID\', \'Idaho\'),
(\'IL\', \'Illinois\'),
(\'IN\', \'Indiana\'),
(\'KS\', \'Kansas\'),
(\'KY\', \'Kentucky\'),
(\'LA\', \'Louisiana\'),
(\'MA\', \'Massachusetts\'),
(\'MD\', \'Maryland\'),
(\'ME\', \'Maine\'),
(\'MI\', \'Michigan\'),
(\'MN\', \'Minnesota\'),
(\'MO\', \'Missouri\'),
(\'MS\', \'Mississippi\'),
(\'MT\', \'Montana\'),
(\'NC\', \'North Carolina\'),
(\'ND\', \'North Dakota\'),
(\'NE\', \'Nebraska\'),
(\'NH\', \'New Hampshire\'),
(\'NJ\', \'New Jersey\'),
(\'NM\', \'New Mexico\'),
(\'NV\', \'Nevada\'),
(\'NY\', \'New York\'),
(\'OH\', \'Ohio\'),
(\'OK\', \'Oklahoma\'),
(\'OR\', \'Oregon\'),
(\'PA\', \'Pennsylvania\'),
(\'RI\', \'Rhode Island\'),
(\'SC\', \'South Carolina\'),
(\'SD\', \'South Dakota\'),
(\'TN\', \'Tennessee\'),
(\'TX\', \'Texas\'),
(\'UT\', \'Utah\'),
(\'VA\', \'Virginia\'),
(\'VT\', \'Vermont\'),
(\'WA\', \'Washington\'),
(\'WI\', \'Wisconsin\'),
(\'WV\', \'West Virginia\'),
(\'WY\', \'Wyoming\')');

query($pdo, 'CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(48) DEFAULT NULL,
  `last_name` varchar(48) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(72) DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4');


query($pdo, 'INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(18, \'Jeff\', \'Smith\', \'smithj1@nku.edu\', \'$2y$10$l.nKN80joEuhrhLz4XwXHezuKM6GQGn.d2/SppdM4QRhDUvtgKxa2\', 0),
(21, \'admin\', \'admin\', \'admin@test.com\', \'$2y$10$kItIsYRb8wncW4J6yOT23OkiS4ih8QKLSDNdVCLkFODU6H4FqiOGO\', 1),
(23, \'Denise\', \'Bosch\', \'djbosch@live.com\', \'$2y$10$jDbQ2FOUDB2U.vsFl2NDe.c825OvRe4tYLjydWffDG2SqGJDTbvUm\', 0),
(28, \'Anthony\', \'Bosch\', \'bosch.anthony7@gmail.com\', \'$2y$10$eJzqbUO9p/AZ5jetrk8miuRqaUFkK4IOvUBhoEXCO.Y/143Nw6MSy\', 0),
(30, \'Ringo\', \'Starr\', \'starr@nku.edu\', \'$2y$10$P8/4A6.q042xVT7N8KHkfuAJ.ICMnvUXOW6e9D7QKg7P5AKvhmafa\', 0),
(31, \'Michael\', \'Jordan\', \'jordan@nku.edu\', \'$2y$10$i8bMZNMPyqcwBl.DgLC05.EjnANkC8nLE4LsEXrs10UvEx7HBtHJC\', 0);
COMMIT;
	');
		
	die('table created');
}
catch(Exception $e) {
	print_r($e);
	die();
}