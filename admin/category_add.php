<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>

<?php

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);




?>


<?php
include('include/header.php');
?>
<div class="content">

<a href="categories.php" class="btn btn-dark"> Back </a>
<br><br>
<h1> Add new Category </h1>
   

    <form method="POST" action="store/store_category.php">
    <div class="form-group">
        <label for="title"> Title </label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
    

                  
 

<?php
include('include/footer.php');
?>  