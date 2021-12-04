<?php
include 'db.php';

//include 'login.php';
session_start();

if($_POST){
    $about = $_POST['about'];
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }
    $query = "SELECT * FROM `about` WHERE `id`= '$id'";
    $result = $con->query($query);
    //echo $result;
    $len = 0;
    // if($result){

        $query = "UPDATE `about` SET `info` = '$about' WHERE `id` = '$id'";
        $result = $con->query($query);
        echo $about;
  
//}
}


?>


