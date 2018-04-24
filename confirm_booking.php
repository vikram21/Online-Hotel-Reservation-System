<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="style.css" rel="stylesheet" type="text/css" />
    <link href="layout.css" rel="stylesheet" type="text/css" />
	<title>Booking confirmation</title>
</head>
<body>
<?php
session_start();
$in=$_SESSION['in'];
$out=$_SESSION['out'];
$r=$_SESSION['r'];
//for confirmation
$name=$_SESSION['name'];
$country=$_SESSION['country'];
$phone=$_SESSION['phone'];
$email=$_SESSION['email'];
$csid=$_SESSION['id'];
$total=$_SESSION['total'];
$xyz=$r;
//$in=$_POST["in"];
	//$out=$_POST["out"];
	$col=$in-1;
	$coll=$col;
	$n=$out-$in;
	
	//$n=2;
	//$col=0;
	$col2=$col;
	//$r=7;
	$t=0;
	if($r%2==0)
	{
	$a=floor($r/2);
	$b=0;
	}
	else
	{
	$a=floor($r/2);
	$b=1;
	}
$connection=mysqli_connect('localhost','root','');
	if(!$connection) 
	{
		die ("DATABASE CONNECTION FAILED:".mysqli_error($connection));
	}
	$select_db=mysqli_select_db($connection,'project');
	if(!$select_db)
	{
		die("DATABASE SELECTION FAILED:".mysqli_error($connection));
	}
	$ar=array(array());
	$ar2=array(array());
	$a1=array(array());
	$query1="select * from table_1";
	$result1=mysqli_query($connection,$query1) or die(mysqli_error($connection));

	$count1=0;
	while (($row = mysqli_fetch_assoc($result1))) 
	{
    $a1[$count1][0]=$row['day_1'];
	 $a1[$count1][1]=$row['day_2'];
	  $a1[$count1][2]=$row['day_3'];
	   $a1[$count1][3]=$row['day_4'];
	   $a1[$count1][4]=$row['day_5'];
	  $a1[$count1][5]=$row['day_6'];
	   $a1[$count1][6]=$row['day_7'];
	   $count1++;
	   
    }
	$a2=array(array());
	$query2="select * from table_2";
	$result2=mysqli_query($connection,$query2) or die(mysqli_error($connection));

	$count2=0;
	while (($row = mysqli_fetch_assoc($result2))) 
	{
    $a2[$count2][0]=$row['day_1'];
	 $a2[$count2][1]=$row['day_2'];
	  $a2[$count2][2]=$row['day_3'];
	   $a2[$count2][3]=$row['day_4'];
	   $a2[$count2][4]=$row['day_5'];
	  $a2[$count2][5]=$row['day_6'];
	   $a2[$count2][6]=$row['day_7'];
	   $count2++;
	   
    }
	$a3=array(array());
	$query3="select * from table_3";
	$result3=mysqli_query($connection,$query3) or die(mysqli_error($connection));

	$count3=0;
	while (($row = mysqli_fetch_assoc($result3))) 
	{
    $a3[$count3][0]=$row['day_1'];
	 $a3[$count3][1]=$row['day_2'];
	  $a3[$count3][2]=$row['day_3'];
	   $a3[$count3][3]=$row['day_4'];
	   $a3[$count3][4]=$row['day_5'];
	  $a3[$count3][5]=$row['day_6'];
	   $a3[$count3][6]=$row['day_7'];
	   $count3++;
	   
    }
	$a4=array(array());
	$query4="select * from table_4";
	$result4=mysqli_query($connection,$query4) or die(mysqli_error($connection));

	$count4=0;
	while (($row = mysqli_fetch_assoc($result4))) 
	{
    $a4[$count4][0]=$row['day_1'];
	 $a4[$count4][1]=$row['day_2'];
	  $a4[$count4][2]=$row['day_3'];
	   $a4[$count4][3]=$row['day_4'];
	   $a4[$count4][4]=$row['day_5'];
	  $a4[$count4][5]=$row['day_6'];
	   $a4[$count4][6]=$row['day_7'];
	   $count4++;
	   
    }
	//retrieve complete
	$avail=1;
	for($z=1;$z<=$a;$z++)
	{
		
	if($n>7)
   {
	   $avail=0;
   //echo "sorry rooms are not available";
   exit();
   
   
   
}
$comp=0;
 
 while($col<7||$col<$n)
{$greatest=0;
for ($row = 0; $row< 8; $row++)
   {
   if($a4[$row][$col]>$greatest)
   {
   $greatest=$a4[$row][$col];
   if($greatest==$n)
   {break;}
   }}
   $comp=$comp+$greatest;
  if($greatest==0){
   $avail=0;
    exit("rooms not available");}
   

if($comp>=$n){
   // echo "rooms available";
//echo "ROOMS AVAILABLE";

break;
    }
  if($comp>6)
{//echo "rooms not avilable";
$avail=0;exit();
}
   $col=$greatest+$col;
if($col>6)
{//echo "rooms not available";
$avail=0;
 exit();
 
}
   
   }
   //availability complete
   $comp=0;$d=0;$m=0;
   if($avail==1)
   {
    while($col<$n||$col<7)
{$greatest=0;
for ($row = 0; $row< 8; $row++)
   {
   if($a4[$row][$col]>$greatest)
   {
   $greatest=$a4[$row][$col];
   $r=$row;
   $c=$col;
   if($greatest==$n)
   {
	   break;
   }
   }}
   $comp=$comp+$greatest;
   $d++;
   if($d>1)
   {
	   //echo "no";
	  for($j=$col;$j<$greatest+$col;$j++)
	  {
		  $a3[$r][$j]=0;
		  $m++;
		  if($m==$n)
		  {
			  break;
	      }
	  }
   }
   if($d==1 && $n<=$greatest)
   {//echo "yes";
	   for($k=$col;$k<$col+$n;$k++)
	   {
		  $a3[$r][$k]=0; 
		  $m++;
		  if($m==$n)
		  {
			  break;
	      }
	   }
   }
   else{
	   for($k=$col;$k<$col+$greatest;$k++)
	   {
		  $a3[$r][$k]=0; 
		  $m++;
		  if($m==$n)
		  {
			  break;
	      }
	   }
   }
  if($greatest==0){
   
    break;}
   

if($comp>=$n){
    //echo "rooms available";
break;
    }
  if($comp>6)
{//echo "rooms not avilable";
break;
}
   $col=$greatest+$col;
if($col>6)
{//echo "rooms not available";
 break;
 
}
  }
  for($j=0;$j<8;$j++)
	{
	for($i=0;$i<7;$i++)
	{
		
		$ar[$j][$i]=$a3[$j][$i];
	}
	}
  $t++;
  for($j=0;$j<8;$j++)
	{
	for($i=6;$i>=0;$i--)
	{
		if($i<6)
		{
			$x=$ar[$j][$i+1];
		}

		if($i==6 || $ar[$j][$i]==0)
		{
		 continue;
		}
		else
		{
		$ar[$j][$i]=$ar[$j][$i]+$x;		
		}
		
	}
	}
	for($j=0;$j<8;$j++)
	{
	for($i=0;$i<7;$i++)
	{
		
		$a4[$j][$i]=$ar[$j][$i];
	}
	}
	}
	else
	{
		//echo "rooms not available";
		exit();
		
	}
	}
	//double room complete
	$avail2=1;
	
	if($b==1)
	{
		if($n>7)
   {
	   $avail2=0;
   //echo "sorry rooms are not available"; 
   exit();
   
   
   
}
//echo "first";
 $comp=0;
 $col=$coll;
 while($col<7||$col<$n)
{$greatest=0;
for ($row = 0; $row< 4; $row++)
   {
   if($a2[$row][$col]>$greatest)
   {
   $greatest=$a2[$row][$col];
   if($greatest==$n)
   {
	   break;
   }
   }}
   $comp=$comp+$greatest;
  if($greatest==0){
   $avail=0;
    exit("rooms not available");}
   

if($comp>=$n){
   // echo "rooms available";
//echo "ROOMS AVAILABLE";
break;

    }
	//echo "second";
 if($comp>6)
{
	//echo "rooms not avilable";
$avail2=0;exit();
}
   $col=$greatest+$col;
if($col>6)
{
	//echo "rooms not available";
$avail2=0;
 exit();
 
}

 
  /* if($n>7)
   {
   echo "sorry rooms are not available";
   exit();*/
}
 $comp=0;
 $col=$coll;
 $d=0;$m=0;
 while($col<$n||$col<7)
{$greatest=0;
for ($row = 0; $row< 4; $row++)
   {
   if($a2[$row][$col]>$greatest)
   {
   $greatest=$a2[$row][$col];
   $r=$row;
   $c=$col;
   if($greatest==$n)
   {
	   break;
   }
   }}
   $comp=$comp+$greatest;
   $d++;
   if($d>1)
   {
	  // echo "no";
	  for($j=$col;$j<$greatest+$col;$j++)
	  {
		  $a1[$r][$j]=0;
		  $m++;
		  if($m==$n)
		  {
			  break;
	      }
	  }
   }
   if($d==1 && $n<=$greatest)
   {
	   //echo "yes";
	   for($k=$col;$k<$col+$n;$k++)
	   {
		  $a1[$r][$k]=0;
          $m++;
          if($m==$n)
		  {
			  break;
	      }		  
	   }
   }
   else{
	   for($k=$col;$k<$col+$greatest;$k++)
	   {
		  $a1[$r][$k]=0; 
		  $m++;
		  if($m==$n)
		  {
			  break;
	      }
	   }
   }
  if($greatest==0){
   
    break;}
   

if($comp>=$n){
    //echo "rooms available";
break;
    }
  if($comp>6)
{//echo "rooms not avilable";
break;
}
   $col=$greatest+$col;
if($col>6)
{//echo "rooms not available";
 break;
 
}
   
   }

   
   
   for($j=0;$j<4;$j++)
	{
	for($i=0;$i<7;$i++)
	{
		
		$ar2[$j][$i]=$a1[$j][$i];
	}
	}
  
  for($j=0;$j<4;$j++)
	{
	for($i=6;$i>=0;$i--)
	{
		if($i<6)
		{
			$x=$ar2[$j][$i+1];
		}

		if($i==6 || $ar2[$j][$i]==0)
		{
		 continue;
		}
		else
		{
		$ar2[$j][$i]=$ar2[$j][$i]+$x;		
		}
		
	}
	}
	for($j=0;$j<4;$j++)
	{
	for($i=0;$i<7;$i++)
	{
		
		$a2[$j][$i]=$ar2[$j][$i];
	}
	}
	}
		
		//echo $t;
		//echo $a;
		//echo $avail2;
	
	/*if($t==$a&&$avail2==1)
	{
		//echo "confirm booking";
	}
	for($l=0;$l<4;$l++)
   {
	   for($m=0;$m<7;$m++)
	   {
	   echo $a1[$l][$m];
	   }
	   echo "<br>";
   }
   for($l=0;$l<4;$l++)
   {
	   for($m=0;$m<7;$m++)
	   {
	   echo $a2[$l][$m];
	   }
	   echo "<br>";
   }
   for($l=0;$l<8;$l++)
   {
	   for($m=0;$m<7;$m++)
	   {
	   echo $a3[$l][$m];
	   }
	   echo "<br>";
   }
   for($l=0;$l<8;$l++)
   {
	   for($m=0;$m<7;$m++)
	   {
	   echo $a4[$l][$m];
	   }
	   echo "<br>";
   }*/
