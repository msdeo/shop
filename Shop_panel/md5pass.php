<?php
include("dbconnect.php");
session_start();


$query="select * from cap_login";
$run_query=mysqli_query($dbCon, $query);
while($row=mysqli_fetch_array($run_query))
{
$id = $row['id'];
$pass = $row['password'];
$pass = md5($pass);

$query2="update cap_login set password='$pass' where id='$id'";
mysqli_query($dbCon, $query2);



}


echo "success";

?>