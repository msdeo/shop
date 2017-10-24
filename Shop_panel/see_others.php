<?php
include "inc/header.php";

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            City-wise EAD Registrations
            
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- <h2 class="page-header">Social Widgets</h2> -->

          <div class="row">
            
                	  
                	 
                	  
                <?php	
                	/*  if($profile_id!=$uid ){
                    echo "<div class='col-md-4'>
                          <!-- Widget: user widget style 1 -->
                          <div class='box box-widget widget-user-2'>
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class='widget-user-header bg-yellow'>
                              <div class='widget-user-image'>
                                <img class='img-circle' src='images/profile_img/$profile_image' alt='User Avatar'>
                              </div><!-- /.widget-user-image -->
                              <h3 class='widget-user-username'>$profile_name</h3>
                              <h5 class='widget-user-desc'>$profile_city</h5>
                            </div>
                            <div class='box-footer no-padding'>
                              <ul class='nav nav-stacked'>
                                <li><a href='#'>City Registrations <span class='pull-right badge bg-blue'>$city_reg</span></a></li>
                                <li><a href='#'>City Empresario Reg. <span class='pull-right badge bg-aqua'>$city_empress_reg</span></a></li>
                                <li><a href='#'>Total City Articles <span class='pull-right badge bg-green'>$total_city_articles</span></a></li>
                                <li><a href='#'>City App Reg. <span class='pull-right badge bg-red'>$city_app_reg</span></a></li>
                              </ul>
                            </div>
                          </div><!-- /.widget-user -->
                        </div><!-- /.col -->";
                        	  }  */
                	
              ?>
                
          </div>

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">EAD Registrations in different Cities</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>City(as in database)</th>
                        <th>City EAD Reg.</th>
<!--                         <th>Empresario Reg.</th>
                        <th>City Articles</th>
                        <th>App Reg.</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      
					  <?php
			 $dbcon_reg=mysqli_connect($mysql_host,$mysql_user,$mysql_password,"ecell_db1718");
           $query="SELECT * FROM `am_17`";
				   $run_query=mysqli_query($dbCon, $query);
				   $row_city = [] ;
				   $i=0;
               while( $row=mysqli_fetch_array($run_query)){
				$city=$row['city'];
				$exist=false;
				for($j=0;$j<$i;$j++){
				if(!(strcasecmp($row_city[$j],$city))) $exist=true;
				}
				if($exist==false) {$row_city[$i]=$city; $i++;}
			   }
				$row_len=$i;
			
					for($i=0;$i<$row_len;$i++){
					 $sql="select id from ead_2017 where city = '$row_city[$i]' ";
					$run_sql=mysqli_query($dbcon_reg, $sql);
					$j=0;
					while($row_sql=mysqli_fetch_array($run_sql))
					{
					$j++;
					}
					$city_reg=$j;
					
					//getting empress_reg value
					
					 $sql="select id from empresario where city = '$row_city[$i]' ";
					$run_sql=mysqli_query($dbcon_reg, $sql);
					$j=0;
					while($row_sql=mysqli_fetch_array($run_sql))
					{
					$j++;
					}
					 $city_empress_reg=$j;
					
					//getting city_articles value
					$sql="select article_id from city_articles where city = '$row_city[$i]' ";
					$run_sql=mysqli_query($dbCon, $sql);
					$j=0;
					while($row_sql=mysqli_fetch_array($run_sql))
					{
					$j++;
					}
					$total_city_articles=$j;
					
             
					  
					  
					  
					echo  "<tr>
                        <td>$row_city[$i]</td>
                        <td>$city_reg</td>
                        
                      </tr>";
					  }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>City(as in database)</th>
                        <th>City EAD Reg.</th>
<!--                         <th>Empresario Reg.</th>
                        <th>City Articles</th>
                        <th>App Reg.</th> -->
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
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
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
