<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "DELETE FROM categories WHERE id = '$id' "; 
    
    $result = mysqli_query($con, $sql);

    
    header('Location: ../categories.php');
}

?>