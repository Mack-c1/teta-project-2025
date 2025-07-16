<?php
//Session start
session_start();

//Session destroys any available variables
session_unset();

//Session destroys the active session to database
session_destroy();

//Directs to login page
header("Location: login.php");

//exit the session
exit();

?>
