<?php
  include_once '../model/model.php';
  if (isset($_POST['register-btn'])) {
      $model = new model();
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $pattern = '/^[a-zA-Z0-9]{3,16}[\S]$/';
      $boolean = true;
      $usersInDb = $model->selectAll('users');
      
      foreach ($usersInDb as $user ) {
        if (empty($email)) {
          $err['email'] = 'Email khong duoc de trong';
          $boolean = false;
        }
        if ($email == $user['email']) {
          $err['email'] = 'Email da bi trung';
          $boolean = false;
        }
        if (empty($password)) {
          $err['password'] = 'Mat khau khong duoc de trong';
          $boolean = false;
        }  
        
        if (preg_match($pattern, $password) != 1) {
          $err['password'] = "Mat khau phai tu 3-16 ky tu, khong duoc chua dau cach, phai co it nhat 1 chu in Hoa va 1 so !!!";
          $boolean = false;
        }
        else {
          $password = sha1($password);
        }
        if ($boolean == false) {
          include_once '../view/register.php';
        }
        else {
          $addAcc = $model->addAccount($username,$password,$email);
          header('Location:../view/register-success.php');
        }
        
      
      }
      
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../inc/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../inc/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../inc/adminlte/ower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inc/adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../inc/adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="err"><?php echo isset($err['email'])? $err['email'] :'';?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="err"><?php echo isset($err['password'])? $err['password'] :'';?></span>

      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           <!--  <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="register-btn" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <!-- <form action="../view/login.php" method="post">
    	<button name="login" class="btn">I already have a membership</button>
    </form> -->
    <a href="../view/login.php" title="">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../inc/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../inc/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../inc/adminlte/plugins/iCheck/icheck.min.js"></script>
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