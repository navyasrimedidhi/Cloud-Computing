<?php

$username = "root";
$password = "Ashburn@20148";
$database = "Project";

$first = $_GET['first'];
$con=mysqli_connect('localhost', $username, $password,$database);
$query = "SELECT CustID FROM CustomerTable where FullName = '$first'";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 0)
{
	echo "Name not found in database";
}
else{
while ($row = $result->fetch_row()) {
  $cid = $row[0];
}
}
echo "<p><b>Custname : $first Cust id = $cid</b></p>";
$squery = "Select ItemID from ShipmentTable where CustID = '$cid'";
$sresult = mysqli_query($con,$squery);
if (mysqli_num_rows($sresult) == 0)
{
	echo "Item not found in database";
}
else
{
while ($row = $sresult->fetch_row()) {
  $iid = $row[0];
}
}
if($iid!=null)
{
$nquery = "Select ItemName from ItemTable where ItemID = '$iid'";
$nresult = mysqli_query($con,$nquery);
if (mysqli_num_rows($nresult) == 0)
{
	echo "Item not found in database";
}
else
{
while ($row = $nresult->fetch_row()) {
  $iname = $row[0];
echo "<p> item names : $iname</p>";
}
}
}
else
{
echo "<p>Customer : $first doesnot have any items purchased.</p>";
}
  echo "<p><b>Customer : $first has purchased items \n</b><b>Item Id: $iid Item Name: $iname</b></p>\n\n";


mysqli_close($con);

?>
