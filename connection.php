<?php

$host = "sql102.byethost.com";
$user = "b9_25579566";
$pass = "/Piyush@1202/";
$db = "b9_25579566_forum";

$con = mysqli_connect($host,$user,$pass,$db);

if(!$con){
    echo "Some Error Occurs:- ". mysqli_error($con);
}

?>