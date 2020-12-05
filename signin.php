<?php

require_once('theme/header.php');
?>
	<div class="container" style="padding-top: 10%">
		<h2>Access account</h2>
		<form action="lib/auth.php" method="POST">
		  <div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="email">
		  </div>
		  <div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password">
		  </div>
		  <div>
			<p>Don't have an account? <a href="signup.php">Sign up here</a></p>
		  </div>
		  <button type="submit" class="btn btn-primary" name="action" value="signin">Sign in</button>
		</form>
	</div>

<?php
require_once('theme/footer.php');