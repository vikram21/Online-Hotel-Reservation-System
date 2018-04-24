<!DOCTYPE html>
<html>
<body>
<?php
$in=$_POST["in"];
	$out=$_POST["out"];
	$col=$in-1;
	$n=$out-$in;
	
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
	$rooms=array(array());
	$query="select * from table_2";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));

	$count=0;
	while (($row = mysqli_fetch_assoc($result))) 
	{
    $rooms[$count][0]=$row['day_1'];
	 $rooms[$count][1]=$row['day_2'];
	  $rooms[$count][2]=$row['day_3'];
	   $rooms[$count][3]=$row['day_4'];
	   $rooms[$count][4]=$row['day_5'];
	  $rooms[$count][5]=$row['day_6'];
	   $rooms[$count][6]=$row['day_7'];
	   $count++;
	   
    }
	

$comp=0;


   if($n>7)
   {
	   header('location:notfound.html');
   //echo "sorry rooms are not available";
   exit();
   ?>
   <p>Go to <a href="index.html">Home page</a></p>
   <?php
}
 
 while($col<7||$col<$n)
{$greatest=0;
for ($row = 0; $row< 4; $row++)
   {
   if($rooms[$row][$col]>$greatest)
   {
   $greatest=$rooms[$row][$col];
   }}
   $comp=$comp+$greatest;
  if($greatest==0){
   header('location:notfound.html');
    exit();}
   

if($comp>=$n){
   // echo "rooms available";
   header('location:check.html');
exit();
    }
  if($comp>6)
{//echo "rooms not avilable";
header('location:notfound.html');
exit();
}
   $col=$greatest+$col;
if($col>6)
{//echo "rooms not available";
header('location:notfound.html');
 exit();
 
}
   
   }
   
?>
</body>
</html>