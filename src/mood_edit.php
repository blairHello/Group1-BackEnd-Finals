<?php
include "config.php";

$id = "";
$date = "";
$mood = "";
$notes = "";

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
    // GET METHOD: SHOW DATA OF MOOD ENTRY
    if (!isset($_GET["id"])) {
        header("location: mood.php");
        exit;
    }
    $id = $_GET["id"];

    // READ ROW OF SELECTED MOOD ENTRY FROM DB TABLE
    $sql = "SELECT * FROM tb_mood_tracker WHERE id=$id AND user_id=$user_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:mood.php");
        exit;
    }
    $date = $row["date"];
    $mood = $row["mood"];
    $notes = $row["notes"];
} else {
    // POST METHOD: UPDATE DATA OF MOOD ENTRY
    $id = $_POST["id"];
    $date = $_POST["date"];
    $mood = $_POST["mood"];
    $notes = $_POST["notes"];

    do {
        if (empty($id) || empty($date) || empty($mood)) {
            $errorMessage = "Date and mood are required.";
            break;
        }

        // UPDATE MOOD ENTRY IN DATABASE
        $sql = "UPDATE tb_mood_tracker SET date = '$date', mood = '$mood', notes = '$notes' WHERE id = $id AND user_id = $user_id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Mood entry updated.";
        header("location: mood.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html>
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mood_crud.css">
    <title>Edit Mood Entry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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

<header>
    <nav style="background-color: white;">
        <div class="logo-container">
            <a href="dashboard.php">
                <img src="../assets/gg-logo.png" alt="GabayGinhawa-logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="../src/dashboard.php">DASHBOARD</a></li>
            <li><a href="../src/workouts.php">WORKOUTS</a></li>
            <li><a href="../src/about_us.php">ABOUT US</a></li>
         
        </ul>
        
        <div class="user-controls">
            <div class="user-controls">

         
            </div>
           
                <div class="profile-container">
                    <div class="profile-hover">
                        <img class="profile-image" src="../assets/profile.png" alt="User Profile">
                        <ul class="dropdown-content">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="menu-icon" onclick="toggleMenu()">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                </nav>
            </header>

<div class="container">
    <h2 class="heading">Edit Mood Entry</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post" action="mood_edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Date</label>
                <div class="row-sm-6">
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label custom-label">Mood</label>
                <div class="row-sm-12 mood-container">
                    <!-- Radio buttons here -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" value="1" id="mood1" <?php echo $mood == 1 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="mood1"><i class="fas fa-frown"></i></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" value="2" id="mood2" <?php echo $mood == 2 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="mood2"><i class="fas fa-frown-open"></i></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" value="3" id="mood3" <?php echo $mood == 3 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="mood3"><i class="fas fa-meh"></i></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" value="4" id="mood4" <?php echo $mood == 4 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="mood4"><i class="fas fa-smile"></i></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mood" value="5" id="mood5" <?php echo $mood == 5 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="mood5"><i class="fas fa-grin-beam"></i></label>
                    </div>
                </div>
            </div>

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Notes</label>
                <div class="row-sm-6">
                    <textarea class="form-control" name="notes" id="notes" rows="3"><?php echo $notes; ?></textarea>
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
                    <button type="button" class="btn btn-secondary" id="cancel-button" onclick="window.location.href='mood.php'">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
