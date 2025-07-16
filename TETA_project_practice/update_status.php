<?php
//database connection details

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "teta";


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Varifies the connection to the databases
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['submit'])) {
    $status_name = htmlspecialchars($_POST['status-name']);
    $app_id = htmlspecialchars($_POST['application-id']);

    echo $status_name;
    echo $app_id;

    // Check if the status name is valid
    if ($status_name == "submitted" || $status_name == "pending" || $status_name == "approved") {

        // Update the status in the database
        $sql = "UPDATE applicants SET status = '$status_name' WHERE id_no = '$app_id'";

    } else {
        die("Invalid status name provided.");
    }

    //Check if the update was successful
    $result = mysqli_query($conn, $sql);

    //Validate whether upload was success
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    //Stop the execution and direct the user to the new page
    header("Location: admin.php");
    exit();
}

?>