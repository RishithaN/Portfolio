<?php
include 'db.php';

// session_start();

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
}
else{
    $id=0;
}


$queryResume = "SELECT * FROM `resume` WHERE `userid`= '$id'";
$resultResume = $con->query($queryResume);

$valuesResume = [];
$length = 0;

while($rowsResume = $resultResume->fetch_assoc()){
    $valuesResume[]=$rowsResume;   
}

if(!empty($valuesResume)){
    $length=count($valuesResume);
}

?>


