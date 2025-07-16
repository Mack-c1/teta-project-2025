<?php

//Start session
session_start();

//Error messages
$errors = [
    'register' => $_SESSION['register_error'] ?? ''
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
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <div class="form-box" id="login">
        <form action="login_register.php" method="post">
        <header>ADMIN</header>
        <?= showError($errors['register'])?>
        <p class="login-text">Register</p>
        <input type="text" name="username" placeholder="Username" autocomplete="off" required>
        <input type="email" name="email" placeholder="Email" autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" autocomplete="off" required>
        <select name="role" required>
            <option value="">-- select --</option>
            <option value="admin">Admin</option>
            <option value="mananger">Manager</option>
        </select>
        <button type="submit" name="register">Register</button>
        <p></p>
    </form>
    </div>
</body>
</html>