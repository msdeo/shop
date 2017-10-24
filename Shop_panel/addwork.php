<?php
include "inc/header.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Your New Details here
            <small>Here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?php if($user_type=="admin")echo "Add New Details"; else echo "Timeline Updates"; ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
				
				
                  <?php
				  
                  if($user_type!="admin") { $msg=$_SESSION['postmsg'];echo"<form action='update.php' method='POST' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label>Category</label>
					   <p class='help-block'>
						 $msg";
						 
							  $_SESSION['postmsg']="";
							  $msg=$_SESSION['postmsg'];
						
					 echo  "</p>
                      <select name='category_id' onchange='textbox(this.value);' class='form-control select2' style='width: 100%;'>
                        <option selected='selected'>Select a Category</option>
                        <option value='1'>Articles</option>
                        <option value='2'>App Registrations</option>
                        <option value='3'>Empresario Update</option>
                         <option value='3'>Work Alloted Update</option>
                      </select>
                    </div><!-- /.form-group -->
                    
                     <div class='form-group'>
                      <textarea class='form-control select2' id='article_body' name='post' style='display:none;' rows='3' cols='75' placeholder='Newspaper Name' ></textarea>
                    </div>
                    
                    <div class='form-group' style='display:none;' id='input_file'>
                      <label for='file'>Add Image</label>
                      <input name='file' type='file' id='file' >
                     
                    </div>
					<div class='bootstrap-iso'>
					 <div class='container-fluid'>
					  <div class='row'>
                     <div class='form-group'>
                      
                      <button class='btn btn-primary ' name='submit' type='submit'>
							Update Timeline
						   </button>
                    </div>
					</div></div></div>"; }
					
					else
					{
					$msg=$_SESSION['msg'];
					echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
					 <p class='help-block'>
						 $msg";
						 
							  $_SESSION['postmsg']='';
							  $msg=$_SESSION['postmsg'];
						
					 echo  "</p>
                     <div class='form-group' id='speakers' style=''>
						 <textarea class='form-control select2' id='article_body' name='name' rows='1' cols='75' placeholder='Product name' ></textarea><br>
<textarea class='form-control select2' id='article_body' name='price' rows='1' cols='75' placeholder='Product Price' ></textarea><br>
 <textarea class='form-control select2' id='article_body' name='specification' rows='1' cols='75' placeholder='Specification' ></textarea><br>
 <select name='category' onchange='textbox(this.value);' class='form-control select2' style='width: 100%;'>
                        <option selected='selected'>Select a Category</option>
                        <option value='food'>Food</option>
                        <option value='electronic'>Electronic Accessories</option>
                        <option value='sports'>Sports Accessories</option>
                         <option value='book'>Book</option>
                         <option value='grocery'>Grocery</option>
                         <option value='household'>Household</option>
                      </select>
                      <br>
                      <select name='availability' onchange='textbox(this.value);' class='form-control select2' style='width: 100%;'>
                        <option selected='selected'>Availability</option>
                        <option value='yes'>YES</option>
                        <option value='no'>NO</option>
                      </select>
  <br>
 <input type='file' name ='fileToUpload' id='fileToUpload' placeholder='Upload Image'>image size should be less than 50KB
                   </div>
								
	
					<div class='bootstrap-iso'>
					 <div class='container-fluid'>
					  <div class='row'>
						 <div class='form-group'>
						  <div>
						   <button class='btn btn-primary ' name='submit' type='submit'>
						
				Update Info
					
     </button>
						  </div>
						 </div>
						 </div></div></div>
									
										
						</form>";
									?>
									<?php 
					}
										
					?>
                    
                  
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
		  
		  
		  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
      include 'inc/footer.php';

      ?>

     </div><!-- ./wrapper -->

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
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
<script>

	$("#category").change(function(){
	
		if($("#category").val() == 'speakers'){
			$('#media').hide();
			$('#speakers').show();
			$("#sponsor").hide();
		}
				if($("#category").val() == 'media'){
						$('#media').show();
					$("#sponsor").hide();
					$("#speakers").hide();
		}
						if($('#category').val() == 'sponsor'){
							$("#sponsor").show();
							$('#media').hide();
							$("#speakers").hide();
		}
		
	});
</script>
  </body>
</html>
