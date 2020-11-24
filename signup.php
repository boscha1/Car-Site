<?php

require_once('theme/header.php');
?>
	<div class="container">
		<h2>Create an account</h2>
		<form action="lib/auth.php" method="POST">
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
		  <button type="submit" class="btn btn-primary" name="action" value="signup">Sign up</button>
		</form>
	</div>

<?php
require_once('theme/footer.php');