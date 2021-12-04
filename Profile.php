<?php

  include 'backend/login.php';
  include 'backend/db.php';
  include 'backend/display_resume.php';
  include 'backend/display_portfolio.php'
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
            <!-- <a href="Profile.php">PROFILE</a> -->
            <a href="Blogs.php">BLOGS</a>
            <a href="Jobs.php">JOB & INTERSHIPS</a>
            <a href="Contact.html">CONTACT US</a>
            <a href="Logout.php">LOG OUT</a>
        </nav>


  <?php
  
  if(!empty($_SESSION['id'])){

    $id = $_SESSION['id'];

    $query = "SELECT * FROM `about` WHERE `id` = '$id'";
    $result = $con->query($query);
    if($result){
        $row = $result->fetch_assoc();
    }

    $query1 = "SELECT * FROM `contact` WHERE `id` = '$id'";
    $result1 = $con->query($query1);
    if($result1){
        $row1 = $result1->fetch_assoc();
    }

    $query2 = "SELECT * FROM `profile` WHERE `id` = '$id'";
    $result2 = $con->query($query2);
    if($result2){
        $rowProfile = $result2->fetch_assoc();
    }

  
  ?>
  
  <!-- Content -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <i class='fas fa-pencil-alt  profileEdit' id="editProfileIcon" onclick="document.getElementById('editProfile').style.display='block'"></i>

        <?php
        
          if(!empty($rowProfile['photo'])){

        ?>
        
        <img src="profilePhoto/<?php  echo $rowProfile['photo'];?>" alt="Profile Photo" class="img-fluid rounded-circle">

        <?php
        
          }
          else{
        
        ?>

        <img src="assets/img/profile-img.jpg" alt="Profile Photo" class="img-fluid rounded-circle">

        <?php
        
          }
        
        ?>
        
        <?php
        
          if(empty($rowProfile['name'])){

        ?>
        <h1 class="text-light">Your name</h1>

        <?php
          
          }else{

        ?>

        <h1 class="text-light"><?php  echo $rowProfile['name'] ?></h1>

        <?php
        
          }
        ?>


        <div class="social-links">

          <?php
          
            if(empty($rowProfile['twitter'])){

          ?>
          
          <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
      

          <?php
            
            }else{

          ?>

          <a href="<?php  echo $rowProfile['twitter'] ?>" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
     

          <?php
          
            }
          ?>

          <?php
          
            if(empty($rowProfile['facebook'])){

          ?>
          
          <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
      

          <?php
            
            }else{

          ?>

          <a href="<?php  echo $rowProfile['facebook'] ?>" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
    

          <?php
          
            }
          ?>


          <?php
          
            if(empty($rowProfile['instagram'])){

          ?>
          
          <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
      

          <?php
            
            }else{

          ?>

          <a href="<?php  echo $rowProfile['instagram'] ?>" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
    

          <?php
          
            }
          ?>


          <?php
          
            if(empty($rowProfile['twitter'])){

          ?>
          
          <a href="" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      

          <?php
            
            }else{

          ?>

          <a href="<?php  echo $rowProfile['linkedin'] ?>" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
    

          <?php
          
            }
          ?>


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


            <h1>ABOUT <i class='fas fa-pencil-alt' style='font-size:24px' id="editAbout"></i></h1>

            <textarea type="text" disabled hidden class="about" id="inputAbout" ><?php  echo $row['info'] ?></textarea>
            
            <?php
            
              if(!empty($row['info'])){
            
            ?>
           
            <pre id="about_p"><?php  echo $row['info'] ?></pre>

            <?php
            
              }
              else{
            
            ?>

            <p>Add About to your profile using Edit Icon :)</p>

            <?php
              
              }
            
            ?>

            <br>
            <button type="edit" class="savebtn" id="saveAbout" hidden>SAVE</button>



        </div>

    </section>

    <section class = "resume">

        <div class = "heading" id="resumenav">

           <br>

            <h1>RESUME  

            <i class='fas fa-plus' style='font-size:24px' id = "addResumeIcon" onclick="document.getElementById('addResume').style.display='block'"></i>

          </h1>

          <?php
          
            if($length == 0){

          ?>

          <p>Add Resume to your profile using Add Icon :)</p>

          <?php
            }
          ?>

          <?php 
              for($i=0;$i<$length;$i++){
          ?>

            <div id="ResumeEditDiv<?php  echo $valuesResume[$i]['id'] ?>">

                <i class='fas fa-pencil-alt editResume' style='font-size:24px' data-for="<?php  echo $valuesResume[$i]['id'] ?>"></i>
                
                <i class='fas fa-trash deleteResume' style='font-size:24px' data-for="<?php  echo $valuesResume[$i]['id'] ?>"></i>
                  

                <form class="resumeform" >
      
                  <input type="text"  class="contactinput profession" id= "profession<?php  echo $valuesResume[$i]['id'] ?>" disabled hidden value="<?php echo $valuesResume[$i]['profession']?>">
                  <p id="profession_p<?php  echo $valuesResume[$i]['id'] ?>" class="resumeinfo1"><?php echo $valuesResume[$i]['profession']?></p>

                  <input type="text"  class="contactinput years" id = "years<?php  echo $valuesResume[$i]['id'] ?>" disabled hidden value="<?php echo $valuesResume[$i]['years']?>">
                  <p class="resumeinfo2" id="years_p<?php  echo $valuesResume[$i]['id'] ?>"><?php echo $valuesResume[$i]['years']?></p>

                  <input type="text"  class="contactinput company" id = "company<?php  echo $valuesResume[$i]['id'] ?>" disabled hidden value="<?php echo $valuesResume[$i]['company']?>">
                  <p class="resumeinfo3" id="company_p<?php  echo $valuesResume[$i]['id'] ?>"><?php echo $valuesResume[$i]['company']?></p>

                  <textarea type="text"  class="desc" id = "description<?php  echo $valuesResume[$i]['id'] ?>" disabled hidden><?php echo $valuesResume[$i]['description']?></textarea>
                  <pre class="resumeinfo4" id="description_p<?php  echo $valuesResume[$i]['id'] ?>"><?php echo $valuesResume[$i]['description']?></pre>

                  <br>

                  <button type="edit" class="savebtn" id =  "saveResume<?php  echo $valuesResume[$i]['id'] ?>" hidden>SAVE</button>
                  

                </form>

            </div>

            <?php
                }
                ?>

              <br> <br>

          </div>

    </section>

    <!-- <section class="portfolio">

        <div class = "heading" id="portfolionav">

            <br>

            <h1>PORTFOLIO  <i class='fas fa-pencil-alt' style='font-size:24px'></i> </h1>

            <img src="assets/img/portfolio1.png" alt="Portfolio1">
            <img src="assets/img/portfolio2.jpg" alt="Portfolio2">
            <img src="assets/img/portfolio3.png" alt="Portfolio3">
        </div>

    </section> -->

    <section class = "portfolio">

        <div class = "heading" id="portfolionav">

           <br>

            <h1>PORTFOLIO  

            <i class='fas fa-plus' style='font-size:24px' id = "addPorfolioIcon" onclick="document.getElementById('addPortfolio').style.display='block'"></i>

          </h1>

          <?php
          
            if($length_portfolio == 0){

          ?>

          <p>Add Portfolio to your profile using Add Icon :)</p>

          <?php
            }
          ?>

          <?php 
              for($i=0;$i<$length_portfolio;$i++){
          ?>

            <div id="PortfolioEditDiv<?php  echo $valuesPortfolio[$i]['id'] ?>"  data-for="uu">

                <i class='fas fa-trash deletePortfolio' style='font-size:24px' data-for="<?php  echo $valuesPortfolio[$i]['id'] ?>"></i>
                 
                <br>
                
                <img class="portfolio_img" src="portfolio_photos/<?php  echo $valuesPortfolio[$i]['images'];?>" alt="Portfolio Image" id="img<?php  echo $valuesPortfolio[$i]['id'] ?>" data-for="<?php  echo $valuesPortfolio[$i]['id'] ?>"> 
                
                <button class="savebtn" id =  "savePortfolio<?php  echo $valuesPortfolio[$i]['id'] ?>" hidden>SAVE</button>
                  

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

            <h1>CONTACT <i class='fas fa-pencil-alt' style='font-size:24px' id="editContact"></i> </h1>
  
            <form class="contactDetails">

              <label class="labels">Mobile Number : </label> <br>


              <?php
              
                if($row1['mobile'] == 0){
              
              ?>

              <input id="mobnum"  type="number" class="contactinput" disabled hidden value="">
           
              <p class="contactinfo" id="mobnum_p"></p>

              <?php
              
                }
                else{
              
              ?>

              <input id="mobnum"  type="number" class="contactinput" disabled hidden value="<?php  echo $row1['mobile'] ?>">
              <p class="contactinfo" id="mobnum_p"><?php  echo $row1['mobile'] ?></p>

              <?php
              
                }
              
              ?>

              <br>

              <label class="labels">Email : </label> <br>
              <input id="emailProfile"  type="email" class="contactinput" disabled hidden value="<?php  echo $row1['email'] ?>">
              <p class="contactinfo" id="email_p"><?php  echo $row1['email'] ?></p>

              <br>

              <label class="labels">Address : </label> <br>
              <input id="address" type="text" class="contactinput" disabled hidden value="<?php  echo $row1['address'] ?>">
              <p class="contactinfo" id="address_p"><?php  echo $row1['address'] ?></p>

              <br>

              <button type="edit" class="savebtn" id="saveContact" hidden>SAVE</button>

            </form>


           
        </div>

    </section>

    <br><br>


    
    <div id="addResume" class="modal1">

        <span onclick="document.getElementById('addResume').style.display='none'" class="close1" title="Close Modal">&times;</span>
        <form class="modal-content1" id="addResumeForm">

          <div class="modalContainer">
            <h1>Add Resume</h1>

            <hr>

            <div class="modalcontainer1">

                <label style="display: inline;" > <b>Profession</b> </label> <br>

                <input class="inputAdd" type="text" id="addProfession" placeholder="Enter Profession" name="addProfession" required>


            </div>

            <br>

            <div class="modalcontainer1">

              
              <label style="display: inline;"> <b>Years</b> </label> <br>

              <input class="inputAdd" type="text" id="addYears" placeholder="Enter Years. Eg : January 2019 - february 2021" name="addYears" required> 


            </div>

            <br>

            <div class="modalcontainer1">

              <label style="display: inline;"> <b>Company</b> </label> <br>

              <input class="inputAdd" type="text" id="addCompany" placeholder="Enter Company" name="addCompany" required>

            </div>

            <br>


            <div class="modalcontainer1">

              <label style="display: inline;"> <b>Description</b> </label> <br>

              <input class="inputAdd" type="text" id="addDescription" placeholder="Enter Description" name="addDescription" required>

            </div>


            <br/>

            <div class="clearfix1">
              <button type="button" onclick="document.getElementById('addResume').style.display='none'" class="cancelbtn1" id="cancelResume">Cancel</button>
              <button type="submit" class="signupbtn1" id="addResumeBtn">ADD</button>
            </div>
          </div>
        </form>

      </div>


      <!-- Add Resume JS -->
      <script>

          var modal = document.getElementById('addResume');


          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }

      </script>


      <!-- Edit Profile Modal -->
      <div id="editProfile" class="modal1">

      <span onclick="document.getElementById('editProfile').style.display='none'" class="close1" title="Close Modal">&times;</span>
      <form class="modal-content1" id="editProfileForm">

        <div class="modalContainer">
          <h1>Edit Profile</h1>

          <hr>

          <div class="modalcontainer1">

              <label style="display: inline;" > <b>Name</b> </label> <br>

              <input class="inputAdd" type="text" id="profileName" placeholder="Enter Name" name="profileName" value="<?php  echo $rowProfile['name'] ?>" required>


          </div>

          <div class="modalcontainer1">

              <label style="display: inline;" > <b>Profile photo</b> </label> <br>
              <input type="file" placeholder="Upload photo" id="profilePhoto" name="file">


          </div>

          <br>

          <div class="modalcontainer1">

            
            <label style="display: inline;"> <b>Twitter link</b> </label> <br>

            <input class="inputAdd" type="text" id="profileTwitter" value="<?php  echo $rowProfile['twitter'] ?>" placeholder="Twitter" name="profileTwitter" required> 


          </div>

          <br>

          <div class="modalcontainer1">

            <label style="display: inline;"> <b>Facebook link</b> </label> <br>

            <input class="inputAdd" type="text" id="profileFacebook" value="<?php  echo $rowProfile['facebook'] ?>" placeholder="Facebook" name="addCompany" required>

          </div>

          <br>


          <div class="modalcontainer1">

            <label style="display: inline;"> <b>Instagram link</b> </label> <br>

            <input class="inputAdd" type="text" id="profileInstagram" value="<?php  echo $rowProfile['instagram'] ?>" placeholder="Instagram" name="profileInstagram" required>

          </div>

          <br>

          <div class="modalcontainer1">

            <label style="display: inline;"> <b>LinkedIn link</b> </label> <br>

            <input class="inputAdd" type="text" id="profileLinkedin" value="<?php  echo $rowProfile['linkedin'] ?>" placeholder="LinkedIn" name="profileLinkedin" required>

          </div>


          <br>

          <div class="clearfix1">
            <button type="button" onclick="document.getElementById('editProfile').style.display='none'" class="cancelbtn1" id="cancelProfile">Cancel</button>
            <button type="submit" class="signupbtn1" id="editProfileBtn">SAVE</button>
          </div>
        </div>
      </form>

      </div>


       <!-- Edit Profile JS -->
       <script>

          var modal = document.getElementById('editResume');


          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }

      </script>


        <!-- Add Portfolio Images -->
        <div id="addPortfolio" class="modal1">

          <span onclick="document.getElementById('addPortfolio').style.display='none'" class="close1" title="Close Modal">&times;</span>
          <form class="modal-content1" id="editPortfolioForm">

            <div class="modalContainer">
              <h1>Edit Portfolio</h1>

              <hr>

              <div class="modalcontainer1">

                <label style="display: inline;" > <b>Portfolio Image photo</b> </label> <br>
                <input type="file" placeholder="Upload photo" id="portfolioImg" name="file">

              </div>

              <br>

              <div class="clearfix1">
                <button type="button" onclick="document.getElementById('addPortfolio').style.display='none'" class="cancelbtn1" id="cancelPortfolio">Cancel</button>
                <button class="signupbtn1" id="addPortfolioBtn">SAVE</button>
              </div>

            </div>

          </form>

        </div>


        <!-- Add Portfolio JS -->
       <script>

            var modal = document.getElementById('addPortfolio');

            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

      </script>



      <?php
        }
        else{
      ?>

      <div class="card">

        <main class="profilecard">
          <section class="card_text">
            <p>
              Login to access Profile Page !!
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


      <div id="imgModal" class="modal">

        <span class="closeImg">&times;</span>
        <img class="modal-content" id="imgDisplay">

      </div>




    </body>




</html>