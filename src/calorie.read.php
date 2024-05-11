<?php
include("calorie.connection.php");
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta food="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>READ</h1>
    <button><a href="calorie.create.php">Add a Meal Entry</a></button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Food</th>
                <th>Calories</th>
                <th>Meal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tblcalorie ORDER BY mealid desc";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $mealid = $row['mealid'];
                $food = $row['food'];
                $calories = $row['calories'];
                $meal = $row['meal'];

                echo '<tr>
                <td>' . $mealid . '</td>
                <td>' . $food . '</td>
                <td>' . $calories . '</td>
                <td>' . $meal . '</td>

                <td>
                <button><a href="calorie.update.php?updateID=' . $mealid . '">Update</a></button>
                <button><a href="calorie.delete.php?deleteID=' . $mealid . '">Delete</a></button>
                </td>
                </tr>';
            }

            ?>
        </tbody>
    </table>
</body>

</html>