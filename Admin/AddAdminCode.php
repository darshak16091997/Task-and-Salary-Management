<?php
session_start();
if(!isset($_SESSION['AdminUsername']) || $_SESSION['AdminUsername']!=true)
{
	header("Location:index.php");
	exit();
}
else
{
 $AdminUser=$_SESSION['AdminUsername'];
}
?>
<?php
	require("../MyDB.php");
	
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	
	$Query="INSERT INTO `tbl_admin`(`Username`, `Password`) VALUES ('$Username','$Password')";
	$Result=mysqli_query($con,$Query);
	
	if($Result)
	{
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<title>Untitled Document</title></head>
<body onLoad="JSconfirm()">
    <script type="text/javascript">
    	function JSconfirm(){
    	swal({
      			title: "Our Admin Create Is Succesfully!",
      			icon: "success",
    		})
    	.then((willDelete) => {
      	if(willDelete) 
		{
         	window.location = "AddAdmin.php";     
        }  
        else 
		{
        window.location = "AddAdmin.php";     
      	}
    	});
    	}
    </script>
</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onLoad="JSconfirm()"> 
    <script type="text/javascript">
    	function JSconfirm(){
    	swal({
      		title: "Sorry, You Entered Wrong Detail Please Add Carefully!",
      		icon: "warning",
    		})
    	.then((willDelete) => {
      	if(willDelete) 
		{
         	window.location = "AddAdmin.php";     
        } 
        else 
		{
        	window.location = "AddAdmin.php";     
      	}
    	});
    }
    </script>
</body>
</html>
<?php
	}
?>