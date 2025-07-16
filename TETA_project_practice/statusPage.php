<?php
//database connection details

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "teta";

$host = "localhost";
$user = "root";
$pass = "";
$database = "users_db";

$connection = mysqli_connect($host, $user, $pass, $database);

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Varifies the connection to the databases
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
elseif($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

//Fetch data from the applicants table in the database

$sql = "SELECT *FROM applicants";
$result = $conn->query($sql);


$sq = "SELECT * FROM admins";
$res = $connection->query($sq);
$usr = $res->fetch_assoc();


//Logout function
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    <title>Administration</title>
</head>

<body>
    <div class="drawer">
        <div class="top">
            <div class="logo">
                <i class='bx bx-globe'></i>
                <span>TETA</span>
            </div>
            <i class="bx bx-menu" id="toggle"></i>
        </div>
        <div class="user">
            <img src="TETA_Logo_mobile.png" alt="teta" class="user-img">
            <div>
                <p class="bold"><?php echo $usr['email'];?></p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="admin.php">
                    <i class="bx bx-home"></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tool">Home</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
                <span class="tool">Profile</span>

            </li>
            <li>
                <a href="statusPage.php">
                    <i class='bx bx-radar'></i>
                    <span class="nav-item">Status</span>
                </a>
                <span class="tool">Status</span>
            </li>
            <li>
                <a href="document.php">
                    <i class='bx bx-note-book'></i>
                    <span class="nav-item">Documents</span>
                </a>
                <span class="tool">Documents</span>

            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Setting</span>
                </a>
                <span class="tool">Setting</span>

            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-arrow-out-left-square-half'></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tool">Logout</span>

            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="content">
            <h1>Status Page</h1>
            <div class="search">
                <i class='bx bx-search-alt'></i>
                <input type="text" id="seach-bar" placeholder="Search...">
            </div>
            <table class="table table-striped">
                <thead>
                    <th>NAME</th>
                    <th>SURNAME</th>
                    <th>EMAIL</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                </thead>
                <tbody>
                    <?php
                    // Display the information from database and download links
                    if ($result->num_rows > 0) {
                        //The while loop to display available row on the database
                        //The fetch_Assoc fetches data from the database
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['surname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                 <td><?php echo $row['date']; ?></td>
                                 <td>
                                    <a href="statusUpdate.php">Change Status</a>
                                 </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">No files uploaded yet.</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="main.js"></script>

</html>