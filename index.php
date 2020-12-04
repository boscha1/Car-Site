<?php
require_once('settings.php');
require_once('lib/db.php');

// Want to get first and last name of author
// Pull data from posts table and authors table:
//		- JOIN the tables
// 		- users.ID = posts.author_ID

//$cars=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price,cars.locationID,locations.city,
//locations.state,locations.zip FROM cars JOIN locations ON locations.ID = cars.locationID');

$result=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price, cars.userID, cars.state,
users.first_name,users.last_name FROM cars JOIN users ON users.ID = cars.userID');

//$result=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price,cars.locationID,locations.city,
//locations.state,locations.zip, cars.userID, users.first_name,users.last_name FROM cars JOIN locations ON locations.ID = cars.locationID
//JOIN users ON users.ID = cars.userID');

require_once('theme/header.php');
?>		
	  <div id="section1">
			<div style="height: 15%;"></div>
					<div class="container">
					  <p id="b" style="font-size: 36px;font-family: 'Permanent Marker', cursive;">Your dream car awaits...</p>
					</div>
			</div>
	  </div>
	  <div class="container" id="home-table" style="padding-top: 50%;">
		  <h1 style="padding-bottom: 5%">Check out the available cars</h1>
		  <table class="table responsive">
			<td><b>Year</b></td>
			<td><b>Make</b></td>
			<td><b>Model</b></td>
			<td><b>Price</b></td>
			<td><b>Location</b></td>
			<td><b>Owner</b></td>
			<?php
			while($car=$result->fetch()) {
				echo '<tr>';
				echo '<td>'.$car['year'].'</td><td>'.$car['make'].'</td><td>'.$car['model'].'</td><td>$'.$car['price'].'.00</td>
					  <td>'.$car['state'].'</td><td>'.$car['first_name'].' '.$car['last_name'].'</td>';
				
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
require_once('theme/footer.php');