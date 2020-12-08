<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>

<?php

$id=$_GET['id'];

$con = mysqli_connect('localhost', 'root', '', 'class_blog');

$sql = "SELECT
    posts.*, categories.title as categoryTitle 
    FROM posts
    JOIN categories ON posts.category_id = categories.id
    WHERE posts.id = '$id' ";

$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM categories";
$result = mysqli_query($con, $sql);



include('include/header.php');
?>

<a href="post.php" class="btn btn-info"> Back </a>
<br><br>



<div class="content">
    <h1> Update Post </h1>

    <form action="store/store_postupdate.php?id=<?php echo $id ?>" enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="title"> Title </label>
        <input type="text" class="form-control" placeholder="Title" value="<?php echo $data['title'] ?>" name="title">
        
    </div>
    <div class="form-group">
        <label for="description"> Description </label>
        <textarea type="text" class="form-control" name="description" rows="10"><?php echo $data['description'] ?></textarea>
        
    </div>
    <div class="form-group">
        <label for="image"> Image </label>
        <input type="file" class="form-control" name="image">
        <img src="<?php echo$data['image'] ?>" width="100">
    </div>
    <div>
        <label for="date"> Date </label>
        <input type="date" class="form-control mb-2"  name="date" placeholder="Date" value="<?php echo $data['date'] ?>">
    </div>
    <div class="form-group">
        <label for="category"> Category </label>
        <select name="category_id" class="form-control">
            <option > Select Category </option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <?php if ( $data['category_id'] == $row['id'] ) { ?>
                    <option value="<?= $row['id'] ?>" selected> <?= $row['title'] ?> </option>
                <?php } else { ?>
                    <option value="<?= $row['id'] ?>"> <?= $row['title'] ?> </option>
                <?php } ?>

            <?php }?>
            
            
        </select>
    </div>
   

    <button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
    </form>



</div>



<?php
include('include/footer.php');
?>  