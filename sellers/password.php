<?php
require_once('../settings.php');
require_once('../lib/db.php');

$result = query($pdo, 'SELECT * FROM users WHERE ID=?',[$_GET['id']]);
$user = $result->fetch();

if(count($_POST)>0) {
	query($pdo, 'UPDATE users SET password=? WHERE ID=?',
	[password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['ID']]);
	header('Location: index.php');
}

require_once('../theme/header.php');
?>
	<div class="container" style="padding-top: 10%">
		<form method="POST">
		  <div class="form-group">
			<label>New Password</label>
			<input type="password" class="form-control" name="password" value="">
		  </div>
	
		  <input type="hidden" class="form-control" name="ID" value="<?= $user['ID'] ?>">
			
		  <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
		</form>
	</div>
	
<?php

require_once('../theme/footer.php');
?>