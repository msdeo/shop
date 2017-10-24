<?php
include "inc/header.php";
$data2=($_POST['name']);
				$data3=($_POST['ead_date']);
				$data4=($_FILES['college']['name']);
$data8=($_FILES['bg']['name']);
				$data5=($_POST['venue']);
$data6=($_POST['rid']);
$data7=($_POST['time']);
$data8 = ($_POST['website']);
$uploaddir = 'uploads/'.($_SESSION['city'])."/";
$uploadfile = $uploaddir . basename($_FILES['college']['name']);
$uploadfile1 = $uploaddir . basename($_FILES['bg']['name']);

//echo basename($_FILES['my_files']['name']);
clearstatcache();
$directory = 'uploads/'.($_SESSION['city']);
if(!file_exists($directory)) mkdir($directory,0755,true);
$scanned_directory = $files = glob($directory."/*");
$l = count($scanned_directory);
$m = $l +1;
		$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
$imageFileType1 = pathinfo($uploadfile1,PATHINFO_EXTENSION);
	$img = $uploaddir . basename("$city$l.$imageFileType");
$img1 = $uploaddir . basename("$city$m.$imageFileType1");

$TS = 0;
for($i=0;$i<$l;$i++){
	$TS += filesize($scanned_directory[$i]);
}
$TS += ($_FILES['college']['size']);
$TS += ($_FILES['bg']['size']);

if($TS <= 52428800){
		if((($_FILES['college']['size'])<= 25600)&&(($_FILES['bg']['size'])<= 51200)){
	if ((move_uploaded_file($_FILES['college']['tmp_name'], $img))&&(move_uploaded_file($_FILES['bg']['tmp_name'], $img1))) {
	$query =	"INSERT INTO `eadcity_db`(`city`, `college_name`, `date`, `college_logo`, `venue`, `time`, `city_bg`, `website`) VALUES ('$city','$data2','$data3','$img','$data5','$data7','$img1','$data8')";	
if(mysqli_query($dbcon_reg,$query)){
	  echo "<script>alert('Successfully submited');</script>";}
    else {echo "<script>alert('Error properly fill the form');</script>";}
echo "<script>window.location.href = 'http://ecell-iitkgp.org/EAD_Panel/addwork.php'</script>";
	} else {
	  echo "<script>alert('Error file not given');</script>";
	echo "<script>window.location.href = 'http://ecell-iitkgp.org/EAD_Panel/addwork.php'</script>";
	}
}
		else{
		echo"<script>alert('Error, maximum 25KB & 50kb allowed respectively');</script>";
			echo "<script>window.location.href = 'http://ecell-iitkgp.org/EAD_Panel/addwork.php'</script>";
	}
}else{
	echo "Error, maximum 50 MB upload allowed.";
	echo "<script>window.location.href = 'http://ecell-iitkgp.org/EAD_Panel/addwork.php'</script>";
}
?>