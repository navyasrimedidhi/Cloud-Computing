<?php

$username = "root";
$password = "Ashburn@20148";
$database = "Project";

$first = $_GET['first'];
$con=mysqli_connect('localhost', $username, $password,$database);
$query = "SELECT ItemID FROM ItemTable where ItemName = '$first'";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 0)
{
	echo "Name not found in database";
}
else{
while ($row = $result->fetch_row()) {
  $iid = $row[0];
}
}
$squery = "Select CustID from ShipmentTable where ItemID = '$iid'";
$sresult = mysqli_query($con,$squery);
if (mysqli_num_rows($sresult) == 0)
{
	echo "Item not found in database";
}
else
{
while ($row = $sresult->fetch_row()) {
  $cid = $row[0];
}
}
if($cid!=null)
{
$nquery = "Select FullName from CustomerTable where CustID = '$cid'";
$nresult = mysqli_query($con,$nquery);
if (mysqli_num_rows($nresult) == 0)
{
	echo "Item not found in database";
}
else
{
while ($row = $nresult->fetch_row()) {
  $cname = $row[0];
}
}
}
else
{
echo "<p>Item : $first doesnot have any Customers.</p>";
}
  echo "<p><b>Item : $first has customers : \n</b><b>Customer Id: $cid Customer Name: $cname</b></p>\n\n";


mysqli_close($con);

?>
