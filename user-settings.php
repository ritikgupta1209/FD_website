<?php require_once "php/controllerUserData.php"; ?>
<?php
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
        $profile = $fetch_info['profile'];
        $user_uid = $fetch_info['user_uid'];
        $code = $fetch_info['code'];
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

?>
<?php
$meta_title = 'Settings';
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
    

    <!-- medium editor -->
    <!-- <link rel="stylesheet" href="assets/mediumEditor/css/medium-editor.css">
    <link rel="stylesheet" href="assets/mediumEditor/css/themes/beagle.min.css">
    <link rel="stylesheet" href="assets/mediumEditor/css/medium-editor-insert-plugin.min.css"> -->
    <link rel="stylesheet" href="assets/dropify/css/dropify.min.css">
    <link href="assets/tagify/tagify.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">

    <!-- Main Quill library -->

    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.snow.css'>
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.bubble.css'>
    <!-- Styling for settings starts -->
    <style type="text/css">
       .img-fluid{
           width: 100%;
           height: 100px;
       }
       .row {
            text-align: left;
            justify-content: left;

            padding-bottom: 20px;
        }

        .row-h {
            padding-bottom: 1px;
            text-align: left;
            justify-content: left;
        }

        .nav-link {
            padding: 5px;
            ;
            color: #6c757d;

        }

        .form-control {
            height: 40px;
            font-size: 15px;
            background: #E2E8F0;
            color: #6c757d;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 15px;
            padding-bottom: 4px;
        }

        .about-you {
            width: 100%;

        }

        .email-section {
            padding-bottom: none;
        }

        #Url {
            width: 32%;
        }

        #pic {
            padding-right: 20px;
            height: 50px;

        }

        .button--chromeless,
        .button--link {
            border-width: 0;
            padding: 0;
            text-align: left;
            vertical-align: baseline;
            white-space: normal;
        }

        .button,
        .button .svgIcon {
            -webkit-transition: .1s background-color, .1s border-color, .1s color, .1s fill;
            transition: .1s background-color, .1s border-color, .1s color, .1s fill;
        }

        .button {
            display: inline-block;
            position: relative;
            color: rgba(0, 0, 0, .54);
            background: rgba(0, 0, 0, 0);
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            vertical-align: bottom;
            white-space: nowrap;
            text-rendering: auto;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            font-family: medium-content-sans-serif-font, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            letter-spacing: 0;
            font-weight: 400;
            font-style: normal;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;

        }

        .u-textUnderline {
            text-decoration: underline !important;
        }

        .u-marginTop10 {
            margin-top: 10px !important;
        }

        .u-block {
            display: block !important;
        }

        a,
        button,
        input {
            -webkit-tap-highlight-color: transparent;
        }

        button,
        html input[type=button],
        input[type=reset],
        input[type=submit] {
            -webkit-appearance: button;
            cursor: pointer;
        }

        button,
        select {
            text-transform: none;
        }

        button {
            overflow: visible;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            color: inherit;
            font: inherit;
            margin: 0;
        }

        button {
            appearance: auto;
            /* -webkit-writing-mode: horizontal-tb !important; */
            text-rendering: auto;
            color: -internal-light-dark(black, white);
            letter-spacing: normal;
            word-spacing: normal;
            line-height: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            display: inline-block;
            text-align: center;
            align-items: flex-start;
            cursor: default;
            box-sizing: border-box;
            background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
            margin: 0em;
            padding: 1px 6px;
            border-width: 2px;
            border-style: outset;
            border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
            border-image: initial;
        }
        #profileimage{

    visibility: hidden;
        }

        @media only screen and (max-width: 600px) {

            body {
                width: 100vw;
            }
            #profileimage{

visibility: hidden;
    }
 
            .row {
                text-align: left;
                justify-content: left;
                padding-bottom: 20px;
                width: 100vw;
            }

            

            .inputs-1 {
                margin-top: 5px;
                justify-content: center;
            }

            .row-h {
                padding-bottom: 1px;
                text-align: left;
                justify-content: left;
                width: 100vw;
            }

            h5 {
                font-size: medium;
                padding-right: 50vw;
            }

            p {
                font-size: small;
            }

            button {
                size: small;
            }

            .container {
                width: 100vw;
            }

            .col-4 {
                width: 100%;
            }

        }

        #save {
            visibility: hidden;
        }
        .form-control {
            height: 40px;
            font-size: 15px;
            background: #E2E8F0;
            color: #6c757d;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 15px;
            padding-bottom: 4px;
        }

        
    </style>
    <!-- Styling for settings ends-->
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


    <div class="container" style="padding-top:50px;"></div>




    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">

                    <div class="sidebar-item">
                        <div class="make-me-sticky">
                            <div class="d-none d-lg-block">
                                <ul class="nav nav-tabs flex-rows " style="text-align: left;text-decoration:none;margin-left: 92px;">

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#about-you" style="justify-content:left">About You</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#email-section">Email</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#security-section">Security</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#meta-section" tabindex="-1" aria-disabled="true">Metamask Details</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div><p></p>
                <p><span></span></p>

                <section id="about-you">
                        <div class="email-section">
                            <div class="row">


                                
                            </div>
                    <section id="about-you">
                        <div class="about-you" href="about-you">
                        <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <div class="email-settings">
                                        <h2 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">About Us
                                        </h2>
                                        <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                        </hr>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                    <!-- About You Starts -->
                    <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="fw-bold text-capitalize mb-0 text-align=left">Name</label>
                                    <?php

                                            $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?> 
                                    <input class="form-control" required readonly id="name" type="text" placeholder="<?php echo $row['name'] ?>" required value="<?php echo $row['name'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                            }
                        }?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='submitname' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary' id="edit1">Edit</button>    
                                </div>
                            </div>
                        </div>
                        <!-- 
                            
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12" >
                                    <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Name
                                        <p></p>
                                        <div class=" form-group mb-3">
                                        //<?php

