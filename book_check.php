<html>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 70%;
	align: center;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 10px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 14px;
    padding-bottom: 14px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	//CREATE CONNECTION
	$phone=$_POST['phone'];
	$conn=new mysqli($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if($conn->connect_error)
	{
		die("CONNECTION FAILED:".$conn->connect_error);
	}
		
      //execute the SQL query and return records
	  $query="select * from `customer` where `phone`= '$phone'";
      $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
      ?>
      <table id="customers" >
      <thead>
        <tr>
          <th>Name:</th>
          <th>Telephone</th>
          <th>Email Id</th>
          <th>country</th>
          <th>id no</th>
          <th>Checkin</th>
		  <th>checkout</th>
        </tr>
      </thead>
      <tbody>
        <?php
		$var1=" May 2018";
		$var2=" May 2018";
          while( $row = mysqli_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>".$row['name']."</td>
              <td>".$row['phone']."</td>
              <td>".$row['email']."</td>
              <td>".$row['country']."</td>
			  <td>".$row['id']."</td>
              <td>".$row['check_in'].$var1."</td>
              <td>".$row['check_out'].$var2."</td> 
            </tr>\n";
          }
        ?>
		<br>
      </tbody>
    </table>
     <?php 
	$conn->close(); ?>
	
	<br><br>
	<h3> Back to homepage<a href="index.html"><b>..click Here</b></h3>
</html>