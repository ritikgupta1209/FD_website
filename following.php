<?php require_once "php/controllerUserData.php"; ?>
<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false) {
        $sql = "SELECT * FROM user_login WHERE email = '$email'";
        $run_Sql = mysqli_query($link, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $user_uid = $fetch_info['user_uid'];
            if ($status == "verified") {
                if ($code != 0) {
                    header('Location: reset-code');
                }
            } else {
                header('Location: user-otp');
            }
        }
    } else {
        header('Location: login-user');
    }
}
$username_req = $_REQUEST['username'];
$sql2 = "SELECT * FROM user_login WHERE username = '$username_req'";
$run_Sql2 = mysqli_query($link, $sql2);
$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
$name2 = $fetch_info2['name'];
$username2 = $fetch_info2['username'];
$bio2 = $fetch_info2['bio'];
$user_uid2 = $fetch_info2['user_uid'];

$sql5 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid2'";
$run_Sql5 = mysqli_query($link, $sql5);
$follower_count = mysqli_num_rows($run_Sql5);

$sql6 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2'";
$run_Sql6 = mysqli_query($link, $sql6);
$following_count = mysqli_num_rows($run_Sql6);

?>
<?php
$meta_title = $name2;
$category_description = 'Blog Description';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $meta_title ?> | Blog CMS </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="<?php echo ($meta_title); ?>">
    <!-- Enter Page title -->
    <meta property="og:title" content="<?php echo $meta_title ?> | Blog CMS" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="<?php echo ($actual_link) ?>" />
    <!-- Enter page description -->
    <meta property="og:description" content="<?php echo ($meta_description); ?>...">
    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="assets/images/logo/logo_icon.png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">

    <!-- favicon -->
    <link rel="icon" href="assets/images/logo/logo_icon.png">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- icons pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">


</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->


    <!-- profileHeaderDetails start-->
    <?php include('include/components/profileHeaderDetails.php'); ?>
    <!-- profileHeaderDetails end-->


    


    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <h2 class="fw-bold text-capitalize mb-3 text-align" style="color:var(--text-color);"><?php echo $following_count . ' Following'; ?></h2>

                    <div class="all-following">
                        <?php
$sql6 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2'";
$run_Sql6 = mysqli_query($link, $sql6);
$following_count = mysqli_num_rows($run_Sql6);
                        $count_query_following = "SELECT count(*) as allcount FROM follow AS follow WHERE `follow`.`following_user_uid` = '$user_uid2'";
                        $count_result_following = mysqli_query($link, $count_query_following);
                        $count_fetch_following = mysqli_fetch_array($count_result_following);
                        $postCountFollowing = $count_fetch_following['allcount'];
                        $username_req = $_REQUEST['username'];
                        $sql2 = "SELECT * FROM user_login WHERE username = '$username_req'";
                        $run_Sql2 = mysqli_query($link, $sql2);
                        $fetch_info2 = mysqli_fetch_assoc($run_Sql2);
                        $name2 = $fetch_info2['name'];
                        $username2 = $fetch_info2['username'];
                        $bio2 = $fetch_info2['bio'];
                        $user_uid2 = $fetch_info2['user_uid'];
                        
                        
                        $limitFollowing = 2;
                                

                        $query = "SELECT `user`.`username`,`user`.`name`,`user`.`profile`,`user`.`user_uid`,`user`.`bio` FROM `user_login` AS user
                        WHERE `user`.`user_uid` != '$user_uid2' AND `user`.`user_uid` IN (SELECT follow.followed_user_uid FROM follow AS follow WHERE `follow`.`following_user_uid` = '$user_uid2' ORDER BY `follow`.`follow_id` DESC) LIMIT 0," . $limitFollowing;
                        $result = mysqli_query($link, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <div class="follower-card shadow d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <?php
                                        if ($row['profile'] == '') {
                                            echo '<div class="text-center"><a href="profile?username='.$row['username'].'"><canvas class="avatar-image text-center p-1 shadow-sm" title="'.$row['name'].'"></canvas></a></div>';
                                        } else {
                                            echo '<div class="text-center"><a href="profile?username='.$row['username'].'"><img src="' . $row['profile'] . '" alt="" class="text-center p-1 shadow-sm"></a></div>';
                                        }
                                        ?>
                                        <div>
                                            <a href="profile?username=<?php echo $row['username']; ?>">
                                                <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['name']; ?></h5>
                                            </a>
                                            <p class="text-muted mb-0"><?php echo $row['bio']; ?></p>
                                        </div>
                                    </div>
                                    <div id="follow_reloaduser2">
                                    <?php
                              $user_uid_follow=$row['user_uid'];
                            ?>
                            <?php
                            $user_uid2 = $user_uid ?? null;
                            $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
                            AND followed_user_uid = '$user_uid_follow'";
                            $run_Sql20 = mysqli_query($link, $sql20);
                            $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                            $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                            $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                            if (!isset($_SESSION['email'])) {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="login()">Follow</button>';
                            } else if ($user_uid2 == $user_uid_follow) {
                                //echo '';
                            } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="unfollow1(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';
                            } else {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="follow1(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
                            }
                            ?>
                           
                                        <!--   <a href="follow" class="btn button-follow fw-bold" role="button">Follow</a>-->
                                    </div>
                                </div>

                            <?php }
                        } else { ?>

                            <div class="my-5">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
                                        <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data</h6>
                                        <!-- <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./"class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="loadmoreFollowing text-center">
                        <?php
                        if ($limitFollowing < $postCountFollowing) {
                        ?>
                            <input type="button" class="loadBtn" id="loadBtnFollowing" value="Load More">
                        <?php } ?>
                        <input type="hidden" id="rowFollowing" value="0">
                        <input type="hidden" id="postCountFollowing" value="<?php echo $postCountFollowing; ?>">
                    </div>



                </div>
            </div>
        </div>
    </section>


    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->



    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".avatar-image").letterpic({
                colors: [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],
                font: 'Inter'
            });
            $(document).on('click', '#loadBtnFollowing', function() {
                var row = Number($('#rowFollowing').val());
                var count = Number($('#postCountFollowing').val());
                var limit = 2;
                row = row + limit;
                $('#rowFollowing').val(row);
                $("#loadBtnFollowing").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreFollowingData.php',
                    data: 'row=' + row,
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.all-following').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnFollowing').css("display", "none");
                        } else {
                            $("#loadBtnDollowing").val('Load More');
                        }
                        $(".avatar-image").letterpic({
                            colors: [
                                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                            ],
                            font: 'Inter'
                        });
                    }
                });
            });

        });
    </script>
    <script>
         function follow1(following_user_uid, followed_user_uid) {
            $.ajax({
                url: "php/followUser.php",
                method: "POST",
                dataType: "json",
                data: {
                    following_user_uid: following_user_uid,
                    followed_user_uid: followed_user_uid
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        window.location.reload();
                        //$("#divProfileReload").load(location.href + " #divProfileReload");
                        //$("#follow_reloaduser2").load(location.href + " #follow_reloaduser2");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }

        function unfollow1(following_user_uid, followed_user_uid) {
            $.ajax({
                url: "php/unfollowUser.php",
                method: "POST",
                dataType: "json",
                data: {
                    following_user_uid: following_user_uid,
                    followed_user_uid: followed_user_uid
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        window.location.reload();
                        //$("#follow_reloaduser2").load(location.href + " #follow_reloaduser2");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }


    </script>

</body>

</html>