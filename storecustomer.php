 <?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$_SESSION["email"]=$_POST["email"];
	$email=$_SESSION["email"];
	$country=$_POST["country"];
	$id=$_POST["id"];
	
	//for confirmation page
	session_start();
	$_SESSION["name"]=$name;
	$_SESSION["country"]=$country;
	$_SESSION["email"]=$email;
	$_SESSION["id"]=$id;
	$_SESSION["phone"]=$phone;
	$in=$_SESSION['in'];
	$out=$_SESSION['out'];
	
	//CREATE CONNECTION
	$conn=new mysqli($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if($conn->connect_error)
	{
		die("CONNECTION FAILED:".$conn->connect_error);
	}
	$sql="insert into customer(name,phone,email,country,id,check_in,check_out) values('$name','$phone','$email','$country','$id','$in','$out')";
	if($conn->query($sql)===TRUE)
	{
		header('location:payment.php');
    }
	else
	{
		echo "ERROR: ".$sql."<br>".$conn->error;
	}
	$conn->close();
?>
