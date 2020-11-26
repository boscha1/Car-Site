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
			query($pdo, 'UPDATE cars SET make=?, model=?, year=?, miles=?, price=? WHERE ID=?',
			[$_POST['make'],$_POST['model'],$_POST['year'],$_POST['miles'],$_POST['price'],$_POST['ID']]);
			header('location:index.php');
		}
	}
}
else{
	$result = query($pdo, 'SELECT * FROM cars WHERE cars.ID=?',[$_GET['id']]);
	$car = $result->fetch();
}

if ($_SESSION['user/role'] == 0 && $_SESSION['user/ID'] != $car['userID'])
	die('Authorization notice: You can only delete your own car');

require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Modify the details of your car below:</h2>
		<a class="btn btn-secondary" href="cars/index.php">Back to cars</a>
		<form method="POST">
		  <div class="form-group">
			<label>Make</label>
			<input type="text" class="form-control" name="make" value="<?= $car['make'] ?>">
		  </div>
		  <div class="form-group">
			<label>Model</label>
			<input type="text" class="form-control" name="model" value="<?= $car['model'] ?>">
		  </div>
		  <div class="form-group">
			<label>Year (e.g, YYYY)</label>
			<input type="text" class="form-control" name="year" value="<?= $car['year'] ?>">
		  </div>
	      <div class="form-group">
			<label>Miles (e.g, 19000)</label>
			<input type="text" class="form-control" name="miles" value="<?= $car['miles'] ?>">
		  </div>
		  <div class="form-group">
			<label>Price (e.g, 10000)</label>
			<input type="text" class="form-control" name="price" value="<?= $car['price'] ?>">
		  </div>
			<input type="hidden" class="form-control" name="ID" value="<?= $car['ID'] ?>">
		  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>