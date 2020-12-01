<?php

$username = "root";
$password = "Ashburn@20148";
$database = "Project";

$con=mysqli_connect('localhost', $username, $password,$database);

if(! $con ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';

$query = "select * from ItemTable";
$result = mysqli_query($con,$query);


echo "<h3>List of all Items</h3>\n\n";
while ($row = $result->fetch_row()) {
  $ItemID = $row[0];
  $ItemName = $row[1];
  $Price = $row[2];

 echo "<p><b>ItemID: $ItemID</b><br>\n ItemName:$ItemName<br/>\nPrice: $Price<br/></p>\n\n"; 
}
mysqli_close($con);

?>
