<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

// if info is in POST, execute query
if(count($_POST)>0) {
	query($pdo, 'INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)',
	[$_POST['first_name'],$_POST['last_name'],$_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT)]);
	header('location:index.php');
}
require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Enter the details below:</h2>
		<a class="btn btn-secondary" href="cars/index.php">Back to sellers</a>
		<form method="POST">
		  <div class="form-group">
			<label>First name</label>
			<input type="text" class="form-control" name="first_name">
		  </div>
		  <div class="form-group">
			<label>Last name</label>
			<input type="text" class="form-control" name="last_name">
		  </div>
		  <div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="email">
		  </div>
		  <div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

<?php
require_once('../theme/footer.php');