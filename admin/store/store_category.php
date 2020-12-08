<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "INSERT INTO categories VALUES (NULL, '$title')"; 
    
    $result = mysqli_query($con, $sql);

    
    header('Location: ../categories.php');
}

?>