<?php

$username="root";
$password="";
$server='localhost';
$db='banking';


$con=mysqli_connect(
    $server, $username, $password, $db
);

if($con){
    ?>
    <script>alert("connection succesful")</script>
    <?php
}

else{
    ?>
    <script>alert("connection succesful")</script>
    <?php
}



?>