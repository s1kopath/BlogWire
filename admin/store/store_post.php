<?php
    $rnd = rand(11111, 88999999);

    $image = 'uploads/'. $rnd . $_FILES['image']['name'];
    $upload = '../uploads/'. $rnd . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category_id = $_POST['category_id'];

    $con = mysqli_connect('localhost', 'root', '', 'class_blog');
    $sql = "INSERT INTO posts VALUES (NULL, '$category_id','$title', '$description', '$image', '$date') "; 
    
    mysqli_query($con, $sql);

    
    header("location: ../post.php");


?>