
<?php/*
 include('phpsqlsearch_dbinfo.php');
 session_start();

 $user_check = $_SESSION['login_user'];

 $ses_sql = mysqli_query($db,"select username from administrator where username = '$user_check' ");

 $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

 $login_session = $row['username'];

 if(!isset($_SESSION['login_user'])){
    header("location:login.php");
 }
 */
?>
  <form action="insert.php" method="post">
    Student Number : <input type="text" name="StudentNumber">
    <br>
    Name : <input type="text" name="name">
    <br>
    Address : <input type="text" name="address">
    <br>
    Latitude : <input type="text" name="latitude">
    <br>
    Longitude : <input type="text" name="longitude">
    <br>
    Type : <input type="text" name="type">
    <br>
    <input type="submit" value="Submit">
  </form>
