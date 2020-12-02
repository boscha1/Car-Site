<?php
require_once('settings.php');
require_once('lib/db.php');

// Want to get first and last name of author
// Pull data from posts table and authors table:
//		- JOIN the tables
// 		- users.ID = posts.author_ID

//$cars=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price,cars.locationID,locations.city,
//locations.state,locations.zip FROM cars JOIN locations ON locations.ID = cars.locationID');

$result=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price, cars.userID,
users.first_name,users.last_name FROM cars JOIN users ON users.ID = cars.userID');

//$result=query($pdo, 'SELECT cars.ID,cars.year,cars.make,cars.model,cars.miles, cars.price,cars.locationID,locations.city,
//locations.state,locations.zip, cars.userID, users.first_name,users.last_name FROM cars JOIN locations ON locations.ID = cars.locationID
//JOIN users ON users.ID = cars.userID');

require_once('theme/header.php');
?>		
	  <div id="section1">
			<div style="height: 15%;"></div>
					<div class="container">
					  <p id="b" style="font-size: 36px">Your dream car awaits...</p>
					</div>
			</div>
	  </div>

	
<?php
require_once('theme/footer.php');