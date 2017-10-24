
<!--
	/*
	* Add edit delete rows dynamically using jquery and php
	* http://www.amitpatil.me/
	*
	* @version
	* 2.0 (4/19/2014)
	* 
	* @copyright
	* Copyright (C) 2014-2015 
	*
	* @Auther
	* Amit Patil
	* Maharashtra (India)
	*
	* @license
	* This file is part of Add edit delete rows dynamically using jquery and php.
	* 
	* Add edit delete rows dynamically using jquery and php is freeware script. you can redistribute it and/or 
	* modify it under the terms of the GNU Lesser General Public License as published by
	* the Free Software Foundation, either version 3 of the License, or
	* (at your option) any later version.
	* 
	* Add edit delete rows dynamically using jquery and php is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	* GNU General Public License for more details.
	* 
	* You should have received a copy of the GNU General Public License
	* along with this script.  If not, see <http://www.gnu.org/copyleft/lesser.html>.
	*/
-->
<?php
include("dbconnect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>Ajax Table Inline Edit</title>
  <script>
	 // Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
	 var columns = new Array("fname","lname","tech","email","address");
	 var placeholder = new Array("Enter First Name","Enter Last Name","Upload","Enter Email","");
	 var inputType = new Array("text","text","file","text","select");
	 var table = "tableDemo";
	 var selectOpt = new Array("Pune","Karad","Kolhapur","Satara","Sangli");;


	 // Set button class names 
	 var savebutton = "ajaxSave";
	 var deletebutton = "ajaxDelete";
	 var editbutton = "ajaxEdit";
	 var updatebutton = "ajaxUpdate";
	 var cancelbutton = "cancel";
	 
	 var saveImage = "images/save.png"
	 var editImage = "images/edit.png"
	 var deleteImage = "images/remove.png"
	 var cancelImage = "images/back.png"
	 var updateImage = "images/save.png"

	 // Set highlight animation delay (higher the value longer will be the animation)
	 var saveAnimationDelay = 3000; 
	 var deleteAnimationDelay = 1000;
	  
	 // 2 effects available available 1) slide 2) flash
	 var effect = "flash"; 
  
  </script>
  <script src="js/jquery.js"></script>	
  <script src="js/jquery-ui.js"></script>	
  <script src="js/script-table.js"></script>	
  <link rel="stylesheet" href="css/style-table.css">
 </head>
 <body>
  <center>
	<table border="0" class="tableDemo bordered">
		<tr class="ajaxTitle">
			<th width="2%">Sr</th>
			<th width="16%">First Name</th>
			<th width="16%">Last Name</th>
			<th width="12%">Technology</th>
			<th width="20%">Email</th>
			<th width="18%">Address</th>
			<th width="14%">Action</th>
		</tr>
		<?php 
		$query ="select * from ead_speaker";
		$result = mysqli_query($dbcon_reg,$query);
		while($rows=mysqli_fetch_array($result)){
			echo "<tr id=".$rows['id']."> <td>".$rows['id']."</td>
			<td class='fname'>".$rows['city']."</td>
			<td class='lname'>".$rows['name']."</td>
			<td class='tech'>".$rows['portfolio']."</td>
			<td class='email'>".$rows['img_path']."</td>
			<td class='address'>".$rows['linkedin_link']."</td>";
				?>
		
			<td><a href="javascript:;" id="<?php echo $rows['id'];?>" class="ajaxEdit"><img src="images/edit.png"></a><a href="javascript:;" id="<?php echo $rows['id'];?>" class="ajaxDelete"><img src="images/remove.png"></a></td></tr>
		<?php
			
		}
		
		?>
			</table> 
  </center>
  <center>
	</center>
	</body>
	
	</html>