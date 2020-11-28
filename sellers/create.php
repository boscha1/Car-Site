<?php
require_once('../settings.php');
require_once('../lib/db.php');
//require_once('../functions.php');

// define variables and set to empty values
$firstName = $lastName = $email = "";
$check_duplicate = 0;


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');


if(count($_POST)>0) {
	$email = $_POST['email'];
	
	$result = query($pdo, 'SELECT * FROM users WHERE email = ?', [$email]);
	$count = $result->rowCount();

	if ($count > 0) {
		$check_duplicate = 1;
	}
	
	if (isset($_POST['submit'])) {
		if (empty($_POST['first_name'])) {
			die('Please enter first name');
		}
		elseif (empty($_POST['last_name'])) {
			die('Please enter last name');
		}
		elseif (empty($_POST['email'])) {
			die('Please enter email');
		}
		elseif (empty($_POST['password'])) {
			die('Please enter password');
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die("$email is not a valid email address");
		}
		elseif ($check_duplicate == 1) {
			die("$email already exists");
		}
		else {
			query($pdo, 'INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)',
			[$_POST["first_name"],$_POST["last_name"],$_POST["email"],password_hash($_POST['password'], PASSWORD_DEFAULT)]);
			header('location:index.php');
		}
	}
}

require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Enter the details below:</h2>
		<a class="btn btn-secondary" href="sellers/index.php">Back to sellers</a>
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
		  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>

<?php
require_once('../theme/footer.php');