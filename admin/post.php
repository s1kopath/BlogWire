<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>

<?php

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = mysqli_query($con, $sql);

?>


<?php
include('include/header.php');
?>

<div class="content">
<a href="add_post.php" class="btn btn-dark btn-lg"> + Add Post </a>
    <br>
    <h1> Post List </h1>
    <table class="table table-dark table-bordered">
        <thead>
            <th> Id </th>
            <th> Title </th>
            <th> Image </th>
            <th> Date </th>
            <th> Action </th>

        </thead>
        <?php while ($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['title']; ?> </td>
            <td> <img src="./<?php echo $row['image']; ?>" width="30"> </td>
            <td> <?php echo $row['date']; ?> </td>
            <td> 
            <a href="view_post.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm" > View </a> ||
            <a href="edit_post.php?id=<?php echo $row['id']?>" class="btn btn-success btn-sm" > Edit </a> ||
            <a href="store/delete_post.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ??????');" > Delete </a>

            </td>

        </tr>
        
        
        
        
        <?php } ?>   

    </table>



</div>



<?php
include('include/footer.php');
?>  