
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Check Status</title>
    <style>
        body {
            font-family: poppins, sans-serif;
            background-image: url("/TETA_Logo_mobile.png");
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .status-cont {
            background: white;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 450px;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

        }

        .cont {
            opacity: 0;
            background: whitesmoke;
            width: 400px;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            min-width: 100vh;
        }

        button {
            margin-top: 30px;
            padding: 12px;
            background: #04c6a6;
            color: whitesmoke;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: grid;
            place-content: center;
        }

        button:hover {
            background: #027b63;
            transition: 0.5s ease;
        }

        form {
            margin: 10px;
            display: flex;
            flex-direction: column;
        }
        a{
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: #04c6a6;
            transition: 0.5s ease;
            text-decoration: underline;
        }

        select{
            width: 380px;
            border: none;
            outline: none;
            background: whitesmoke;
            padding: 15px;
            color: black;
            border-radius: 5px;
        }
        input{
            margin-bottom: 20px;
            border: none;
            outline: none;
            background: whitesmoke;
            padding: 15px;
            border-radius: 5px;
            color: black;
            width: 350px;
        }

        .loader {
            pointer-events: none;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: aliceblue;
            animation: an1 1s ease infinite;
        }

        @keyframes an1 {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="status-cont">
        <h1>Update Status</h1>
        <form action="update_status.php" method="post">
            <input type="text" name="application-id" id="application-id" placeholder="Enter Application ID" required>
            <select name="status-name" id="status-name" required>
                <option value="">--Select Status--</option>
                <option value="submitted">Submitted</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
            </select>
            <button type="submit" name="submit" id="btn">Update Status</button>
            <a href="statusPage.php">Go Home</a>
        </form>
    </div>
</body>

<script>
    let save_btn = document.querySelector('button');

    let selectedValue = document.querySelector('#status-name');

    if (selectedValue.value === null || selectedValue.value === "") {
        save_btn.onclick = function () {
            this.innerHTML = "<div class='loader'></div>";

            setTimeout(() => {
                this.innerHTML = "Updated Status";
                // alert("Status Updated Successfully");
            }, 2000);
        }

    }
</script>

</html>