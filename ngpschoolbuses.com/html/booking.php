<?php
	session_start();
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

<h2>BOOKINGS </h2>
<p>book the bus service for your child.</p>

<div class="container">
  <form action="/bookingconfirmation.php" method="post" >
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">School</label>
    </div>
    <div class="col-75">
      <select id="country" name="school">
        <option value="Bhavans Vidya Mandir">Bhavans Vidya Mandir </option>
        <option value="RS Mundle">R S Mundle</option>
        <option value="Delhi Public School">Delhi Public School</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Location </label>
    </div>
    <div class="col-75">
     <select id="country" name="location">
        <option value="SECTOR_A"> SECTOR_A</option>
        <option value="SECTOR_B"> SECTOR_B</option>
        <option value="SECTOR_C"> SECTOR_C</option>
        <option value="SECTOR_D"> SECTOR_D</option>
        <option value="SECTOR_E"> SECTOR_E</option>
        <option value="SECTOR_F"> SECTOR_F</option>
        <option value="SECTOR_G"> SECTOR_G</option>
        <option value="SECTOR_H"> SECTOR_H</option>
        <option value="SECTOR_I"> SECTOR_I</option>
        <option value="SECTOR_J"> SECTOR_J</option>
        <option value="SECTOR_K"> SECTOR_K</option>
        <option value="SECTOR_L"> SECTOR_L</option>
        <option value="SECTOR_M"> SECTOR_M</option>
        <option value="SECTOR_N"> SECTOR_N</option>
        <option value="SECTOR_O"> SECTOR_O</option>
        <option value="SECTOR_P"> SECTOR_P</option>
        <option value="SECTOR_Q"> SECTOR_Q</option>
        <option value="SECTOR_R"> SECTOR_R</option>
        <option value="SECTOR_S"> SECTOR_S</option>
        <option value="SECTOR_T"> SECTOR_T</option>
        <option value="SECTOR_V"> SECTOR_V</option>
        <option value="SECTOR_W"> SECTOR_W</option>
        <option value="SECTOR_X"> SECTOR_X</option>
        <option value="SECTOR_Y"> SECTOR_Y</option>
        <option value="SECTOR_Z"> SECTOR_Z</option>
      </select>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Book">
   
   
  </div>
  </form>
</div>

</body>
</html>
