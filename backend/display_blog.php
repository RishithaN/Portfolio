<?php
include 'db.php';
$query = "SELECT * FROM `blog`";
$result = $con->query($query);

while($rows = $result->fetch_assoc()){
    $values[]=$rows;
    
}
$len=count($values);

?>


