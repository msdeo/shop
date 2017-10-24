<?php
include "inc/header.php";
include "dbconnect.php";
//  $dbcon_reg=mysqli_connect($mysql_host,$mysql_user,$mysql_password,"ecell_db1718");
//  $query="select id from ead_reg where city = '$city' ";
// $run_query=mysqli_query($dbcon_reg, $query);
// $i=0;
// while($row_posts=mysqli_fetch_array($run_query))
// {
// $i++;
// }
// $city_reg=$i;

// $query="select id from empresario where city = '$city' ";
// $run_query=mysqli_query($dbcon_reg, $query);
// $i=0;
// while($row_posts=mysqli_fetch_array($run_query))
// {
// $i++;
// }
// $city_empress_reg=$i;

// $query="select article_id from city_articles where city = '$city' ";
// $run_query=mysqli_query($dbCon, $query);
// $i=0;
// while($row_posts=mysqli_fetch_array($run_query))
// {
// $i++;
// }
// $total_city_articles=$i;

?>

     
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		
		<?php

		  ?>
		
          <h1>
            Dashboard
            <small>Status Panel</small>
          </h1>
          
		  
		  
		  
		  
		  
        </section>

        <!-- Main content -->
        <section class="content">


						 <script type="text/javascript">


 

	 // Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
	 var columns = new Array("name","price","specification","availability");
	 var placeholder = new Array("Name","Price","Specification","Availability");
	 var inputType = new Array("text","text","text","text");
	 var table = "tableDemo";
							 var table1 = "table-spons";
							 var table2 = "table-media";
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
	<script src="js/table-demo.js"></script>
<!--   <script src="js/table-speakers.js"></script> -->
<!-- 					<script src="js/table-media.js"></script>
					<script src="js/table-spons.js"></script> -->
		 <center id ="speakers"  style="">
			 <h3>
				 <?php echo $_SESSION['shop_name'] ?> Products
			 </h3>
	<table border="0" class="tableDemo table-speaker bordered" >
		<tr class="ajaxTitle">
			<th width="2%">Sr</th>
			<th width="16%">Product Name</th>
			<th width="16%">Price</th>
			<th width="12%">Specification</th>
			<th width="20%">Availability</th>
			<th width="20%">Action</th>
		</tr>
		<?php 
		$query ="select * from $shop_name ";
		$result = mysqli_query($dbCon,$query);
		while($rows=mysqli_fetch_array($result)){
			echo "<tr id=".$rows['id']."> <td>".$rows['id']."</td>
			<td class='name'>".$rows['item_name']."</td>
			<td class='price'>".$rows['price']."</td>
			<td class='specification'>".$rows['specification']."</td>
			<td class='Availability'>".$rows['availability']."</td>";
				?>
		
			<td><a href="javascript:;" id="<?php echo $rows['id'];?>" class="ajaxEdit"><img src="images/edit.png"></a><a href="javascript:;" id="<?php echo $rows['id'];?>" class="ajaxDelete"><img src="images/remove.png"></a></td></tr>
		<?php
			
		}
		
		?>
			</table> 
  </center>
		   <!-- <center id ="media" style="">
			 <h3>
				 <?php echo $city ?> Media
			 </h3>
	<table border="0" class="table-media bordered" >
		<tr class="ajaxTitle">
			<th width="2%">Sr</th>
			<th width="16%">Media Name</th>
			<th width="16%">Media type</th>
			<th width="12%">img</th>
			<th width="20%">website address</th>
						<th width="20%">Action</th>
		</tr>
		<?php 
		$query ="select * from ead_media where city ='$city'";
		$result = mysqli_query($dbcon_reg,$query);
		while($rows=mysqli_fetch_array($result)){
			echo "<tr id=".$rows['id']."> <td>".$rows['id']."</td>
		
			<td class='name'>".$rows['name']."</td>
			<td class='portfolio'>".$rows['type']."</td>
			<td class='img_path'><a href='".$rows['img_path']."'target='blank'>click here</a></td>
		<td class='linkedin_link'>".$rows['website']."</td>";
				?>
		
			<td><a href="javascript:;" id="<?php echo $rows['id'];?>" class="edit2"><img src="images/edit.png"></a><a href="javascript:;" id="<?php echo $rows['id'];?>" class="delete2"><img src="images/remove.png"></a></td></tr>
		<?php
			
		}
		
		?>
			</table> 
  </center>
 <center id ="sponsor"  style="">
			 <h3>
				 <?php echo $city ?> Sponsor
			 </h3>
	<table border="0" class="table-spons bordered" >
		<tr class="ajaxTitle">
			<th width="2%">Sr</th>
			<th width="16%">Sponsors Name</th>
			<th width="16%">Spons Type</th>
			<th width="12%">img</th>
			<th width="20%">Website address</th>
						<th width="20%">Action</th>
		</tr>
		<?php 
		$query ="select * from ead_sponsor where city='$city'";
		$result = mysqli_query($dbcon_reg,$query);
		while($rows=mysqli_fetch_array($result)){
			echo "<tr id=".$rows['id']."> <td>".$rows['id']."</td>
		
			<td class='name'>".$rows['name']."</td>
			<td class='portfolio'>".$rows['type']."</td>
			<td class='img_path'><a href='".$rows['img_path']."' target='blank'>click here</a></td>
			<td class='linkedin_link'>".$rows['website']."</td>";
				?>
		
			<td><a href="javascript:;" id="<?php echo $rows['id'];?>" class="edit1"><img src="images/edit.png"></a><a href="javascript:;" id="<?php echo $rows['id'];?>" class="delete1"><img src="images/remove.png"></a></td></tr>
		<?php
			
		}
		
		?>
			</table> 
  </center> -->
		  
		  

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
      include 'inc/footer.php';

      ?>

      </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

<script>
$('.update').click(function(){
	$('.update').val() = 'Save';
})
	
</script>
<script type="text/javascript">

	$("#category").change(function(){
	
		if($("#category").val() == 'speakers'){
			$('#media').hide();
			$('#speakers').show();
			$("#sponsor").hide();
		}
				else if($("#category").val() == 'media'){
						$('#media').show();
					$("#sponsor").hide();
					$("#speakers").hide();
		}
						else if($('#category').val() == 'sponsor'){
							$("#sponsor").show();
							$('#media').hide();
							$("#speakers").hide();
		}
		
	});
</script>

  </body>
</html>
