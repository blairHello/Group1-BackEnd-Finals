<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalsprac";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO tracker (age, gender, height, weight, activity_level, exercise_type, sleep_hours, bed_time, wake_time, meals_per_day, food_type, water_intake, health_goal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $age, $gender, $height, $weight, $activity_level, $exercise_type, $sleep_hours, $bed_time, $wake_time, $meals_per_day, $food_type, $water_intake, $health_goal);

// Set parameters and execute
// Personal
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$height = $_POST['height'] ?? '';
$weight = $_POST['weight'] ?? '';

// Activity
$activity_level = $_POST['activity_level'] ?? '';
$exercise_type = $_POST['exercise_type'] ?? '';

// Sleep
$sleep_hours = $_POST['sleep_hours'] ?? '';
$bed_time = $_POST['bed_time'] ?? '';
$wake_time = $_POST['wake_time'] ?? '';

// Food and Water
$meals_per_day = $_POST['meals_per_day'] ?? '';
$food_type = $_POST['food_type'] ?? '';
$water_intake = $POST['water_intake'] ?? '';

//Health
$health_goal = $_POST['health_goal'] ?? '';
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GabayGinhawa | Health Wellnes Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<style>
 
    #content {
        text-align: center;
    }
</style>

<body>


    <!-- Content area -->
    <div id="content">
        <!-- Default home page content -->
        <div id="startq">
            <h2>Let's Get Started.</h2>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div id="personal" style="display:none">
                <h3>Personal</h3>
                Age: <input type="number" name="age"><br>
                Gender: <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female <br>
                Height: <input type="number" name="height"><br>
                Weight: <input type="number" name="weight"><br>

            </div>

            <!-- About page content (hidden by default) -->
            <div id="foodandwater" style="display: none">
                <h2>Food and Water</h2>
                Meals per Day: <input type="text" name="meals_per_day"><br>
                Food Type: <input type="text" name="food_type"><br>
                Health Goal: <input type="text" name="health_goal"><br>
            </div>

            <!-- Contact page content (hidden by default) -->
            <div id="sleep" style="display: none">
                <h2>Sleep</h2>
                Sleep Hours: <input type="text" name="sleep_hours"><br>
                Bed Time: <input type="time" name="bed_time"><br>
                Wake Time: <input type="time" name="wake_time"><br>
            </div>

            <!-- About page content (hidden by default) -->
            <div id="activity" style="display: none">
                <h2>Physical Fitness</h2>
                <select name="activity_level">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select><br>
                Exercise Type: <input type="text" name="exercise_type"><br>

            </div>

            <!-- Contact page content (hidden by default) -->
            <div id="foodandwater" style="display: none">
                <h2>Food and Water</h2>
                Meals per Day: <input type="text" name="meals_per_day"><br>
                Food Type: <input type="text" name="food_type"><br>
                Water Intake: <input type="text" name="health_goal"><br>

            </div>

            <div id="health" style="display: none">
                <h2>Health Goal</h2>
                Health Goal: <input type="text" name="health_goal"><br>

            </div>

            <!-- About page content (hidden by default) -->
            <div id="finish" style="display: none">
                <h2>All Don.</h2>
                <p>Continue to the Dashboard</p>
            </div>
        </form>

        <div>
            <button onclick="showPage('personal')"></button>
            <button onclick="showPage('foodandwater')"></button>
            <button onclick="showPage('activity')"></button>
            <button onclick="showPage('sleep')"></button>
            <button onclick="showPage('health')"></button>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>