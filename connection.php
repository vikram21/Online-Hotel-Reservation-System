  <?php
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