<?php
require_once('../settings.php');
require_once('../lib/db.php');

//$cars = query($pdo, 'SELECT * FROM cars');
$cars=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price, cars.userID,
users.first_name,users.last_name FROM cars JOIN users ON users.ID = cars.userID');

//header('location:organizers_index.php');
require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Cars for Sale</h2>
		<a class="btn btn-primary" href="cars/create.php">Add new car</a>
		<table class="table responsive">
		<td><b>Year</b></td>
		<td><b>Make</b></td>
		<td><b>Model</b></td>
		<td><b>Price</b></td>
		<td><b>Owner</b></td>
		<?php
		while($car=$cars->fetch()) {
			echo '<tr>';
			echo '<td>'.$car['year'].'</td><td>'.$car['make'].'</td><td>'.$car['model'].'</td><td>$'.$car['price'].'.00</td>
				  <td>'.$car['first_name'].' '.$car['last_name'].'</td>';
			
			echo '<td>
				<a href="cars/details.php?id='.$car['ID'].'">Details </a>';
				
			if(isset($_SESSION['user/ID']) && ($_SESSION['user/role'] == 1 || $_SESSION['user/ID'] == $car['userID']))
				echo '<a href="cars/delete.php?id='.$car['ID'].'">Delete</a>
				  <a href="cars/modify.php?id='.$car['ID'].'">Edit</a>';
			'</td>';
			echo '</tr>';
		}
		?>
		</table>
	</div>
	
<?php
require_once('../theme/footer.php');