//$query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
//$result = mysqli_query($link, $query);
//if (mysqli_num_rows($result) > 0) {
  //  while ($row = mysqli_fetch_array($result)) {
?> <input class="form-control" required readonly id="name" type="text" placeholder="" required value="">
        <input type="hidden" id="user_uid" value="">
</div>

</h5>

<div class="d-flex justify-content-between">

</div>

<div class="inputs-1" style="justify-content:flex-start;">

<button class="btn button-outline-primary " id='cancel' style="visibility: hidden;" type='reset'>Cancel</button>
<button class='btn button-outline-primary' id="edit1">Edit</button>
<button class='btn button-outline-primary' data-role="update" id='submitname' style="visibility: hidden;" type='button'>Save</a>
</div>
</div>
</div>
                        -->
                        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="bio" class="fw-bold text-capitalize mb-0 text-align=left">Bio</label>
                                    <?php

                                        $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                

                                    <input class="form-control" required readonly id="name" type="text" placeholder="<?php echo $row['bio'] ?>" required value="<?php echo $row['bio'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                                }
                            }
                                ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                <button class="btn button-outline-primary" id='cancel2' style="visibility: hidden;margin-right:5px;" onclick="window.location.replace('user-settings.php')" type='reset'>Cancel</button>
                                <button class='btn button-outline-primary' id='save2' style="visibility: hidden;" type='submit'>Save</button>
                                <button class='btn button-outline-primary' id="edit2">Edit</button>    
                            </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="photo" class="fw-bold text-capitalize mb-0 text-align=left">Photo</label>
                                    <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <!-- Query for profile picture -->
                                    <?php
                                    $query = "SELECT `user_login`.* FROM `user_login`
                                           WHERE `user_uid`='$user_uid'";
                                    $result = mysqli_query($link, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['profile'] == '') {
                                                echo '<div class="profile">
                                                   <a href="profile?username=' . $row['username'] . '">
                                                   <canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas>

                                                   </a>
                                               </div>';
                                            } else {
                                                echo '<div class="profile">
                                                   <a href="profile?username=' . $row['username'] . '">
                                                  <img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle" id="profilePic">
                                                   </a>
                                               </div>';
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                           

                                <input  type="file" class="form-contrl" name="images" id="images"  placeholder="Please choose your image"/>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                <button class="btn button-outline-primary" id='ca' style="visibility: hidden;" onclick="window.location.replace('user-settings.php')" type='reset'>Cancel</button>
                                <button class='btn button-outline-primary' id='sa' style="visibility: hidden;" type='submit'>Save</button>
                                <button type="submit" id="upload" class="btn button-outline-primary" >Upload</button>
                                 <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                </div>
                            </div>
                        </div>
                        
                        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="username" class="fw-bold text-capitalize mb-0 text-align=left">Username</label>
          
                                    <?php

                                            $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?> 
                                    <input class="form-control" required readonly id="name" type="text" placeholder="<?php echo $row['username'] ?>" required value="<?php echo $row['username'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                            }
                        }?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel3' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='save3' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary' id="edit3">Edit</button>    
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="url" class="fw-bold text-capitalize mb-0 text-align=left">URL</label>
          
                                    <?php

                                            $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?> 
                                    <input class="form-control" required readonly id="name" type="text" placeholder="localhost/cms-medium/<?php echo $row['username'] ?>" required value="localhost/cms-medium/<?php echo $row['username'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                            }
                        }?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='submitname' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary'style="visibility: hidden;" id="edit1">Edit</button>    
                                </div>
                            </div>
                        </div>
                    
                            
                    </section><p></p>
                <p><span></span></p>

                    <!-- About You ends -->
                    <!-- EMAIL starts -->
                    <section id="email-section">
                        <div class="email-section">
                            <div class="row">


                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <div class="email-settings">
                                        <h2 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">Email Settings
                                        </h2>
                                        <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                        </hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">Your Email</label>
          
                                    <?php

                                            $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?> 
                                    <input class="form-control" required readonly id="email" name="email" type="text" placeholder="<?php echo $row['email'] ?>" required value="<?php echo $row['email'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                            }
                        }?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel5' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='save5' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary' id="edit5">Edit</button>    
                                </div>
                            </div>
                        </div>
                    
                        
                <p></p>
                <p><span></span></p>

                            <!-- <div class="row">
                   <div class="d-flex justify-content-between align-items-center mb-4">
  <p class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Email from ... </p>
                <div class="d-flex justify-content-between">
                      
                  </div>
              <div>
                  <a href=" " class="btn button-outline-primary">Edit</a>
              </div>

                   </div>
                   </div>-->
                 <!--  <div class="row d-flex justify-content-left align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">

                                    <label class="fw-bold text-capitalize mb-4 text-align=left" style="color:var(--text-color); font-size:25px;">Recommended Reading
                                   
                                    <div>
                  <a href="about-you" class="btn button-outline-primary">Edit</a>
              </div> 

                                </div>
                            </div>-->

                            <div class="row d-flex justify-content-left align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">

                                    <label class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color); font-size:18px;">Newsletters
                                        <p class="fw-bold text-capitalize mb-0 text-align=left" style="font-size: small;color:grey">Recieve newsletters from publication</p>
                                    
                                    
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="d-flex on-btn justify-content-end">
                                            <p class="mb-0" style="margin-top: 3px;">On/Off</p>
                                            <div class="theme-switch form-check form-switch ms-2"for="checkbox">
                                                <input class="form-check-input" type="checkbox" id="switch" />
                                            </div>
                                        </div>
                                        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                                    </div>

                            </div>
                        </div>
                    </section>


                    <!-- Email Ends -->
                    <p></p>
                <p><span></span></p>

                    <!-- Security Starts -->
                    <section id="security-section">
                        <div class="security-section">
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <div class="security-settings">
                                        <h2 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Security
                                        </h2>
                                        <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                        </hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <h5 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">Log
                                        out
                                        <p class="fw-bold text-capitalize mb-0 text-align=left" style="font-size: small;color:grey">This will log you out from current session</p>

                                    </h5>
                                    <div class="d-flex justify-content-between">

                                    </div>
                                    <div>
                                        <a href="logout-user" class="btn button-outline-primary">Log out</a>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">

                                    <h5 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">Deactivate account
                                        <p class="fw-bold text-capitalize mb-0 text-align=left" style="font-size: small;color:grey">Deactivating your account will remove it from
                                            <br>... within a few minutes. Deactivation will also immediately cancel any subscription for
                                            <br> ... Membership, and no money will be reimbursed. You can sign back in anytime to reactivate your account and restore its content.
                                        </p>
                                        <button class="button button--chromeless u-baseColor--buttonNormal u-block u-marginTop10 u-textUnderline button--delete" data-action="edit-settings.php" id="deactivate">Deactivate account</button>
                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                    </h5>
                                    <div class="d-flex justify-content-between">

                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">

                                    <h5 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">Delete account
                                        <p class="fw-bold text-capitalize mb-0 text-align=left" style="font-size: small;color:grey">Permanently delete your account
                                            and all of your content.</p>
                                        <a href="" style="color: gray;font-size: small;">Delete Account</a>
                                    </h5>

                                    <div class="d-flex justify-content-between">

                                    </div>
                                    <!-- <div>
                  <a href="about-you" class="btn button-outline-primary">Edit</a>
              </div> -->

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Security Ends -->
                    <p></p>
                <p><span></span></p>

                    <!-- Metamask Details starts -->
                    <section id="meta-section">
                        <div class="meta-section"> <?php
                        $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            ?>
                                       
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <div class="security-settings">
                                        <h2 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Metamask Details
                                        </h2>
                                        <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                        </hr>
                                    </div>
                                </div>
                            </div>        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">Meta Address</label>
          
                                    <?php

                                        $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                    ?> 
                                    <input class="form-control" required readonly id="maddress" name="maddress" type="text" placeholder="<?php echo $row['metamask_address'] ?>" required value="<?php echo $row['metamask_address'] ?>">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                <?php
                            }
                        }?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel8' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='save8' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary' id="edit8">Edit</button>    
                                </div>
                            </div>
                        </div>
                    
                            <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="meta" class="fw-bold text-capitalize mb-0 text-align=left">Metamask Status</label>
          
                                    <?php
                                            $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    
                                                    if($row['meta_status']=="active"){
                                                        $meta_stat="<button type=\"button\" class=\"follow_btn btn button-follow fw-bold\" style=\"margin-top:5px;\">Active</button>";
                                                    }
                                                    else{
                                                        $meta_stat="<button type=\"button\" class=\"follow_btn btn button-follow fw-bold\" style=\"margin-top:5px;\">Inactive</button>";
        
                                                    }

                                            ?>
                                              <br>     <!--<input class="form-control"style="" type="text"  id="metamask" name="meta" placeholder="<?php echo $row['metamask_address'] ?>" required value="<?php echo $row['metamask_address']  ?>">
                                                   -->  
                                                    <?php echo $meta_stat;  ?>

                                        </div>
                                    <?php }
                                            } else { ?>
                                <?php } ?>
                                </div>
                            
                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <div class="d-flex on-btn justify-content-end">
                                            <p class="mb-0"  >Inactive/Active</p>
                                            <div class="theme-switch form-check form-switch ms-2"for="checkbox">
                                                <input class="form-check-input" type="checkbox" id="switch"  />
                                                <input class="form-check-input" type="checkbox" id="switch2"  />

                                            </div>
                                        </div>
                            </div>
                        </div><?php 
                                            }
                                            else{
                                                ?>
                                               
                                               
                                               <div class="row">
                                <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                    <div class="security-settings">
                                        <h2 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Add New Metamask
                                        </h2>
                                        <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                        </hr>
                                    </div>
                                </div>
                            </div>        <div class="row d-flex justify-content-center align-items-end">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">Add Your Meta Address</label>
          
                                    <input class="form-control" required readonly id="newmaddress" name="newmaddress" type="text" placeholder="Add Meta Address" required value="">
                                    <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                           
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="inputs-1 d-flex  justify-content-end" >
                                        
                                    <button class="btn button-outline-primary " id='cancel9' style="visibility: hidden; margin-right:3px;" type='reset'>Cancel</button>
                                    <button class='btn button-outline-primary' data-role="update" id='save9' style="visibility: hidden;" type='button'>Save</button>
                                    <button class='btn button-outline-primary' id="edit9">Edit</button>    
                                </div>
                            </div>
                        </div>
                                               
                                               
                                                <?php }?>
                        </div>
                </div>
                <!-- <?php
                        // $query = "SELECT * FROM `metamask_details` ";
                        // $result = mysqli_query($link, $query);
                        // if (mysqli_num_rows($result) > 0) {
                        //     echo $result;
                        // }
                        ?> -->
            </div>
    </section>
    <!-- Metamask Details end -->

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script src="assets/dropify/js/dropify.min.js"></script>
    <script src="assets/tagify/jQuery.tagify.min.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>

    <script src="assets/plugins/jquery/jquery-3.4.1.min.js "></script>
    <script src="assets/plugins/bootstrap/popper.min.js "></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js "></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js "></script>
    <script src="assets/plugins/apexcharts/dist/apexcharts.min.js "></script>
    <script src="assets/plugins/blockui/jquery.blockUI.js "></script>
    <script src="assets/plugins/flot/jquery.flot.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.time.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.symbol.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.resize.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.tooltip.min.js "></script>
    <script src="assets/js/connect.min.js "></script>
    <script src="assets/js/pages/dashboard.js "></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/dataTables.select.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.min.js"></script>

    <script>
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            swal('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })

        //$('[name=tags]').tagify();

        var unlisted_btn = false;
        $("#unlisted_btn").on('change', function() {
            if ($(this).is(':checked')) {
                unlisted_btn = $(this).is(':checked');
                //alert(unlisted_btn);
            } else {
                unlisted_btn = $(this).is(':checked');
                //alert(unlisted_btn);
            }
        });

        var pin_story = false;
        $("#pin_story").on('change', function() {
            if ($(this).is(':checked')) {
                pin_story = $(this).is(':checked');
                //alert(unlisted_btn);
            } else {
                pin_story = $(this).is(':checked');
                //alert(unlisted_btn);
            }
        });


        $(document).ready(function() {
            var tagApi = $(".tm-input").tagsManager();


            $(".typeahead").typeahead({
                name: 'tags',
                displayKey: 'name',
                source: function(query, process) {
                    return $.get('php/getTags.php', {
                        query: query
                    }, function(data) {
                        data = $.parseJSON(data);
                        return process(data);
                    });
                },
                afterSelect: function(item) {
                    tagApi.tagsManager("pushTag", item);
                }
            });
        });
    </script>

    <script>
        $('.nav-link').click(function() {
            $('.nav-link').hover('');
        });

        $(document).ready(function() {
            $(".avatar-image").letterpic({
                colors: [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],
                font: 'Inter'
            });
        });
    </script>
    <!-- JQuery for edit options -->
    <script>
        $(document).ready(function() {
            $('#edit1').click(function() {
                $('#name').focus($('#name').css({
                    'border': '1px solid #7259B5',

                }));
                $('#name').prop("readonly", false)
            });
            $("#edit1").click(function() {
                var save = document.getElementById("submitname");
                var cancel = document.getElementById("cancel");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#name').html();
                $($name).val(t);
                $('#name').show();
            });

            $("#edit1").blur(function() {

                $(this).hide();
                var t = $('#name').val();
                $('#name').html(t);
                $('#name').show();

            });
            $('#edit1').click(function() {
                var edit = document.getElementById("edit1");
                var save = document.getElementById("submitname");
                var cancel = document.getElementById("cancel");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });
        $(document).ready(function() {
            $('#edit2').click(function() {
                $('#Bio').focus($('#Bio').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Bio').prop("readonly", false)
            });
            $("#edit2").click(function() {
                var save = document.getElementById("save2");
                var cancel = document.getElementById("cancel2");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#Bio').html();
                $($Bio).val(t);
                $('#Bio').show();
            });

            $("#edit2").blur(function() {

                $(this).hide();
                var t = $('#Bio').val();
                $('#Bio').html(t);
                $('#Bio').show();

            });
            $('#edit2').click(function() {

                var edit = document.getElementById("edit2");
                var save = document.getElementById("save2");
                var cancel = document.getElementById("cancel2");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });

        $(document).ready(function() {
            $('#edit5').click(function() {
                $('#email').focus($('#email').css({
                    'border': '1px solid #7259B5',

                }));
                $('#email').prop("readonly", false)
            });
            $("#edit5").click(function() {
                var save = document.getElementById("save5");
                var cancel = document.getElementById("cancel5");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#email').html();
                $($email).val(t);
                $('#email').show();
            });

            $("#edit5").blur(function() {

                $(this).hide();
                var t = $('#email').val();
                $('#email').html(t);
                $('#email').show();

            });
            $('#edit5').click(function() {

                var edit = document.getElementById("edit5");
                var save = document.getElementById("save5");
                var cancel = document.getElementById("cancel5");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });

            $('#edit6').click(function() {

                var upload = document.getElementById("upload");
                upload.style.visibility = "visible";

            });


        });

        $(document).ready(function() {
            $('#edit3').click(function() {
                $('#Username').focus($('#Username').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Username').prop("readonly", false)
            });
            $("#edit3").click(function() {
                var save = document.getElementById("save3");
                var cancel = document.getElementById("cancel3");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#Username').html();
                $($Username).val(t);
                $('#Username').show();
            });

            $("#edit3").blur(function() {

                $(this).hide();
                var t = $('#Username').val();
                $('#Username').html(t);
                $('#Username').show();

            });
            $('#edit3').click(function() {

                var edit = document.getElementById("edit3");
                var save = document.getElementById("save3");
                var cancel = document.getElementById("cancel3");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });
        $(document).ready(function() {
            $('#edit8').click(function() {
                $('#maddress').focus($('#maddress').css({
                    'border': '1px solid #7259B5',

                }));
                $('#maddress').prop("readonly", false)
            });
            $("#edit8").click(function() {
                var save = document.getElementById("save8");
                var cancel = document.getElementById("cancel8");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#maddress').html();
                $($Username).val(t);
                $('#maddress').show();
            });

            $("#edit8").blur(function() {

                $(this).hide();
                var t = $('#maddress').val();
                $('#maddress').html(t);
                $('#maddress').show();

            });
            $('#edit8').click(function() {

                var edit = document.getElementById("edit8");
                var save = document.getElementById("save8");
                var cancel = document.getElementById("cancel8");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });
        $(document).ready(function() {
            $('#edit9').click(function() {
                $('#newmaddress').focus($('#newmaddress').css({
                    'border': '1px solid #7259B5',

                }));
                $('#newmaddress').prop("readonly", false)
            });
            $("#edit9").click(function() {
                var save = document.getElementById("save9");
                var cancel = document.getElementById("cancel9");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
                $(this).hide();
                var t = $('#newmaddress').html();
                $($Username).val(t);
                $('#newmaddress').show();
            });

            $("#edit9").blur(function() {

                $(this).hide();
                var t = $('#newmaddress').val();
                $('#newmaddress').html(t);
                $('#newmaddress').show();

            });
            $('#edit9').click(function() {

                var edit = document.getElementById("edit9");
                var save = document.getElementById("save9");
                var cancel = document.getElementById("cancel9");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });

        $(document).ready(function() {
            $('#edit4').click(function() {
                $('#Url').focus($('#Url').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Url').prop("readonly", false)
            });
            $("#edit4").click(function() {
                $(this).hide();
                var t = $('#Url').html();
                $('#Url').val(t);
                $('#Url').show();
            });

            $("#edit4").blur(function() {

                $(this).hide();
                var t = $('#Url').val();
                $('#Url').html(t);
                $('#Url').show();

            });
            $('#edit4').click(function() {

                var edit = document.getElementById("edit4");
                var save = document.getElementById("save4");
                var cancel = document.getElementById("cancel4");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });
        $(document).ready(function() {
            $('#edit6').click(function() {
                $('#fileToUpload').focus($('#fileToUpload').css({
                    'border': '1px solid #7259B5',

                }));

            });
            $("#edit6").click(function() {
                $(this).hide();
                var t = $('#fileToUpload').html();
                $('#fileToUpload').val(t);
                $('#fileToUpload').show();
            });

            $("#edit6").blur(function() {

                $(this).hide();
                var t = $('#fileToUpload').val();
                $('#fileToUpload').html(t);
                $('#fileToUpload').show();

            });
            $('#edit6').click(function() {

                var edit = document.getElementById("edit6");
                var save = document.getElementById("fileToUpload");
                var cancel = document.getElementById("submit");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });
        $(document).on('click', '#swch', function() {
                var user_uid = '<?php echo $user_uid ?>';
var metamask_address= document.getElementById("metamask");

                $.ajax({
                    type: 'POST',
                    url: 'php/changestatusmeta.php',
                    data: {
                        'user_uid': user_uid,
                        'metamask_address': metamask_address
                    },
                    success: function(data) {
                       window.location.reload();
                    }
                });
            });
        $(document).on('click', '#switch2', function() {
                
            event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#metamask').val() == "") {
                    alert("Warning", "Please enter all fields", "warning");
                    error = error + 'metamask_address';
                } else {

                    formData.append('metamask_address', $('#metamask').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                console.log(formData);
                    $.ajax({
                        url: "php/changestatusmeta.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                    success: function(data) {
                        window.location.reload();
                    }
                });
            });
        $(document).ready(function() {
            $('.form-check-input').click(function() {
                $('#meta').focus($('#meta').css({
                    'border': '1px solid #7259B5',

                }));
                $('#meta').prop("readonly", true)
            });
        });

        $(document).ready(function() {
        
            $('.form-check-input').click(function() {
              
                var view = document.getElementById("meta");
                view.style.visibility="visible";
                if(view.style.visibility=="visible"){
               $('.form-check-input').click(function() {
              
                var view = document.getElementById("meta");
                view.style.visibility="hidden";
              
            });
           
                }
            
            });
        });
        $(document).ready(function() {
        
        $('.form-check-input').click(function() {
            var cnt=0;
   
   cnt=parseInt(cnt)+parseInt(1);
  if(cnt==2){
      window.replace.location('user-settings.php');
  }
    
});
        });  
        //         $(document).ready(function() {
        //             var view = document.getElementById("meta");
        //             if(view.style.visibility=="hidden"){
        //             $('.form-check-input').click(function() {
        //         var view = document.getElementById("meta");
        //         view.style.visibility="visible";
                
        //     });
            
        // } 
        //     });
        
           
        // });
     
    </script>
    <!-- Jquery for edit ends -->

    <!-- Jquery for cancel starts -->
    <script>
        $('#cancel').click(function() {
            window.location.replace('user-settings.php');

        });
    </script>

    <!-- Jquery for cancel ends -->

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#submitname').on('click', function(event) {
               
                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#name').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'name';
                } else {

                    formData.append('name', $('#name').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");
                                
                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#name').prop("readonly", true);
                                $('#name').focus($('#name').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');

                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");
                                // window.location.replace('user-settings.php');
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save2').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#Bio').val() == "") {
                    alert("Warning", "Please enter all fields", "warning");
                    error = error + 'Bio';
                } else {

                    formData.append('Bio', $('#Bio').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Bio Updated");
                                var edit = document.getElementById("edit2");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save2");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel2");
                                cancel.style.visibility = "hidden";
                                $('#Bio').prop("readonly", true);
                                $('#Bio').focus($('#Bio').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } 
                            
                            else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save3').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#Username').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'Username';
                } else {

                    formData.append('Username', $('#Username').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Username Updated");
                                var edit = document.getElementById("edit3");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save3");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel3");
                                cancel.style.visibility = "hidden";
                                $('#Username').prop("readonly", true);
                                $('#Username').focus($('#Username').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save8').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#maddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'maddress';
                } else {

                    formData.append('maddress', $('#maddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit8");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save8");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel8");
                                cancel.style.visibility = "hidden";
                                $('#maddress').prop("readonly", true);
                                $('#maddress').focus($('#maddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save8').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#maddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'maddress';
                } else {

                    formData.append('maddress', $('#maddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit8");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save8");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel8");
                                cancel.style.visibility = "hidden";
                                $('#maddress').prop("readonly", true);
                                $('#maddress').focus($('#maddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save9').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#newmaddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'newmaddress';
                } else {

                    formData.append('newmaddress', $('#newmaddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/addmetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit9");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save9");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel9");
                                cancel.style.visibility = "hidden";
                                $('#newmaddress').prop("readonly", true);
                                $('#newmaddress').focus($('#newmaddress').css({
                                    'border': 'none',
                           
                                }));
                                window.location.reload();
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save5').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#email').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'email';
                } else {

                    formData.append('email', $('#email').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");
                                
                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#email').prop("readonly", true);
                                $('#email').focus($('#email').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');

                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
  <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#deactivate').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();
                formData.append('user_uid', $('#user_uid').val());
                formData.append('deactivate', $('#deactivate').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Account Deactivated");

                            } else if (data.status == 501) {

                                toastr.warning("No changes made");

                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");

                            }
                        }
                    });
                   
                } else {

                }
            });

        });
    </script>
    <!-- for image upload -->
<!-- <script>

(function() {
	$('form').ajaxForm({
		beforeSubmit: function() {	
			count = 0;
			val = $.trim( $('#images').val() );
            
			if( val == '' ){
				count= 1;
				$( "#images" ).next('span').html( "Please select your images" );
			}

			if(count == 0){
				for (var i = 0; i < $('#images').get(0).files.length; ++i) {
			    	img = $('#images').get(0).files[i].name;
			    	var extension = img.split('.').pop().toUpperCase();
			    	if(extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			    		count= count+ 1
			    	}
			    }
				if( count> 0) $( "#images" ).next('span').html( "Please select valid images" );
			}

		    if( count> 0){
		    	return false;
		    } else {
		    	$( "#images" ).next('span').html( "" );
		    }
            
	    },

		beforeSend:function(){
		   $('#loader').show();
		   $('#image_upload').hide();
		},
	    success: function(msg) {
	    },
		complete: function(xhr) {
			$('#loader').hide();
			$('#image_upload').show();

			$('#images').val('');
			$('#error_div').html('');
			result = xhr.responseText;
			result = $.parseJSON(result);
			base_path = $('#base_path').val();

			if( result.success ){
				name = base_path+'images/'+result.success;
				html = '';
				html+= '<image src="'+name+'">';
				$('#uploaded_images #success_div').append( html );
               
			} 
            
            else if( result.error ){
				error = result.error
				html = '';
				html+='<p>'+error+'</p>';
				$('#uploaded_images #error_div').append( html );
			}

			$('#error_div').delay(5000).fadeOut('slow');

		}
	}); 

})(); -->


    <!-- </script> -->

    <script>
          var _autosave;
      $(document).ready(function() {   
        $('#upload').on('click', function(e) { 
            clearInterval(_autosave);
            // var image = $('#images').val();
            var error = "";
            
                e.preventDefault();
                var formData = new FormData();
                if ($("#images").val() == "") {
                    error = error + 'images';
                    toastr["error"]("Upload featured image");
                } else {
                    
                    formData.append('profile', $("#images")[0].files[0]);
                }
                formData.append('user_uid', $('#user_uid').val());
               
                if (error == "") {
                    console.log(formData);
                    $.ajax({

                        url: 'php/edit-settings.php',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function() {
                        toastr["success"]("Picture Updated");
                        window.location.reload();
                        
                        }
                    });
                }
            });
        //     function AutoSave() {
        //         _autosave = setInterval(function() {
        //             var formData = new FormData();
        //             var images = $('#images').val();
        //             formData.append('profile', $("#images")[0].files[0]);
        //             if (images != "") {
        //             $.ajax({
        //                 url: 'php/edit-settings.php',
        //                 type: "POST",
        //                 cache: false,
        //                 contentType: false,
        //                 processData: false,
        //                 data: formData,
        //                 success: function() {
        //                     if (data != "") {
        //                             $('#images').val(data);
        //                             AutoSave();

        //                         }
        //                         toastr["success"]("Image Updated");
        
        //                     }
        //                 });
        //             }
        //         }, 20000);
        //     }
        //     AutoSave();

        });
        
        
         </script>

 
</body>

</html>