<?php
include 'db.php';

if($_POST){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];


    $query = "SELECT * FROM `signup` WHERE `email`= '$email' OR `username` = '$uname'";
    $result = $con->query($query);
    $len = 0;
    if($result){
        while ($row = $result->fetch_assoc()){
            $len = $len + 1;
        }
        if($len == 0){
            $query = "INSERT INTO `signup`(`username`, `email`, `password`) VALUES ('$uname','$email','$psw')";
            $result = $con->query($query);
            echo $result;

            
            if($result){

            $query1 = "SELECT * FROM `signup` WHERE `email`= '$email'";
            $result1 = $con->query($query1);
            // echo $result1;

            while ($row = $result1->fetch_assoc()){
                $id = $row['id'];
            }

            $query2 = "INSERT INTO `about`(`id`) VALUES ('$id')";
            $result2 = $con->query($query2);
            //echo $result2;

            $query3 = "INSERT INTO `contact`(`id`) VALUES ('$id')";
            $result3 = $con->query($query3);

            // $query4 = "INSERT INTO `portfolio`(`id`) VALUES ('$id')";
            // $result4 = $con->query($query4);

            // $query5 = "INSERT INTO `resume`(`userid`) VALUES ('$id')";
            // $result5 = $con->query($query5);

            $query6 = "INSERT INTO `profile`(`id`) VALUES ('$id')";
            $result6 = $con->query($query6);

            // $query7 = "INSERT INTO `portfolio`(`userid`) VALUES ('$id')";
            // $result7 = $con->query($query7);

        }

        }
        if($len > 0){
            echo -1;
        }
}
}


?>