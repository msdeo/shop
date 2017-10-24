<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg']="Sign in to start your session";
		header("Location: login.php");
		exit();
}
  $uid=$_SESSION['id'];
 	include_once("dbconnect.php");
	$sql = "SELECT id, name, shop_name,contact,email, type,profile_image,user_type,city FROM user WHERE id = '$uid' ";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
  $name= $row[1];
  $_SESSION['shop_name']=$shop_name= $row[2];
$contact=$row[3];
	$email=$row[4];
	$profile_image=$row[6];
	$type=$row[5];
	$_SESSION['user_type']=$user_type=$row[7];
	$city=$row[8];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EAD Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .form-group button, .bootstrap-iso form input.form-control, .bootstrap-iso form textarea.form-control, .bootstrap-iso form select.form-control{-webkit-border-radius: 0 !important;-moz-border-radius: 0; border-radius: 0;}.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}.bootstrap-iso form .input-group-addon {color:#555555; background-color: #eeeeee; border-radius: 0px; padding-left:12px}</style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- 		<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
		<link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet"> -->
  	<script src="js/jquery.js"></script>	
  	<script src="js/jquery-ui.js"></script>
		<script type="text/javascript">
		function textbox(val){
		var element=document.getElementById('article_body');
 		var element2=document.getElementById('input_file');
	  if(val==1)
		{
			 element.style.display='block';
			 element2.style.display='block';
			 element.placeholder='Article Heading: Newspaper Name';
		 }
		 else
		 { 
			 if(val==2 || val==3){element.style.display='block'; element.placeholder='text here';element2.style.display='none';}
			 else  {element.style.display='none';element2.style.display='none';}
		 }
		}

</script> 

  <link rel="stylesheet" href="css/style-table.css">	
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../EAD_Panel/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Shop_panel</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Shop</b> Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php
			if($profile_image=="default.jpg")
             echo "<img src='images/profile_img/$profile_image' class='user-image' alt='User Image'>";
			 else
			   echo "<img src='$profile_image'  class='user-image' alt='User Image'>";
			  
			  ?>
                  
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
				  <?php
			if($profile_image=="default.jpg")
             echo "<img src='images/profile_img/$profile_image' class='img-circle' alt='User Image'>";
			 else
			   echo "<img src='$profile_image'  class='img-circle' alt='User Image'>";
			  
			  ?>
                    
                    <p>
                     <?php echo $name; ?>
                      <small><?php echo "$shop_name-$city"; ?></small>
                    </p>
					
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-left">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
					<?php 
					if($profile_image!="default.jpg")
					echo "<div class='pull-right'>
					<a class='btn btn-default btn-flat' href='update.php?fb_id='change''>Re-Enter ID</a>
					</div>";
					?>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>
      
       <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
			<?php
			if($profile_image=="default.jpg")
             echo "<img src='images/profile_img/$profile_image' class='img-circle' alt='User Image'>";
			 else
			   echo "<img src='$profile_image'  class='img-circle' alt='User Image'>";
			  
			  ?>
            </div>
            <div class="pull-left info">
              <p><?php echo $name; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a><br>
			 
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
		<li>
              <a href="../Shop_panel/">
       <i class="fa fa-user"></i> <span>Dashboard</span>
               
              </a>
            </li>
<!-- 			<?php 
			if($user_type!="admin"){
			
            echo "<li>
              <a href='recent.php'>
                <i class='fa fa-bell'></i> <span>Recent Updates</span>
                <small class='label pull-right bg-red'>"; if($new_updates)echo "$new_updates"; echo "</small>
              </a>
            </li>"; }
			
			else
			echo "<li>
              <a href='post_approval.php'>
                <i class='fa fa-check-square'></i> <span>Post Requests</span>
               
              </a>
            </li>";
			?> -->
<!-- 			<li>
              <a href="timeline.php">
                <i class="fa fa-eye"></i> <span>City Timeline</span>
               
              </a>
            </li> -->
			<li>
              <a href="addwork.php">
 <i class="fa fa-pencil"></i> <span><?php if($user_type=="admin") echo "Add New Details"; else echo "Add Posts"; ?></span>
              </a>
            </li>
        <!--     <li>
              <a href="see_others.php">
                <i class="fa fa-bar-chart"></i> <span>City Registrations</span>
              </a>
            </li> -->
						<!-- 
						   <li>
              <a href="ead_reg<?php if($_SESSION['username']=='spons') echo '_spons' ?>.php">
                <i class="fa fa-check-square"></i> <span>Registrations INFO</span>
              </a>
            </li> -->
						<?php 
			// if($city=="Indore"|| $city=="Bhopal"){
			
   //          echo "<li>
   //            <a href='jamshedpur_reg.php'>
   //              <i class='fa fa-bell'></i> <span>$city registration</span>
          
   //            </a>
   //          </li>"; }
						?>
         <!--  <?php 
           if(!$_SESSION['username']=='spons'){ ?>  <li class="header">SETTINGS</li>
           <li><a href="reset_pass.php"><i class="fa fa-expeditedssl"></i> <span>Change Password</span></a></li><?php } ?> -->
<!--             <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Very Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Warning</span></a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>