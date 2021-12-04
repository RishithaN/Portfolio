<?php
include 'db.php';

session_start();

if($_POST){
    $profession = $_POST['profession'];
    $years = $_POST['years'];
    $company = $_POST['company'];
    $description = $_POST['description'];


    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
    }
    

    
    $query = "INSERT INTO `resume`(`userid`,`profession`,`years`,`company`,`description`) VALUES ('$id','$profession','$years','$company','$description')";
    $result = $con->query($query);

    if($result){
        echo $id;
    }

}


?>