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
 $n=6;
   if($n>7)
   {
   echo "sorry rooms are not available";
   exit();
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
   
    exit("rooms not available");}
   echo $comp;

if($comp>=$n){
    echo "rooms available";
exit();
    }
  if($comp>6)
{echo "rooms not avilable";exit();
}
   $col=$greatest+$col;
if($col>6)
{echo "rooms not available";
 exit();
 
}
   
   }
?>
</body>
</html>