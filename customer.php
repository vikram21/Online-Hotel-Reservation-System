<html>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$fname=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$country=$_POST["country"];
	$id=$_POST["id"];
	$in=$_POST["in"];
	$out=$_POST["out"];
        
	//CREATE CONNECTION
	$conn=new mysqli($servername,$username,$password,$dbname);
	//CHECK CONNECTION
	if($conn->connect_error)
	{
		die("CONNECTION FAILED:".$conn->connect_error);
	}
	$sql="insert into customer(name,phone,email,country,id,check_in,check_out) values('$fname','$phone','$email','$country','$id','$in','$out')";
	if($conn->query($sql)===TRUE)
	{
		
      //execute the SQL query and return records
	  $query="select * from customer where name='$fname'";
      $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
      ?>
      <table border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Name:</th>
          <th>Telephone</th>
          <th>Email Id</th>
          <th>country</th>
          <th>id no:</th>
          <th>Checkin:</th>
		  <th>checkout</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>".$row['name']."</td>
              <td>".$row['phone']."</td>
              <td>".$row['email']."</td>
              <td>".$row['country']."</td>
			  <td>".$row['id']."</td>
              <td>".$row['check_in']."</td>
              <td>".$row['check_out']."</td> 
            </tr>\n";
          }
        ?>
		<br><br>
		<p> Back to homepage<a href="index.html"><b>..click Here</b></p>
      </tbody>
    </table>
     <?php 
    }
	else
	{
		echo "ERROR: ".$sql."<br>".$conn->error;
	}
	$conn->close();
?>
</html>