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

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create new User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="txtname" placeholder="Enter Name">
                    </div>
                    <div>
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txtemail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtpassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="txtselect_option">
                            <option value="" disabled selected>Select role</option>  
                            <option>User</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <table class = "table table-striped">
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $select=$pdo->prepare("select * from sign_up order by user_id desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_OBJ)){
                          echo'
                          <tr>
                          <td>'.$row->user_id. '</td>
                          <td>'.$row->user_name. '</td>
                          <td>'.$row->user_email.'</td>
                          <td>'.$row->user_password. '</td>
                          <td>'.$row->$user_role. '</td>
                          </tr>
                          ';
                        }
                        ?>

                      </tbody>
                    </table>  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
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
