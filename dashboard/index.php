<?php
$currentPage = 'dashboard';
//$currentPageSub = 'category';
?>
<?php require_once "php/controllerUserData.php"; ?>
<?php
$email = $_SESSION['session_user'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM admin_login WHERE email = '$email'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
    }
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CMS Admin Dashboard">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>QuadbTech - CMS Admin Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="assets/css/connect.min.css" rel="stylesheet">
    <link href="assets/css/admin4.css" rel="stylesheet">
    <link href="assets/css/dark_theme.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        .form-control:focus {
            border-color: #2b8fe97d;
            box-shadow: 0 0 0 0.2rem rgb(43 143 233 / 25%);
        }
        .chart {
  width: 100%; 
  min-height: 450px;
}
.row {
  margin:0 !important;
}
        .dataTables_length select {
            border-radius: 7px;
            width: 100%;
            padding: 8px 18px;
            font-size: 15px
        }

        input[type=search] {
            border-radius: 7px;
            width: 100%;
            padding: 8px 18px;
            font-size: 15px
        }
    </style>
</head>

<body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <!-- left sidebar start-->
        <?php include 'inc/sidebar.php'; ?>
        <!-- left sidebar end-->
        <div class="page-container">
            <!-- page header start-->
            <?php include 'inc/page_header.php'; ?>
            <!-- page header end-->
            <div class="page-content">
                <div class="page-info">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index">Home</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                
                            <div class="main-wrapper">
                            <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card">                                            
                                            <div class="sub card-body p-3">

                                                <div class="row">
                                                    <div class="col-9 pt-0 pb-0">
                                                    
                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM stories";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                            ?>
                                                        <p style="font-size: 20px;" id="t_visitor"><?php echo $fetch?></p>
                                                        <p class="mb-0" style="font-size: 1.5rem"><b>Total Posts</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3">
                                                        <i class="top-icons material-icons float-right" style="color:#2b8fe9; ">post_add</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                            
                                            <div class="descrip card-body p-3 ">
                                                <div class="row ">
                                                    <div class="col-9 ">
                                                    
                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  
                                 $data = array();
                                 date_default_timezone_set("Asia/Calcutta");
                                 $date_now = date("20y-m-d");
                                 
                                  $que= "SELECT * FROM stories WHERE created_at='$date_now'";
                                    $res=mysqli_query($link, $que);
                                    $fetch = mysqli_num_rows($res) ;
                                    
                                    if($fetch>0){
                                        ?> 
                                        <p style="font-size: 20px;" id="today_visitor"><?php echo $fetch?></p>
                                        <?php
                                   }
                                  else{
                                      ?>
                                   <p style="font-size: 20px;" id="today_visitor"><?php echo "0"?></p>
                                                       <?php
                                    }
                                    ?>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Posts (Today)</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">                                                    
                                                        <i class="top-icons material-icons-outlined float-right " style="color: #ffa65a;">today</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                           
                                            <div class="post card-body p-3 ">

                                                <div class="row ">
                                                    <div class="col-9 ">
                                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM user_login";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                  ?>                                         
                                                    <p style="font-size: 20px; "><?php echo $fetch?></p>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Users</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">
                                                        <i class="top-icons material-icons float-right " style="color: #c65dfc;">people</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                           
                                            <div class="com card-body p-3 ">

                                                <div class="row ">
                                                                                                      
                                                <div class="col-9 ">
                                                <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM tags";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                    ?>
                                                        <p style="font-size: 20px; "><?php echo $fetch?></p>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Tags</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">
                                                        <i class="top-icons material-icons float-right " style="color: #61ed5f;">tag</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
    
                    </div>
                    <div class="row">
  <div class="col-md-12 text-center">
    </div>
  <div class="clearfix"></div>
  <div class="col-lg-6 col-md-12 col-sm-12">
    <div id="piechart" class="chart"></div>
  </div>
  <div class="col-lg-6 col-md-12 col-sm-12">
    <div id="userchart" class="chart"></div>
  </div>
</div><!--
  <div style="display: flex;">
      
  <div id="piechart" style="height: 650px; width: 50%;">
</div>
  <div id="userchart" style="height: 650px; width: 50%;">
</div>
  </div>-->
                    <!-- page footer start-->
                    <?php include 'inc/page_footer.php'; ?>
                    <!-- page footer end-->

                </div>
            </div>
        </div>
    


    <!-- Javascripts -->
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
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['postuid','posviews'],
         <?php
         
         $sql2 = "SELECT sum(post_per_day_views) as total,day FROM post_views group by day order by day desc";
         $fire2 = mysqli_query($link,$sql2);
         $i=1;
          while ($result = mysqli_fetch_assoc($fire2)) {
        if($i<=10){
            echo"['".$result['day']."',".$result['total']."],";
          
          $i=$i+1; 
        }
        else{
            break;
        }
          }
         ?>
        ]);

        var options = {
          title: 'Post Details',
          curveType: 'function'
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            $('#zero-conf').DataTable();
            $('#zero-conf2').DataTable();
        });
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['createdat', 'total'],
         <?php
         $sql2 = "SELECT count(*) as total,created_at FROM user_login group by created_at order by created_at desc";
         $fire2 = mysqli_query($link,$sql2);
         $i=1;
         
          while ($result = mysqli_fetch_assoc($fire2)) {
        if($i<=10){
            echo"['".$result['created_at']."',".$result['total']."],";
         $i=$i+1; 
        }
        else{
            break;
        }
          }
         ?>
        ]);

        var options = {
          title: 'User Details',
          curveType: 'function'
        };

        var chart = new google.visualization.LineChart(document.getElementById('userchart'));

        chart.draw(data, options);
      }
    </script>

</body>

</html>