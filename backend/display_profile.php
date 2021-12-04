<?php
include 'db.php';
$query = "SELECT * FROM `profile`";
$result = $con->query($query);

while($rows = $result->fetch_assoc()){
    $values[]=$rows;
    
}
$len=count($values);

?>


