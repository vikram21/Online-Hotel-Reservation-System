
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$ffname=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
        $ppassword=$_POST["password"];
	//CREATE CONNECTION
	$conn=new mysqli($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if($conn->connect_error)
	{
		die("CONNECTION FAILED:".$conn->connect_error);
	}
	$sql="insert into signup(name,email,phone,password) values('$ffname','$email','$phone','$ppassword')";
	if($conn->query($sql)===TRUE)
	{
		header('location:booked.html');
    }
	else
	{
		echo "ERROR: ".$sql."<br>".$conn->error;
	}
	$conn->close();
?>
