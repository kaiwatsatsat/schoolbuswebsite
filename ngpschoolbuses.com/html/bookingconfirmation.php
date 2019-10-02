<?php
	session_start();
	$username = $_SESSION["username"];
	$school_name = $_POST["school"];
	$location = $_POST["location"];
	echo $username;
	echo "<br/>";
	echo $school_name;
	echo "<br/>";
	echo $location;
	echo "<br/>ulala87<br/>";

	$db = mysqli_connect('localhost','root','Webserver123#','ngpschoolbuses');
	if (!$db)
	{
		echo "error connecting to database <br/>";
	}
	
	$uidquery = "SELECT USER_ID FROM USERS WHERE EMAIL='$username'";
	$sidquery = "SELECT SCHOOL_ID FROM SCHOOLS WHERE NAME='$school_name'";
	
	$result = mysqli_query($db,$uidquery);
	if ( false===$result)
	{
		echo "query failed<br/>";
	}
	$row = mysqli_fetch_row($result);
	echo $row[0];
	$uid = $row[0];
	echo "<br/>";
	mysqli_free_result($result);
	
	$result = mysqli_query($db,$sidquery);
	if ( false===$result)
	{
		echo "query failed<br/>";
	}
	$row = mysqli_fetch_row($result);
	echo $row[0];
	$sid = $row[0];
	echo "<br/>";
	mysqli_free_result($result);

	$ridquery = "SELECT ROUTE_ID FROM ROUTES WHERE SCHOOL_ID=$sid  AND SECTOR_NAME='$location'";
	$result = mysqli_query($db,$ridquery);
	if (false===$result)
	{
		echo "query failed<br/>";
	}	
	$row = mysqli_fetch_row($result);
	echo $row[0];
	$rid = $row[0];
	echo "<br/>";
	mysqli_free_result($result);
	
	echo $uidquery;
	echo "<br/>";
	echo $sidquery;
	echo "<br/>";
	echo $ridquery;
	echo "<br/>";

	$q = "INSERT INTO USER_BOOKINGS(USER_ID,SCHOOL_ID,ROUTE_ID) VALUES($uid,$sid,$rid);";
	echo $q;
	$result = mysqli_query($db,$q);
	mysqli_free_result($result);
	echo "<br/>";

	$result = mysqli_query($db,"SELECT BOOKING_ID FROM USER_BOOKINGS WHERE USER_ID=$uid AND SCHOOL_ID=$sid AND ROUTE_ID=$rid");
	$row = mysqli_fetch_row($result);
	$bid=$row[0];
	mysqli_free_result($result);
	session_unset();
	session_destroy();
	
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>Booking Confirmation</h2>
<p>your Bus Service has been booked <?php echo "with booking id $bid"; ?></p>

<div class="container">
  <form action="/certificate.php">
 
  <div class="row">
    <div class="col-25">
      view your certificate by clicking below
    </div>
   
    </div>
 
  <div class="row">
    <input type="submit" value="Get Certificate">
  </div>
  </form>
</div>

</body>
</html>


