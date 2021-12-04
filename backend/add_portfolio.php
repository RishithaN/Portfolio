<?php
include 'db.php';

session_start();
echo "helloo!";
if($_FILES){

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    
    $filename = $_FILES['file']['name'];
    $location = "../portfolio_photos/".$filename;
    echo $filename;
    $fileerror=$_FILES['file']['error'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($location,PATHINFO_EXTENSION));
    $valid_extensions = array("svg","png","jpg","jpeg");
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
       $uploadOk = 0;
    }
    
    if($uploadOk == 0){
       echo "Image must be in svg/png/jpg/jpeg format";
    }
    else{
       if($fileerror===0){
          $filenamenew = uniqid('', true) . "." . $imageFileType;
          $NewLocation="../portfolio_photos/".$filenamenew;

          if(move_uploaded_file($_FILES['file']['tmp_name'],$NewLocation)){
            
            $query1 = "INSERT INTO `portfolio`(`userid`,`images`) VALUES ('$id','$filenamenew')";
            $result1 = $con->query($query1);

            if($result1){
                echo "Successful,";
                echo $filenamenew;
            }

            else{
                echo "duddddd";
              echo $result1;
            }
            
           }

          else{
             echo "File not updated";
           }

          }

        else{
            echo "fffff";
         echo $fileerror;
        }
    }
    


    
    // $query = "INSERT INTO `portfolio`(`userid`,`images`) VALUES ('$id','$img')";
    // $result = $con->query($query);

    // if($result){
    //     echo $id;
    // }

}


?>