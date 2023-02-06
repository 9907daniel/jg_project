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
        Managemenet
        <small>Register / modify members here</small>
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

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create new User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control">  
                            <option>User</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    Table
                </div>


                






              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once'footer.php';
?>
