<?php
require_once('../settings.php');
require_once('../lib/db.php');

if (!isset($_SESSION['user/ID'])) 
	die('Please <a href="../signin.php">sign in</a> first');
// if info is in POST, execute query
if(count($_POST)>0) {
	query($pdo, 'INSERT INTO cars (make, model, year, miles, price, userID, state_code) VALUES (?,?,?,?,?,?,?)',
	[$_POST['make'],$_POST['model'],$_POST['year'],$_POST['miles'],$_POST['price'],$_SESSION['user/ID'],$_POST['state_code']]);
	header('location:index.php');
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
			<label>Year</label>
			<input type="text" class="form-control" name="year">
		  </div>
	      <div class="form-group">
			<label>Miles</label>
			<input type="text" class="form-control" name="miles">
		  </div>
		  <div class="form-group">
			<label>Price</label>
			<input type="text" class="form-control" name="price">
		  </div>
		  <div class="form-group">
		  <label>State</label>
			<select name="state_code">
			<option value="">Select state</option>
				<?php
					$states = query($pdo, 'SELECT * FROM states');
					while($state=$states->fetch()) 
						echo '<option value="'.$state['state_name'].'</option>';
				?>
			</select>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

<?php
require_once('../theme/footer.php');