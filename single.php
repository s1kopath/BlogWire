<?php

    

    $url= 'http://localhost/test/';

    // if ( ! $_GET('id')) {
    //     header('location: index.php');
    // }

  
    $id= $_GET['id'];

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


<div class="main-content">
    <div class="container">
        <div class="row clearfx">
            <div class="col-md-2"></div>
            <div class="col-md-8">

               

                    <div class="single-post">
                        <h1> <?php echo $data['title']; ?></h1>
                            <div class="" style="margin: 10px, 0px; ">
                                <h2>Category: <?php echo $data['categoryTitle']; ?></h2>
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <img src="admin/<?php echo $data['image']; ?>" alt="">
                            </div>
                            
                            <div class="col-md-12">
                                <?php echo substr( $data ['description'], 0, 8000 ); ?> 
                            </div>
                            
                        </div>

                    </div>
                

                   


                

            </div>
            
        </div>
    </div>



</div>



<?php
include('include/footer.php');
?>           
            

            