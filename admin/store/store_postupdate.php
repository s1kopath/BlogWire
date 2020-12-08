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


    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category_id = $_POST['category_id'];


    $upsql = "UPDATE posts SET 
        title = '$title', description= '$description', 
        date='$date', 
        category_id= '$category_id' ";

     


if( !empty( $_FILES['image']['name'] )){
    //upload image
    $rnd = rand(11111, 88999999);
    $image = 'uploads/'. $rnd . $_FILES['image']['name'];
    $upload = '../uploads/'. $rnd . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

    $upsql .= ", image = '$image'";

    if ( !empty ($data['image']) && file_exists( '../'.$data['image'])) {
        unlink('../'. $data['image']);
    }
    
}

$upsql .= " WHERE id = '$id' ";


    mysqli_query($con, $upsql);

    
    header('Location: ../post.php');



?>