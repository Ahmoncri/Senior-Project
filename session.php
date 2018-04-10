<?php
include("phpsqlsearch_dbinfo.php");
session_start();
$connection=mysqli_connect("127.0.0.1", $username, $password, $database);

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($connection,"select username from admin where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
