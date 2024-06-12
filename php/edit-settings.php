<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['name'])) {
    // session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $user_name = mysqli_real_escape_string($link, $_POST['name']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`name` ='$user_name'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Username Already exist";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`name`='$user_name', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Name Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}
if (isset($_POST['Bio'])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $bio = mysqli_real_escape_string($link, $_POST['Bio']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`bio` ='$bio'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`bio`='$bio', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Bio Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}
if (isset($_POST['email'])) {
    // session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $email = mysqli_real_escape_string($link, $_POST['email']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`email` ='$email'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Email Already exists";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`email`='$email', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Name Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}

if (isset($_POST['Username'])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $username = mysqli_real_escape_string($link, $_POST['Username']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`username` ='$username'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`username`='$username', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}
if (isset($_POST['Url'])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $Url = mysqli_real_escape_string($link, $_POST['Url']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`Url` ='$Url'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`Url`='$Url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}

if (isset($_POST['deactivate'])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");      
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query = "UPDATE `user_login` SET `user_login`.`account_status2`='inactive', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

// Image Upload
// $data = array();
// if (isset($_FILES["image_upload"]["name"])) {
//     $target_dir = "../uploads/profileImages/";
//     $temp = explode(".", $_FILES["profileImages"]["name"]);
// 	$allowedExts = array("gif", "jpeg", "jpg", "png");
//     $newfilename = round(microtime(true)) . '.' . end($temp);

//     $target_file = $target_dir . basename($newfilename);
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_file);
//     $image = mysqli_real_escape_string($link, basename($newfilename));
//     $image = $image;

// } else {
// 	$image[] = 'No Image Selected..';
// }

   //image upload
//    if (isset($_POST['image'])) {   
       
    
//     date_default_timezone_set("Asia/Calcutta");
//     $date_now =date("20y-m-d");
//     $profile = $_POST['profile'];

//    if (isset($_FILES["profile"]["name"])) {
//     $target_dir = "../uploads/profileImages/";
//     $temp = explode(".", $_FILES["profile"]["name"]);
//     $newfilename = round(microtime(true)) . '.' . end($temp);
//     $target_file = $target_dir . basename($newfilename);
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//     move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
//     $image = mysqli_real_escape_string($link, basename($newfilename));
//     $image = $image;

//     date_default_timezone_set("Asia/Calcutta");
//     $date_now =date("20y-m-d");
// 			$query = "UPDATE `user_login` SET `user_login`.`profile`='$image', 
// 			`updated_at`='$date_now' WHERE `user_login`.`name`='$name' ";
// 		if (!mysqli_query($link,$query)) {
// 				die('Error: ' . mysqli_error($link));
// 			} 
// 			mysqli_close($link);
// 		}
// } else {
//     $image = '';
// }  


if (isset($_FILES["profile"]["name"])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                          
                    if (isset($_FILES["profile"]["name"])) {
                            $target_dir = "../uploads/profile/";
                            $temp = explode(".", $_FILES["profile"]["name"]);
                            $newfilename = round(microtime(true)) . '.' . end($temp);
                            $target_file = $target_dir . basename($newfilename);
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        
                            move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
                            $image = mysqli_real_escape_string($link, basename($newfilename));
                            $image = $image;
                        } else {
                            $image = '';
                        }
                $query = "UPDATE `user_login` SET `user_login`.`profile`='$image', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Profile Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            

}