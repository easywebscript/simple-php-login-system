<?php
// set session globally
session_start();

$errorMessage = "";
if(isset($_POST['submit'])){

  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);

  if($username == "" || empty($username)){
    $errorMessage .= "Please input username. <br>";
  } else {
    $errorMessage = null;
  }

  if($password == "" || empty($password)){
    $errorMessage .= "Please input password. <br>";
  } else {
    $errorMessage = null;
  }

  if($errorMessage == null){

    // echo "<pre>";
    // print_r($_POST);

    // now connect db and run select command and matched the user from db. lets go....

    $host = "localhost";
    $dbUser = "root";
    $dbPassword = "nopass";
    $dbName = "technogenius";

    $conn = mysqli_connect($host, $dbUser, $dbPassword, $dbName);

    if(!$conn) {
      echo "<script>alert('db connection error.');</script>";
      die();
    }

    $sqlQuery = "SELECT id,username,password,login_at FROM `users` WHERE `username`='$username' AND `password` = '$password' LIMIT 1";

    $result = mysqli_query($conn, $sqlQuery);

    if(mysqli_num_rows($result) > 0) {

      $finalResult = mysqli_fetch_object($result);

      // now set values to php session

      $_SESSION['user_login'] = array(
        'logged_in'=>true,
        'login_data'=> $finalResult,
      );
      $_SESSION['success_msg'] = "Login Success.";

      header('Location: home.php');
      exit;

    } else {
      $errorMessage = "username or password is incorrect.";
    }

  }


}


 function sanitize($value='')
{
  $value = trim($value);
  $value = htmlspecialchars($value);
  return $value;
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<body>

<h2>Responsive Social or Manual Login Form in PHP and MySQL</h2>

<div class="container">

    <div class="row">
      <h2 style="text-align:center">Login with Social Media or Manually</h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="javascript:void(0)" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
        <a href="javascript:void(0)" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="javascript:void(0)" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>
      <form action="" method="post" id=login-form>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>

          <br>
          <?php if(isset($_SESSION['error_msg'])){ ?>
          <p><?php echo $_SESSION['error_msg']; ?> </p>
        <?php } ?>
        </div>

        <input type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) && !empty($_POST['username']) ? $_POST['username'] : ""; ?>">
        <input type="password" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) && !empty($_POST['password']) ? $_POST['password'] : ""; ?>">
        <input type="submit" name="submit" value="Login">

        <div class="err-msg">
          <?php if(isset($errorMessage)){
              echo $errorMessage;
            }
            ?>
        </div>
      </div>

        </form>
    </div>

</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="javascript:void(0)" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="javascript:void(0)" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>
