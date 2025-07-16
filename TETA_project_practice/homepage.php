<?php
session_start();
include("submit.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Completed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="screen-container">
        <div class="splash-screen" id="first-screen">
            <p class="welcome">Application <span>Submitted</span> Successfully</p>
            <p class="link">Go to <a href="index.php" id="next-page">Home</a></p>
            <div class="status">
                <a href="status.php">Check Status</a>
            </div>
        </div>
        </div>
    </div>
</body>
</html>