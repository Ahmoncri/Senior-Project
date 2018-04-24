<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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

<script>

  function geocode(){
    //e.preventDefault();
    var locationForm = document.getElementById('location-form');
    var location = document.getElementById('location-input').value;

    axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
      params:{
        address:location,
        key:'AIzaSyDjRxIad1m3RzTAn01DyqZKC1CVbQ_nLuw'
      }
    })

    .then(function(response){
      console.log(response);

    var latitude = response.data.results[0].geometry.location.lat;
    var longitude = response.data.results[0].geometry.location.lng;
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
  })
  .catch(function(error){
    console.log(error);
  });
  //autoFill();

  function autoFill() {
      document.getElementById('latitude').value = latitude;
      document.getElementById('longitude').value = longitude;
  }
}
</script>

<form action="insert.php" method="post">
  <ul class="form-style-1">
    <li>
      <label>Full Name <span class="required">*</span></label>
        <input type="text" name="name" class="field-long" />
    </li>

    <li>
      <label>Student Number <span class="required">*</span></label>
      <input type="text" name="StudentNumber" class="field-long" />
    </li>

    <form id='location-form'>
      <li>
        <label>Address <span class="required">*</span></label>
        <input type="text" id='location-input' name="address" class="field-long" />
        <input type="button" onclick="geocode()" class="button" value="Get Latitude and Longitude" />
      </li>
    </form>

    <li>
      <label>Latitude <span class="required">*</span></label>
      <input type="text" id='latitude' name="latitude" class="field-long" />
    </li>

    <li>
      <label>Longitude <span class="required">*</span></label>
      <input type="text" id='longitude' name="longitude" class="field-long" />
    </li>

    <li>
      <label>Type </label>
      <select name="type" class="field-select">
        <option value="Job">Job</option>
        <option value="PaidInternship">Paid Internship</option>
        <option value="UnpaidInternship">Unpaid Internship</option>
      </select>
    </li>

    <li>
      <input type="submit" value="Submit" />
    </li>
  </ul>
</form>
<a href = "logout.php";>Log Out</a>
