<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="moodstyles.css"> <!-- Assuming you have a styles.css file -->
</head>
<body>
    <div class="container">
        <h2>Form Submission Result</h2>
        <?php
        require_once ("mood_connection.php");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data
            $date = $_POST["date"];
            $rating = $_POST["rating"];
            $entry = $_POST["entry"];

            // Insert data into the database
            $sql = "INSERT INTO mood_entries (date, rating, entry) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $date, $rating, $entry);

            if ($stmt->execute() === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "<p>Form data not submitted.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
        <br>
        <a href="mood.php">Go Back</a>
    </div>
</body>
</html>