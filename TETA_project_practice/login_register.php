<?php

//Start the session
session_start();

//Establish connection to the database

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Varifies the connection to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Register the new admin to the database
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    //Check whether the email exist in the database
    $checkEmail = $conn->query("SELECT * FROM admins WHERE email = '$email'");
    if($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Admin is already registered';
    }
    else{
        $conn->query("INSERT INTO admins (username, email, password, role) VALUES ('$username','$email','$password','$role')");
        header("Location: login.php");
        exit();
    }

    header("Location: register.php");
    exit();



}

//Validates administration login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM admins WHERE email = '$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            if($user['role'] === 'admin'){
                header("Location: admin.php");
            }
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect username or password!';
    header("Location: login.php");
    exit();

}

?>