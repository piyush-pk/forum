<?php
require('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $pass = $_POST['password'];
    $q = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($con, $q);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        // echo $row['user_pass'];
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['userid'] = $row['user_id'];
            header('location: /'); 
        }else{
            // header('location: /index.php?loginPass=false'); 
            echo $row['user_pass'];
        }
    }else{
        header('location: /index.php?unregisteredUser=true');
    }
}
// Demo@piyushpk.com pass: demo@123
?>