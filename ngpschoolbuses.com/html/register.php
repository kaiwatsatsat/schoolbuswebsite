<?php
        #phpinfo();
        #session_start();
        $email = "";
        $errors = array();

        $db = mysqli_connect('localhost','root','Webserver123#','ngpschoolbuses');
        if (!$db)
        {
                echo "error coonecting to database\n";
        }
        else
        {
                echo "connection to mysql successful\n";
                echo $_POST['email'];
        }
        if (isset($_POST['reg_user']))
        {
                echo "issetreg_user\n";
                $email = $_POST['email'];
                $psw = $_POST['psw'];
                $psw_repeat = $_POST['psw-repeat'];

                if($psw!=$psw_repeat)
                {
                        array_push($errors,"The two passwords do not match");
                }


                $user_check_query = "SELECT * FROM USERS WHERE email='$email' LIMIT 1";
                $result = mysqli_query($db, $user_check_query);
                $user = mysqli_fetch_assoc($result);

                if($user)
                {
                        if($user['email'] == $email)
                        {
                                array_push($errors, "User already exists");
                        }
                }
                if(count($errors) == 0)
                {
                        echo "COUNT IS 0 OOOOK\n";
                        echo $psw;
                        echo $email;
                        $query = "INSERT INTO USERS(email,password) VALUES('$email','$psw')";
			mysqli_query($db,$query);
			header('location: login.php');
                }
        }
        else
        {
                echo "not issetreg_user";
        }
        echo "sdgawsgdsdfg";
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>

    <button type="submit" class="registerbtn" name="reg_user">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="/login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
