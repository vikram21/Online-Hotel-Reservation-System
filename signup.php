

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
	<title>Registration</title>
	
</head>
<body>
    <form action="registerUser.php" method="post" name="form" class="form-box">
	<div class="header" >
		<h1 align="center" style="background-color:Tomato;" >Register</h1>
	</div>
<br><br>
		<div class="button">
			<input type="text" name="name" placeholder="Enter your name"style="width:250px; height:30px;" required >
		</div>
		<br><br>
		<div class="button">
			<input type="email" name="email" placeholder="Enter your email"style="width:250px; height:30px;"required >
		</div>
		<br><br>
		<div class="button">
			<input type="tel" name="phone" placeholder="Enter your phone no." style="width:250px; height:30px;" required >
		</div>
		<br><br>
		<div class="button">
			<input type="password" name="password" placeholder="Enter password" style="width:250px; height:30px;" required >
		</div>
	<br><br>
      <br><div class="button"><span><span><input style="padding:10px;border:none;font-size:18px;border-radius:2px;background:red;color:white;" type="submit" name="submit" value="submit"></span></span></div>


	</form>
</body>
</html>
