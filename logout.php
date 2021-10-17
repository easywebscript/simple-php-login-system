<?php
session_start();


// destroy all session and go to login page.
session_destroy();
session_start();
$_SESSION['error_msg'] = "Your are logout. Please Login again.";
header('Location: index.php');

exit;

?>
