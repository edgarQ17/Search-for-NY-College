<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
 <body>
 <?php
   $host = "localhost";
   $port = 3308;
   $username = "root";
   $password = "";
   $database = "searchCuny";

   $conn = new mysqli($host, $username, $password, $database, $port);
  // Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>
<div class="d-flex justify-content-center">
<h1>Search Cuny Colleges</h1>
</div>

<form  action="" method="post">
<input type="text" name="name" placeholder="Search" class="form-control rounded">
<button type="submit" name="submit" class="btn btn-outline-primary">search</button>
</form>

    <!-- "<div class='column'>"."<img src='images/".$row['Book Cover Image']."'"."alt='chinatown' class='img'>"."</div>"; -->
    <br/>
    <br/>
    <br/>


 

<?php
 if ( isset( $_POST['submit']) && $_POST['name'] != ""  ) {
      $choice = $_POST['name']; 
    
   $sql = "SELECT * FROM cuny_colleges where College='$choice'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo  " <table class='table'>
    <thead class='thead-dark'>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>College</th>
        <th scope='col'>Address</th>
        <th scope='col'>City</th>
        <th scope='col'>State</th>
        <th scope='col'>Zip Code</th>
        <th scope='col'>Telephone</th>
        <th scope='col'>Website</th>
      </tr>
    </thead>
    <tbody>";
    // output data of each row
    if($row = $result->fetch_assoc()) {
        echo "<div class='column'><h1>".$row['College']."</h1></div>";
      echo "<tr>
        <th scope='row'>".$row['ID']."</th>
        <td>".$row['College']."</td>
        <td>".$row['Address']."</td>
        <td>".$row['City']."</td>
        <td>".$row['State']."</td>
        <td>".$row['Zip Code']."</td>
        <td>".$row['Telephone']."</td>
        <td>".$row['website']."</td>
      </tr>
    </tbody>
    </table>";






      }
  } }else {
    echo "0 results";
  }
  $conn->close();
  ?>




</body>
</html>
