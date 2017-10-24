<?php
session_start();
 include 'dbconnect.php';
  $dbCon=mysqli_connect($mysql_host,$mysql_user,$mysql_password,"ecell_cap");

if(isset($_GET['post_id'])){
$post_id=$_GET['post_id'];
$categ=$_GET['categ'];
$user_id=$_GET['user_id'];
if($categ==1)$approval="yes";
else
$approval="denied";

$query="update timeline_posts set approved='$approval' where post_id=$post_id";
mysqli_query($dbCon, $query);

if($approval=="yes")$category_id=6;
else $category_id=7;
$date_time=date("Y/m/d H:i:s", time());
$query="INSERT INTO `timeline_posts` (`post_id`, `user_id`, `category_id`, `body`, `date_time`, `image_name`, `approved`) VALUES (NULL, '$user_id', '$category_id', '$post_id', '$date_time', '', 'yes')";
mysqli_query($dbCon, $query);


$query="update cap_login set new_updates=new_updates+1 where id=$user_id";
mysqli_query($dbCon, $query);

header("Location: post_approval.php");
exit();

}
   
	
						
	
	if(isset($_POST['add_work'])){
	//posting codes
$work = ereg_replace( "\n",'<br>', $_POST['work']);
$remark= $_POST['remark'];

$date=$_POST['date'];
$date=date('Y-m-d',strtotime($date));
$date_time=date("Y/m/d H:i:s", time());
$uid=$_SESSION['id'];
$sql = "SELECT name, city FROM cap_login WHERE id = '$uid' ";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$name=$row[0];
	$city=$row[1];

$query4="INSERT INTO `todo_list` (`list_id`, `given_by`, `body`, `city`, `deadline`, `remark`, `date_time`) VALUES (NULL, '$name', '$work', '$city', '$date', '$remark', '$date_time')";
mysqli_query($dbCon, $query4);
$image_name=$city;
$query7="INSERT INTO `timeline_posts` (`post_id`, `user_id`, `category_id`, `body`, `date_time`, `image_name`) VALUES (NULL, '0', '4', '$work', '$date_time', '$image_name')";
	$var=mysqli_query($dbCon, $query7);
	
$_SESSION['msg']="Alloted Successfully.";

if($var){
 $query5="select * from cap_login";
                        $data = mysqli_query($dbCon,$query5);
                        while($record = mysqli_fetch_array($data)){
						$id=$record['id'];
						$city=$_SESSION['city'];
						$query6="update cap_login set new_updates=new_updates+1 where city='$city' and id='$id'";
						mysqli_query($dbCon, $query6);
						}
					}	
header("Location: addwork.php");
exit();	

	
	}



?>