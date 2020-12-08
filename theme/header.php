<?php
if (is_file('../settings.php')) {
	require_once('../settings.php');
	require_once('../lib/db.php');
}
else { 
	require_once('settings.php');
	require_once('lib/db.php');
}
$states = query($pdo, 'SELECT * FROM states');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?= $base_URL ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="theme/styles.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Car Site</title>
  </head>
  <body>
	<!--<nav class="navbar navbar-expand-lg navbar-light bg-light" >-->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
	<div class="container">
	  <a class="navbar-brand" href="index.php"><span class="navbar-brand mb-0 h1">Car Site</span></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="sellers">Sellers</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="cars">Cars</a>
		  </li>
		</ul>
		<ul class="navbar-nav ml-auto">
		<?php
			if(count($_SESSION) > 0){
				$owner = query($pdo, 'SELECT ID,first_name, last_name FROM users WHERE users.ID=?', [$_SESSION['user/ID']]);
				$owner = $owner->fetch();
				
				/*echo '
				  <li class="nav-item active">
					<a class="nav-link" href="sellers/details.php?id='.$owner['ID'].'">Welcome, '.$owner['first_name'].' '.$owner['last_name'].'</span></a>
				  </li>
				  <li class="nav-item active">
					<a class="nav-link" href="signout.php">Sign out</span></a>
				  </li>';*/
				
				echo '<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="'.htmlspecialchars($_SERVER['PHP_SELF']).'" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Welcome, '.$owner['first_name'].' '.$owner['last_name'].'
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="sellers/details.php?id='.$owner['ID'].'">View Profile</a>
				  <a class="dropdown-item" href="signout.php">Sign out</a>
				</div>
			  </li>';
				  
			}
			else{
				echo '<li class="nav-item active">
					<a class="nav-link" href="signin.php">Sign in</span></a>
				  </li>
				  <li class="nav-item active">
					<a class="nav-link" href="signup.php">Sign up</span></a>
				  </li>';
			}

		?>
		</ul>
	  </div>
	  </div>
	</nav>
	
	