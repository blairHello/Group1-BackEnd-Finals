
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title><link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
</head>

<header>
    <nav style="background-color: white;">
        <div class="logo-container">
            <a href="admin_dashboard.php">
                <img src="../assets/gg-logo.png" alt="GabayGinhawa-logo">
            </a>
        </div>
       
        
        <div class="user-controls">
            <div class="user-controls">

      
            </div>
           
                <div class="profile-container">
                    <div class="profile-hover">
                        <img class="profile-image" src="../assets/profile.png" alt="User Profile">
                        <ul class="dropdown-content">
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="menu-icon" onclick="toggleMenu()">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                </nav>
            </header>

</head>
<div id="quickLinks">
    <a href="user.php">User Management</a>
    <a href="admin.php">Admin Management</a>
    <a href="water_admin.php">Water Intake Data</a>
    <a href="#">Activity Tracker Data</a>
    <a href="#">Mood Tracker Data</a>
    <a href="#">Caloric Intake Data</a>
    <a href="#">Sleep Tracker Data</a>
</div>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration_login_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Query to get all entries from tb_water_tracker along with user names
$sql = "SELECT tb_water_tracker.*, tb_users.user_name FROM tb_water_tracker JOIN tb_users ON tb_water_tracker.user_id = tb_users.id";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>User ID</th><th>User Name</th><th>Date</th><th>Time of Water Intake</th><th>Glasses of Water</th><th>Quantity of Water (ml)</th><th>Total Water Intake (L)</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_id"]. "</td><td>" . $row["user_name"]. "</td><td>" . $row["date"]. "</td><td>" . $row["time_of_water_intake"]. "</td><td>" . $row["glasses_of_water"]. "</td><td>" . $row["quantity_of_water_ml"]. "</td><td>" . $row["total_water_intake_l"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Tracker</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Water Tracker</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "registration_login_db";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Query to get all entries from tb_water_tracker along with user names
        $sql = "SELECT tb_water_tracker.*, tb_users.user_name FROM tb_water_tracker JOIN tb_users ON tb_water_tracker.user_id = tb_users.id";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead><tr><th>ID</th><th>User ID</th><th>User Name</th><th>Date</th><th>Time of Water Intake</th><th>Glasses of Water</th><th>Quantity of Water (ml)</th><th>Total Water Intake (L)</th></tr></thead>';
            echo '<tbody>';
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["user_id"] . '</td>';
                echo '<td>' . $row["user_name"] . '</td>';
                echo '<td>' . $row["date"] . '</td>';
                echo '<td>' . $row["time_of_water_intake"] . '</td>';
                echo '<td>' . $row["glasses_of_water"] . '</td>';
                echo '<td>' . $row["quantity_of_water_ml"] . '</td>';
                echo '<td>' . $row["total_water_intake_l"] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
