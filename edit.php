<?php
  require("phpsqlsearch_dbinfo.php");
  session_start();
  $connection=mysqli_connect ($ipaddress, $username, $password, $database);
  if (!$connection)
  {
    die("Not connected : " . mysql_error());
  }

  $db_selected = mysqli_select_db($connection, $database);
  if (!$db_selected)
  {
    die ("Can\'t use db : " . mysql_error());
  }

  if(isset($_POST['edit'])){
    $pointnum = $_POST['pointnum'];
    //mysqli_real_escape_string($connection, $_REQUEST['pointnum']);

    $sql = "SELECT * FROM markers WHERE pointnum = '$pointnum'";
    $result = mysqli_query($connection,$sql);
    $row = @mysqli_fetch_assoc($result);
    
    if(!$result)
    {
      echo 'Not Modified';
    }
    else{
      echo 'Modified';
    }
  }
  header("refresh:2; url=remove.php");
?>
