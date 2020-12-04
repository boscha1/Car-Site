<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

if ($_SESSION['user/role'] == 0 && $_SESSION['user/ID'] != $_GET['id'])
	die('Authorization notice: You can only delete your own information');

if($_SESSION['user/ID'] == $_GET['id']) {
	require_once('../lib/auth.php');
	session_destroy();
}

query($pdo, 'DELETE FROM users WHERE ID=?',[$_GET['id']]);

?>