<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

$result = query($pdo, 'SELECT userID FROM cars WHERE cars.ID=?',[$_GET['id']]);
$userID = $result->fetchColumn();

if ($_SESSION['user/role'] == 0 && $_SESSION['user/ID'] != $userID)
	die('Authorization notice: You can only delete your own car');

$result = query($pdo, 'DELETE FROM cars WHERE ID=?',[$_GET['id']]);
die('record deleted');
?>