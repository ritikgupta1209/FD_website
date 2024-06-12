<?php
// local host link
$link = mysqli_connect("localhost", "root", "", "blog_cms_new");

if (mysqli_connect_error()){
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
?>
