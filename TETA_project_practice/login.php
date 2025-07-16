
<?php

//Start session
session_start();

//Error messages
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    
];

//Removes all active session variables
session_unset();

//Function to display the login error
function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>": '';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
   <div class="container">
    <div class="form-box" id="login">
        <form action="login_register.php" method="post">
        <header>ADMIN</header>
        <p class="login-text">Login</p>
        <?= showError($errors['login'])?>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p></p>
    </form>
    </div>
</body>

</html>