<?php

  include 'backend/search_list.php';
  include 'backend/login.php';

  
  if(isset($_SESSION['id'])){
    $id_login = $_SESSION['id'];
  }
  else{
    $id_login = 0;
  }

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

        <!-- Validation JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="assets/js/validation.js"></script>
         
        <!-- Home page CSS -->
        <link href="assets/css/homePageCSS.css" rel="stylesheet">

        <!-- Login and SignUp CSS -->
        <link href="assets/css/modal.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">

        <!-- Navigation Bar CSS -->
        <link href="assets/css/navbar.css" rel="stylesheet">

        <!-- Search Bar CSS and JS -->
        <link href="assets/css/searchBar.css" rel="stylesheet">
        <script src="assets/js/search.js"></script>

        <!-- Typewriter JS -->
        <script src="assets/js/typewriter.js"></script>

        <!-- Footer CSS -->
        <link rel="stylesheet" href="assets/css/footer.css">

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

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <style>

          body{
              background-color: #a8d0e6;
          }
          
        </style>

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
          <!-- <a href="HomePage.php">HOME</a> -->
          <a href="Profile.php">PROFILE</a>
          <a href="Blogs.php">BLOGS</a>
          <a href="Jobs.php">JOB & INTERSHIPS</a>
          <a href="Contact.html">CONTACT US</a>
          <a href="Logout.php">LOG OUT</a>
          
      </nav>
        

      <!-- Login and SignUp Navigation -->

      <?php
      
        if($id_login == 0){
      
      ?>


      <section class = "rightNavBar">

          <a id="login" href="#" onclick="document.getElementById('loginModal').style.display='block'" style="width:auto;">LOGIN</a>

          <a id="signup" href="#" onclick="document.getElementById('signupModal').style.display='block'" style="width:auto;">SIGN UP</a>
          

      </section>

      <?php
      
        }
        else{
      
      ?>

      <p></p>

      <?php
      
        }
      
      ?>

      <br> <br>

      <!-- Search Bar -->
      <main>
        <div class="container" id="searchBar">

          <div class="search-box">

            <div class="search-icon" id="searchOk" disabled><i class="fa fa-search search-icon"></i></div>

            <form class="search-form">
              <input onkeyup="searchFilter()" type="text" placeholder="Search" id="search" autocomplete="off">
            </form>
            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;"
              xml:space="preserve">
                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280"/>
                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280"/>
              </svg>
              
            <div class="cancel-icon" id="cancelSearch" hidden><i class='fas fa-times cancel-icon'></i></div>
            <br>
            <div class="go-icon"><i class="fa fa-arrow-right" id="search_go"></i></div>
            
          </div>
          

          

          <ul id = "nameDiv" hidden>
          
          <?php
          
            for($i=0;$i<$length;$i++){
          
          ?>

            <li data-for="<?php  echo $i ?>" value="<?php echo $searchValues[$i] ?>" class="nameList" id="search_result<?php echo $i ?>"> <a>  <?php echo $searchValues[$i] ?>  </a> </li>

          <?php
            }
          ?>

          </ul>
        
        </div>

      </main>
      

      <br> <br>


      <!-- Login Modal  -->
      <div id="loginModal" class="modal2">

        <span onclick="document.getElementById('loginModal').style.display='none'" class="close2" title="Close Modal">&times;</span>
  
        <form class="modal-content2 animate2" id="loginForm">

          <div class="modalContainer2">

            <label><b>Email</b></label>  <br>
            <input type="text" placeholder="Enter Email" name="useremail" id="loginemail" required>  
              
            <br> 

            <label><b>Password</b></label>   <br>
            <input type="password" placeholder="Enter Password" name="password" id="loginpsw" required>
            
            <br>

            <button type="submit">Login</button>
                

           </div>


          <div class="modalContainer2" style="background-color:#f1f1f1">

            <button type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn2">Cancel</button>

            
          
            </div>

          </form>

      </div>

      <!-- Login Modal JS -->
      <script>

        var modal = document.getElementById('loginModal');

        window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
        }
      </script>


      <!-- SignUp Modal -->
      <div id="signupModal" class="modal1">

          <span onclick="document.getElementById('signupModal').style.display='none'" class="close1" title="Close Modal">&times;</span>
         
          <form class="modal-content1" id="signupForm">
      
            <div class="modalContainer">
              <h1>Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>

              <div class="modalcontainer1">

                  <label style="display: inline;" ><b>Username</b>
                  
                    <i class="fas fa-check-circle" style="display: inline;"></i>
                    <i class="fas fa-exclamation-circle" style="display: inline;"></i>
                    <small style="display: inline;">Error message</small>

                  </label> <br>

                  <input type="text" id="uname" placeholder="Enter Username" name="uname" required>


              </div>

              <br>

              <div class="modalcontainer1">

                
                <label ><b>Email</b>
                
                  <i class="fas fa-check-circle" ></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>

                
                </label> <br>

                <input type="text" id="email" placeholder="Enter Email" name="email" required> 


              </div>

              <br>

              <div class="modalcontainer1">

                <label style="display: inline;"><b>Password</b>
                
                  <i class="fas fa-check-circle" style="display: inline;"></i>
                  <i class="fas fa-exclamation-circle" style="display: inline;"></i>
                  <small style="display: inline;">Error message</small>

                </label> <br>

                <input type="password" id="psw" placeholder="Enter Password" name="psw" required>

              </div>

              <br>


              <div class="modalcontainer1">

                <label style="display: inline;"><b>Repeat Password</b>
                
                  <i class="fas fa-check-circle" style="display: inline;"></i>
                  <i class="fas fa-exclamation-circle" style="display: inline;"></i>
                  <small style="display: inline;">Error message</small>

                
                </label> <br>

                <input type="password" id="psw-repeat" placeholder="Repeat Password" name="psw-repeat" required>
      
              </div>
  

              <br/>

  
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
  
              <div class="clearfix1">
                <button type="button" onclick="document.getElementById('signupModal').style.display='none'" class="cancelbtn1">Cancel</button>
                <button type="submit" class="signupbtn1" id="signupSubmit">Sign Up</button>
              </div>
            </div>
          </form>
      </div>
  

      <!-- SignUp Modal JS -->
      <script>
 
        var modal = document.getElementById('signupModal');
        
      
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      
      </script>


      <br>

      <!-- Heading Image -->
      <div id="heading">

        <img src="assets/img/headingCalligraphy.png" alt="Header">

      </div>

      <!-- Caption Type Writer Effect -->
      <p id="typewriter" class="line-1 anim-typewriter" data-type='[ "Portfolios are everything, promises are nothing.", "Stop making resumes and start making portfolios.", "Inspire people with your work, NAH, portfolios :)"]'></p>


      <!-- Description  -->
      <div>

        <h1 class="titles">Your PORTFOLIO</h1>

        <p class="aboutWebsite">A career is a portfolio of projects that teach you new skills, gain you new expertise, develop new capabilities, grow your colleague set, and constantly reinvent you as a brand. 
            This website helps you post your Portfolio and reach out to people around the world. 
            Here you can checkout other people's work and learn from them.  </p>

      </div>

      <div>

        <h1 class="titles">Community & Insights</h1>

        <p class="aboutWebsite">Colloborate with people you can learn from!!! 
          Find in your field of work and check their work to get insights, ideas to improve your work. 
          A great way to get to know about many people through their work.   </p>

      </div>

      <div>

        <h1 class="titles">Reach out</h1>

        <p class="aboutWebsite">Your portfolio can inspire others and you inturn to keep going and achieve more.
          A great way for others to see your work from anywhere in the world.
          Share your work with the world with our website and let your work stay lively and inspiring forever. 
          So, stop making resumes and start making portfolio.
        </p>

      </div>


      <br> <br>

      <!-- Footer -->
      <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="first">
                        <h4>Services</h4>
                        <p> Profile</p>
                        <p> Jobs & Interships</p>
                        <p> Blogs</p>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="second">
                        <h4> Navigate</h4>
                        <ul>
                            <li><a href="HomePage.php">Home</a></li>
                            <li><a href="Contact.html">Contact Us</a></li>
                          
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12">
                    <div class="third">
                        <h4> Contact</h4>
                        <ul>
                            <li>PortFolio </li>
                            <li></li>


                          <li><i class="far fa-envelope"></i> 58, Pivot street, India</li>
                            <li><i class="far fa-envelope"></i> Hello@gmail.com</li>


                          <li><i class="fas fa-map-marker-alt"></i> Chennai, India </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footerContainer">
            <div class="row">
                <div class="col-12">
                    <div class="line"></div>
                    <div class="second2">
                        
                        <a href="https://instagram.com/" target="_blank"> <i class="fab fa-instagram fa-2x margin"></i></a>
                        <a href="https://linkedin.com/" target="_blank"> <i class="fab fa-linkedin fa-2x margin"></i></a>
                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-2x margin" ></i></a>

                    </div>

                </div>
            </div>
            </div>
    </div>

    </body>




</html>