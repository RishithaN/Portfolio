<?php

include 'backend/display_job.php';

?>


<!DOCTYPE html>

<html lang="en">


    <head>

        <meta charset="utf-8"/>

        <title>Jobs & Internships</title> 
        <meta name="description" content="Jobs">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Rishitha  N">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icon -->
        <link rel="icon" href="assets/img/icon.jpg">
        
        <!-- Home Page CSS -->
        <link href="assets/css/homePageCSS.css" rel="stylesheet">

        <!-- Jobs & Interships CSS -->
        <link href="assets/css/jobs.css" rel="stylesheet">

        <!-- Navigation Bar CSS -->
        <link href="assets/css/navbar.css" rel="stylesheet">

        <!-- Fonts Links       -->
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

        <!-- Navigation bar -->
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
            <a href="Blogs.php">BLOGS</a>
            <!-- <a href="Jobs.php">JOB & INTERSHIPS</a> -->
            <a href="Contact.html">CONTACT US</a>
            <a href="Logout.php">LOG OUT</a>
        </nav>

        <!-- Content -->
        <div style="text-align:center" class="heading">
            <h2>JOBS & INTERNSHIPS</h2>
        </div>

        <?php

          for($i=0;$i<$length;$i++){
        
        ?>

        <div class="card">
            <div class="img-avatar">
              <img src="<?php echo $values[$i]['img1'] ?>" alt="Job/Internship 1">
            </div>
            <div class="card-text">
              <div class="portada">
              <img src="<?php echo $values[$i]['img2'] ?>" alt="Job/Internship 2">
              </div>
              <div class="title-total">   
                <div class="title"> <?php echo $values[$i]['company'] ?> </div>
                <h2 class="job">  <?php echo $values[$i]['job'] ?> </h2>
            
                <div class="desc">  <?php echo $values[$i]['info'] ?> </div>
                <div class="actions">
                <a href="<?php echo $values[$i]['link'] ?>" target="_blank"><i class="fas fa-user-friends"></i></a>
              </div>
            </div>
           
            </div>
            
           
          </div>


          <?php 
              }
          ?>

        
          <br> <br>


    </body>