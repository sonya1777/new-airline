<?php
require_once('dbconnect.php');

function insertUser($conn, $first_name, $last_name, $nid, $username, $passport, $date_of_birth, $city, $country, $phone_no, $email, $password) {
    $sql = "INSERT INTO users (first_name, last_name, nid, username, passport, date_of_birth, city, country, phone_no, email, password)
            VALUES ('$first_name', '$last_name', '$nid', '$username', '$passport', '$date_of_birth', '$city', '$country', '$phone_no', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function deleteUser($conn, $username) {
    $sql = "DELETE FROM users WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["insert_user"])) {
        insertUser($conn, $_POST["first_name"], $_POST["last_name"], $_POST["nid"], $_POST["username"], $_POST["passport"], $_POST["date_of_birth"], $_POST["city"], $_POST["country"], $_POST["phone_no"], $_POST["email"], $_POST["password"]);
    }

    if (isset($_POST["delete_user"])) {
        deleteUser($conn, $_POST["delete_username"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlines Table</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        section {
            padding: 40px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form_design input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        .form_design input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        .form_design input[type="submit"]:hover {
            background-color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    


    <!-- MENU -->
    <style>
        .navbar-custom .navbar-nav-first>li>a:hover,
        .navbar-custom .navbar-nav-first>li.active>a {
            color: #fff !important;
        
            background-color: #000 !important;
        
        }

        .navbar-custom {
            border-color: #000 !important;
        
            border: none !important;
        
        }
    </style>

    <section class="navbar custom-navbar navbar-fixed-top navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="admin_home.php">Profile</a></li>
                    <li class="active"><a href="users.php">Users</a></li>
                    
                    <li><a href="pilot.php">Pilots</a></li>
                    <li><a href="airlines.php">Airlines</a></li>
                    <li><a href="admin_tickets.php">Tickets</a></li>
                    <li><a href="booked_flights.php">Bookings</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section1">
        <div class="container">
            <div class="title">Users Table</div>

            <?php
            require_once("DBConnect.php");
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>NID</th>
                            <th>Username</th>
                            <th>Passport</th>
                            <th>Date of Birth</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Password</th>
                            </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["nid"] . "</td><td>" . $row["username"] . "</td><td>" . $row["passport"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["city"] . "</td><td>" . $row["country"] . "</td><td>" . $row["phone_no"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <section id="section2">
        <div class="container">
            <div class="title">Add a New User</div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form_design" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required><br />

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required><br />

                <label for="nid">NID:</label>
                <input type="text" name="nid" required><br />

                <label for="username">Username:</label>
                <input type="text" name="username" required><br />

                <label for="passport">Passport:</label>
                <input type="text" name="passport" required><br />

                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" required><br />

                <label for="city">City:</label>
                <input type="text" name="city" required><br />

                <label for="country">Country:</label>
                <input type="text" name="country" required><br />

                <label for="phone_no">Phone No:</label>
                <input type="number" name="phone_no" required><br />

                <label for="email">Email:</label>
                <input type="text" name="email" required><br />

                <label for="password">Password:</label>
                <input type="password" name="password" required><br />

                <input type="submit" value="Add to Database" name="insert_user">
            </form>
        </div>
    </section>

    <section id="section3">
        <div class="container">
            <div class="title">Delete User</div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="delete_username">Enter Username to Delete:</label>
                <input type="text" id="delete_username" name="delete_username" required>
                <button type="submit" name="delete_user">Delete</button>
            </form>
        </div>
    </section>

    <script src="js/custom.js"></script>
</body>

</html>