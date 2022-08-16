<?php
include('includes/config.php');
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/table-style.css" />

//fonts and icons
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 


</head> 
<body>


    <div class="page-container">
	<div class="left-content">
	<div class="mother-grid-inner">


	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
				    <h2>Bookings</h2>
				    <table id="table">
					<thead>
					<tr>
						<th>Customer ID</th>
						<th>Name</th>
						<th width="200">Service Type</th>
						<th>Place </th>
						<th>Date </th>
						<th width="200">Slot</th>		
					</tr>
					</thead>
					<tbody>
						<?php $sql = "SELECT *,tblcarwashbooking.id as bid from tblcarwashbooking
						join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint
						 where status='Old'";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);

						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{				?>	

						<tr>
							<td><?php echo htmlentities($result->bookingId);?></td>
							<td><?php echo htmlentities($result->fullName);?></td>
							<td width="50">
							<?php $ptype=$result->packageType;
								if($ptype==1): echo "EXTERIOR WASH(₹999)";endif;
								if($ptype==2): echo "INTERIOR WASH(₹2999)";endif;
								if($ptype==3): echo "PREMIUM CLEANING(₹3999)";endif;
							?>
							</td>
							
						
							<td><?php echo htmlentities($result->washingPointName);?><br />
								<?php echo htmlentities($result->washingPointAddress);?></td>
							<td><?php echo htmlentities($result->washDate);?></td>
							
							
							<td width="50">
								<?php $slot=$result->slot;
									if($slot==1): echo "8:00-10.00";endif;
									if($slot==2): echo "10:00-12.00";endif;
									if($slot==3): echo "12:00-02.00";endif;
									if($slot==4): echo "02:00-04.00";endif;
									if($slot==5): echo "04:00-06.00";endif;
									?>
							</td>
				


								<?php } ?>
						</tr>
						 
						<?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 
							<?php } ?>
						</tbody>
					  </table>
					</div>
				  </table>
	
			</div>
</div>

		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>

</body>
</html>