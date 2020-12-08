<?php

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);




?>
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
<div class="content">

<a href="category_add.php" class="btn btn-dark btn-lg"> + Add Category </a>
<br>
<h1> Category list</h1>
    <table class="table table-dark">

        <thead>
            
                <th> ID </th>
                <th> Title </th>
                <th> Action </th>
            
        </thead>
        <?php
        while ($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['title']; ?> </td>
            <td> 
            <a href="category_update.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm" > Edit </a> ||
            <a href="store/delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ??????');" > Delete </a>

            </td>

        </tr>
        
        <?php } ?> 

    </table>

</div>
    

                  
 

<?php
include('include/footer.php');
?>  