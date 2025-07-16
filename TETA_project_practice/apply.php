<?php
session_start();

$errors = [
    "apply"=> $_SESSION['application_error'] ?? '',
];

session_unset();

function showError($error_message){
    return !empty($error_message) ? "<p class='error-message'>$error_message</p>" :'';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" id="second-screen">
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <header>Bursary Application</header>
            <?= showError($errors['apply']); ?>
            <span class="title">Personal Details</span>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Surname</span>
                    <input type="text" name="surname" placeholder="Surname" required>
                </div>
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
                </div>
                <div class="input-box">
                    <span class="details">ID No</span>
                    <input type="number" name="id_no" placeholder="ID No." required>
                </div>
                <div class="input-box">
                    <span class="details">Nationality</span>
                    <select name="nationality" id="nations" required>
                        <option value="" id="nations">--- Select Nationality ---</option>
                        <option value="South Africa" id="nations">South African</option>
                        <option value="Lesotho" id="nations">Lesotho</option>
                        <option value="Botswana" id="nations">Botswana</option>
                        <option value="Zambia" id="nations">Zambian</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" required>
                    <input type="radio" name="gender" id="dot-2" required>
                    <input type="radio" name="gender" id="dot-3" required>
                    <span class="gender-title">Gender</span>
                    <div class="catergory">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Other</span>
                        </label>
                    </div>
                </div>
            </div>
            <span class="title">Upload Documents</span>
            <div class="input-box upload-docs">
                <span class="details">Identity Document</span>
                <input type="file" id="identity_doc" name="identity_doc" required>
            </div>
            <button type="submit" name="submit">SUBMIT</button>
            <p>Go back <a href="index.php" id="previous-page">Home</a></p>
        </form>
    </div>
</body>

</html>