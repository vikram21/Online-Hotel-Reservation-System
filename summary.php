 <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>summary</title>
    </head>
    <body>
      <?php
      $username = "root";
      $password = "";
      $servername = "localhost";
      $dbname="project";
      $connector = mysqli_connect($servername,$username,$password)
          or die("Unable to connect");
        echo "Connections are made successfully::";
      $selected = mysqli_select_db( $connector,'hotel')
        or die("Unable to connect");

      //execute the SQL query and return records
	  $query="select * from customer where name='aarav'";
      $result = mysqli_query($connector,$query) or die(mysqli_error($connector));
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
      </tbody>
    </table>
     <?php mysqli_close($connector); ?>
    </body>
    </html>