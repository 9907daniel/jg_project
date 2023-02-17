 <?php

include_once'dbconnect.php';
session_start();

# if session user_email is empty, redirect to login page
if($_SESSION['user_email']==""){
    header('location: login.php');
}elseif($_SESSION['user_role']=="User"){
  header('location: dashboard_user.php');
}

include_once'header_admin.php';
?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Task Manager
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <!-- <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span> -->

                <div class="info-box-content">
                  <span class="info-box-text">Tasks</span>
                  <span class="info-box-number">10</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <!-- <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span> -->

                <div class="info-box-content">
                  <span class="info-box-text">Productivity</span>
                  <span class="info-box-number">410</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <!-- <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span> -->

                <div class="info-box-content">
                  <span class="info-box-text">Last Weeks productivity</span>
                  <span class="info-box-number">500</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <!-- <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span> -->

                <div class="info-box-content">
                  <span class="info-box-text">Goal</span>
                  <span class="info-box-number">400</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>

        </section>

        

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once'footer.php';
?>
