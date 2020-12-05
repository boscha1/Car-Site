<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

// if info is in POST, execute query
if(count($_POST)>0) {
	$email = $_POST['email'];
	if (empty($_POST['first_name'])) {
		die('Please enter first name');
	}
	elseif (empty($_POST['last_name'])) {
		die('Please enter last name');
	}
	elseif (empty($_POST['email'])) {
		die('Please enter email');
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		die("$email is not a valid email address");
	}
	query($pdo, 'UPDATE users SET first_name=?, last_name=?, email=? WHERE ID=?',
	[ucfirst($_POST['first_name']),ucfirst($_POST['last_name']),$_POST['email'],$_POST['ID']]);
	die('data saved');
}
else{
	$result = query($pdo, 'SELECT * FROM users WHERE ID=?',[$_GET['id']]);
	$user = $result->fetch();
}

if ($_SESSION['user/role'] == 0 && $_SESSION['user/ID'] != $_GET['id'])
	die('Authorization notice: You can only edit your own information');

require_once('../theme/header.php');
?>
	<div class="container" style="padding-top: 10%">
		<h2>Modify the details below:</h2>
		<a class="btn btn-secondary" href="sellers/index.php">Back to sellers</a>
		<form id="seller-modify" method="POST">
		  <div class="form-group">
			<label>First name</label>
			<input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>">
		  </div>
		  <div class="form-group">
			<label>Last name</label>
			<input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>">
		  </div>
		  <div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
		  </div>
		  <?php
			if(isset($_SESSION['user/ID']) && ($_SESSION['user/role'] == 1 || $_SESSION['user/ID'] == $user['ID'])) {
				echo '<a class="btn btn-secondary" href="sellers/password.php?id='.$user['ID'].'">Change password</a>';
			}
		  ?>
		  
		  <input type="hidden" class="form-control" name="ID" value="<?= $user['ID'] ?>">
			
		  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
		</form>
	</div>

<?php

require_once('../theme/footer.php');