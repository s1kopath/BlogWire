<?php
  $url= 'http://localhost/test/'
  
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="http://localhost/test/css/all.css">
		<link rel="stylesheet" href="http://localhost/test/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
		<link href="css/loginstyle.css"  rel="stylesheet" >
		
	</head>
	
	<body>
	

		<div class="login">
		
			<h1>Login</h1>
			
			<form action="authenticate.php" method="post">
			
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				
				

				<input type="submit" value="Confirm">
				<a class="btn btn-dark btn-lg container mb-3 mt-3 " href="index.php" >Back</a>

	
			</form>
				
					
					
				
			
			
			
		</div>
		

		
		
	</body>

</html>