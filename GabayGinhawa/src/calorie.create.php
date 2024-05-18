<?php
include("calorie.connection.php");

if (isset($_POST["submit"])) {
    $food = $_POST['food'];
    $calories = $_POST['calories'];
    $meal = $_POST['meal'];

    try {
        $sql = "INSERT INTO tblcalorie (food, calories, meal)
        VALUES (:food, :calories, :meal)";

        // Assign values to query as parameters
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':food', $food);
        $stmt->bindParam(':calories', $calories);
        $stmt->bindParam(':meal', $meal);

        // Execute the query
        $stmt->execute();

        header("location: calorie.read.php");
    } catch (PDOException $e) {
        echo $sql . '<br>' . $e->getMessage();
    }
    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta food="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
</head>

<body>
    <h1>Create a Meal Entry</h1>
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

        <button id="submit" type="submit" name="submit">Submit</button>
    </form>
</body>

</html>