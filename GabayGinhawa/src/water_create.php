<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration_login_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$date = "";
$time_of_water_intake = "";
$glasses_of_water = "";
$quantity_of_water_ml = "";

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page
    header("Location: logins.php");
    exit;
}

$user_id = $_SESSION['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST["date"];
    $time_of_water_intake = $_POST["time_of_water_intake"];
    $glasses_of_water = $_POST["glasses_of_water"];
    $quantity_of_water_ml = $_POST["quantity_of_water_ml"];

    do {
        if (empty($date) || empty($time_of_water_intake) || empty($glasses_of_water) || empty($quantity_of_water_ml)){
            $errorMessage = "All the fields are required.";
            break;
        }

        // Calculate total water intake in L
        $totalWaterIntakeL = $quantity_of_water_ml / 1000;

        // Add new water entry to database
        $sql = "INSERT INTO tb_water_tracker (user_id, date, time_of_water_intake, glasses_of_water, quantity_of_water_ml, total_water_intake_l) VALUES ('$user_id', '$date', '$time_of_water_intake', '$glasses_of_water', '$quantity_of_water_ml', '$totalWaterIntakeL')";

        $result = $connection->query($sql);
        if (!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $date = "";
        $time_of_water_intake = "";
        $glasses_of_water = "";
        $quantity_of_water_ml = "";

        $successMessage = "Water entry added to database.";

        header("location:water.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/GabayGinhawa-logo.png" type="image/png">
<link rel="icon" href="../assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/water_crud.css">
    <title>New Water Entry</title><link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

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
        body {
    background: url('../assets/water_bg.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    display: relative;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
 
    
    /* Nav Bar */

header {
    position: fixed;
    top: 0;
    width: 100%;
    max-height: 70px;
    background-color: white;
    padding: 0.5px 17px;
    box-sizing: border-box;
    z-index: 1000;
    box-shadow: 0 20px 20px rgba(0, 0, 0, 0.1);
  }
  
  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 30px;
}
  
  .logo-container {
    display: flex;
    align-items: center;
    margin-bottom: -20px;
  }
  
  .logo-container img {
    height: 98px;
    width:98px;
    margin-bottom: -1px;
    margin-top: -18px;
  }
  
  .nav-links {
    list-style: none;
    display: flex;
    margin-bottom: 1px;
    margin-right: auto;
  }
  
  .nav-links ul {
    list-style: none;
    display: flex;
    margin: 0;
  }
  
  .nav-links li {
    margin-left: 20px;
  }
  
  .nav-links a {
    text-decoration: none;
    color: black;
    text-transform: uppercase;
    font-weight: 500; /* Change font-weight to 500 for semi-bold */
  }
  
  .user-controls {
    display: flex;
    align-items: center;
    margin-right: -17px;
    max-height: 20px;
  }
  
  .notification-icon img {
    max-height: 20px;
    margin-right: 30px;
  }
  
  .profile-container {
    display: flex;
    align-items: center;
    position: relative;
  }
  
  .profile-container img {
    max-height: 30px;
    margin-right: 17px;
  }
  
  .profile-hover {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    list-style: none;
    padding: 17px;
    margin: 0;
    text-align: center;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #fff;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    display: none;
    width: 200px;
    color: black;
  }
  
  .dropdown-content a {
    color: black;
    text-decoration: none;
    display: block;
    padding: 8px 0;
    transition: color 0.3s;
  }
  
  .dropdown-content a:hover {
    color: gray;
  }
  
  .profile-hover:hover .dropdown-content,
  .profile-hover.clicked .dropdown-content {
    display: block;
    visibility: visible;
    opacity: 1;
  }
  
  .notification-icon img,
  .profile-image img {
    max-height: 30px;
    margin-right: 17px;
  }
  
  .menu-icon {
    display: none;
    cursor: pointer;
    padding: 17px;
    margin-left: -8px;
    margin-bottom: 17px;
  
  }
  
  .menu-icon .bar {
    width: 25px;
    height: 2px;
    background-color: black;
    margin: 5px 0;
  }
  
  @media only screen and (max-width: 768px) {
    .form-container2 {
      width: 100%;
    }
  
    .menu-icon {
      display: none;
      cursor: pointer;
      padding: 17px;
      margin-top: 17px;
    }
  
    .nav-links {
      display: none;
      flex-direction: column;
      align-items: center;
      width: 100%;
      position: absolute;
      top: 60px;
      left: 0;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }
  
    .nav-links.show {
      display: flex;
    }
  
    .nav-links li {
      text-align: center;
      margin: 17px 0;
    }
  
    .menu-icon {
      display: block;
    }
  }
  
/* Nav Bar */
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
 
<br>
    <Br>
    <Br>
    <br>
    <Br>
    <div class="container">
        <h2 class="heading">New Water Entry</h2>
        <p class="italic-paragraph"><i>How much water did you drink today?</i></p>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post" id="waterForm">
            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Date</label>
                <div class="row-sm-6">
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
                </div>
            </div>
            
            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Time of Water Intake</label>
                <div class="row-sm-6">
                    <input type="time" class="form-control" name="time_of_water_intake" id="time_of_water_intake" value="<?php echo $time_of_water_intake; ?>">
                </div>
            </div>
            
            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Glasses of Water</label>
                <div class="row-sm-6">
                    <input type="number" class="form-control" name="glasses_of_water" id="glasses_of_water" value="<?php echo $glasses_of_water; ?>">
                </div>
            </div>

            <div class="row-mb-3">
                <label class="col-sm-4 col-form-label custom-label">Water Intake in ml</label>
                <div class="row-sm-6">
                    <input type="number" class="form-control" name="quantity_of_water_ml" id="quantity_of_water_ml" value="<?php echo $quantity_of_water_ml; ?>">
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
                    <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
                </div>
                <div class="col-sm-6 d-grid ms-2">
                    <button type="button" class="btn btn-secondary" id="cancel-button" onclick="window.location.href='water.php'">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
