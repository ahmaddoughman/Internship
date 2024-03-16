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
        function searchEvents() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
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
            overflow-x: scroll;
            position: relative;
            width: 200px;
            /* height: 90vh; */
        }

        .img_view {
            text-align: center;
        }

        .img_view img {
            width: 50px;
        }

        .description11 {
            display: flex;
            flex-wrap: nowrap;
            width: 150px;
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

    $sql1 = "SELECT * FROM events";
    $result1 = $conn->query($sql1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $imagePath = $_FILES["image"]["name"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $destination = $_POST["destination"];
        $datefrom = date('Y-m-d', strtotime($_POST['datefrom']));
        $dateto = date('Y-m-d', strtotime($_POST['dateto']));
        $cost = $_POST["cost"];
        $guide = $_POST["guide"];
        $status = $_POST["status"];


        $insertQuery = $conn->prepare("INSERT INTO events (image_path, name, description, destination, datefrom, dateto, cost, guide, status)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insertQuery->bind_param("ssssssiss", $imagePath, $name, $description, $destination, $datefrom, $dateto, $cost, $guide, $status);

        if ($insertQuery->execute()) {
            echo '<script>showSweetAlert1("New record inserted successfully", "success");</script>';
        } else {
            echo '<script>showSweetAlert1("Error inserting record: ' . $conn->error . '", "error");</script>';
        }

        $insertQuery->close();
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
        <h2>Events</h2>
        <div class="widgets">
            <div class="widget">
                <div class="form-container">
                    <h2>Add New Event</h2>
                    <form id="eventForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                        <div class="file_image">
                            <label for="fileInput" id="fileLabel">Choose an Image:</label>
                            <input type="file" id="fileInput" name="image">
                        </div>

                        <label for="eventName">Event Name:</label>
                        <input type="text" id="eventName" name="name" required>

                        <label for="eventDescription">Event Description:</label>
                        <textarea id="eventDescription" name="description" required></textarea>

                        <label for="eventDestination">Event Destination:</label>
                        <input type="text" id="eventDestination" name="destination" required>

                        <label for="dateFrom">Date From:</label>
                        <input type="date" id="dateFrom" name="datefrom" required>

                        <label for="dateTo">Date To:</label>
                        <input type="date" id="dateTo" name="dateto" required>

                        <label for="eventCost">Event Cost:</label>
                        <input type="number" id="eventCost" name="cost" required>

                        <?php

                        $sql11 = "SELECT * FROM guide";
                        $result11 = $conn->query($sql11);
                        ?>

                        <label for="eventGuide">Guides:</label>
                        <select id="eventGuide" name="guide" required>

                            <?php
                            if ($result11->num_rows > 0) {
                                while ($row = $result11->fetch_assoc()) {
                                    echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                }
                            } else {
                                echo "No customers found";
                            }
                            ?>

                        </select>

                        <label for="eventStatus">Event Status:</label>
                        <select id="eventStatus" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                        </select>

                        <button type="submit">Add Event</button>
                    </form>
                    <div id="formMessage"></div>
                </div>
            </div>
            <div class="widget d112">
                <div class="content">
                    <h2>Events</h2>

                    <!-- Search form -->
                    <div class="search-container">
                        <label for="searchInput">Search:</label>
                        <input type="text" id="searchInput" placeholder="Enter Name">
                        <button onclick="searchEvents()">Search</button>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Destination</th>
                                <th>Date-From</th>
                                <th>Date-To</th>
                                <th>Cost</th>
                                <th>Guide</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . "<div class='img_view'> <img src='../assets/images/" . $row['image_path'] . "' alt='Product Image'> </div>" . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . "<div class='description11'>" . $row['description'] . "</div>" . "</td>";
                                    echo "<td>" . $row["destination"] . "</td>";
                                    echo "<td>" . $row["datefrom"] . "</td>";
                                    echo "<td>" . $row["dateto"] . "</td>";
                                    echo "<td>" . $row["cost"] . "$</td>";
                                    echo "<td>" . $row["guide"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No Events found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>


                    <?php
                    $conn->close();
                    ?>

                    <div class="widgets">
                        <!-- Existing widgets content -->

                    </div>
                </div>

            </div>

            <script src="script.js"></script>
</body>

</html>