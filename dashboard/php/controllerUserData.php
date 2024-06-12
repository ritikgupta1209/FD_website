<?php 
session_start();
require "link.php";
$email = "";
$password = "";
$errors = array();

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $check_email = "SELECT * FROM admin_login WHERE email = '$email'";
        $res = mysqli_query($link, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $encpass = hash("sha512", $password);
            $fetch_pass = $fetch['password'];
            if($fetch_pass == $encpass){
                $_SESSION['session_user'] = $email;
                $email_status = $fetch['email_status'];
                if($email_status == 'verified'){
                  $_SESSION['session_user'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: ./');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }
    
?>