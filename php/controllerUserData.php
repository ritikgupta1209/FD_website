<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
    $username=strstr($email,'@',true);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM user_login WHERE email = '$email'";
    $res = mysqli_query($link, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $email_status = "notverified";
        $account_status = "inactive";

        $from_ip = $_SERVER['REMOTE_ADDR'];
        $from_browser = $_SERVER['HTTP_USER_AGENT'];
        date_default_timezone_set("Asia/Kolkata");
        $created_at = date("20y-m-d");

        function guidv4($data)
        {
            assert(strlen($data) == 16);

            $data[6] = chr(ord($data[6]) && 0x0f | 0x40); // set version to 0100
            $data[8] = chr(ord($data[8]) && 0x3f | 0x80); // set bits 6-7 to 10

            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
        $user_uid = guidv4(openssl_random_pseudo_bytes(16));

        $insert_data = "INSERT INTO user_login (user_uid, name, username, email, password, code, email_status, account_status, from_ip, from_browser, created_at)values('$user_uid', '$name', '$username', '$email', '$encpass', '$code', '$email_status', '$account_status', '$from_ip', '$from_browser', '$created_at')";
        $data_check = mysqli_query($link, $insert_data);
        if($data_check){
            /* $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: abhinavji89@gmail.com";
            if(mail($email, $subject, $message, $sender)){ */
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('Location: user-otp');
                exit();
            /* }else{
                $errors['otp-error'] = "Failed while sending code!";
            } */
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($link, $_POST['otp']);
        $check_code = "SELECT * FROM user_login WHERE code = $otp_code";
        $code_res = mysqli_query($link, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $email_status = 'verified';
            $account_status = 'active';
            $update_otp = "UPDATE user_login SET code = $code, email_status = '$email_status', account_status = '$account_status' WHERE code = $fetch_code";
            $update_res = mysqli_query($link, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('Location: ./');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $check_email = "SELECT * FROM user_login WHERE email = '$email'";
        $res = mysqli_query($link, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $email_status = $fetch['email_status'];
                $account_status = $fetch['account_status'];
                if($email_status == 'verified' && $account_status == 'active'){
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                        if(isset($_SERVER['HTTP_REFERER'])) {
                            header('Location: '.$_SERVER['HTTP_REFERER']);  
                        } else {
                            header('Location: ./');  
                        }
                        //echo "<script>history.go(-1);</script>";
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('Location: user-otp');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $check_email = "SELECT * FROM user_login WHERE email='$email'";
        $run_sql = mysqli_query($link, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user_login SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($link, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: abhinavji89@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('Location: reset-code');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($link, $_POST['otp']);
        $check_code = "SELECT * FROM user_login WHERE code = $otp_code";
        $code_res = mysqli_query($link, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('Location: new-password');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE user_login SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($link, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user');
    }

    function custom_number_format($n, $precision = 2) {
        if ($n < 1000) {
            // Anything less than a thousand
            $n_format = number_format($n);
        } else if ($n < 1000000) {
            // Anything less than a million
            $n_format = number_format($n / 1000, $precision, ".", "") + 0 . 'K';
        } else if ($n < 1000000000) {
            // Anything less than a billion
            $n_format = number_format($n / 1000000, $precision, ".", "") + 0 . 'M';
        } else {
            // At least a billion
            $n_format = number_format($n / 1000000000, $precision, ".", "") + 0 . 'B';
        }
    
        return $n_format;
    }
?>