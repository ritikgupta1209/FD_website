<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['maddress'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
                $meta_address = mysqli_real_escape_string($link, $_POST['maddress']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from metamask_details where user_uid ='" . $user_uid . "'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                
                if(mysqli_num_rows($result2)>0)
{                
    $status=$row['meta_status'];
    if($status=="inactive"){
                    $data['status'] = 801;
                    $data['success'] = "Inactive status";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `metamask_details` SET `metamask_address`='$meta_address' WHERE `user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Tag Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}
}
else{
    $status="active";
    $num=rand(0,10000000000000000000);
    $meta_uid=hash("sha512",$num);
    $query= "INSERT INTO `metamask_details`(`meta_uid`,`metamask_address`,`user_uid`,`meta_status`) VALUES ('$meta_uid','$meta_address','$user_uid','$status')";
    if (mysqli_query($link, $query) ) {

        $data['status'] = 201;
        $data['success'] = "Tag Updated";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }

}