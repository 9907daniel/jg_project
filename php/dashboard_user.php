<?php
include_once'dbconnect.php';
session_start();

# if session user_email is empty, redirect to login page
if($_SESSION['user_email']==""){
    header('location: login.php');
}elseif($_SESSION['user_role']=="Admin"){
    header('location: dashboard_admin.php');
}

include_once'header_user.php';
?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Task Manager
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once'footer.php';
?>
