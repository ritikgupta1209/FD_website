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
/* echo "
<script>
    let userAddress=localStorage.getItem('userAddress')?localStorage.getItem('userAddress'):''
        console.log(userAddress);
        if(userAddress=='')
        {
          alert('U need to login first');
          window.location.href='./login-user-mm';
        }
</script>
"; */

// echo 'vghvh' ;

// if($_SESSION['userAddress'] == ''){
//     header('Location: ./login-user-mm');
// }
?>


<?php
$meta_title = 'Blog';
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Donation Details
                            </h1>
                            <div class="d-flex justify-content-between">
                                <p id="draftMsg" class="text-muted text-center mb-0" style="display:none;">Draft in <span class="text-capitalize"><?php echo $name; ?></span></p>
                                <p class="text-center mb-0" style="color:var(--gray-color)"><span id="result"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="stories" class="btn button-outline-primary">All Donations</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="write-story-div">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg story-input" name="story_title" id="story_title" placeholder="Title for Donation Post">
                            <input type="hidden" id="post_id" />
                            <input type="hidden" id="user_uid" value="<?php echo $user_uid; ?>" />
                            <input type="hidden" id="name" value="<?php echo $name; ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <div id="editor">
                                <!-- <h1 class="fw-light" style="color: var(--accent-hover-color);">Tell your story...</h1> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar-item">
                        <div class="make-me-sticky">

                            <div class="row">
                                <div class="col-12 order-last order-lg-first">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-grid">
                                            <button type="submit" class="btn button-primary" id="add_story">Publish to Help</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="sidebar-setting-link sidebar-setting-link-1" data-bs-toggle="collapse" href="#collapseMainSettings" aria-expanded="false" aria-controls="collapseMainSettings">
                                                Other Details
                                            </a>
                                            <a class="sidebar-setting-link sidebar-setting-link-1" data-bs-toggle="collapse" href="#collapseMainSettings" aria-expanded="false" aria-controls="collapseMainSettings">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseMainSettings">
                                            <hr>
                                            <div class="row gap-2">
                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0" style="color:var(--text-color);">Pin this story to the top of your profile?</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="pin_story">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0" style="color:var(--text-color);">Make this story unlisted?</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="unlisted_btn">
                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">No/Yes</label> -->
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h6 style="color:var(--text-color);">Featured Image of donation if possible</h6>
                                                    <input type="file" id="featured-image" class="dropify" data-height="150" />
                                                    <p id="label-featured-image" class="small" style="color:var(--gray-color);">Tip:
                                                        add a high-quality image to your story to capture people’s interest</p>

                                                </div>
                                                <div class="col-12 tags-div">
                                                    <h6 class="small mb-1" style="color:var(--text-color);">Add or change tags (up
                                                        to 3) so readers know what your story is about:</h6>
                                                    <!-- <input name="tags" placeholder="Add a tag" class="form-control story-input"
                                                id="tags"> -->
                                                    <input type="text" name="tags" placeholder="Add a tag" id="tags" class="typeahead tm-input form-control tm-input-info story-input" />
                                                    <button class="btn button-follow fw-bold" data-bs-toggle="modal" data-bs-target="#commentRightModal">Add New Tag</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="sidebar-setting-link sidebar-setting-link-2" data-bs-toggle="collapse" href="#collapseSeoSettings" aria-expanded="false" aria-controls="collapseSeoSettings">
                                                MetaMask Settings
                                            </a>
                                            <a class="sidebar-setting-link sidebar-setting-link-2" data-bs-toggle="collapse" href="#collapseSeoSettings" aria-expanded="false" aria-controls="collapseSeoSettings">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>


                                        <div class="collapse" id="collapseSeoSettings">
                                            <hr>
                                            <div class="form-group mb-3">
                                                <h6 style="color:var(--text-color);">Meta Title (<span id="meta_title_chars">0</span>)</h6>
                                                <input type="text" class="form-control story-input" name="meta_title" id="meta_title" placeholder="Meta Title">
                                            </div>
                                            <div class="form-group">
                                                <h6 style="color:var(--text-color);">Meta Description (<span id="meta_description_chars">0</span>)</h6>
                                                <textarea name="meta_description" class="form-control story-input" id="meta_description" rows="5" placeholder="Meta Description"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>





        </div>
    </section>





    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->
    <div class="modal modal_outer right_modal fade" id="commentRightModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
    <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase fw-bold" style="color:var(--text-color)">Add New Tags </h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?? null; ?>">
                        <!-- <div id="editorComment">
                        </div> -->
                        <input class="form-control" id="editorTag" placeholder="Enter new tag"></input>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo '<button class="btn button-primary-2"  onClick="login()">Add Tag</button>';
                        } else {
                            echo '<button class="btn button-primary-2" id="submitTag">Add Tag</button>';
                        }
                        ?>
                    </div>
                


