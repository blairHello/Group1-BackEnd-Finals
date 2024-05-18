<?php
include "config.php";

$id = "";
$date = "";
$time_of_meal = "";
$food_name = "";
$meal_type = "";
$calories = "";

$errorMessage = "";
$successMessage = "";

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page
    header("Location: logins.php");
    exit;
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET METHOD: SHOW DATA OF CALORIE ENTRY
    if (!isset($_GET["id"])) {
        header("location: calorie.php");
        exit;
    }
    $id = $_GET["id"];

    // READ ROW OF SELECTED CALORIE ENTRY FROM DB TABLE
    $sql = "SELECT * FROM tb_calorie_tracker WHERE id=$id AND user_id=$user_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:calorie.php");
        exit;
    }
    $date = $row["date"];
    $time_of_meal = $row["time_of_meal"];
    $food_name = $row["food_name"];
    $meal_type = $row["meal_type"];
    $calories = $row["calories"];
} else {
    // POST METHOD: UPDATE DATA OF CALORIE ENTRY
    $id = $_POST["id"];
    $date = $_POST["date"];
    $time_of_meal = $_POST["time_of_meal"];
    $food_name = $_POST["food_name"];
    $meal_type = $_POST["meal_type"];
    $calories = $_POST["calories"];

    do {
        if (empty($id) || empty($date) || empty($time_of_meal) || empty($food_name)|| empty($meal_type) || empty($calories)) {
            $errorMessage = "All the fields are required.";
            break;
        }

        // UPDATE CALORIE ENTRY IN DATABASE
        $sql = "UPDATE tb_calorie_tracker SET date = '$date', time_of_meal = '$time_of_meal', food_name = '$food_name', meal_type = '$meal_type', calories = '$calories' WHERE id = $id AND user_id = $user_id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Calorie entry updated.";
        header("location: calorie.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html>
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/calories_crud.css">
    <title>Edit Calorie Entry</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 500px;
            padding: 10px 40px; /* 20px top/bottom, 40px left/right */
            background: #ffffff;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.7);
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="heading">Edit Calorie Entry</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post" action="calorie_edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Date</label>
                <div class="row-sm-6">
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
                </div>
            </div>

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Time of Meal</label>
                <div class="row-sm-6">
                    <input type="time" class="form-control" name="time_of_meal" id="time_of_meal" value="<?php echo $time_of_meal; ?>">
                </div>
            </div>

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Food Name</label>
                <div class="row-sm-6">
                    <input type="text" class="form-control" name="food_name" id="food_name" value="<?php echo $food_name; ?>">
                </div>
            </div>

            

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Meal Type</label>
                <div class="row-sm-6">
                    <select class="form-control" name="meal_type" id="meal_type">
                        <option value="breakfast" <?php echo $meal_type == 'breakfast' ? 'selected' : ''; ?>>Breakfast</option>
                        <option value="lunch" <?php echo $meal_type == 'lunch' ? 'selected' : ''; ?>>Lunch</option>
                        <option value="dinner" <?php echo $meal_type == 'dinner' ? 'selected' : ''; ?>>Dinner</option>
                        <option value="snack" <?php echo $meal_type == 'snack' ? 'selected' : ''; ?>>Snack</option>
                    </select>
                </div>
            </div>

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Calories</label>
                <div class="row-sm-6">
                    <input type="number" class="form-control" name="calories" id="calories" value="<?php echo $calories; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>";
            }
            ?>

            <div class="d-flex justify-content-center mb-3">
                <div class="col-sm-6 d-grid me-2">
                    <button type="submit" class="btn btn-primary" id="submit-button">Edit</button>
                </div>
                <div class="col-sm-6 d-grid ms-2">
                    <button type="button" class="btn btn-secondary" id="cancel-button" onclick="window.location.href='calorie.php'">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
