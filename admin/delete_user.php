<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intership";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    if (isset($_POST['id'])) {
        $id_to_delete = $_POST['id'];

        $delete_query = "DELETE FROM user WHERE id = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("i", $id_to_delete);

        if ($stmt->execute()) {
            echo "Record with ID $id_to_delete deleted successfully";

            // Update IDs using MySQL variables for the specific table
            $update_ids_query = "SET @counter = 0";
            if ($conn->query($update_ids_query) === TRUE) {
                $update_ids_query = "UPDATE user SET id = @counter := @counter + 1";
                if ($conn->query($update_ids_query) === TRUE) {
                    echo "IDs updated successfully";
                } else {
                    echo "Error updating IDs: " . $conn->error;
                }
            } else {
                echo "Error resetting counter: " . $conn->error;
            }

            // Redirect back to the products page
            header("Location: user.php");
            exit();
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        $conn->close();
    } else {
        echo "Invalid request";
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>