</div>
</div>
</div>
</div>
 


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

    


    <script>
        $('.sidebar-setting-link-1').click(function() {
            $('.sidebar-setting-link-1 i').toggleClass('fa-chevron-right fa-chevron-down');
        });

        $('.sidebar-setting-link-2').click(function() {
            $('.sidebar-setting-link-2 i').toggleClass('fa-chevron-right fa-chevron-down');
        });

        $(document).ready(function() {
            var name = $('#name').val();
            $('#story_title').change(function() {
                $('#meta_title').val($(this).val() + ' | ' + name);
            });

            $('#story_title').change(function() {
                $('#meta_description').val($(this).val() + ' is published by ' + name + '.');
            });

            $('#meta_title').keyup(function() {

                var characterCount = $(this).val().length,
                    current = $('#meta_title_chars');
                current.text(characterCount);

                if (characterCount < 40) {
                    current.css('color', 'orange');
                }
                if (characterCount > 40 && characterCount < 50) {
                    current.css('color', 'green');
                }
                if (characterCount > 50) {
                    current.css('color', 'red');
                }
            });

            $('#meta_description').keyup(function() {

                var characterCount = $(this).val().length,
                    current = $('#meta_description_chars');
                current.text(characterCount);

                if (characterCount < 140) {
                    current.css('color', 'orange');
                }
                if (characterCount > 140 && characterCount < 156) {
                    current.css('color', 'green');
                }
                if (characterCount > 156) {
                    current.css('color', 'red');
                }
            });
        });




        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        var toolbarOptions = [
            ['bold', 'italic', 'underline' /* , 'strike' */ ], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [
                /* {
                            'list': 'ordered'
                        }, */
                {
                    'list': 'bullet'
                }
            ],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            /* [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], */ // outdent/indent
            /* [{
                'direction': 'rtl'
            }], */ // text direction

            /* [{
                'size': ['small', false, 'large', 'huge']
            }], */ // custom dropdown
            /* [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }], */
            ['link', 'image', 'video', 'formula'], // add's image support
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            /* [{
                'font': []
            }], */
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        var window_width = $(window).width();
        if (window_width <= 992) {
            var editor_theme = 'snow';
        } else {
            var editor_theme = 'bubble';
        }
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Details of Donation...',
            theme: editor_theme
        });
    </script>

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
        $(document).ready(function() {
            var _autosave;
            $('#add_story').on('click', function(e) {
                clearInterval(_autosave);
                var story_title = $('#story_title').val();
                //var story_editor = quill.container.innerHTML;
                var myEditor = document.querySelector('#editor')
                var story_editor = myEditor.children[0].innerHTML;
                var post_id = $('#post_id').val();
                var user_uid = $('#user_uid').val();
                var name = $('#name').val();
                var meta_title = $('#meta_title').val();
                var meta_description = $('#meta_description').val();

                var error = "";
                e.preventDefault();

                var formData = new FormData();

                if ($("#story_title").val() == "") {
                    error = error + 'story title ';
                    //sweetAlert("Warning", "Please enter author name", "warning");
                    //$("#story_title").css('cssText', 'border-color: #F1948A !important');
                    toastr["error"]("Enter Story Title");

                } else {
                    formData.append('story_title', story_title);

                }

                var values = $("#tags").map(function() {
                    return $(this).val();
                });
                var inputs = $(".tm-tag span");
                var tag_list = [];
                for (var i = 0; i < inputs.length; i++) {
                    tag_list.push(inputs[i].innerText);
                }

                if (tag_list.length == 0) {
                    error = error + 'tags';
                    toastr["error"]("Add one tag..");
                } else {
                    formData.append('tags', tag_list);
                }


                if ($("#featured-image").val() == "") {
                    error = error + 'featured image';
                    toastr["error"]("Upload featured image");
                } else {
                    formData.append('featured_image', $("#featured-image")[0].files[0]);
                }

                formData.append('user_uid', user_uid);
                formData.append('unlisted', unlisted_btn);
                formData.append('pin_story', pin_story);
                formData.append('story_editor', story_editor);
                formData.append('post_id', post_id);

                formData.append('meta_title', meta_title);
                formData.append('meta_description', meta_description);

                if (error == "") {
                    $.ajax({
                        url: 'php/publish_stories.php',
                        type: "POST",
                        /* dataType: "json", */
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function() {
                            toastr["success"]("Story Published");
                            //history.go(0);
                           window.location.replace("stories");
                            

                            /* $('#title').val('');
                        $('#content').val('');
                        $('#blog_id').val('');
 
                        $('#result').html("<center>Post Submitted!</center>");
                        $('#result').hide(); */
                            //AutoSave();
                        }
                    });
                }
            });

            function AutoSave() {
                _autosave = setInterval(function() {
                    //alert('hii');
                    var story_title = $('#story_title').val();
                    //var story_editor = quill.container.innerHTML;
                    var myEditor = document.querySelector('#editor')
                    var story_editor = myEditor.children[0].innerHTML;
                    var post_id = $('#post_id').val();
                    var user_uid = $('#user_uid').val();
                    var name = $('#name').val();
                    var meta_title = $('#meta_title').val();
                    var meta_description = $('#meta_description').val();

                    var formData = new FormData();

                    var values = $("#tags").map(function() {
                        return $(this).val();
                    });
                    var inputs = $(".tm-tag span");
                    var tag_list = [];
                    for (var i = 0; i < inputs.length; i++) {
                        tag_list.push(inputs[i].innerText);
                    }

                    formData.append('user_uid', user_uid);
                    formData.append('story_title', story_title);
                    formData.append('tags', tag_list);
                    formData.append('unlisted', unlisted_btn);
                    formData.append('pin_story', pin_story);
                    formData.append('story_editor', story_editor);
                    formData.append('featured_image', $("#featured-image")[0].files[0]);
                    formData.append('post_id', post_id);

                    formData.append('meta_title', meta_title);
                    formData.append('meta_description', meta_description);


                    if (story_title != "") {
                        $.ajax({
                            url: 'php/autosave_stories.php',
                            type: "POST",
                            /* dataType: "json", */
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            /* beforeSend: function() {
                                // setting a timeout
                                $('#result').html("Saving...").fadeOut(200);
                            }, */
                            success: function(data) {
                                if (data != "") {
                                    $('#post_id').val(data);
                                    

                                }
                                toastr["success"]("Story Saved");
                                
                                //$("#draftMsg").css('cssText', 'display:block');
                                //$('#result').html("Saved.").fadeIn(200);
                            }
                        });
                    }
                },2);
            }

        });
    </script>
    <script>
         $(document).ready(function() {
            $('#submitTag').on('click', function(e) {

                e.preventDefault();
                var error = "";
                /* var myEditor = document.querySelector('#editorComment')
                var editorComment = myEditor.children[0].innerHTML; */
                var formData = new FormData();

                if ($('#editorTag').val() == "") {
                    $('#editorTag').css('cssText', 'border-color: red !important');
                    error = error + 'editorTag';
                } else {
                    formData.append('editorTag', $('#editorTag').val());
                }

                formData.append('user_uid', $('#user_uid').val());
                
                
                if (error == "") {
                    //console.log(formData);
                    $.ajax({
                        url: "php/addTag.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            //console.log(data);
                            if (data.status == 201) {
                               // $(".close-modal").load(location.href + " .close-modal");
                               //window.location.reload();
                               toastr["success"]("Tag Added");
                               $(".modal").modal("hide");
                               

                            } else if (data.status == 501) {

                                //swal("Tag already exist");

                            } else if (data.status == 301) {
                                //console.log(data.error);
                                //swal("error");

                            }
                        }
                    });
                } else {

                }
            });
        });
    </script>
    <script>
         $(function() {
        $('#editorTag').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
});
    </script>
</body>

</html>