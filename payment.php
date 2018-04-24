
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="style.css" rel="stylesheet" type="text/css" />
    <link href="layout.css" rel="stylesheet" type="text/css" />
	<title>payment</title>
</head>
<body>
<?php
session_start();
$r=$_SESSION["r"];
$in=$_SESSION["in"];
$out=$_SESSION["out"];
$time=$out-$in;
$s=0;
$d=0;
if($r%2==0)
	{
	$d=floor($r/2);
	$s=0;
	}
	else
	{
	$d=floor($r/2);
	$s=1;
	}
/*if($r==1)
{
	$s=1;
	$d=0;
}
else if($r==2)
{
	$s=0;
	$d=1;
}
else if($r==3)
{
	$s=1;
	$d=1;
}
else if($r==4)
{
	$s=0;
	$d=2;
}
else if($r==5)
{
	$s=1;
	$d=2;
}
else if($r==6)
{
	$s=0;
	$d=3;
}
else
{
$s=1;
$d=3;
}*/
$single=1000;
$double=1500;
$t=$time*(($s*$single)+($d*$double));
$_SESSION["total"]=$t;
?>
    <form action="cpayment.php" method="post" name="form" class="form-box">
	<div class="header" >
		<h1 align="center" style="background-color:Tomato;" >PAYMENT</h1>
	</div>
<br>
<div class="inner">
            <h3 style="color:white;">Total Amount to be paid:<?php echo $t?> INR</h3>
			</div>
		<div class="button">
			<br><br>
			<input type="tel" name="ccard" placeholder="Enter your credit card number"  style="width:250px; height:30px;" required="required">
		</div>
		<div  class="button">
		<br><br>
		                    <label><b>Expiry date:</b></label>
			<br><br>
			<input type="date" name="date" style="width:150px; height:30px;" required >
		</div>
		<div class="button">
		<br><br>
		                <label><b>cvc/cvv</b></label>
			<br><br>
			<input type="tel" name="cvv" style="width:60px; height:30px;" required="required">
		</div>
	   <br><div class="button"><span><span><input style="padding:10px;border:none;font-size:18px;border-radius:2px;background:red;color:white;" type="submit" name="submit" value="Pay Now"></span></span></div>

	</form>
	
</body>
</html>