<?php include'frontheader.php'; ?>
<?php	$error='';$city='';$rows='';
		$mysql_host = "mysql.ecell-iitkgp.org";
		$mysql_database = "ecell_db1516";
		$mysql_user = "ecellkgp";
		$mysql_password = "www-ecell";
		$mysql_table="cam_amb_reg";
	    $con=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	if (isset($_POST['submit'])) {
	$city=$_POST['city'];
	$query = mysqli_query($con,"SELECT * from $mysql_table WHERE city='$city'");
	$rows = mysqli_num_rows($query);}
echo'	
<div class="col-sm-11 col-md-11  col-lg-11">
	 <div class="row chat-window col-md-12" id="chat_window_1" style="margin-top:40px;">
	    <div class="panel panel-default">
	        <div class="panel-heading top-bar">
	            <div class="col-md-12 col-xs-12" style=>
	                <h3 class="panel-title"><span style="margin-right: 5;"></span>CAP-Entries</h3>
	            </div>
	        </div>
	        <div class="panel-body msg_container_base "style="max-height:800px;height:100%">
                <form id="frm1" action="" method="POST">
					<span>'.$error.'</span>
					<h4 id="error"></h4>
					<div class="form-group">
						      <label for="exampleInputname1">city:</label>
						      <input type="name" name="city" class="form-control" id="exampleInputName1" placeholder="enter name of city">
					</div>
					<input class="btn btn-primary" type="submit" name="submit" value="Submit"> 
				</form>                       
            
	            <div class="row msg_container base_receive">
	                <div class="col-xs-11 col-md-11" style="padding:0">
	                    <div class="messages msg_receive">
	                        <p>city-'.$city.' | registrations-'.$rows.'</p>
	                    </div>
	                </div>
	            </div> ';

	            if($rows>=1){
	            	echo'<table style="width:100% ; margin-bottom:0px ;" class="table">
								  <tr>
								    <th>Name</th>
								    <th>College</th>		
								    <th>City</th>
								  </tr>';
	            	while($row= $query->fetch_assoc()){
	            		 echo' 
								  <tr>
								    <td>'.$row['name'].'</td>
								    <td>Smith</td>		
								    <td>'.$row['city'].'</td>
								  <tr>' ;
	            	}
	            }

		echo '</table</div>
	</div>
	<div class="col-md-4"></div>
</div>' ;
?>