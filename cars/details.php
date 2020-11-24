<?php
require_once('../settings.php');
require_once('../lib/db.php');

$result = query($pdo, 'SELECT * FROM cars WHERE ID=?',[$_GET['id']]);
$car = $result->fetch();
//header('location:organizers_index.php');
require_once('../theme/header.php');
?>
<!doctype html>
	<div class="container">
		<h2>Car Details:</h2>
		<a class="btn btn-secondary" href="cars/index.php">Back to cars</a>
		<a class="btn btn-warning" href="cars/modify.php?id=<?= $car['ID'] ?>">Edit Car Info</a>
		<a class="btn btn-danger" href="cars/delete.php?id=<?= $car['ID'] ?>">Delete Car Info</a>
		  <div class="form-group">
			<label>Make:</label>
			<?= $car['make'] ?>
		  </div>
		  <div class="form-group">
			<label>Model:</label>
			<?= $car['model'] ?>
		  </div>
		  <div class="form-group">
			<label>Year:</label>
			<?= $car['year'] ?>
		  </div>
	      <div class="form-group">
			<label>Miles:</label>
			<?= $car['miles'] ?>
		  </div>
		  <div class="form-group">
			<label>Price:</label>
			$<?= $car['price'] ?>
		  </div>
	</div>
	
<?php
require_once('../theme/footer.php');