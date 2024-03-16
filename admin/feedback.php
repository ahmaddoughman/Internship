<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
    </style>
</head>

<body>

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
        <h2>Feedback</h2>


        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_user = "intership";

        $conn = new mysqli($servername, $username, $password, $db_user);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM register WHERE feedback IS NOT NULL AND feedback <> ''";
        $result = $conn->query($sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["event"] . "</td>";
                        echo "<td>" . $row["feedback"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No customers with feedback found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

    </div>


    </div>
</body>

<script src="assets/js/script.js"></script>

</html>