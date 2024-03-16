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
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];

            echo "<h2>Update user</h2>";
            echo "<form method='post' action=''>";
            echo "Name: <input type='text' name='name' value='$name'><br><br>";
            echo "email: <input type='email' name='email' value='$email'><br><br>";
            echo "password: <input type='password' name='password' value='$password'><br><br>"; // Corrected name attribute
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' name='update_user' value='Update'>";
            echo "</form>";

        } else {
            echo "User not found";
        }

    } elseif (isset($_POST['update_user'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Corrected variable

        $update_query = "UPDATE user SET name='$name', email='$email', password='$password' WHERE id='$id'";

        if ($conn->query($update_query) === TRUE) {     
            header("Location: user.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

$conn->close();

?>
