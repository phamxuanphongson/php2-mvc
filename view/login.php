<?php 
  
  if (isset($_POST['login-btn'])) {
    $model = new model();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usersInDb = $model->selectAll('users');
    $boolean = true;
    if (empty($email)) {
      $err['email'] = 'Email khong duoc de trong';
      $boolean = false;
    }
    $pattern = '/^[a-zA-Z0-9]{3,16}[\S]$/';
    if ( !empty($password) && preg_match($pattern, $password) == true) {
      $password = sha1($password);
    }
    else {
      $err['password'] = "Mat khau khong duoc de trong !!! Mat khau phai tu 3-16 ky tu, khong duoc chua dau cach, phai co it nhat 1 chu in Hoa va 1 so !!!";
      $boolean = false;
    }
    if ($boolean == true) {
      foreach ($usersInDb as $users) {
        if ($email == $users['email'] && $password == $users['password']) {
            if ($users['role'] == 1) {
              session_start();
              $_SESSION['auth'] = ['username' => $users['username'],'email' => $email, 'password' => $password,'role' => $users['role']];
              ;
              header('Location:../view/admin-home.php');
            }
            else {
              session_start();
              $_SESSION['auth'] = ['username' => $users['username'],'email' => $email, 'password' => $password,'role' => $users['role']];
              ;
              header('Location:../index.php');
            }
            
        }
        else {
          $err['email'] = 'Email khong ton tai !!!';
          $err['password'] = 'Sai Mat Khau';
          $boolean = false;
        }
      }
    }
    
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../inc/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../inc/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../inc/adminlte/bower_components/Ionicons/css/ionicons.min.css">
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="../controller/controller.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="err"><?php echo isset($err['email'])? $err['email'] :'';?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="err"><?php echo isset($err['password'])? $err['password'] :'';?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.php" title="">Register a new membership </a>
    <!-- <form action="../controller/controller.php" method="post">
      <input type="submit" name="register" class="btn" value="Register a new membership">
    </form> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
