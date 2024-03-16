<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<body>


    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_user = "intership";
    $conn = new mysqli($servername, $username, $password, $db_user);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $name = $_POST["name"];

        $sql = "SELECT * FROM register WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($result === false) {
            echo '<script>showSweetAlert1("Error in query: ' . $conn->error . '", "error");</script>';
        } else {
            if ($result->num_rows > 0) {
                if ($name == $row["name"]) {

                    $feedback = $_POST["feedback"];

                    $updateQuery = $conn->prepare("UPDATE register SET feedback = ? WHERE id = ?");
                    $updateQuery->bind_param("si", $feedback, $row["id"]);

                    if ($updateQuery->execute()) {
                        $_SESSION["success"] = "Message sent successfully";
                        echo '<script>showSweetAlert1("' . $_SESSION["success"] . '", "success");</script>';
                    } else {
                        $_SESSION["error"] = "Problem sending message";
                        echo '<script>showSweetAlert1(" ' . $_SESSION["error"] . ' ' . $conn->error . '", "error");</script>';
                    }

                    $updateQuery->close();
                } else {
                    $_SESSION["error"] = "Name is incorrect";
                    echo '<script>showSweetAlert1("' . $_SESSION["error"] . '", "error");</script>';
                }
            } else {
                $_SESSION["error"] = "Email is incorrect";
                echo '<script>showSweetAlert1( "' . $_SESSION["error"] . '", "error");</script>';
            }
        }

        $stmt->close();
    }

    $conn->close();
    ?>
    <script>
        // Redirect to index.php after showing the SweetAlert
        setTimeout(function() {
            window.location.href = "index.php#contact";
        }, 2000); // Adjust the delay (in milliseconds) as needed
    </script>
</body>

</html>