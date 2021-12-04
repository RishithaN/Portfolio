<?php
include 'db.php';

session_start();

if($_POST){
    
    $id = $_POST['idResume'];


    if(isset($_SESSION['id'])){
        $userid = $_SESSION['id'];
    }
    

    
    $query = "DELETE FROM `portfolio` WHERE `userid` = '$userid' and `id` = '$id'";
    $result = $con->query($query);

    if($result){
        echo $id;
    }

}


?>