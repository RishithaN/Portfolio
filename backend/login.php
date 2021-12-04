<?php

include 'db.php';
session_start();

// echo '<script>alert("Welcome to Geeks for Geeks")</script>';

if($_POST){
    $email = $_POST['email'];
    $password = $_POST['psw'];

    $num = -1;

    $query = "SELECT * FROM `signup` WHERE `email` = '$email' and  `password` = '$password'";
    $result = $con->query($query);


    if($result){

        while ($row = $result->fetch_assoc()){
            
            $id = $row['id'];
            $_SESSION['id']=$id;

            $num = 1;
        }
        
    }else{
        $num =  -1;
    }

    echo $num;

}




?>

