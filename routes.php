<?php

require_once("./router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
//user panel
get('./food-donation-minor/', 'home.php');
get('./food-donation-minor/home', 'home.php');
get('./food-donation-minor/register', 'signup-user.php');
get('./food-donation-minor/login-user', 'login-user.php');
get('./food-donation-minor/login-user-mm', 'login-user.php');
get('./food-donation-minor/logout', 'logout-user.php');
get('./food-donation-minor/reset-code', 'reset-code.php');
 get('./food-donation-minor/user-otp', 'user-otp.php');
// get('./food-donation-minor/logout', 'logout-user.php');
get('./food-donation-minor/forgot-password', 'forgot-password.php');
get('./food-donation-minor/create-story', 'create-story.php');
get('./food-donation-minor/stories', 'stories.php');
get('./food-donation-minor/user-stats', 'user-stats.php');
get('./food-donation-minor/audience-stats', 'audience-stats.php');
get('./food-donation-minor/reading-list', 'reading-list.php');
get('./food-donation-minor/user-settings', 'user-settings.php');
get('./food-donation-minor/about-us', 'about-us.php');
get('./food-donation-minor/contact-us', 'contact-us.php');
get('./food-donation-minor/edit-story/$edit_req', 'edit-story.php');
get('./food-donation-minor/privacy-policy', 'privacy-policy.php');
get('./food-donation-minor/cookies-policy', 'cookies-policy.php');
get('./food-donation-minor/terms_of_use', 'terms_of_use.php');
//dashboard
get('./food-donation-minor/dashboard/', 'dashboard/index.php');
get('./food-donation-minor/dashboard/login', 'dashboard/login.php');
get('./food-donation-minor/dashboard/logout', 'dashboard/logout.php');
get('./food-donation-minor/dashboard/allpost', 'dashboard/allpost.php');
get('./food-donation-minor/dashboard/trash-stories', 'dashboard/trash-stories.php');
get('./food-donation-minor/dashboard/all-tags', 'dashboard/all-tags.php');
get('./food-donation-minor/dashboard/add-tag', 'dashboard/add-tag.php');
get('./food-donation-minor/dashboard/all-users', 'dashboard/all-users.php');
get('./food-donation-minor/dashboard/add-user', 'dashboard/add-user.php');
get('./food-donation-minor/dashboard/addpost', 'dashboard/addpost.php');
get('./food-donation-minor/dashboard/followusers', 'dashboard/followusers.php');
get('./food-donation-minor/dashboard/postlike', 'dashboard/postlike.php');
get('./food-donation-minor/dashboard/savepost', 'dashboard/savepost.php');
get('./food-donation-minor/dashboard/newsletter', 'dashboard/newsletter.php');
get('./food-donation-minor/dashboard/comments', 'dashboard/comments.php');
get('./food-donation-minor/dashboard/viewlogo', 'dashboard/viewlogo.php');
get('./food-donation-minor/dashboard/nav', 'dashboard/nav.php');
get('./food-donation-minor/dashboard/social', 'dashboard/social.php');
get('./food-donation-minor/dashboard/editor', 'dashboard/editor.php');
get('./food-donation-minor/dashboard/contactus', 'dashboard/contactus.php');
get('./food-donation-minor/dashboard/aboutus', 'dashboard/aboutus.php');
get('./food-donation-minor/dashboard/aboutus', 'dashboard/privacy-policy.php');
get('./food-donation-minor/dashboard/aboutus', 'dashboard/cookies-policy.php');
get('./food-donation-minor/dashboard/aboutus', 'dashboard/terms.php');
get('./food-donation-minor/dashboard/metamask', 'dashboard/metamask.php');
get('./food-donation-minor/dashboard/change-password', 'dashboard/change-password.php');

get('./food-donation-minor/about/$about_req', 'about.php');
get('./food-donation-minor/topic/$topic_req', 'topic.php');
get('./food-donation-minor/search/$search_req', 'search.php');
get('./food-donation-minor/$username_profile', 'profile.php');


get('./food-donation-minor/$username_post/$post_slug', 'single-post.php');

//get('./food-donation-minor/$username_post/$post_slug', 'extra.php');




// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
//get('/user/$id', 'user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
//get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
//get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
//get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','404.php');
