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


include('include/header.php');
?>

<a href="post.php" class="btn btn-info"> Back </a>
<br><br>



<div class="content">
    <h1> Showing </h1>

    <table class="table table-dark table-bordered">
       <tr>
           <td> Title </td>
           <td> <?php echo $data['title'] ?></td>
       </tr>
       <tr>
           <td> Category </td>
           <td> <?php echo $data['categoryTitle'] ?></td>
       </tr>
       <tr>
           <td> Description </td>
           <td> <?php echo $data['description'] ?></td>
       </tr>
       <tr>
           <td> Image </td>
           <td> <img src="./<?php echo $data['image'] ?>" width="50"></td>
       </tr>
       
       <tr>
           <td> Date </td>
           <td> <?php echo $data['date'] ?></td>
       </tr>


    </table>



</div>



<?php
include('include/footer.php');
?>  