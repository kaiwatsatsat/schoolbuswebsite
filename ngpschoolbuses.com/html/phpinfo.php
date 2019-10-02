<?php
echo "qqqqqqqqsadfasdf";
$db = mysqli_connect('localhost','root','Webserver123#','ngpschoolbuses');
if($db==false)
{
	echo "1111111oooooooooo";
}
else
{
	echo "333333333222222ppppppppp";
	mysqli_query($db,"INSERT INTO USERS(email,password) VALUES('kaka','mama')");
}
#phpinfo();
?>
