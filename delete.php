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

$pointnum = mysqli_real_escape_string($connection, $_REQUEST['pointnum']);

$sql = "DELETE FROM `markers` WHERE pointnum = $pointnum";

if(!mysqli_query($connection, $sql)){
  echo 'Not Deleted';
}
else{
  echo 'Deleted';
}

header("refresh:2; url=index.html");
?>
