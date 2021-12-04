<?php

  include 'backend/db.php';
//   include 'backend/user_info.php';
if($_GET){
    $id = $_GET['id'];
    
    $queryProfile = "SELECT * FROM `profile` WHERE `id` = '$id'";
        $resultProfile = $con->query($queryProfile);

        if($resultProfile){
            $rowProfile = $resultProfile->fetch_assoc();
        }

        //About
        $queryAbout = "SELECT * FROM `about` WHERE `id` = '$id'";
        $resultAbout = $con->query($queryAbout);

        if($resultAbout){
            $rowAbout = $resultAbout->fetch_assoc();
        }

        //Resume
        $queryResume = "SELECT * FROM `resume` WHERE `userid`= '$id'";
        $resultResume = $con->query($queryResume);

        $valuesResume = [];
        $lengthResume = 0;

        while($rowsResume = $resultResume->fetch_assoc()){
            $userResume[] = $rowsResume;   
        }

        if(!empty($userResume)){
            $lengthResume = count($userResume);
        }

        //Portfolio
        $queryPortfolio = "SELECT * FROM `portfolio` WHERE `userid`= '$id'";
        $resultPortfolio = $con->query($queryPortfolio);

        $userPortfolio = [];
        $length_portfolio = 0;

        while($rowsPortfolio = $resultPortfolio->fetch_assoc()){
            $userPortfolio[] = $rowsPortfolio;   
        }

        if(!empty($userPortfolio)){
            $length_portfolio=count($userPortfolio);
        }

        //Contact
        $queryContact = "SELECT * FROM `contact` WHERE `id` = '$id'";
        $resultContact = $con->query($queryContact);
        if($resultContact){
            $rowContact = $resultContact->fetch_assoc();
        }


}
?>


<!DOCTYPE html>

<html lang="en">
    
    <head>

            <title>Profile</title>

            <meta charset="utf-8"/>
            <meta name="description" content="Profile">
            <meta name="keywords" content="HTML, CSS, JavaScript">
            <meta name="author" content="Rishitha  N">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Icon -->
            <link rel="icon" href="assets/img/icon.jpg">

            <!-- Home page CSS -->
            <link href="assets/css/homePageCSS.css" rel="stylesheet">

            <!-- Profile CSS -->
            <link href="assets/css/profile.css" rel="stylesheet">

            <!-- Navigation Bar CSS -->
            <link href="assets/css/navbar.css" rel="stylesheet">

            <!-- CSS -->
            <link href="assets/css/contactProfile.css" rel="stylesheet">

            <!-- JS -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="assets/js/profileContact.js"></script>

            <!-- Fonts and Icons Links -->
          
            <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <!-- Profile CSS -->
            <link href="assets/css/style.css" rel="stylesheet">

    </head>

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
            <a href="Logout.php">LOG OUT</a>
        </nav>


  
  <!-- Content -->
  <header id="header">
    <div class="d-flex flex-column userProfile">

      <div class="profile">

        <?php
        
            if(!empty($rowProfile['photo'])){

        ?>
        
        <img src="profilePhoto/<?php  echo $rowProfile['photo'];?>" alt="Profile Photo" class="img-fluid rounded-circle">

       <?php

            }else{
       
       ?>

      <img src="assets/img/profile-img.jpg" alt="Profile Photo" class="img-fluid rounded-circle">

      <?php
      
            }        

      ?>

       
       
       <?php
        
          if(empty($rowProfile['name'])){

        ?>
        <h1 class="text-light">Name</h1>

        <?php
          
          }else{

        ?>

        <h1 class="text-light"><?php  echo $rowProfile['name'] ?></h1>

        <?php
        
          }
        ?>

        <div class="social-links">
          <a href="<?php  echo $rowProfile['twitter'] ?>" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
          <a href="<?php  echo $rowProfile['facebook'] ?>" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
          <a href="<?php  echo $rowProfile['instagram'] ?>" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
          <a href="<?php  echo $rowProfile['linkedin'] ?>" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="nav-menu">
        <ul>
          
          <li class="active"><a href="#" id="navTop"> <i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resumenav"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolionav"><i class="bx bx-book-content"></i> Portfolio</a></li>
          <li><a href="#contactnav"><i class="bx bx-envelope"></i> Contact</a></li>

        </ul>
      </nav>


    </div>
  </header>


  <script>

    $('#navTop').click(function(){
          $(document).scrollTop(100) 
    });

  </script>

  

    <section class = "about">

        <div class = "heading" id="aboutnav">


            <h1>ABOUT</h1>

            <?php
          
            if(empty($rowAbout['info'])){

            ?>

            <p>No About Available</p>

            <?php
              }
              else{
            ?>
         
            <pre id="about_p"><?php  echo $rowAbout['info'] ?></pre>

            <?php
                }
            ?>

          
        </div>

    </section>

    <section class = "resume">

        <div class = "heading" id="resumenav">

           <br>

            <h1>RESUME</h1>

          <?php
          
            if($lengthResume == 0){

          ?>

          <p>No resume Available :)</p>

          <?php
            }
          ?>

          <?php 
              for($i=0;$i<$lengthResume;$i++){
          ?>

            <div >

                <p class="resumeinfo1"><?php echo $userResume[$i]['profession']?></p>

                <p class="resumeinfo2"><?php echo $userResume[$i]['years']?></p>

                <p class="resumeinfo3"><?php echo $userResume[$i]['company']?></p>

                <pre class="resumeinfo4"><?php echo $userResume[$i]['description']?></pre>

                  
            </div>

            <?php
                }
                ?>

              <br> <br>

          </div>

    </section>



    <section class = "portfolio">

        <div class = "heading" id="portfolionav">

           <br>

            <h1>PORTFOLIO </h1>

          <?php
          
            if($length_portfolio == 0){

          ?>

          <p>No Portfolio Available</p>

          <?php
            }
          ?>

          <?php 
              for($i=0;$i<$length_portfolio;$i++){
          ?>

            <div>

                <img class="portfolio_img" src="portfolio_photos/<?php  echo $userPortfolio[$i]['images'];?>" alt="Portfolio Image" id="img<?php  echo $userPortfolio[$i]['id'] ?>" data-for="<?php  echo $userPortfolio[$i]['id'] ?>"> 
                
                <br> <br>
               
            </div>

            <?php
                }
                ?>

              <br> <br>

          </div>

    </section>

    <br> <br> <br> <br>

    <section class="contact">

        <div class = "heading" id="contactnav">

            <br>

            <h1>CONTACT</h1>

            <?php
          
          if(empty($rowAbout)){

        ?>

        <p>No Contact Available</p>

        <?php
          }
          else{
        ?>

              <?php
                
                if($rowContact['mobile'] == 0){
              
              ?>

              <label class="labels">Mobile Number : </label> <br>
              <p class="contactinfo" id="mobnum_p"></p>

              <?php
              
                }
                else{
              
              ?>
            
              <label class="labels">Mobile Number : </label> <br>
              <p class="contactinfo" id="mobnum_p"><?php  echo $rowContact['mobile'] ?></p>

              <?php
              
                }

              ?>

              <br>

              <label class="labels">Email : </label> <br>
              <p class="contactinfo" id="email_p"><?php  echo $rowContact['email'] ?></p>

              <br>

              <label class="labels">Address : </label> <br>
              <p class="contactinfo" id="address_p"><?php  echo $rowContact['address'] ?></p>

          

            <?php
              }
          ?>

           
        </div>

    </section>

    <br><br>

    <div id="imgModal" class="modal">

        <span class="closeImg">&times;</span>
        <img class="modal-content" id="imgDisplay">

      </div>



    </body>




</html>