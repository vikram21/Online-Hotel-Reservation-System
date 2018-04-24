<!DOCTYPE html>
<html>
<body>
<?php
$col=0;
$comp=0;
$rooms = array
   (
  array(0,0,0,1,0,0,1),
  array(3,2,1,0,1,0,1),
  array(2,1,0,0,0,2,1),
  array(2,1,0,0,0,0,1)
  );
  $rooms2 = array
   (
  array(0,0,0,1,0,0,1),
  array(1,1,1,0,1,0,1),
  array(1,1,0,0,0,1,1),
  array(1,1,0,0,0,0,1)
  );
 $n=2;
 $d=0;
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
	   for($k=$col;$k<$greatest+$col;$k++)
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
?>
</body>
</html>