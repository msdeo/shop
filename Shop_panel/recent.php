<?php
include "inc/header.php";
if($user_type=="admin"){
header("Location: index.php");
		exit();}
if($new_updates){
$query="update cap_login set new_updates=0 where id=$uid";
mysqli_query($dbCon, $query);
}
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Updates
            <small>recents</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
               
                <!-- /.timeline-label -->
                <!-- timeline item -->
                    <?php
                   $query="select * from timeline_posts order by post_id desc";
                	$run_query=mysqli_query($dbCon, $query);
					
					
                
                	while($row_posts=mysqli_fetch_array($run_query))
                	{
                		$post_id=$row_posts['post_id'];
                		$user_id=$row_posts['user_id'];
                		$category_id=$row_posts['category_id'];
                		$post=$row_posts['body'];
                		$image_name=$row_posts['image_name'];
                		$dellink="<a class='btn btn-warning btn-flat btn-xs' href=\"update.php?post_id=" . $post_id . "\"> Delete Post</a>";
                		
						
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
						
				if($user_id==$uid || $user_id==0)	{	
                		
						
						
                		if($category_id==2)
                		{
                		  echo " <li>
                                  <i class='fa fa-caret-square-o-right bg-light-blue '></i>
                                  <div class='timeline-item'>
                                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                                    <h3 class='timeline-header no-border'><a href='index.php'>You</a> updated app registration: $post</h3>
                                  </div>
                                </li>";
                		}
						
					
						if($category_id==4 && (!(strcasecmp($image_name,$city))))
                		{
                		  echo " <li>
                                  <i class='fa fa-plus-circle bg-maroon'></i>
                                  <div class='timeline-item'>
                                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                                    <h3 class='timeline-header no-border'>Some work has been alloted by the Admins | visit <a href='../CAP/'>Profile</a></h3>
                                  </div>
                                </li>";
                		}
						
						
						if($category_id==5)
						{
						 $query2="select * from todo_list where list_id=$post";
                	$run_query2=mysqli_query($dbCon, $query2);
               $var=mysqli_fetch_array($run_query2);
			   $work=$var['body'];
                	
					
							echo "<li>
                  <i class='fa fa-thumbs-o-up bg-yellow'></i>
                  <div class='timeline-item'>
                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                    <h3 class='timeline-header'><a href='../CAP/'>You</a> have done the following work</h3>
                    <div class='timeline-body'>
                     $work
                    </div>
                    <div class='timeline-footer'>
                      <a class='btn btn-warning btn-flat btn-xs' href='update.php?work_id=$post&post_id=$post_id'>Undo Work</a>
                    </div>
                  </div>
                </li>";
						
						
						
						
						
						}
						
						
						
						if($category_id==6){
						 $query2="select * from timeline_posts where post_id=$post";
                	$run_query2=mysqli_query($dbCon, $query2);
               $var=mysqli_fetch_array($run_query2);
			   $work=$var['body'];
			   $image_name=$var['image_name'];
						
						
						echo "<li>
                  <i class='fa fa-check-circle bg-aqua'></i>
                  <div class='timeline-item'>
                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                    <h3 class='timeline-header'><a href='../CAP/'>Support Team</a> has approved your following post</h3>
                    <div class='timeline-body'>";
                    if($image_name)
                                    echo "<img src='images/post_images/$image_name' style='width:400px;border:1px solid #021a40;' /><br>";
                                    echo "$work
                    </div>
                    <div class='timeline-footer'>
                      <a class='btn btn-primary btn-xs' href='timeline.php'>View Timeline</a>
                      
                    </div>
                  </div>
                </li>";
						}
						
						if($category_id==7){
						 $query2="select * from timeline_posts where post_id=$post";
                	$run_query2=mysqli_query($dbCon, $query2);
               $var=mysqli_fetch_array($run_query2);
			   $work=$var['body'];
			   $image_name=$var['image_name'];
						
						
						echo "<li>
                  <i class='fa fa-exclamation-triangle bg-red'></i>
                  <div class='timeline-item'>
                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                    <h3 class='timeline-header'><a href='../CAP/'>Support Team</a> has discarded your following post because of inappropriate content</h3>
                    <div class='timeline-body'>";
                    if($image_name)
                                    echo "<img src='images/post_images/$image_name' style='width:400px;border:1px solid #021a40;' /><br>";
                                    echo "$work
                    </div>
                    <div class='timeline-footer'>
                      <a class='btn btn-primary btn-xs' href='addwork.php'>Post Again</a>
                      
                    </div>
                  </div>
                </li>";
						}
						
					
						if($category_id==8){
						
						
						
						echo "<li>
                  <i class='fa fa-user bg-maroon'></i>
                  <div class='timeline-item'>
                    <span class='time'><i class='fa fa-clock-o'></i> $time_string</span>
                    <h3 class='timeline-header'>Welcome <a href='../CAP/'>$name</a></h3>
                    <div class='timeline-body'>
                  
                                 Your Facebook ID has been updated. For any queries, feel free to contact our Support Team
                    </div>
                    <div class='timeline-footer'>
                      <a class='btn btn-primary btn-xs' href='update.php?reenter_id=$post_id'>Re-Enter ID</a>
                      
                    </div>
                  </div>
                </li>";
						}					
						
                }

	}
?>
                
                
                
                
                
                
                <!-- END timeline item -->
                <!-- timeline item -->
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->

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
  </body>
</html>