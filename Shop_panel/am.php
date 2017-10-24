<?php

ob_start();
require "dbconnect.php";
session_start();

if($_SESSION['name'])
{
  header("Location: index.php");
}

 if(isset($_POST['submit']))
 {
		 $name = $_POST['name'];
		 $phone = $_POST['phone'];
		 $email = $_POST['email'];
		 $city = $_POST['city'];
	 	 $username = $_POST['username'];
     $pass = $_POST['password'];
     $password = md5($pass);
	 		 $college = $_POST['college'];
		 $date = $_POST['date'];

    $sql = "INSERT INTO am_17 (name,phone,email,city,username,password,college,date) 
		  		 VALUES ('$name','$phone','$email','$city','$username','$password','$college','$date')";
	
    if(!mysqli_query($dbCon,$sql))
		{
      $_SESSION['msg'] = "MySQL Server Error!! Please try again.";
    }

		else
		{
      $_SESSION['msg'] = "Login to EAD admin panel";
      header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AM Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  	<img src="images/logo.png"  style="width:220px;"/>
    <a href="index.php"><br><b>AM Registration</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $_SESSION['msg']; $_SESSION['msg']=""; ?></p>

   <form action="am.php" method="POST" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="Name" name="name" required/>
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="EAD City" name="city" required/>
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="Phone Number" name="phone" required/>
        <span class=" form-control-feedback"></span>
      </div>
		       <div class="form-group has-feedback">
        <input  class="form-control" placeholder="EAD Host College" name="college" required/>
        <span class=" form-control-feedback"></span>
      </div>
		 		       <div class="form-group has-feedback">
        <input class="form-control" placeholder="EAD date(dd/mm/yyyy)" name="date" required/>
        <span class=" form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input  class="form-control" placeholder="E-Cell mail id" name="email" required/>
        <span class=" form-control-feedback"></span>
      </div>
		 <div class="form-group has-feedback">
        <input  class="form-control" placeholder="username(firstname-city)" name="username" required/>
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required/>
        <span class="form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

