<?php
session_start();

include('database.php');
 
if(strlen($_SESSION['user_id'])==0)
	{	
    header("location: login.php");
  }
else{

  if(isset($_POST['book']))
  {
  $ptype=$_POST['packagetype'];
  $wpoint=$_POST['washingpoint'];
  $fname=$_POST['fname'];
  $date=$_POST['washdate'];
  $slot=$_POST['slot'];
  $status='New';
  $bno=mt_rand(100000000, 999999999);
  $sql="INSERT INTO tblcarwashbooking(bookingId,packageType,carWashPoint,fullName,washDate,slot,status) VALUES(:bno,:ptype,:wpoint,:fname,:date,:slot,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':bno',$bno,PDO::PARAM_STR);
  $query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
  $query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
  $query->bindParam(':fname',$fname,PDO::PARAM_STR);
  $query->bindParam(':date',$date,PDO::PARAM_STR);
  $query->bindParam(':slot',$slot,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
   
    echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
  }
  else 
  {
   echo "<script>alert('Something went wrong. Please try again.');</script>";
  }
  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <h1>Hi, <b><?php print_r($_SESSION["name"]); ?></b>, Welcome to Mobile Car Washing.</h1>
    <p>
        <a href="logout.php" >Sign Out of Your Account</a>
    </p>

    <form  name="washing" method="post" enctype="multipart/form-data" style="margin: auto; width: 220px;">
    <div>
				<label for="focusedinput">Services</label>
		      <div>
				  <select name="packagetype">
          <option value="">Package Type</option>
          <option value="1">EXTERIOR WASH(₹999)</option>
          <option value="2">INTERIOR WASH(₹2999)</option>
          <option value="3 ">PREMIUM CLEANING(₹3999)</option>
          </select>
				  </div>
    </div>
                  
     <div>
		    <label for="focusedinput">Washing Point</label>
			  <div>
			    <select name="washingpoint">
          <option value="">Select Washing Point</option>
<?php $sql = "SELECT * from tblwashingpoints";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{               ?>  
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?> (<?php echo htmlentities($result->washingPointAddress);?>)</option>
<?php } ?>
            </select>
			    </div>
			</div>
     

      <div>
				<label for="focusedinput">Full Name</label>
					<div>
					<input type="text" name="fname" required placeholder="Full Name">
					</div>
			</div>


      <div class="form-group">
				<label for="focusedinput">Slots Availability </label>
				  <div>
          <select name="slot">
          <option value="1">8:00 - 10:00</option>
          <option value="2">10:00 - 12:00</option>
          <option value="3">12:00 - 02:00</option>
          <option value="4">02:00 - 04:00</option>
          <option value="5">04:00 - 06:00</option>
          </select>
				  </div>
			</div>


			<div>
			  <label for="focusedinput">Booking Date</label>
			  <div>
			    <input type="date" name="washdate">
			  </div>
			</div>


			<div>
      <p><input type="submit" name="book" value="Book Now"></p>
    	</div>
      

    </form>
    </body>
</html>
<?php } ?>