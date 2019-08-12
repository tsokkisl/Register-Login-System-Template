<?php

include("connect.php");

//User log in
if ($_GET['action'] == "loginUser") {

  $error = "";

  if (!$_POST['logemail']) {
    $error = "Email is required ";
  }
  else if (!filter_var($_POST['logemail'], FILTER_VALIDATE_EMAIL)) {
    $error = "Email is not in a valid form ";
  }
  else if (!$_POST['logpassword']) {
      $error = "Password is required ";
  }

  if ($error != "") {
    echo $error;
    exit();
  }

  $query = "SELECT * FROM `users` WHERE Email = '".mysqli_real_escape_string($link,$_POST['logemail'])."'";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_assoc($result);

  if ($row['Password'] == md5($_POST['logpassword'])) {
    $_SESSION['id'] = $row['id'];
    if ($_POST['stayloggedin'] == '1') {
      setcookie("user", $row['id'], time() + 86400 * 30);
    }
    echo 1;
  }
  else {
    $error = "That email/password combination is wrong... please try again";
  }

  if ($error != "") {
    echo $error;
    exit();
  }
}

//User sign up
if ($_GET['action'] == "registerUser") {

  $error = "";
  if (!$_POST['regfname']) {
    $error = "First name is required ";
  }
  else if (preg_match('/[0-9]/',$_POST['regfname']) || preg_match('/[\'^£$%&*()@#~?><>,|=_+¬-]/',$_POST['regfname'])) {
    $error = "First name must contain only characters Α-Ζ , a-z";
  }
  else if (!$_POST['reglname']) {
    $error = "Last name is required ";
  }
  else if (preg_match('/[0-9]/',$_POST['reglname']) || preg_match('/[\'^£$%&*()@#~?><>,|=_+¬-]/',$_POST['reglname'])) {
    $error = "Last name must contain only characters Α-Ζ , a-z";
  }
  else if (!$_POST['regemail']) {
    $error = "Email is required ";
  }
  else if (!filter_var($_POST['regemail'], FILTER_VALIDATE_EMAIL)) {
    $error = "Email is not in a valid form ";
  }
  else if (!$_POST['regpassword']) {
    $error = "Password is required ";
  }
  else if (!$_POST['regpassword2']) {
    $error = "Confirm password is required ";
  }
  else if (!$_POST['regpassword'] != !$_POST['regpassword2']) {
    $error = "Passwords must match";
  }
  if ($error != "") {
    echo $error;
    exit();
  }

  $query = "SELECT * FROM `users` WHERE Email = '".mysqli_real_escape_string($link,$_POST['regemail'])."' LIMIT 1";
  $result = mysqli_query($link,$query);

  if (mysqli_num_rows($result) > 0 ) {
    $error = "There is already a registered user with that email";
  } 
  else {
    error_reporting(E_ERROR | E_PARSE);
    $arr = getdate();
    $date = (string)$arr['year'].'-'.(string)$arr['mon'].'-'.(string)$arr['mday'];
    $query = "INSERT INTO `users` (`First Name`,`Last Name`,`Email`,`Password`,`Registration Date`) VALUES ('".mysqli_real_escape_string($link,$_POST['regfname'])."','".mysqli_real_escape_string($link,$_POST['reglname'])."','".mysqli_real_escape_string($link,$_POST['regemail'])."','".mysqli_real_escape_string($link,md5($_POST['regpassword']))."','".$date."')";

    if (mysqli_query($link,$query)) {
      $query = "SELECT id FROM `users` WHERE Email = '".mysqli_real_escape_string($link,$_POST['regemail'])."'";
      $result = mysqli_query($link,$query);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id'];
      echo 1;
    }
    else {
      $error = "Cannot register user ... please try again later";
    }
  }

  if ($error != "") {
    echo $error;
    exit();
  }

}

?>
