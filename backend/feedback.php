<?php
include 'db.php';


if($_POST){

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $message = $_POST['message'];



    $query = "INSERT INTO `feedback`(`name` , `country` , `email` , `message`) VALUES ('$name' , '$country' , '$email' , '$message')";
    $result = $con->query($query);

    if($result){
        echo 1;
    }
    else{
        echo -1;
    }

}
else{
    echo -1;
}


?>