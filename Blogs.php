<?php

include 'backend/display_blog.php';

 $row=3;
//  $len=8;
 ?>

<!DOCTYPE html>

<html lang="en">


    <head>

        <title>Blogs</title> 
        <meta name="description" content="Blogs">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Rishitha  N">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta charset="utf-8"/>

        <!-- Icon -->
        <link rel="icon" href="assets/img/icon.jpg">
        
        <!-- Home page CSS -->
        <link href="assets/css/homePageCSS.css" rel="stylesheet">

        <!-- Navigation Bar CSS -->
        <link href="assets/css/navbar.css" rel="stylesheet">

        <!-- Blogs CSS -->
        <link href="assets/css/blog.css" rel="stylesheet">

        <!-- Validation JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="assets/js/blogpost.js"></script>


        <!-- Fonts links -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Proza+Libre&display=swap" rel="stylesheet">


        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

        <style>

          body{
              background-color: #a8d0e6;
          }
          
        </style>

    </head>


    <body >

        <!-- Navigation Bar -->
        <input type="checkbox" id="navcheck" role="button" title="menu">
        <label for="navcheck" aria-hidden="true" title="menu">
            <span class="burger">
                <span class="bar">
                    <span class="visuallyhidden">Menu</span>
                </span>
            </span>
        </label>


        <nav id="menu">
            <a href="HomePage.php">HOME</a>
            <a href="Profile.php">PROFILE</a>
            <!-- <a href="Blogs.php">BLOGS</a> -->
            <a href="Jobs.php">JOB & INTERSHIPS</a>
            <a href="Contact.html">CONTACT US</a>
            <a href="Logout.php">LOG OUT</a>
        </nav>

        <!-- Content -->
        <div style="text-align:center" class="heading">
            <h2>BLOGS</h2>
        </div>

        <br>
        <?php
          for($i=0;$i<$len;$i++){
            ?>
          
          <?php if($i%$row==0){
            echo '<div class="blog-posts">';
          }
          ?>

            <div class="post" data-for="<?php  echo $values[$i]['id'] ?>">
              <img src=<?php echo $values[$i]['img'] ?> value="<?php  echo $values[$i]['id'] ?>" alt="" class="post-img imgblogpost">
              <div class="post-content">
                <h3 class="topic"> <?php echo $values[$i]['title'] ?> </h3>
                <span class="date">  <?php echo $values[$i]['date'] ?> </span>
              </div>
            </div>

            
          <?php  
          if($i%$row==$row-1||$i==$len-1) { 
            echo "</div>";
          }
        }?> 



    </body>
