<?php
include("dbconnect.php");
session_start();
if(isset($_POST['submit']) && isset($_SESSION['id'])){
    
//checking file type
$imageFileType=$_FILES['file']['type'];
if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg"
&& $imageFileType != "image/gif" && $imageFileType != NULL) {
	
    $_SESSION['postmsg']="error: File must be an image file(jpeg, jpg, png, gif)";
    header("Location: addwork.php");
    exit();
}
//end checking type

//checking file size
if ($_FILES['file']['size'] > 524288) {
    $_SESSION['postmsg']="error: File Size must be less than 512KB";
    header("Location: addwork.php");
    exit();	
}
//end checking size

//posting codes
$user_id=$_SESSION['id'];
$post = ereg_replace( "\n",'<br>', $_POST['post']);
$category_id=$_POST['category_id'];
$date_time=date("Y/m/d H:i:s", time());
$post_image= $_FILES['file']['name'];
$post_tmp_img= $_FILES['file']['tmp_name'];

if($category_id==3){
$approval="no";
$_SESSION['postmsg']="Your post has been sent to Admin for approval, It will be posted after the approval.";
}
else{ $approval="yes";
if($category_id==1)
$_SESSION['postmsg']="Successfully Posted. See City timeline.";
else
$_SESSION['postmsg']="Successfully Updated.";
}


$query="INSERT INTO `timeline_posts` (`post_id`, `user_id`, `category_id`, `body`, `date_time`, `image_name`, `approved`) VALUES (NULL, '$user_id', '$category_id', '$post', '$date_time', '$post_image', '$approval')";
mysqli_query($dbCon, $query);
if($category_id==1||$category_id==3)
move_uploaded_file($post_tmp_img,"images/post_images/$post_image");

if($category_id==1){
$city=$_SESSION['city'];

$query="INSERT INTO `city_articles` (`article_id`, `city`, `body`, `article_pic`, `date`) VALUES (NULL, '$city', '$post', '$post_image', '$date_time')";
mysqli_query($dbCon, $query);

}
if($category_id==2){
$query="update cap_login set city_app_reg=city_app_reg+1 where id=$user_id";
mysqli_query($dbCon, $query);
}



header("Location: addwork.php");
}
//end post codes

//delete codes
if(isset($_GET['post_id'])){
$post_id=$_GET['post_id'];
$body=$_GET['body'];
$query="DELETE FROM timeline_posts WHERE post_id='$post_id'";
mysqli_query($dbCon, $query);
$query="DELETE FROM city_articles WHERE body='$body'";
mysqli_query($dbCon, $query);
//  unlink(dirname(__FILE__) . "/images/post_images/".$image_name);
if(!isset($_GET['work_id']))
header("Location: timeline.php");
}


if(isset($_GET['reenter_id'])){
$user_id=$_SESSION['id'];
$post_id=$_GET['reenter_id'];
$query="DELETE FROM timeline_posts WHERE post_id='$post_id'";
mysqli_query($dbCon, $query);
$url="default.jpg";
$query="update cap_login set profile_image='$url' where id=$user_id";
mysqli_query($dbCon, $query);


header("Location: ../CAP/");
exit();
}

if(isset($_GET['fb_id'])){
$user_id=$_SESSION['id'];

$url="default.jpg";
$query="update cap_login set profile_image='$url' where id=$user_id";
mysqli_query($dbCon, $query);


header("Location: ../CAP/");
exit();
}

if(isset($_GET['list_id'])){
$user_id=$_SESSION['id'];
$list_id=$_GET['list_id'];
$date_time=date("Y/m/d H:i:s", time());
$query="INSERT INTO `timeline_posts` (`post_id`, `user_id`, `category_id`, `body`, `date_time`, `image_name`, `approved`) VALUES (NULL, '$user_id', '5', '$list_id', '$date_time', '', 'yes')";
mysqli_query($dbCon, $query);
$query="update cap_login set new_updates=new_updates+1 where id=$user_id";
mysqli_query($dbCon, $query);



$user_id=(string)$user_id;
$user_id="$user_id". ";";


$query="select done_by from todo_list where list_id=$list_id";
$done=mysqli_query($dbCon, $query);
$done=mysqli_fetch_array($done);
$done_by=$done['done_by'];


if($done_by==NULL)$query="update todo_list set done_by='$user_id' where list_id=$list_id";
else{
$done_by="$done_by"."$user_id";
$query="update todo_list set done_by='$done_by' where list_id=$list_id"; 
}

if(mysqli_query($dbCon, $query)){

header("Location: ../CAP/");
exit();}
}



if(isset($_GET['work_id'])){
$user_id=$_SESSION['id'];
$list_id=$_GET['work_id'];
$user_id=(string)$user_id;
$user_id="$user_id". ";";

$query="select done_by from todo_list where list_id=$list_id";
$done=mysqli_query($dbCon, $query);
$done=mysqli_fetch_array($done);
$done_by=$done['done_by'];
$done_by=str_replace("$user_id","","$done_by");
$query="update todo_list set done_by='$done_by' where list_id=$list_id"; 
if(mysqli_query($dbCon, $query))
header("Location: ../CAP/recent.php");
exit();
}


if(isset($_POST['fb_submit'])){

$fb_id=$_POST['fb_id'];
$user_id=$_SESSION['id'];


$url = "http://graph.facebook.com/$fb_id/picture?type=large&redirect=true&width=500&height=500";

$url = get_headers($url, 1);

$url=$url['Location'];
    

	
$query="update cap_login set profile_image='$url' where id=$user_id";
mysqli_query($dbCon, $query);

$date_time=date("Y/m/d H:i:s", time());
$query="INSERT INTO `timeline_posts` (`post_id`, `user_id`, `category_id`, `body`, `date_time`, `image_name`, `approved`) VALUES (NULL, '$user_id', '8', '$url', '$date_time', '', 'yes')";
mysqli_query($dbCon, $query);
if($_SESSION['user_type']=="ca")
header("Location: ../CAP/recent.php");
else
header("Location: index.php");
exit();

}



if(isset($_GET['del_id'])){
$user_id=$_SESSION['id'];
$list_id=$_GET['del_id'];



$query="DELETE FROM todo_list WHERE list_id='$list_id'";



if(mysqli_query($dbCon, $query)){

header("Location: ../CAP/");
exit();}
}





?>