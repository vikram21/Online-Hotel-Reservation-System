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
	$ar=array(array());
	
	

	
	//$femail=$_POST['email'];
	//$ppword=$_POST['pword'];
     $query="select * from table_2";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	//$row = mysql_fetch_array($result, MYSQL_NUM)
	//$count=mysqli_num_rows($result);
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
	$query="select * from table_1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	//$row = mysql_fetch_array($result, MYSQL_NUM)
	//$count=mysqli_num_rows($result);
	$count=0;
	while (($row = mysqli_fetch_assoc($result))) 
	{
    $rooms2[$count][0]=$row['day_1'];
	 $rooms2[$count][1]=$row['day_2'];
	  $rooms2[$count][2]=$row['day_3'];
	   $rooms2[$count][3]=$row['day_4'];
	   $rooms2[$count][4]=$row['day_5'];
	  $rooms2[$count][5]=$row['day_6'];
	   $rooms2[$count][6]=$row['day_7'];
	   $count++;
	   
    }

$comp=0;
 $d=0;
 $r=0;
   if($n>7)
   {
   echo "sorry rooms are not available";
   exit();
}
 
 while($col<$n||$col<7)
{$greatest=0;
for ($row = 0; $row< 4; $row++)
   {
   if($rooms[$row][$col]>$greatest)
   {
   $greatest=$rooms[$row][$col];
   $r=$row;
   $c=$col;
   }}

   $comp=$comp+$greatest;
   $d++;
   if($d>1)
   {
	   echo "no";
	  for($j=$col;$j<$greatest+$col;$j++)
	  {
		  $rooms2[$r][$j]=0;
	  }
   }
   if($d==1)
   {echo "yes";
	   for($k=$col;$k<$n+$col;$k++)
	   {
		  $rooms2[$r][$k]=0; 
	   }
   }
   
  if($greatest==0){
   
    break;}
   

if($comp>=$n){
    echo "rooms available";
break;
    }
  if($comp>6)
{echo "rooms not avilable";break;
}
   $col=$greatest+$col;
if($col>6)
{echo "rooms not available";
 break;
 
}
   
   }
   for($l=0;$l<4;$l++)
   {
	   for($m=0;$m<7;$m++)
	   {
	   echo $rooms2[$l][$m];
	   }
	   echo "<br>";
   }
   
	
	for($i=0;$i<4;$i++)
	{
			
			$a=$rooms2[$i][0];
			$b=$rooms2[$i][1];
			$c=$rooms2[$i][2];
			$d=$rooms2[$i][3];
			$e=$rooms2[$i][4];
			$f=$rooms2[$i][5];
			$g=$rooms2[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_1` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	//CODE 2
	
	$ar=array(array());
    $query="select * from table_1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	
	$count=0;
	while (($row = mysqli_fetch_assoc($result))) 
	{
    $ar[$count][0]=$row['day_1'];
	 $ar[$count][1]=$row['day_2'];
	  $ar[$count][2]=$row['day_3'];
	   $ar[$count][3]=$row['day_4'];
	   $ar[$count][4]=$row['day_5'];
	  $ar[$count][5]=$row['day_6'];
	   $ar[$count][6]=$row['day_7'];
	   $count++;
	   
    }
	
	for($j=0;$j<4;$j++)
	{
	for($i=6;$i>=0;$i--)
	{
		if($i<6)
		{
			$x=$ar[$j][$i+1];
		}

		if($i==6 || $ar[$j][$i]==0 )
		{
		continue;
		}
		else
		{
		$ar[$j][$i]=$ar[$j][$i]+$x;		
		}
		
	}
	}
	for($i=0;$i<4;$i++)
	{
			
			$a=$ar[$i][0];
			$b=$ar[$i][1];
			$c=$ar[$i][2];
			$d=$ar[$i][3];
			$e=$ar[$i][4];
			$f=$ar[$i][5];
			$g=$ar[$i][6];
			$id=$i+1;
			$sql="UPDATE `table_2` SET  `day_1`= $a ,`day_2`= $b,`day_3`= $c,`day_4`= $d ,`day_5`=$e,`day_6`=$f,`day_7`=$g WHERE `id`=$id ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
		
		
	}
	
	
?>
</body>
</html>