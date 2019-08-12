<?php
include("functions.php");
include("connect.php");

if (isset($_SESSION['id']) || isset($_COOKIE['user'])) {
  header("Location: http://localhost/Login-Register-Template/cp.php");
}
include("header.php");
if (isset($_GET['action'])) {
  if($_GET['action'] == 'login') {
    include("login.php");
  }
  else {
    include("register.php");
  }
}
else {
  include("main.php");
}

include("footer.php");
?>
