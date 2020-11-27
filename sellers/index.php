<?php
require_once('../settings.php');
require_once('../lib/db.php');
$result = query($pdo, 'SELECT * FROM users');

//header('location:organizers_index.php');
require_once('../theme/header.php');
?>
	<div class="container">
		<h2>Users</h2>
		<a class="btn btn-primary" href="sellers/create.php">Add new seller</a>
		<table class="table responsive">
		<td><b>ID</b></td>
		<td><b>Owner</b></td>
		<td><b>Email</b></td>
		<?php
		while($user=$result->fetch()) {
			echo '<tr>';
			echo '<td>'.$user['ID'].'</td><td>'.$user['first_name'].' '.$user['last_name'].'</td><td>'.$user['email'].'</td>';
			echo '<td>';
			echo '<div class="btn-group" role="group" aria-label="Basic example">';
			echo '<a class="btn btn-secondary" href="sellers/details.php?id='.$user['ID'].'">Details </a>';
				
			if(isset($_SESSION['user/ID']) && ($_SESSION['user/role'] == 1 || $_SESSION['user/ID'] == $user['ID'])) {
				echo '<button class="btn-post-delete btn btn-danger" data-id="'.$user['ID'].'">Delete</button>';
				echo '<a class="btn btn-warning" href="sellers/modify.php?id='.$user['ID'].'">Edit</a>';
			}
			echo '</div>';
			echo '</td>';
			echo '</tr>';
		}
		?>
		</table>
	</div>
<?php	
require_once('../theme/footer.php');
