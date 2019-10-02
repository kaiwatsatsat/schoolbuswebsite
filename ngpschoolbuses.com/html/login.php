<?php
	session_start();
        $errors = array();

        $db = mysqli_connect('localhost','root','Webserver123#','ngpschoolbuses');
        if (!$db)
        {
                echo "error coonecting to database\n";
        }
	if (isset($_POST['login_user']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (empty($username))
		{
			array_push($errors, "Username is required");
		}
		if (empty($password))
		{
			array_push($errors,"Password is required");
		}

		if (count($errors) == 0)
		{
			$query = "SELECT * FROM USERS WHERE email='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1)
			{
				$_SESSION["username"]=$username;
				header('location: dashboard.php');
			}
			else
			{
				echo "Wrong username/password combination <br/>";
				array_push($errors, "Wrong username/password combination");
				session_unset();
				session_destroy();
				header('location: login.php');
			}
		}
		else
		{
			session_unset();
			session_destroy();
			echo "count not 0 <br/>";
		}
	}
		
?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login_user">Login</button>
    <a href="/register.php">Dont't have an account?</a>
  </div>

</form>

</body>
</html>

