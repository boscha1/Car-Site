<?php
require_once('../settings.php');
require_once('../lib/db.php');

$result = query($pdo, 'SELECT * FROM users WHERE ID=?',[$_GET['id']]);
$user = $result->fetch();

$cars = query($pdo, 'SELECT * FROM cars WHERE cars.userID = ?', [$_GET['id']]);


//header('location:organizers_index.php');
require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Seller Profile</h2>
		<a class="btn btn-secondary" href="sellers/index.php">Back to sellers</a>
		<a class="btn btn-warning" href="sellers/modify.php?id=<?= $user['ID'] ?>">Edit Seller Info</a>
		<a class="btn btn-danger" href="sellers/delete.php?id=<?= $user['ID'] ?>">Delete Seller Info</a>
		  <div class="form-group">
			<label>First name:</label>
			<?= $user['first_name'] ?>
		  </div>
		  <div class="form-group">
			<label>Last name:</label>
			<?= $user['last_name'] ?>
		  </div>
		  <div class="form-group">
			<label>Email:</label>
			<?= $user['email'] ?>
		  </div>
		<h2>Cars for sale by <?= $user['first_name'].' '.$user['last_name'] ?></h2>
		<table class="table responsive">
		<td><b>Year</b></td>
		<td><b>Make</b></td>
		<td><b>Model</b></td>
		<td><b>Price</b></td>
		<?php
		while($car=$cars->fetch()) {
			echo '<tr>';
			echo '<td>'.$car['year'].'</td><td>'.$car['make'].'</td><td>'.$car['model'].'</td><td>$'.$car['price'].'.00</td>
			<td>
				<a href="cars/details.php?id='.$car['ID'].'">Details</a>
				<a href="cars/delete.php?id='.$car['ID'].'">Delete</a>
				<a href="cars/modify.php?id='.$car['ID'].'">Edit</a>
			</td>';
			echo '</tr>';
		}
		?>
		</table>
	</div>
	
<?php
require_once('../theme/footer.php');