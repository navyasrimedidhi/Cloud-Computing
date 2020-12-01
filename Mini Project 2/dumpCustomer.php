<?php

$username = "root";
$password = "Ashburn@20148";
$database = "Project";

$con=mysqli_connect('localhost', $username, $password,$database);

if(! $con ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';

$query = "select * from CustomerTable";
$result = mysqli_query($con,$query);


echo "<h3>List of all Customers</h3>\n\n";
while ($row = $result->fetch_row()) {
  $CustID = $row[0];
  $FullName = $row[1];
  $Street = $row[2];
  $City = $row[3];
  $State = $row[4];
  $Zipcode = $row[5];
  $Telephone = $row[6];
  

 echo "<p><b>Full Name: $FullName</b><br>\n Customer ID:$custid<br/>\nStreet: $Street<br/>\nCity: $City<br/>\nState: $State<br/>\nZipcode: $Zipcode<br/>\nTelephone: $Telephone<br/>\n<br/></p>\n\n"; 
}
mysqli_close($con);

?>
