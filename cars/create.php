<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');

// if info is in POST, execute query
if(count($_POST)>0) {
	if (isset($_POST['submit'])) {
		if (empty($_POST['make'])) {
			die('Please enter the make');
		}
		elseif (empty($_POST['model'])) {
			die('Please enter the model');
		}
		elseif (empty($_POST['year'])) {
			die('Please enter the year');
		}
		elseif (empty($_POST['miles'])) {
			die('Please enter amount of miles');
		}
		elseif (empty($_POST['price'])) {
			die('Please enter a price');
		}
		elseif (!is_numeric($_POST['year'])) {
			die('Please enter a valid year');
		}
		else {
			query($pdo, 'INSERT INTO cars (make, model, year, miles, price, userID) VALUES (?,?,?,?,?,?)',
			[$_POST['make'],$_POST['model'],$_POST['year'],$_POST['miles'],$_POST['price'],$_SESSION['user/ID']]);
			header('location:index.php');
		}
	}
}

require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Enter the details of your car below:</h2>
		<a class="btn btn-secondary" href="cars/index.php">Back to cars</a>
		<form method="POST">
		  <div class="form-group">
			<label>Make</label>
			<input type="text" class="form-control" name="make">
		  </div>
		  <div class="form-group">
			<label>Model</label>
			<input type="text" class="form-control" name="model">
		  </div>
		  <div class="form-group">
			<label>Year (e.g, YYYY)</label>
			<input type="text" class="form-control" name="year">
		  </div>
	      <div class="form-group">
			<label>Miles (e.g, 19000)</label>
			<input type="text" class="form-control" name="miles">
		  </div>
		  <div class="form-group">
			<label>Price (e.g, 10000)</label>
			<input type="text" class="form-control" name="price">
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>

<?php
require_once('../theme/footer.php');