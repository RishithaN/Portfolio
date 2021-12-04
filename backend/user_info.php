<?php
include 'db.php';
session_start();

if($_POST){
    //echo "Hello Success";

    $uname = $_POST["uname"];
    


    $query = "SELECT id FROM `signup` WHERE `username`= '$uname'";
    $result = $con->query($query);
    $id = -1;

    if($result){
        $row = $result->fetch_assoc();
        if(!$row==NULL){
            $id = $row['id'];
        }
    }

    echo $id;

}
else{
    echo "My fault";
}
        

?>