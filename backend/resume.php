<?php
include 'db.php';

session_start();

if($_POST){

    $idResume = $_POST['idResume'];
    $profession = $_POST['profession'];
    $years = $_POST['years'];
    $company = $_POST['company'];
    $description = $_POST['description'];

    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }

    $query = "SELECT * FROM `resume` WHERE `userid`= '$id' and `id` = '$idResume'";
    $result = $con->query($query);
    //echo $result;
    $len = 0;
    // if($result){

        $query = "UPDATE `resume` SET `profession` = '$profession', `years` = '$years', `company` = '$company', `description` = '$description'  WHERE `id` = '$idResume' and `userid` = '$id'";
        $result = $con->query($query);
        echo $profession;
  
//}
}


?>