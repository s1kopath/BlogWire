<?php
if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "UPDATE categories SET title = '$title' WHERE id = '$id' "; 
    
    $result = mysqli_query($con, $sql);

    
    header('Location: ../categories.php');
}

?>