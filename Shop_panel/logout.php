<?php
session_start();
session_destroy(); 
if (isset($_SESSION['username'])) { 
    session_start();
   $_SESSION['msg']="You are successfully logged out";
   header("Location: login.php");
} else {
    $_SESSION['msg'] = "Could not log you out";
} 
?> 
