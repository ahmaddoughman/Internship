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
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    #eventCardsContainer {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .event-card {
        border: 1px solid #ccc;
        padding: 15px;
        margin: 10px;
        width: 300px;
        cursor: pointer;
        background-color: white;
        transition: transform 0.2s ease-in-out;
    }

    .event-card:hover {
        transform: scale(1.05);
    }

    #registrationFormContainer {
        display: none;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
    }

    button {
        background-color: #333;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }

    .event-card {
        /* Existing styles */
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
    }

    .event-card img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

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
        overflow-y: scroll;
        position: relative;
        width: 200px;
        height: 90vh;
    }
</style>

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
        <h2>Register Events</h2>
        <div class="widgets">
            <div class="widget">
                <h3>Events Registration</h3>

                <div id="eventCardsContainer">

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

                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                            echo "<div class='event-card' onclick='showRegistrationForm(" . json_encode($row) . ")'>";
                            echo " <img src='../assets/images/" . $row['image_path'] . "' alt='Event Image'>";
                            echo "<h3> Event " . $row["name"] . "</h3>";
                            echo "<p> Destination " . $row["destination"] . "</p>";
                            echo "<p> Cost $" . $row["cost"] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "No Events found";
                    }

                    ?>
                </div>


                <script>
                    function showSweetAlert1(message, icon = 'info') {
                        Swal.fire({
                            icon: icon,
                            title: 'Notification',
                            text: message,
                        });
                    }

                    <?php
                    if (isset($_POST["submit1"])) {
                        $email_user = $_POST["email_user"];
                        $name = $_POST["name"];

                        $sql = "SELECT * FROM member WHERE email ='{$email_user}'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            if (strcasecmp($name, $row["name"]) == 0) {
                                $_SESSION["login"] = true;
                                $_SESSION["id"] = $row["id"];
                                $_SESSION["user_info"] = $row; // Store user information in session 

                                $selectedEventName = $_POST["selectedEventName"];

                                $insertQuery = $conn->prepare("INSERT INTO register (name, email, event) VALUES (?, ?, ?)");
                                $insertQuery->bind_param("sss", $name, $email_user, $selectedEventName);

                                if ($insertQuery->execute()) {
                                    echo 'showSweetAlert1("Register successfully", "success");';
                                } else {
                                    echo 'showSweetAlert1("Error inserting record: ' . $conn->error . '", "error");';
                                }

                                $insertQuery->close();
                                echo '<div id="registration-success" style="display: none;">success</div>';
                            } else {
                                echo 'showSweetAlert1("Registration failed: Name is incorrect", "error");';
                            }
                        } else {
                            echo 'showSweetAlert1("Registration failed: Email is incorrect", "error");';
                        }
                    }
                    ?>
                </script>


                <div id="registrationFormContainer">
                    <form id="userRegistrationForm" method="post" action="">
                        <h2>Register for <span id="selectedEventName"></span></h2>

                        <input type="hidden" id="selectedEventNameInput" name="selectedEventName" required>
                        <label for="userName">Full Name:</label>
                        <input type="text" id="userName" name="name" required>

                        <label for="userEmail">Email:</label>
                        <input type="email" id="userEmail" name="email_user" required>

                        <button type="submit" name="submit1">Register</button>
                        <button type="button" class="back-button" onclick="goBack()">Back</button>
                    </form>
                </div>

            </div>
            <div class="widget d112">
                <h3>Event members</h3>
                <p></p>

                <?php
                // Fetch events
                $sqlEvents = "SELECT * FROM events";
                $resultEvents = $conn->query($sqlEvents);

                if ($resultEvents->num_rows > 0) {
                    while ($event = $resultEvents->fetch_assoc()) {
                        echo "<h2>Members for Event: {$event['name']}</h2>";
                        echo "<table>";
                        echo "<thead><tr><th>Name</th><th>Email</th><th>Event</th></tr></thead>";
                        echo "<tbody>";

                        // Fetch members for the current event
                        $sqlMembers = "SELECT * FROM register WHERE event = '{$event['name']}'";
                        $resultMembers = $conn->query($sqlMembers);

                        if ($resultMembers->num_rows > 0) {
                            while ($row = $resultMembers->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["event"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No Members found for this event</td></tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    }
                } else {
                    echo "No Events found";
                }
                
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        function generateEventCards(eventsData) {
            const eventCardsContainer = document.getElementById('eventCardsContainer');

            eventsData.forEach(event => {
                const card = document.createElement('div');
                card.classList.add('event-card');
                card.innerHTML = `
                    <img src="../assets/images/${event.image_path}" alt="${event.name}">
                    <h3>${event.name}</h3>
                    <p>Destination: ${event.destination}</p>
                    <p>Cost: $${event.cost.toFixed(2)}</p>
                `;

                card.addEventListener('click', () => {
                    showRegistrationForm(event);
                });

                eventCardsContainer.appendChild(card);
            });
        }

        function showRegistrationForm(event) {
            const registrationFormContainer = document.getElementById('registrationFormContainer');
            const selectedEventName = document.getElementById('selectedEventName');
            const selectedEventNameInput = document.getElementById('selectedEventNameInput');


            // Set the value of the selected event name in both the span and hidden input
            selectedEventName.textContent = event.name;
            selectedEventNameInput.value = event.name;

            // Reset the registration form
            document.getElementById('userRegistrationForm').reset();

            // Show the registration form container and hide the event cards container
            registrationFormContainer.style.display = 'flex';
            document.getElementById('eventCardsContainer').style.display = 'none';
        }

        function goBack() {
            document.getElementById('registrationFormContainer').style.display = 'none';
            document.getElementById('eventCardsContainer').style.display = 'flex';
        }

        // Call the function to generate event cards when the page is loaded
        generateEventCards();
    </script>


</body>

</html>