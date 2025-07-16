<?php

//This creates a connection to the database
$host = "localhost";
$user = "root";
$pass = "";
$database = "teta";

$conn = new mysqli($host, $user, $pass, $database);

//Checks whether the connection was successful
if (!$conn) {
    die("Error: " . mysqli_error($conn));
}

error_reporting(0);

// Checks whether the form has been submitted with an ID number
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_no = $_GET['id_no'];

    //Prepare and execute the SQL statement
    $statement = $conn->prepare("SELECT * FROM applicants WHERE id_no = ?");
    $statement->bind_param("i", $id_no);
    $statement->execute();
    $result = $statement->get_result();

    //Checks whether the query returned any results
    if ($result->num_rows > 0) {
        $info = $result->fetch_assoc();
    } else {
        $info = ['name' => 'Not Found', 'date' => 'Not Found', 'status' => 'Not Found'];
    }

    //Closes the connection to the database

    $statement->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Status</title>
    <style>
        body {
            font-family: poppins, sans-serif;
            background-image: url("/TETA_Logo_mobile.png");
            background-repeat: no-repeat;
        }

        .cont {
            opacity: 0;
            background: whitesmoke;
            width: 400px;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        button {
            padding: 12px;
            background: #04c6a6;
            color: whitesmoke;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input {
            height: 10px;
            width: 350px;
            border: none;
            outline: none;
            background: whitesmoke;
            padding: 15px;
            color: black;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="status-cont">
        <h1>Check Status</h1>
        <form action="status.php" method="get">
            <input type="number" id="id_no" name="id_no" value="name" placeholder="ID No....." required>
            <button type="submit" name="check" id="btn">Check</button>
        </form>
        <div class="cont">
            <h3>Name</h3>
            <p><?php echo $info['name']; ?></p>
            <h3>Surname</h3>
            <p><?php echo $info['surname']; ?></p>
            <h3>Issued Date</h3>
            <p><?php echo $info['date']; ?></p>
            <h3>Status</h3>
            <p><?php echo $info['status']; ?></p>
        </div>
    </div>
</body>

<script>
    const toggleButton = document.querySelector('#btn');

    let id_no = document.querySelector('#id_no');

    toggleButton.onclick = function () {
        const cont = document.querySelector('.cont');
        cont.style.opacity = 1;
        cont.style.transition = 'opacity 0.5s ease-in-out';
    }

    if(isNaN(id_no.value)) {
        alert('Please enter a valid ID number');
    } else {
        toggleButton.disabled = false;
        id_no.value = '';
    }

</script>

</html>
