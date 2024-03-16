<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">

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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .d112 {
            overflow: scroll;
            position: relative;
            width: 200px;
            height: 90vh;
        }
    </style>
</head>

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

    $sql1 = "SELECT * FROM guide";
    $result1 = $conn->query($sql1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $birth = date('Y-m-d', strtotime($_POST['birth']));
        $joindate = date('Y-m-d', strtotime($_POST['joindate']));
        $profession = $_POST["profession"];


        $sql = "SELECT * from guide where email ='{$email}'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>showSweetAlert("Email already Exists. Try again");</script>';
        } else {
            $insertQuery = $conn->prepare("INSERT INTO guide (name, email, password, birth, joindate, profession)
                                        VALUES (?, ?, ?, ?, ?, ?)");
            $insertQuery->bind_param("ssssss", $name, $email, $password, $birth, $joindate, $profession);

            if ($insertQuery->execute()) {
                echo '<script>showSweetAlert1("New record inserted successfully", "success");</script>';
            } else {
                echo '<script>showSweetAlert1("Error inserting record: ' . $conn->error . '", "error");</script>';
            }

            $insertQuery->close();
        }
    }



    ?>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="registerEvent.php">Register Events</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="member.php">Members</a></li>
            <li><a href="guides.php">Guides</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Guides</h2>
        <div class="widgets">
            <div class="widget">
                <h2>Add New Guide</h2>
                <form id="guideForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="guideFullName">Full Name:</label>
                    <input type="text" id="guideFullName" name="name" required>

                    <label for="guideEmail">Email:</label>
                    <input type="email" id="guideEmail" name="email" required>

                    <label for="guidePassword">Password:</label>
                    <input type="password" id="guidePassword" name="password" required>

                    <label for="guideDateOfBirth">Date of Birth:</label>
                    <input type="date" id="guideDateOfBirth" name="birth" required>

                    <label for="guideJoiningDate">Joining Date:</label>
                    <input type="date" id="guideJoiningDate" name="joindate" required>

                    <label for="guideProfession">Profession:</label>
                    <input type="text" id="guideProfession" name="profession" required>

                    <div style="visibility: hidden;">
                        <label for="guidePhoto">Photo:</label>
                        <input type="file" id="guidePhoto" accept="image/*">
                    </div>
                    <button type="submit">Add Guide</button>
                </form>
            </div>
            <div class="widget d112">
                <h2>Guides</h2>
                <p>200</p>

                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>DOB</th>
                            <th>JoinDate</th>
                            <th>Profession</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo "<td>" . $row["birth"] . "</td>";
                                echo "<td>" . $row["joindate"] . "</td>";
                                echo "<td>" . $row["profession"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No customers found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>


                <?php
                $conn->close();
                ?>

            </div>
        </div>
    </div>




    <script src="script.js"></script>
</body>

</html>