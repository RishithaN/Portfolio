<?php
include 'db.php';

$query = "SELECT * FROM `jobs`";
$result = $con->query($query);

while($rows = $result->fetch_assoc()){
    $values[]=$rows;
    
}
$length=count($values);

?>
