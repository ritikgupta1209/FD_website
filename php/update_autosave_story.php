<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}

date_default_timezone_set("Asia/Calcutta");
$date_now = date("20y-m-d");

$title =  strip_tags($_POST['story_title']);
$content = $_POST['story_editor'];
$tags = strip_tags($_POST['tags']);
$unlisted = strip_tags($_POST['unlisted']);
$pin_story = strip_tags($_POST['pin_story']);

$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];

function create_slug($string)
{
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

$post_slug = create_slug($title).'-'.substr(md5(microtime()), 0, 10);

//image upload
/* if (isset($_FILES["featured_image"]["name"])) {
	$target_dir = "../uploads/featuredImages/";
	$temp = explode(".", $_FILES["featured_image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$target_file = $target_dir . basename($newfilename);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
	$image = mysqli_real_escape_string($link, basename($newfilename));
	$image = $image;
} else {
	$image = '';
} */
if (isset($_FILES["featured_image"]["name"])) {
	$target_dir = "../uploads/featuredImages/";
	$temp = explode(".", $_FILES["featured_image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$target_file = $target_dir . basename($newfilename);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
	$image = mysqli_real_escape_string($link, basename($newfilename));
	$image = $image;
} else {
	$image = '';
}
	$post_id = $_POST['post_id'];

	$link->query("UPDATE `stories` SET `post_title` = '$title', `post_content` = '$content', `featured_image` = '$image', `post_tags`='$tags', `unlisted` = '$unlisted',`pin_story`='$pin_story', `post_slug`='$post_slug',`post_status`='published',`meta_title`='$meta_title',`meta_description`='$meta_description', `updated_at`='$date_now' WHERE `post_id` = '$post_id'");


