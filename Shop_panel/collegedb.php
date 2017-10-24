






<?php

if($_POST['city'])
{

$city = $_POST['city'];
?>

<table>
 <tr>
                        <th>College</th>
                        <th>EAD Reg.</th>
                       
                      </tr>

<?php
include "dbconnect.php";



 $dbcon_reg=mysqli_connect($mysql_host,$mysql_user,$mysql_password,"ecell_db1617");
                   $query="SELECT DISTINCT college FROM `ead_reg` where city LIKE '$city'";
				   $run_query=mysqli_query($dbcon_reg, $query);
				   $row_college = [] ;
				   $i=0;
               while( $row=mysqli_fetch_array($run_query)){
				$college=strtolower($row['college']);
		
					 $sql="select id from ead_reg where college LIKE '$college'";
					$run_sql=mysqli_query($dbcon_reg, $sql);
					$j=0;
					while($row_sql=mysqli_fetch_array($run_sql))
					{
					$j++;
					}
					$sum=$sum+$j;
				echo "
					 <tr>
                        <th>$college</th>
                        <th>$j</th>
                       
                      </tr>";
					
					
				
					
					}


?>

 <tr>
                        <th>Total</th>
                        <th><?php echo "$sum"; ?> </th>
                       
                      </tr></table>
                      
                      
                      
                      <?php }
                      else{
                      	?>
                      	<form action="collegedb.php" method="post" >
                      	  <div class="form-group ">
      <label class="col-sm-2 control-label requiredField" for="city" style="font-weight: 100;">
             City
      
      </label>
       <div class="col-sm-10">
      <select class="select form-control" id="city" name="city" required>
       <option selected disabled hidden value="">Choose your city</option>

                                      <option value="Ahmedabad">Ahmedabad</option>
                                      <option value="Bangalore">Bangalore</option>
                                      <option value="Bhopal">Bhopal</option>
                                      <option value="Bhubaneswar">Bhubaneswar</option>
                                      <option value="Chennai">Chennai</option>
                                      
                                      <option value="Delhi">Delhi</option>
                                      <option value="Gurugram">Gurugram</option>
                                      <option value="Hyderabad">Hyderabad</option>
                                      <option value="Indore">Indore</option>
                                      
                                      <option value="Jaipur">Jaipur</option>
                                      <option value="Jamshedpur">Jamshedpur</option>
                                      <option value="Kanpur">Kanpur</option>
                                      <option value="Kharagpur">Kharagpur</option>
                                      <option value="Kolkata">Kolkata</option>
                                      <option value="Lucknow">Lucknow</option>
                                      <option value="Ludhiana">Ludhiana</option>
                                      <option value="Mumbai">Mumbai</option>
                                      <option value="Nagpur">Nagpur</option>
                                      <option value="Noida">Noida</option>
                                      <option value="Patna">Patna</option>
                                      <option value="Pune">Pune</option> 
                                      <option value="Raipur">Raipur</option>
                                      <option value="Ranchi">Ranchi</option>
      </select>
     </div>
     </div></br>
     <input type="submit">
     </form>
     
     <?php
                      }
                      
                      
                      ?>