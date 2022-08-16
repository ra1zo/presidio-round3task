<?php
session_start();
error_reporting(0);
include('includes/config.php');


if(isset($_POST['submit']))
{
$wpname=$_POST['washingpointname'];
$wpaddress=$_POST['address'];	
$wpcnumber=$_POST['contactno'];

$sql="INSERT INTO tblwashingpoints(washingPointName,washingPointAddress,contactNumber) VALUES(:wpname,:wpaddress,:wpcnumber)";
$query = $dbh->prepare($sql);
$query->bindParam(':wpname',$wpname,PDO::PARAM_STR);
$query->bindParam(':wpaddress',$wpaddress,PDO::PARAM_STR);
$query->bindParam(':wpcnumber',$wpcnumber,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 echo "<script>alert('Car wash point added successfully');</script>";
 echo "<script>window.location.href ='addcar-washpoint.php'</script>";
}
else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Washing Point</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/table-style.css" />

<!-- fonts and icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 

</head> 
<body>
<div class="page-container">
	<div class="left-content">

              
  <div class="grid-form1">
  	       <h3>Add Washing Point</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Car Wash Point Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="washingpointname" id="washingpointname" placeholder="Washing Point Name" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Adress</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="address" id="address" placeholder="Address" required rows="4"></textarea>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" required>
									</div>
								</div>


								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Add</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>


</body>
</html>
