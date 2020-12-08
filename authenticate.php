<?php
session_start();


$con = mysqli_connect('localhost', 'root', '', 'class_blog');

if ( mysqli_connect_errno() ) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



if ( !isset($_POST['username'], $_POST['password']) ) {
	
	exit('Please fill both the username and password fields!');
}


if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	
	$stmt->store_result();


		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();
			
			
			if ($_POST['password'] === $password)  {
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				//echo 'Welcome ' . $_SESSION['name'] . '!';
				header('Location: admin/index.php');
				
			} else {
				// Incorrect password
				echo 'Incorrect username and/or password! error code 1';
			}
		} else {
			// Incorrect username
			echo 'Incorrect username and/or password! error code  2';
		}


	$stmt->close();
}

?>