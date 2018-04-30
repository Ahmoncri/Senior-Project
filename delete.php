<?php
  require("phpsqlsearch_dbinfo.php");
  session_start();
  $connection=mysqli_connect ("127.0.0.1", $username, $password, $database);
  if (!$connection)
  {
    die("Not connected : " . mysql_error());
  }

  $db_selected = mysqli_select_db($connection, $database);
  if (!$db_selected)
  {
    die ("Can\'t use db : " . mysql_error());
  }

  if(isset($_POST['delete'])){
    $pointnum = $_POST['pointnum'];
    //mysqli_real_escape_string($connection, $_REQUEST['pointnum']);

    $sql = "DELETE FROM markers WHERE pointnum = '$pointnum'";
    $result = mysqli_query($connection,$sql);

    if(!$result)
    {
      echo 'Not Deleted';
    }
    else{
      echo 'Deleted';
    }
  }
  header("refresh:2; url=remove.php");
?>
