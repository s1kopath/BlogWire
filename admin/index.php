<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>
<?php
include('include/header.php');
?>

                
                A blog (a shortened version of “weblog”) is an online journal or informational website displaying information in reverse chronological order, with the latest posts appearing first, at the top. It is a platform where a writer or a group of writers share their views on an individual subject.

		<div class="m-5 ml-auto">
			<img src="http://localhost/test/img/welcome.jpg" alt="">
		</div>
			
<?php
include('include/footer.php');
?>           
            