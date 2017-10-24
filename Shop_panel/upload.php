<?php
include "inc/header.php";
$name=($_POST['name']);
				$price=($_POST['price']);
				$data=($_FILES['fileToUpload']['name']);
				$specification=($_POST['specification']);
				$availability=($_POST['availability']);
				$category=($_POST['category']);
$data6=($_POST['rid']);

// $query = "INSERT INTO ead_speaker SET `city` = '".$data['fname']."', `name` = '".$data['lname']."', `portfolio` = '".$data['tech']."', `img_path` = '".$data['email']."', `linkedin_link` ='".$data['address']."'";


$uploaddir = 'uploads/'.($_SESSION['shop_name'])."/";
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

//echo basename($_FILES['my_files']['name']);
clearstatcache();
$directory = 'uploads/'.($_SESSION['shop_name']);
if(!file_exists($directory)) mkdir($directory,0755,true);
$scanned_directory = $files = glob($directory."/*");
$l = count($scanned_directory);
		$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
	$img = $uploaddir . basename("$shop_name$l.$imageFileType");

$TS = 0;
for($i=0;$i<$l;$i++){
	$TS += filesize($scanned_directory[$i]);
}
$TS += ($_FILES['fileToUpload']['size']);
if($TS <= 52428800){
		if(($_FILES['fileToUpload']['size'])<= 51200){
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $img)) {
			$query = "INSERT INTO $shop_name (`item_name`, `price`, `specification`, `availability`, `category`, `img_path`) VALUES( '$name', '$price', '$specification', '$availability', '$category','$img')";		
$result=mysqli_query($dbCon,$query);
	  echo "<script>alert('successfully submitted');</script>";
echo "<script>window.location.href = 'addwork.php'</script>";
	} else {
	  echo "<script>alert('error file not given');</script>";
	echo "<script>window.location.href = 'addwork.php'</script>";
	}
}
		else{
		echo"<script>alert('Error, maximum 50KB allowed');</script>";
			echo "<script>window.location.href = 'addwork.php'</script>";
	}
}else{
	echo "Error, maximum 50 MB upload allowed.";
	echo "<script>window.location.href = 'addwork.php'</script>";
}
?>
