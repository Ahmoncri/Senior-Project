<link rel="stylesheet" href="add.css">

<?php
  include('phpsqlsearch_dbinfo.php');
  session_start();
  $connection=mysqli_connect("127.0.0.1", $username, $password, $database);

  $user_check = $_SESSION['login_user'];

  $ses_sql = mysqli_query($connection,"select username from administrator where username = '$user_check' ");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $login_session = $row['username'];

  if(!isset($_SESSION['login_user'])){
    header("location:login.php");
  }
?>
<!--<form action="delete.php" method="post">
  <ul class="form-style-1">
    <li>
      <label>Point Number <span class="required">*</span></label>
      <input type="text" id='pointnum' name='pointnum' class="field-long" />
    </li>
    <li>
      <input type="submit" value="Submit" />
    </li>
  </ul>
</form>
<a href = "logout.php";>Log Out</a>-->
<?php

$result = mysqli_query($connection,"SELECT * FROM markers");

echo
"<link data-require='bootstrap@*' data-semver='4.0.5' rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css' />
<link data-require='bootstrap-css@*'' data-semver='4.0.0-alpha.4' rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css' />

<style>
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>";

echo "<table class='gridtable' align='center' border='1'>
  <tr>
    <th>Name</th>
    <th>Student Number</th>
    <th>Address</th>
    <th>Type</th>
    <th>Point Number</th>
  </tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Student Number'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['pointnum'] . "</td>";
  echo "</tr>";
}
echo "</table>";
echo "<form action='delete.php' method='post'>
  <ul class='form-style-1' position=left>
    <li>
      <label>Point Number of Marker to Delete: <span class='required'></span></label>
      <input type='text' id='pointnum' name='pointnum' class='field-long' />
    </li>
    <li>
      <input type='submit' name='delete' value='Delete' />
    </li>
  </ul>
</form>
<a href = 'index.html';>Back to Main Menu</a><br><br>
<a href = 'logout.php';>Log Out</a>";

mysqli_close($connection);
?>
