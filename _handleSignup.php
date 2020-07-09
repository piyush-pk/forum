<?php
require('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    if($pass == $cpass){
        // echo "$user_email, $pass Match";
        $q = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $result = mysqli_query($con,$q);
        $num = mysqli_num_rows($result);
        echo $num;
        if($num > 0){
            // echo "$user_email, $pass Already";
            header('Location: /index.php?alreadyExist=true');
        }
        else{
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `user_created`) VALUES ('$user_name', '$user_email', '$hash', current_timestamp())";
            $iresult = mysqli_query($con, $sql);
            
            if($iresult){
                header('Location: /index.php?signupSuccess=true');
                exit();
                // echo 'submitted';
            }else{
                header('Location: /index.php?signupFailed=true');
                // echo 'not submited';
                // echo "$user_name";
            }
        }
    }else{
        header('Location: /index.php?passMatch=false');
    }
    
}
?>