for($i=0;$i<4;$i++)
	{
			
			$a=$a1[$i][0];
			$b=$a1[$i][1];
			$c=$a1[$i][2];
			$d=$a1[$i][3];
			$e=$a1[$i][4];
			$f=$a1[$i][5];
			$g=$a1[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_1` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	for($i=0;$i<4;$i++)
	{
			
			$a=$a2[$i][0];
			$b=$a2[$i][1];
			$c=$a2[$i][2];
			$d=$a2[$i][3];
			$e=$a2[$i][4];
			$f=$a2[$i][5];
			$g=$a2[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_2` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	for($i=0;$i<8;$i++)
	{
			
			$a=$a3[$i][0];
			$b=$a3[$i][1];
			$c=$a3[$i][2];
			$d=$a3[$i][3];
			$e=$a3[$i][4];
			$f=$a3[$i][5];
			$g=$a3[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_3` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	for($i=0;$i<8;$i++)
	{
			
			$a=$a4[$i][0];
			$b=$a4[$i][1];
			$c=$a4[$i][2];
			$d=$a4[$i][3];
			$e=$a4[$i][4];
			$f=$a4[$i][5];
			$g=$a4[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_4` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	?>
	
  <!-- //
   //confirmation page to user(online bill)-->
   <div class="header" >
		<h1 align="center" style="background-color:Tomato;" >Booking Confirmation</h1>
	</div>
<br>
 <h2 align="right" style="backgraound-color:Green"> <a href="destroy.php"><b> LOG OUT</b></a></h2>
<div align="center" style="background-color:lightblue;">
            <div class="container">
			<br><br>
			<h3> <b>Customer Name : </b><?php echo $name ?></h3><br>
			<h3> <b>Booking Id :</b><?php echo $email ?></h3><br>
			<h3> <b>Customer ID :</b><?php echo $csid ?></h3><br>
			<h3> <b>Check In:</b><?php echo $in ?> May 2018</h3><br>
            <h3> <b>Check Out:</b><?php echo $out ?> May 2018</h3><br>
            <h3> <b>No Of Persons:</b><?php echo $xyz ?> </h3><br>	
		    <h3> <b>Phone number:</b><?php echo $phone ?></h3><br>
		    <h3> <b>Country :</b><?php echo $country ?></h3><br>
			<h3> <b>Amount paid :</b><?php echo $total ?><h3><br>
						
            </div>
			</div>
			
<h3 align="center"> Your booking is confirmed Enjoy your Day!<h4>
  

</body>
</html>