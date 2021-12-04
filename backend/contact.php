<?php
include 'db.php';

//include 'login.php';
session_start();

if($_POST){
    $mobnum = $_POST['mobnum'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }

    $query = "SELECT * FROM `contact` WHERE `id`= '$id'";
    $result = $con->query($query);
    //echo $result;
    $len = 0;
    // if($result){

        $query = "UPDATE `contact` SET `mobile` = '$mobnum', `email` = '$email', `address` = '$address'  WHERE `id` = '$id'";
        $result = $con->query($query);
        echo $mobnum;
  
//}
}


?>