<?php
  //connection with database
  session_start();
  if (isset($_GET['function']) == "logout") {
    session_unset();
    setcookie("user", "", time() - 3600);
    header("Location: http://localhost/Login-Register-Template/index.php");
  }
  
  $link = mysqli_connect("localhost","root","","registered users");
  
  if (mysqli_connect_errno()) {
    print_r(musqli_connect_error());
    exit();
  }

?>
