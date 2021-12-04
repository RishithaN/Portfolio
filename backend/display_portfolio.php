<?php
include 'db.php';

// session_start();

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
}
else{
    $id=0;
}


$queryPortfolio = "SELECT * FROM `portfolio` WHERE `userid`= '$id'";
$resultPortfolio = $con->query($queryPortfolio);

$valuesPortfolio = [];
$length_portfolio = 0;

while($rowsPortfolio = $resultPortfolio->fetch_assoc()){
    $valuesPortfolio[]=$rowsPortfolio;   
}

if(!empty($valuesPortfolio)){
    $length_portfolio=count($valuesPortfolio);
}

?>

