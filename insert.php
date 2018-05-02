<?php
require("phpsqlsearch_dbinfo.php");


$connection=mysqli_connect ($ipaddress, $username, $password, $database);
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
$Company = mysqli_real_escape_string($connection, $_REQUEST['company']);
$Website = mysqli_real_escape_string($connection, $_REQUEST['website']);
$Title = mysqli_real_escape_string($connection, $_REQUEST['title']);
$Address = mysqli_real_escape_string($connection, $_REQUEST['address']);
$Latitude = mysqli_real_escape_string($connection, $_REQUEST['latitude']);
$Longitude = mysqli_real_escape_string($connection, $_REQUEST['longitude']);
$Type = mysqli_real_escape_string($connection, $_REQUEST['type']);

$sql = "INSERT INTO `markers`(`Student Number`, `Name`, `JobName`, `website`, `Address`, `Latitude`, `Longitude`, `Type`, `Title`) VALUES ('$StudentNumber', '$Name', '$Company', '$Website', '$Address', '$Latitude', '$Longitude', '$Type', '$Title')";

if(!mysqli_query($connection, $sql)){
  echo 'Not Inserted';
}
else{
  echo 'Inserted';
}

header("refresh:2; url=index.html");
?>
