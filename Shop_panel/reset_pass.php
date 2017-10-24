<?php 
session_start();
 
if (!isset($_SESSION['id'])) {
  // Direct to users feed
    $_SESSION['msg']="You are not Loggedin yet";
		header("Location: login.php");
		exit();
}


if (isset($_GET['resetsuccess'])) {
header('refresh: 2; url=index.php');

}


if (isset($_POST['reset'])) {
        
        // Include the database connection script
	include_once("dbconnect.php");
	
	// Set the posted data from the form into local variables
        $old_pass = $_POST['old_pass'];
        $old_pass = md5($old_pass);
	$new_pass = $_POST['new_pass'];
	 $new_pass = md5($new_pass);
	$new_pass2 = $_POST['new_pass2'];
	 $new_pass2 = md5($new_pass2);
	
	if($new_pass!=$new_pass2){
	 $_SESSION['msg']="error : Your new password do not match. Please try again.";
		header("Location: reset_pass.php");
		exit();
	
	}
	
	$user_id=$_SESSION['id'];
	$sql = "SELECT * FROM cap_login WHERE id = $user_id ";
	$query = mysqli_query($dbCon, $sql);
	
	
	
	while($row=mysqli_fetch_array($query)){
		$actual_pass=$row['password'];	
	}
	if($actual_pass!=$old_pass){
	 $_SESSION['msg']="Wrong password entered. Please try again.";
		header("Location: reset_pass.php");
		exit();
	}	
	$query="update cap_login set password = '$new_pass' where id=$user_id";
	if(mysqli_query($dbCon, $query)){
	
	$_SESSION['msg']="Password changed successfully.<br>Redirecting to dashboard within 5 seconds.";
		header("Location: reset_pass.php?resetsuccess=1");
		
		exit();
	}
	else{
	$_SESSION['msg']="error : Please contact Admin.";
	}
	
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Cell Portal - Reset Password</title>
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
    <a href="index.php"><br><b>E-Cell</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset your password here..</p>
	 <p class="login-box-msg" style="color:red"><?php echo $_SESSION['msg']; $_SESSION['msg']=""; ?></p>

   <form action="reset_pass.php" method="POST" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input  type="password" class="form-control" placeholder="Old Password" name="old_pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="new_pass" class="form-control" placeholder="New Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	   <div class="form-group has-feedback">
        <input type="password" name="new_pass2" class="form-control" placeholder="Re-Enter New Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="reset">Reset</button>
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

