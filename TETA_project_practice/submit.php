<?php

//Include the connect.php file
include('./connect.php');

//Submits input data to the database
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $id_no = htmlspecialchars($_POST['id_no']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $gender = htmlspecialchars($_POST['gender']);
    $email = htmlspecialchars($_POST['email']);
    $identity_doc = $_FILES['identity_doc'];

    //Extract file name
    $filename = $identity_doc['name'];

    //Extract the filename error
    $filenameerror = $identity_doc['error'];

    //Extract the name of temporary folder for the file
    $filenametemp = $identity_doc['tmp_name'];

    //Separate the file ext from the file
    $filename_ext_separation = explode('.', $filename);

    //File extension
    $file_extension = strtolower(end($filename_ext_separation));

    //Required extensions
    $ext = array('png', 'docx', 'pdf', 'jpeg');

    //Validate the required extensions
    if (in_array($file_extension, $ext)) {
        //Create the upload folder
        $upload_dir = 'uploads/identity_document/' . $filename;

        //Move uploaded file from temp folder to the uploaded_dir folder
        move_uploaded_file($filenametemp, $upload_dir);

        //Checks for duplicates
        $checkEmail = $conn->query("SELECT email FROM applicants WHERE email = '$email'");

        //Application Validation
        if ($checkEmail->num_rows > 0) {

            //Application Validation
            $_SESSION["application_error"] = "Application ID already exist";
            $_SESSION["active_form"] = "Apply";
        }

        //Insert data to the database table
        $sql = "INSERT INTO `applicants` (name, surname, date_of_birth, id_no, nationality, gender, email, identity_doc)
         VALUES ('$name','$surname','$date_of_birth','$id_no','$nationality','$gender','$email','$upload_dir')";

        //Create a result to check the upload is successful
        $result = mysqli_query($conn, $sql);

        //Validate whether upload was success
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
    }

    //Stop the execution and direct the user to the new page
    header("Location: homepage.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>

</body>

</html>