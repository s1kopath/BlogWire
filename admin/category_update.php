<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>
<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $con = mysqli_connect('localhost', 'root', '', 'class_blog');
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_assoc($result);

    }

    




?>


<?php
include('include/header.php');
?>
<div class="content">

<a href="categories.php" class="btn btn-dark"> Back </a>
<br><br>
<h!> Edit Category </h1>
   

    <form method="POST" action="store/store_update.php?id=<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="title"> Title </label>
        <input type="text" class="form-control" id="title" value="<?php echo $row['title']; ?>" placeholder="Title" name="title">
        
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
    

                  
 

<?php
include('include/footer.php');
?>  