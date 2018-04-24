 <?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$ccard=$_POST["ccard"];
	$expiry=$_POST["date"];
	$cvv=$_POST["cvv"];
	
	//CREATE CONNECTION
	$conn=new mysqli($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if($conn->connect_error)
	{
		die("CONNECTION FAILED:".$conn->connect_error);
	}
	$sql="insert into payment(ccard,expiry,cvv) values('$ccard','$expiry','$cvv')";
	if($conn->query($sql)===TRUE)
	{
		include("confirm_booking.php");
    }
	else
	{
		echo "ERROR: ".$sql."<br>".$conn->error;
	}
	$conn->close();
?>
