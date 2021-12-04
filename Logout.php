<?php

  include 'backend/login.php';
  include 'backend/db.php';
  

?>



<!DOCTYPE html>

<html lang="en">


    <head>

        <meta charset="UTF-8">
        <meta name="description" content="Home Page">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Rishitha  N">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Portfolio</title>


        <!-- Icon -->
        <link rel="icon" href="assets/img/icon.jpg">

        <!-- Home page CSS -->
        <link href="assets/css/homePageCSS.css" rel="stylesheet">

        <!-- Navigation Bar CSS -->
        <link href="assets/css/navbar.css" rel="stylesheet">

        <!-- Footer CSS -->
        <link rel="stylesheet" href="assets/css/footer.css">

        <!-- Profile card CSS -->
        <link rel="stylesheet" href="assets/css/profile.css">

        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        <style>

          body{
              background-color: #a8d0e6;
          }
          
        </style>

    </head>

    <script>

        $(function(){

            $("#logout").on("click" , function(e){

                // alert("hello")
                
                $.ajax({
                    type: 'post',
                    url: "/ITE PROJECT SEM/backend/logout.php",
                    data: {},
                    success: function (res) {
                        alert(res);
                        window.location.href = "HomePage.php";
                    }        
                });
    
            })

        });


    </script>


    <body>



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
          <a href="Blogs.php">BLOGS</a>
          <a href="Jobs.php">JOB & INTERSHIPS</a>
          <a href="Contact.html">CONTACT US</a>
          
      </nav>


      <?php
      
          if(!empty($_SESSION["id"])){
              $id = $_SESSION["id"];

            //   unset($_SESSION["id"]);


      ?>

    <div class="card">
        <main class="profilecard">
            <section class="card_text">
            <p>
                Are you sure you want to Logout ? 
            </p>
            </section>
            <section class="cardinfo">
            <div class="loginhere">
                <button id="logout"> Yes! Logout </button>
            </div>
            </section>
        </main>
    </div>

      <?php

          }
          else{
      
      ?>


    <div class="card">
        <main class="profilecard">
            <section class="card_text">
            <p>
                You must Login to access Profile Page !!!
            </p>
            </section>
            <section class="cardinfo">
            <div class="loginhere">
                <span> <a href="Homepage.php"> Login Here </a> </span>
            </div>
            </section>
        </main>

    </div> 

      <?php
          }
      ?>


    </body>

</html>