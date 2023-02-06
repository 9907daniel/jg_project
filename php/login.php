<!-- # scripts given first to utilize sweetalert library -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>

<script src="../bower_components/sweetalert/sweetalert.js"></script>

<?php
include_once'dbconnect.php';
session_start();

if(isset($_POST['btn_login'])){

$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$select= $pdo->prepare("select * from sign_up where user_email='$user_email' AND user_password='$user_password'");

$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);

    if ($row['user_email'] == $user_email && $row['user_password'] == $user_password && $row['user_role'] == "Admin"){
    
    # check for user information 
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_role'] = $row['user_role'];

      echo '<script type="text/javascript"> 
      jQuery(function validation(){
        swal({
          title: "Login Successfull!",
          text: "Your email and password has been found!",
          icon: "success"
        });
      });
      </script>';

      header('refresh:1;dashboard_admin.php');

    }elseif($row['user_email'] == $user_email && $row['user_password'] == $user_password && $row['user_role'] == "User"){
      
    # check for user information 
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_role'] = $row['user_role'];
      
      echo '<script type="text/javascript"> 
      jQuery(function validation(){
        swal({
          title: "Login Successfull!",
          text: "Your email and password has been found!",
          icon: "success"
        });
      });
      </script>';
        
      header('refresh:1;dashboard_user.php');
    }else{
      echo '<script type="text/javascript"> 
      jQuery(function validation(){
        swal({
          title: "Login Failed!",
          text: "Your email and password does not match!",
          icon: "error",
          button: "Retry!",
        });
      });
      </script>';      
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>TM</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
            <a href="forgot.php">Find password</a><br>
            <a href="register.html" class="text-center">Sign Up</a><br>
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn_login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
