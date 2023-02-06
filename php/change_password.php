<?php

include_once'dbconnect.php';
session_start();

# if session user_email is empty, redirect to login page
if($_SESSION['user_email']==""){
    header('location: login.php');
}

if($_SESSION['user_role']=="Admin"){
    include_once'header_admin.php';
}elseif($_SESSION['user_role']=="User"){
    include_once'header_user.php';
}
    



# when clicked upon change password page.
if(isset($_POST['btnupdate'])){
$current_password=$_POST['current_password'];
$new_password=$_POST['new_password'];
$confirm_new_password=$_POST['confirm_new_password'];

# select query -> DB according to email
$email = $_SESSION['user_email'];
$select= $pdo->prepare("select * from sign_up where user_email = '$email'");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$user_email_db = $row['user_email'];
$user_password_db = $row['user_password'];

# compare inputted pw and db pw
if($current_password == $user_password_db){
    if($new_password == $confirm_new_password){
        $update = $pdo->prepare("update sign_up set user_password=:new_password where user_email=:email");
        
        $update->bindParam(':new_password',$new_password);
        $update->bindParam(':email',$email);

        if($update->execute()){
            echo '<script type="text/javascript"> 
            jQuery(function validation(){
              swal({
                title: "Password Change Successfull!",
                text: "Your password has been changed!",
                icon: "success"
              });
            });
            </script>';
        }
    }else{
        echo '<script type="text/javascript"> 
        jQuery(function validation(){
            swal({
            title: "Password change fail!",
            text: "New passwords do not match!",
            icon: "warning"
            });
        });
        </script>';}
}else{
echo '<script type="text/javascript"> 
jQuery(function validation(){
    swal({
    title: "Password change fail!",
    text: "Entered password was incorrect!",
    icon: "warning"
    });
});
</script>';
}}


?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Page Content Here |
        -------------------------->

        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Current Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" name="current_password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="new_password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="confirm_new_password">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btnupdate">Change</button>
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
