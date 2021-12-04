<?php
include 'db.php';



$querySearch = "SELECT username FROM `signup`";
$searchResults = $con->query($querySearch);

$searchValues = [];
$length = 0;

while($searchRows = $searchResults->fetch_assoc()){
    $searchValues[]=$searchRows['username'];   
}

if(!empty($searchValues)){
    $length=count($searchValues);
}

?>


