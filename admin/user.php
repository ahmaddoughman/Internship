<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showSweetAlert(message, icon = 'error') {
            Swal.fire({
                icon: icon,
                title: 'Oops...',
                text: message,
            });
        }

        function showSweetAlert1(message, icon = 'info') {
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

        .btn {
            background-color: #1E78AC;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .btn1 {
            background-color: red;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .btn:hover {
            background-color: #555;
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["name"];
        $birth = date('Y-m-d', strtotime($_POST['birth']));
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $joindate = date('Y-m-d', strtotime($_POST['joindate']));

        $sql = "SELECT * from user where email ='{$email}'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>showSweetAlert("Email already Exists. Try again");</script>';
        } else {
            $insertQuery = $conn->prepare("INSERT INTO user (name, birth,  gender, email, password, joindate)
                                   VALUES (?, ?, ?, ?, ?, ?)");
            $insertQuery->bind_param("ssssss", $name, $birth, $gender, $email, $password, $joindate);

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
        <h2>Users</h2>
        <div class="widgets">
            <div class="widget">
                <h2>Add New User</h2>
                <form id="userForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <label for="userName">User Name:</label>
                    <input type="text" id="userName" name="name" required>

                    <label for="userDateOfBirth">Date of Birth:</label>
                    <input type="date" id="userDateOfBirth" name="birth" required>

                    <label for="userGender">Gender:</label>
                    <select id="userGender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="email" required>

                    <label for="userPassword">Password:</label>
                    <input type="password" id="userPassword" name="password" required>

                    <label for="userCreationDate">Creation Date:</label>
                    <input type="date" id="userCreationDate" name="joindate" required>

                    <button type="submit">Add User</button>
                </form>
            </div>
            <div class="widget">
                <h2 style=" border-bottom: 2px solid currentColor; padding-bottom: 10px; width: 80px">Users</h2>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>DateOfBirth</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>CreationDate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="user_table">
                            <?php
                            $sql = "SELECT * FROM user";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";                                   
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["birth"] . "</td>";
                                    echo "<td>" . $row["gender"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["password"] . "</td>";
                                    echo "<td>" . $row["joindate"] . "</td>";
                                    echo "<td>";
                                    echo "<form  method='post' action='delete_user.php'>";
                                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                        echo "<input class='btn1' type='submit' name='delete' value='delete'>";
                                    echo "</form>";

                                    echo "<form  method='post' action='update_user.php'>";
                                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                        echo "<input class='btn' type='submit' name='update' value='update'>";
                                    echo "</form>";
                                   
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No customers found</td></tr>";
                            }
                           
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/api/role_api.js"></script>
    <script src="./assets/js/api/user_api.js"></script>
</body>

</html>