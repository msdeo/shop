<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg']="Sign in to start your session";
		header("Location: login.php");
		exit();
}
  $uid=$_SESSION['id'];
 	include_once("dbconnect.php");
	$sql = "SELECT id, name, city, college, city_app_reg, profile_image, new_updates, user_type FROM cap_login WHERE id = '$uid' ";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
  $name= $row[1];
  $_SESSION['city']=$city= $row[2];
  $college=$row[3];
	$city_app_reg=$row[4];
	$profile_image=$row[5];
	$new_updates=$row[6];
	$_SESSION['user_type']=$user_type=$row[7];
	



// 				$data1=($_GET['city']);
				$data2=($_GET['name']);
				$data3=($_GET['portfolio']);
				$data4=($_GET['img_path']);
				$data5=($_GET['linkedin_link']);
$data6=($_GET['rid']);
if($_GET['action']=="save"){
// $query = "INSERT INTO ead_speaker SET `city` = '".$data['fname']."', `name` = '".$data['lname']."', `portfolio` = '".$data['tech']."', `img_path` = '".$data['email']."', `linkedin_link` ='".$data['address']."'";
$query = "INSERT INTO ead_media (`city`, `name`, `type`, `img_path`, `website`) VALUES ( '$city', '$data2', '$data3', '$data4', '$data5')";		
$result=mysqli_query($dbcon_reg,$query);
	
$queryy = "select * from ead_media order by id desc limit 1";
}

if($_GET['action']=="update"){
$query = "UPDATE ead_media SET `city` = '$data1', `name` = '$data2', `type` = '$data3', `img_path` = '$data4', `website` ='$data5' where id ='$data6'";
// $query = "INSERT INTO ead_speaker (`city`, `name`, `portfolio`, `img_path`, `linkedin_link`) VALUES ( '$data1', '$data2', '$data3', '$data4', '$data5')";		
$result=mysqli_query($dbcon_reg,$query);
	
	$queryy = "select * from ead_media where id = '$data6'";
}
if($_GET['action']=="del"){
$query = "DELETE from ead_media where id ='$data6'";
// $query = "INSERT INTO ead_speaker (`city`, `name`, `portfolio`, `img_path`, `linkedin_link`) VALUES ( '$data1', '$data2', '$data3', '$data4', '$data5')";		
$result=mysqli_query($dbcon_reg,$query);
	$myobj->id[]= $data6;
	$my_json = json_encode($myobj);	
	echo $my_json;
	// 	$queryy = "select * from ead_speaker where id = '$data6'";
}
if($_GET['action'] !=="del"){
$results=mysqli_query($dbcon_reg,$queryy);
while($rows = mysqli_fetch_array($results)){
	$myobj->id[]=$rows['id'];
$myobj->name[] =$rows['name'];
	$myobj->portfolio[] =$rows['type'];
	$myobj->img_path[] =$rows['img_path'];
	$myobj->linkedin_link[] =$rows['website'];
	$myobj->city[] =$rows['city'];

	$my_json = json_encode($myobj);	
}

echo $my_json;
}
       ?>