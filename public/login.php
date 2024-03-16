<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../login.png">
    <link rel="stylesheet" href="../assets/css/style.css">
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
    session_start(); // Start the session

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_user = "intership";
    $conn = new mysqli($servername, $username, $password, $db_user);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])) {
        $email_user = $_POST["email_user"];
        $password_user = $_POST["password_user"];

        $sql = "SELECT * from member where email ='{$email_user}'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password_user == $row["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["user_info"] = $row; // Store user information in session

                echo '<script>
                    showSweetAlert1("login confirm successfully", "success");
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 2000); 
                  </script>';
                exit();
            } else {
                echo '<script>showSweetAlert1("password are incorrect: ' . $conn->error . '", "error");</script>';
            }
        } else {
            echo '<script>showSweetAlert1("Email are incorrect: ' . $conn->error . '", "error");</script>';
        }
    }

    $conn->close();
    ?>

    <font size=200%><i class="fa fa-user-circle"></font></i>
    <div class="container">
        <h2 id="login_title">Log In </i></h2>
        <form id="signInForm" action="" method="post">
            <i class="fas fa-envelope"></i><label for="email">Email</label>
            <input type="text" id="email" name="email_user" placeholder="Enter your email" required>

            <i class="fas fa-lock"></i><label for="password">Password </label>
            <input type="password" id="password" name="password_user" placeholder="Enter your password" required>
            <button type="submit" name="submit" id="signInButton">Sign In <i class="fas fa-arrow-right" id="login_icon"></i></button>
        </form>
        <p class="mt-3">Don't have an account? <a class="reg-a" href="register.php" target="_blank">Register</a></p>
        <div id="alertBox" class="alert"></div>
    </div>




    <script src="../assets/js/api.js" type=""></script>



</body>

</html>