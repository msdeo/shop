<?php 
   include_once 'inc/header.php';
include "dbconnect.php";
  $dbcon_reg=mysqli_connect($mysql_host,$mysql_user,$mysql_password,"ecell_db1617");
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" >
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css" >

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             EAD Registrations
            
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
                  <h3 class="box-title">EAD Registrations INFO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
			 <?php

   
      
  	
          
          $sql = "SELECT * FROM ead_reg where city= '$city'";
$result = mysqli_query($dbcon_reg, $sql);?>
<div class="container">
 <table id="example" class="table table-striped">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>College</th>
        <th>Email ID</th>
   
        <th>Contact no.</th>
    
      </tr>
    </thead>
	 <tbody>
	 <?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>

    
      <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["name"] ?></td>
        <td><?php echo $row["college"] ?></td>
        <td><?php echo $row["email"] ?></td>

        <td><?php echo $row["phone"] ?></td>
    
      </tr>
     
    
	 <?php

    }
} else {
    echo "0 results";
}
?>
		 </tbody>
	   </table>
</div>
                      </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --></div>
<?php 

     
?>


<?php
  include_once 'inc/footer.php';
?>
<!-- JS begin -->
		<!-- jQuery  -->

		<script type="text/javascript" src="../js/jquery-1.12.4.js"></script>
	<!--	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>-->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap.min.js"></script>


		<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>


		<!-- MAGNIFIC POPUP -->
		<script src='../js/jquery.magnific-popup.min.js'></script>
    
    <!-- PORTFOLIO SCRIPTS -->
    <script type="text/javascript" src="../js/imagesloaded.pkgd.min.js"></script>
    
    <!-- APPEAR -->    
    <script type="text/javascript" src="../js/jquery.appear.js"></script>
    
    <!-- OWL CAROUSEL -->    
    <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
    
    <!-- NAV SIDEBAR -->
		<script src="../js/jquery.nav.js"></script>
    <script>
		
			$(document).ready(function() {
// 			$('#example').DataTable();
				 var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
			//NAV SIDEBAR------------------------------------------------------------------
				var top_offset = $('header').height() - 1;  // get height of fixed navbar

				$('#nav-sidebar').onePageNav({
					currentClass: 'current',
					changeHash: false,
					scrollSpeed: 700,
					scrollOffset: top_offset,
					scrollThreshold: 0.5,
					filter: '',
					easing: 'swing',
					begin: function() {
						//I get fired when the animation is starting
					},
					end: function() {
						//I get fired when the animation is ending
					},
					scrollChange: function($currentListItem) {
						//I get fired when you enter a section and I pass the list item of the section
					}
				});

			//SIDEBAR STICKY---------------------------------------------	  
				var //offsetSb = $('.page-title-bg').height(),
					offsetFooter = $('#footer-offset').height()+30;
					// DM Menu
				jQuery('#sidebar-stiky').affix({
					offset: { top: 300, //top offset for header 1 for others headers it will have other value
						bottom: offsetFooter		
					}
				});
        
      }); 
    </script>
    
    <!-- MAIN SCRIPT -->
		<script src="js/main.js"></script>
    
<!-- JS end -->	
	
	</body>

<!-- Mirrored from abcgomel.ru/haswell-1.8.1-demo/typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Nov 2016 19:05:48 GMT -->
</html>		