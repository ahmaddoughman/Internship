<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="login.png">
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert1(message, icon) {
            Swal.fire({
                icon: icon,
                title: 'Notification',
                text: message,
            });
        }
    </script>
</head>

<style>
    body {
        background-image: url("LoginBG.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: hsl(210, 26%, 11%);
        ;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-image: url('../assets/images/footer-bg.png');
    }

    .container {
        width: 100%;
        max-width: 400px;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        text-align: left;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: inline-block;
        font-weight: bold;
        color: #444;
        margin-bottom: 8px;
        margin-left: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 4px;
        background-color: #f5f5f5;
        color: #333;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: rgb(234, 42, 42);
        color: #fff;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: white;
        color: #fc2c2c;
    }

    .mt-3 {
        margin-top: 15px;
        color: #777;
        text-align: center;
    }

    .alert {
        display: none;
        background-color: #fc2c2c;
        color: #fff;
        padding: 10px;
        border-radius: 4px;
        margin-top: 20px;
    }

    #login_title {
        text-align: center;
        font-size: 30px;
    }

    .fa-user-circle {
        position: absolute;
        margin-left: 210px;
        margin-top: -190px;
        background-color: transparent;
        color: #444;
    }

    .fas {
        color: #444;
    }

    #login_icon {
        color: white;
    }

    .reg-a {
        color: #fc2c2c;
    }
</style>

<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intership";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $birth = date('Y-m-d', strtotime($_POST['birth']));
        $gender = $_POST["gender"];
        $mobile = $_POST["mobile"];
        $emergency = $_POST["emergency"];
        $nationality = $_POST["nationality"];


        $sql = "SELECT * from member where email ='{$email}'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>showSweetAlert("Email already Exists. Try again");</script>';
        } else {
            $insertQuery = $conn->prepare("INSERT INTO member (name, email, password, birth, gender, mobile, emergency, nationality)
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $insertQuery->bind_param("sssssiis", $name, $email, $password, $birth, $gender, $mobile, $emergency, $nationality);

            if ($insertQuery->execute()) {
                echo '<script>showSweetAlert1("New record inserted successfully", "success");</script>';
            } else {
                echo '<script>showSweetAlert1("Error inserting record: ' . $conn->error . '", "error");</script>';
            }

            $insertQuery->close();
        }
    }

    $conn->close();
    ?>

    <div class="container">
        <h2 id="login_title">Register</h2>
        <form id="signInForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="fName">Full Name</label>
            <input type="text" id="fname" name="name" placeholder="Enter your full name" required>

            <i class="fas fa-envelope"></i><label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>

            <i class="fas fa-lock"></i><label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter a password" required>
            <span id="password-requirements" class="text-danger"></span>

            <label for="DOB">Date of Birth</label>
            <input type="date" id="Date" name="birth"  required><br>

            <label for="Gender" style="margin: 10px ; ">Gender:</label>

            <input type="radio" id="Gender" name="gender" value="male" required>
            <label for="male">Male</label>

            <input type="radio" id="Gender" name="gender" value="female" required>
            <label for="female">Female</label>
            <br>

            <label for="Mobile">Mobile number</label>
            <input type="Text" id="Mobile" name="mobile" placeholder="Enter your Mobile number" required>

            <label for="Emergency">Emergency Number</label>
            <input type="Text" id="Emergency" name="emergency" placeholder="Enter your Emergency Number" required>

            <label for="Nationality">Nationality</label>
            <input type="Text" id="Nationality" name="nationality" placeholder="Enter your Nationality" required>

            <button type="submit">Register <i class="fas fa-arrow-right" id="login_icon"></i></button>
        </form>
        <div id="alertBox" class="alert"></div>
    </div>

</body>

</html>