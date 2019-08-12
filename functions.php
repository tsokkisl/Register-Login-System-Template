<?php
if(isset($_COOKIE['user'])) $id = $_COOKIE['user'];
else if (isset($_SESSION['id'])) $id = $_SESSION['id'];

function displayUser($i) {
  error_reporting(E_ERROR | E_PARSE);
  global $link;
  $query = "SELECT * FROM `users` WHERE id = ".mysqli_real_escape_string($link,$i)." LIMIT 1";
  $result = mysqli_query($link,$query);

  while ($row = mysqli_fetch_assoc($result)) {
    error_reporting(E_ERROR | E_PARSE);
    echo '<span style="color:red;">'.$row['First Name']." ".$row['Last Name'].'</span>';
  }
}

function displayUserDetails($i) {
  global $link;
  $query = "SELECT * FROM `users` WHERE id = ".mysqli_real_escape_string($link,$i)." LIMIT 1";
  $result = mysqli_query($link,$query);

  while ($row = mysqli_fetch_assoc($result)) {
    error_reporting(E_ERROR | E_PARSE);
    echo '<h2>User Details</h2>';
    echo '<br>';
    echo '<p><span style="font-weight:bold;">First Name :</span> '.$row['First Name'].'</p>';
    echo '<p><span style="font-weight:bold;">Last Name :</span> '.$row['Last Name'].'</p>';
    echo '<p><span style="font-weight:bold;">Email :</span> '.$row['Email'].'</p>';
    echo '<p><span style="font-weight:bold;">Date Registered :</span> '.$row['Registration Date'].'</p>';
  }
}
?>
