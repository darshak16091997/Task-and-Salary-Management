<?php
session_start();
if(!isset($_SESSION['EmployeeUsername']) || $_SESSION['EmployeeUsername']!=true)
{
	header("Location:../index.php");
	exit();
}
else
{
 $EmployeeUsername=$_SESSION['EmployeeUsername'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Assign Task Team Leader</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600">
      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
      <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
      <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link href="assets/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md top-bar-menu">   
    
    <div class="container body">
         <div class="main_container">
         	<?php
			include('Header.php');
			?>
            
            
            <div class="right_col" role="main">
            	<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block" style="float:none">
                    	<div class="x_panel">
                        	<div class="x_title">
                              <h2>Task Assign Team Leader</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            	<form class="form-horizontal form-label-left" method="post" action="ChangeShiftCode.php">
                                 <div class="form-group">
                                    <label>Target</label>
                                     <select name="TargetID" class="form-control">
                                    	<option value="">Select Target</option>
										<?php
                                            require("../MyDB.php");
                                            
                                            $Query="SELECT * FROM tbl_target";
                                            $Result=mysqli_query($con,$Query);
                                            
                                            while($Row=mysqli_fetch_array($Result))
                                            {
                                        ?>
                                    	<option value="<?php echo $Row['TargetID']; ?>"><?php echo $Row['Target']; ?></option>
                                       <?php } ?>
                                   	</select>
                                 </div>
                                 <div class="form-group">
                                    <label>Emplyoee Select</label>
                                    <select id="SelectEmplyoee" name="Emplyoee" class="form-control" onChange="getEmp(this.value);">
                                    	<option value="">Select One</option>
                                    	<option value="SelectEmplyoee">Select Team Leader</option>
                                    </select>
                                 </div>
                                 <div id="display" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block bg-white" style="float:none">
                    			 </div>
                                 <div class="ln_solid"></div>
                                 <button class="btn btn-success" type="submit">Submit</button>
                                 <button class="btn btn-primary" type="button">Cancel</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
         </div>
    </div><br /><br />
<script>
function getEmp(val) 
{
	$.ajax({
	type: "POST",
	url: "getEmp.php",
	data:'SelectEmplyoee='+val,
	success: function(data){
		$("#display").html(data);
	}
	});	
}
</script>
</body>
</html>
