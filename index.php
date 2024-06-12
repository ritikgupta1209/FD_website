<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/food-donation-minor','',$request);


if($router=='/' || $router=='/home'){
    include('home.php');

}elseif($router=='/login'){
    include('login-user.php');

}elseif($router=='/logout'){
    include('logout-user.php');

}elseif($router=='/register'){
    include('signup-user.php');
    
}elseif($router=='/forgot-password'){
    include('forgot-password.php');
    
}elseif($router=='/admin/dashboard/login'){
    include('dashboard/login.php');

}elseif(preg_match("/topic\/[a-zA-Z0-9_-]/i", $router)){
    include('topic.php');
    
}elseif(preg_match("/[a-zA-Z0-9_-]\/[a-zA-Z0-9_-]/i", $router)){
    include('single-post.php');
    
}elseif(preg_match("/[a-zA-Z0-9_-]/i", $router)){
    include('profile.php');
    
}
//dashbaord router

//error router
else{
    include('404.php');
    
}

?>