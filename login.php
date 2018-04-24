

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="style.css" rel="stylesheet" type="text/css" />
    <link href="layout.css" rel="stylesheet" type="text/css" />
	<title>log in</title>
</head>
<body>
    <form action="logphp.php" method="post" name="form" class="form-box">
	<div class="header" >
		<h1 align="center" style="background-color:Tomato;" >Log In</h1>
	</div>

		<div class="button">
			<br><br>
			<input type="email" name="email" placeholder="Email id"  style="width:250px; height:30px;" required=
			
			"required">
		</div>
		<div  class="button">
			<br><br>
			<input type="password" placeholder="enter your password" name="password" style="width:250px; height:30px;" required >
		</div>
	   <br><div class="button"><span><span><input style="padding:10px;border:none;font-size:18px;border-radius:2px;background:red;color:white;" type="submit" name="submit" value="submit"></span></span></div>

	</form>
	<div class="button">
	<br><br>
	<p>Not yet registered?<a href="signup.php"><b>Click here!<b></a></p>
	</div>
</body>
</html>