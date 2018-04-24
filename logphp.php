<?php
    
   $servername='localhost';
	$username='root';
	$password='';
	$dbname='project';
	$email=$_POST['email'];
	$ppassword=$_POST['password'];
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if(!$conn)
	{
		die("CONNECTION FAILED:");
	}
	$sql = "SELECT * FROM `signup` WHERE  `email` = '".$email."' and `password` = $ppassword";
	$cd=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($cd)==1)
	{
		header('location:booked.html');
    }
	else
	{
		echo "ERROR: Invalid Username or password! <br>";
	}
	//$conn->close();
?>