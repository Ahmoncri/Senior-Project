
<?php
require("phpsqlsearch_dbinfo.php");

$connection=mysqli_connect ("127.0.0.1", $username, $password, $database);
if (!$connection) {
  die("Not connected : " . mysql_error());
}
// Set the active mySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

$StudentNumber = mysqli_real_escape_string($connection, $_REQUEST['StudentNumber']);
$Name = mysqli_real_escape_string($connection, $_REQUEST['name']);
$Address = mysqli_real_escape_string($connection, $_REQUEST['address']);
$Latitude = mysqli_real_escape_string($connection, $_REQUEST['latitude']);
$Longitude = mysqli_real_escape_string($connection, $_REQUEST['longitude']);
$Type = mysqli_real_escape_string($connection, $_REQUEST['type']);

$sql = "INSERT INTO `markers`(`Student Number`, `Name`, `Address`, `Latitude`, `Longitude`, `Type`) VALUES ('$StudentNumber', '$Name', '$Address', '$Latitude', '$Longitude', '$Type')";

if(!mysqli_query($connection, $sql)){
  echo 'Not Inserted';
}
else{
  echo 'Inserted';
}

header("refresh:2; url=index.html");
?>
