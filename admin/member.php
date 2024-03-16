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
    <script>
        function searchMembers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchMemberInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".d112 table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Assuming the name is in the second column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
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

    $sql1 = "SELECT * FROM member";
    $result1 = $conn->query($sql1);

   

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
        <h2>Members</h2>
        <div class="widgets">
            <div class="widget">

                <h2>Add New Member</h2>
                <form id="memberForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="birth"  required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male" >Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="mobileNumber">Mobile Number:</label>
                    <input type="tel" id="mobileNumber" name="mobile" required>

                    <label for="emergencyNumber">Emergency Number:</label>
                    <input type="tel" id="emergencyNumber" name="emergency" required>

                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" required>

                    <button type="submit">Add Member</button>
                </form>
                <div id="formMessage"></div>
            </div>
            <div class="widget d112">
                <h2>Members</h2>

                <!-- Search form for members -->
                <div class="search-container">
                    <label for="searchMemberInput">Search:</label>
                    <input type="text" id="searchMemberInput" placeholder="Enter Name">
                    <button onclick="searchMembers()">Search</button>
                </div>


                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Emergency</th>
                            <th>Nationality</th>

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
                                echo "<td>" . $row["gender"] . "</td>";
                                echo "<td>" . $row["mobile"] . "</td>";
                                echo "<td>" . $row["emergency"] . "</td>";
                                echo "<td>" . $row["nationality"] . "</td>";
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