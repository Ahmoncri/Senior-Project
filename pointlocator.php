<?php
require("phpsqlsearch_dbinfo.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a mySQL server
$connection=mysqli_connect ($ipaddress, $username, $password, $database);
if (!$connection) {
  die("Not connected : " . mysql_error());
}
// Set the active mySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}
// Search the rows in the markers table
$query = sprintf("SELECT 'Student Number', name, JobName, website, title, address, latitude, longitude, ( 6371 * acos( cos( radians('%s') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( latitude ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($connection, $center_lat),
  mysqli_real_escape_string($connection, $center_lng),
  mysqli_real_escape_string($connection, $center_lat),
  mysqli_real_escape_string($connection, $radius));
$result = mysqli_query($connection, $query);

if (!$result) {
  die("Invalid query: " . mysqli_error());
}
// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  $offset = rand(0,1000)/10000000;
  $offset2 = rand(0,1000)/10000000;
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("StudentNumber", $row['Student Number']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("jobname", $row['JobName']);
  $newnode->setAttribute("website", $row['website']);
  $newnode->setAttribute("title", $row['title']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("latitude", $row['latitude'] + $offset);
  $newnode->setAttribute("longitude", $row['longitude'] + $offset2);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>
