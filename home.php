<?php
session_start();

if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login']['logged_in'])){

  echo "Im your Home.<br>";

  echo isset($_SESSION['success_msg'])?$_SESSION['success_msg']:"";
  echo "<br>";
  echo "Hello, " . $_SESSION['user_login']['login_data']->username;
  echo "<br>";
  echo 'To Logout Please <a href="http://localhost/simple-php-login-system/logout.php">Click Here</a>';


} else {

  $_SESSION['error_msg'] = "Please Login again.";
  header('Location: index.php');
  exit;
}


// echo "<pre>";
// print_r($_SESSION);

?>
