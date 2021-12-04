<?php
include 'db.php';

session_start();

if($_POST){

    $name = $_POST['name'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $filename = $_FILES['file']['name'];



    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }
    
    $query="SELECT `photo` from `profile` WHERE `id` = $id";
    $result = $con->query($query);
   
    if(!$result){
        echo "Try Again";
    }
    else {
    $row = $result->fetch_assoc();
    $previousFilename=$row['photo'];
    $previousFileLocation="../profilePhoto/".$previousFilename;
    
    $filename = $_FILES['file']['name'];
    
    
    
    $location = "../profilePhoto/".$filename;
    $fileerror=$_FILES['file']['error'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($location,PATHINFO_EXTENSION));
    $valid_extensions = array("svg","png","jpg","jpeg");
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
       $uploadOk = 0;
    }
    
    if($uploadOk == 0){
       echo "Image must be in svg/png format";
    }
    else{
       if($fileerror===0){
        $filenamenew = uniqid('', true) . "." . $imageFileType;
        $NewLocation="../profilePhoto/".$filenamenew;
          if(move_uploaded_file($_FILES['file']['tmp_name'],$NewLocation)){
            $query1="UPDATE `profile` SET `photo`='$filenamenew' WHERE id='$id'";
            $result1 = $con->query($query1);

            if($result1){
            if(file_exists($previousFileLocation)){
              chmod($previousFileLocation, 0644);
               unlink($previousFileLocation);
            }
            echo "Successful,";
            echo $filenamenew;
            }
            else{
              echo $result1;
            }
           } 
          else{
          echo "File not updated";
           }
          }
        else{
         echo $fileerror;
        }
    }
    
    }

    
    $query = "UPDATE `profile` SET `name` = '$name', `twitter` = '$twitter', `facebook` = '$facebook', `instagram` = '$instagram', `linkedin` = '$linkedin'  WHERE `id` = '$id'";
    $result = $con->query($query);

    if($result){
        echo $id;
    }

}


?>