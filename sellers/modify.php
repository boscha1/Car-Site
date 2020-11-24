<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

// if signed in user is regular (not admin) and is not the user who the user is attempting to modify
if ($_SESSION['user/role'] == 0 && $_SESSION['user/ID'] != $_GET['id'])
	die('Authorization notice: You can only edit your own information');

// if info is in POST, execute query
if(count($_POST)>0) {
	query($pdo, 'UPDATE users SET first_name=?, last_name=?, email=?, password=? WHERE ID=?',
	[$_POST['first_name'],$_POST['last_name'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['ID']]);
	header('location:index.php');
}
else{
	$result = query($pdo, 'SELECT * FROM users WHERE ID=?',[$_GET['id']]);
	$user = $result->fetch();
}
require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Modify the details below:</h2>
		<a class="btn btn-secondary" href="sellers/index.php">Back to sellers</a>
		<form method="POST">
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
		  <div class="form-group">
			<label>Change Password</label>
			<input type="password" class="form-control" name="password">
		  </div>
			<input type="hidden" class="form-control" name="ID" value="<?= $user['ID'] ?>">
		  <button type="submit" class="btn btn-primary">Save changes</button>
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>