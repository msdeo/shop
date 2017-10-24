<?php
include "inc/header.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Post Approval Dashboard
            <small>Approve Here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" style="background-color:#fff;" id="t">
                    <thead>
                    <tr>
                       
                        <th class='tbl-col-name'>Name</th>
                        <th class='tbl-col-email'>Post</th>
                        <th>Action</th>
                        <th>College</th>
						  <th class='tbl-col-city'>City</th>
                        <th class='tbl-col-mobile' style="display:none;">Image</th>
                        <th class='tbl-col-founders' style="display:none;">Post</th>
                        <th class='tbl-col-address' style="display:none;">FB Profile</th>
                      
                      
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                      
					   <?php
					   
					  
                   $query="select * from timeline_posts where approved='no'";
                	$run_query=mysqli_query($dbCon, $query);
                
				if (mysqli_num_rows($run_query)==0)
					{
				echo	"<tr><td class='tbl-col-id'>No post requests yet.</td></tr>";
				
                }
				
                	while($row_posts=mysqli_fetch_array($run_query))
                	{
				
                		$post_id=$row_posts['post_id'];
                		$user_id=$row_posts['user_id'];
                		
                		$post=$row_posts['body'];
                		$image_name=$row_posts['image_name'];
                		
                		
						
					$query2="select * from cap_login where id = '$user_id'";
                	$run_query2=mysqli_query($dbCon, $query2);
					$row_user=mysqli_fetch_array($run_query2);
					$user_name=$row_user['name'];
					$user_city=$row_user['city'];
					$user_college=$row_user['college'];
						if(!(strcasecmp($user_city,$city))){
		//Date time format system
		
		$current_time=date("Y/m/d H:i:s", time());
		$current_time=strtotime($current_time);
		
		$date_time=$row_posts['date_time'];
		$date_time = strtotime($date_time);
		
		//time difference in minutes
		$time_diff=($current_time-$date_time)/60;
		
		if($time_diff>(60*24*7)){
		$time_string=date("d/m/Y", $date_time);	
		}
		
		for($i=7;$time_diff<(60*24*$i)&&$time_diff>=(60*24);$i--){
		if($i==1) break;
		$time=$i-1;
		if($i==2)$time_string="$time day ago";
		else
		$time_string="$time days ago";
		}

		for($i=24;$time_diff<(60*$i)&&$time_diff>=(60);$i--){
		if($i==1) break;
		$time=$i-1;
		if($i==2)$time_string="$time hour ago";
		else
		$time_string="$time hours ago";
		}
		
		for($i=60;$time_diff<($i);$i--){
		if($i==1){$time_string="Just now"; break;}
		$time=$i-1;
		if($i==2)$time_string="$time min ago";
		else
		$time_string="$time mins ago";
		}
		
				//Date time format system ENDS.

					  
					  
					  
					  
					  
					  
					  
					  
                       
                            echo '<tr class="gradeX" id="rowrowr-'.$post_id.'">';
                                   
                                    echo '<td class="tbl-col-name">'.$user_name.'</td>';
                                    echo '<td class="tbl-col-email">'.$post.'</td>';
                              
                                    $act = '<a href="approval.php?post_id='.$post_id.'&categ=1&user_id='.$user_id.'" class="btn btn-info btn-xs">Approve</a>';
									$act .= ' <a href="approval.php?post_id='.$post_id.'&categ=2&user_id='.$user_id.'" class="btn btn-success btn-xs">Discard</a>';
									
                                   echo '<td>'.$act.'</td>';
                                    ?>
                                    <td ><?php echo $user_college ?></td>
									<td class='tbl-col-city'><?php echo $user_city; ?></td>
                                    <td class='tbl-col-mobile' style="display:none;"><?php echo "<img src='http://dev.ecell-iitkgp.org/pratish/CAP/images/post_images/$image_name' style='max-width:300px;border:1px solid #021a40;' />"; ?></td>
                                    <td class='tbl-col-founders' style="display:none;"><?php echo $post; ?></td>
                                    <td class='tbl-col-address' style="display:none;"><?php ?></td>
                                    
                                    
                                    <?php
                                echo '</tr>';}
                        }
                    ?>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        
                        <th>Name</th>
                        <th>Post</th>
                        <th>Actions</th>
                        <th>College</th>
						<th class='tbl-col-city'>City</th>
                        <th class='tbl-col-mobile' style="display:none;">Image</th>
                        <th class='tbl-col-founders' style="display:none;">Post</th>
                        <th class='tbl-col-address' style="display:none;">FB Profile</th>
                        
                       
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
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
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	
  </body>
</html>
