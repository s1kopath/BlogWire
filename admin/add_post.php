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



include('include/header.php');
?>


<div class="content">
<a href="post.php" class="btn btn-dark"> Back </a>
<br><br>
    <h1> Add new Post </h1>

    <form action="store/store_post.php" enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="title"> Title </label>
        <input type="text" class="form-control" placeholder="Title" name="title">
        
    </div>
    <div class="form-group">
        <label for="description"> Description </label>
        <textarea type="text" class="form-control" name="description" rows="10"></textarea>
        
    </div>
    <div class="form-group">
        <label for="image"> Image </label>
        <input type="file" class="form-control" name="image">
        
    </div>
    <div>
        <label for="date"> Date </label>
        <input type="date" class="form-control mb-2" name="date" placeholder="Data">
    </div>
    <div class="form-group" >
        <label for="category"> Category </label>
        <select name="category_id" class="form-control">
            <option > Select Category </option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <option value="<?= $row['id'] ?>"> <?= $row['title'] ?> </option>

            <?php }?>
            
            
        </select>
    </div>
   

    <button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
    </form>



</div>



<?php
include('include/footer.php');
?>  