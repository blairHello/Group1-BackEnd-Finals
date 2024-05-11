<?php
include("calorie.connection.php");

$mealid = $_GET['updateID'];

$sql = "SELECT * FROM tblcalorie WHERE mealid=:mealid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':mealid', $mealid);
$stmt->execute();

// Fetch data. These values will be assigned to form inputs.
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$food = $row['food'];
$calories = $row['calories'];
$meal = $row['meal'];

// Did you submit the form?
if (isset($_POST["submit"])) {
    $food = $_POST['food'];
    $calories = $_POST['calories'];
    $meal = $_POST['meal'];

    try {
        $sql = "UPDATE tblcalorie
                SET food = :food,
                    calories = :calories,
                    meal = :meal
                WHERE mealid=:mealid";

        // Assign values to query as parameters
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':food', $food);
        $stmt->bindParam(':calories', $calories);
        $stmt->bindParam(':meal', $meal);
        $stmt->bindParam(':mealid', $mealid);

        // Execute the query
        $stmt->execute();

        // Redirect back
        header("location: calorie.read.php");
        exit(); // Ensure that script stops here after redirection
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta food="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>

<body>
    <h1>Update a Meal Entry</h1>
    <form method="post">
        <label for="food">Food:</label>
        <input type="text" id="food" name="food" required>
        <br><br>

        <label for="calories">Calories:</label>
        <input type="text" id="calories" name="calories" required>
        <br><br>

        <br><br>

        <label for="meal">Meal:</label>
        <select name="meal" required>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
            <option value="Snack">Snack</option>
        </select>
        <br><br>

        <button id= "submit" type="submit" name="submit">Submit</button>
    </form>
</body>

</html>