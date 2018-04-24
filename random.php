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

	//$femail=$_POST['email'];
	//$ppword=$_POST['pword'];
	$query="select * from table_1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
	//$row = mysql_fetch_array($result, MYSQL_NUM)
	//$count=mysqli_num_rows($result);
	$arr = array();
	for($i=0;$i<28;$i++)
		$arr[$i]=1;
	/*while (($row = mysqli_fetch_assoc($result))) 
	{
		
		$row['day_1']=1;
		$row['day_2']=1;
		$row['day_3']=1;
		$row['day_4']=1;
		$row['day_5']=1;
		$row['day_6']=1;
		$row['day_7']=1;
    array_push($arr, $a, $b, $c, $d,$e,$f,$g);
    }*/
    for($i=0;$i<28;$i++)
	 echo $arr[$i].'  ';
    for($i=0;$i<28;$i=$i+7)
	{
	 $sql="insert into table_1 values ('".$arr[$i]."','".$arr[$i+1]."','".$arr[$i+2]."','".$arr[$i+3]."','".$arr[$i+4]."','".$arr[$i+5]."','".$arr[$i+6]."')";
     $result2=mysqli_query($connection,$sql) or die(mysqli_error($connection));
	}
/*$y=0;
for($j=0;$j<4;$j++)
{
	for($k=0;$k<5;$k++)
	{
		$new[$j][$k]=$arr[$y];
		$y++;
	}
}
for($j=0;$j<4;$j++)
{
	for($k=0;$k<5;$k++)
	{
		echo $new[$j][$k].' ';
		
	}
}
for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 4; $col++) {
    echo "<li>".$arr[$row][$col]."</li>";
  }
  echo "</ul>";
}*/

	
?>