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
      <title>Assign Target Team Leader</title>
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
                    	<div class="x_panel m-auto">
                        	<div class="x_title">
                              <h2>Assign Target Team Leader</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            	<form class="form-horizontal form-label-left" method="post" action="AssignTargetTeamLeaderCode.php">
                                 <div class="form-group">
                                    <label>Team Leader</label>
                                    <input type="hidden" name="Emp" value="<?php echo $EmployeeUsername; ?>">
                                    <select id="SelectTeamLeader" name="Emplyoee" class="form-control" onChange="getTargetEmp(this.value);">
                                    	<option value="">Select</option>
                                    	<option value="SelectTeamLeader">Select Team Leader</option>
                                    </select>
                                 </div>
                                 <div id="display" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block bg-white" style="float:none">
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
    </div><br /><br /><br />
<script>
function getTargetEmp(val) 
{
	$.ajax({
	type: "POST",
	url: "getTargetEmp.php",
	data:'SelectTeamLeader='+val,
	success: function(data){
		$("#display").html(data);
	}
	});	
}
</script>  
</body>
</html>