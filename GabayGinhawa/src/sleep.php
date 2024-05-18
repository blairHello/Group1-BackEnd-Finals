<!DOCTYPE html>
<html>
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sleep Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/sleep.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
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
 


<body>
    
    <br>
    <br>
    <img src="../assets/bg-header.png" alt="Header Image" class="header-image">


    <div class="container my-5">
        <h2>Sleep &nbsp;<i class="fas fa-moon"></i></h2>
        <p>Track those <i>tulog</i> moments!</p>
        <br>

        


<a class="btn btn-primary" href="sleep_create.php" role="button"><i class="fas fa-plus"></i>&nbsp; Add Entry</a>
        <br>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time of Sleep</th>
                    <th>Wake Up Time</th>
                    <th>Quality of Sleep</th>
                    <th>Hours of Sleep</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php
                include "config.php";

// Check connection
if ($connection->connect_error) {
    die("Connection failed: ". $connection->connect_error);
}

// Read all rows from the sleep tracker table
$sql = "SELECT * FROM tb_sleep_tracker";

// Check if connection is not null
if ($connection) {
    $result = $connection->query($sql);
} else {
    die("Database connection is null");
}

                // Read all rows from the sleep tracker table
                $sql = "SELECT * FROM tb_sleep_tracker";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: ". $connection->error);
                }

                // Read data of each row
                while($row = $result->fetch_assoc()){
                    // Calculate hours of sleep
                    $sleepTime = new DateTime($row['time_of_sleep']);
                    $wakeTime = new DateTime($row['wake_up_time']);

                    if ($wakeTime < $sleepTime) {
                        // Add 24 hours to wake time
                        $wakeTime->modify('+1 day');
                    }

                    $interval = $wakeTime->diff($sleepTime);
                    $hoursOfSleep = $interval->h + $interval->i / 60;

                      // Round off sleep hours to one decimal place
    $hoursOfSleep = round($hoursOfSleep, 1);


                    // Determine color based on hours of sleep
                    if ($hoursOfSleep <= 5) {
                        $color = 'f44336';
                    } elseif ($hoursOfSleep <= 6) {
                        $color = '#FFDA7D';
                    } elseif ($hoursOfSleep <= 10) {
                        $color = '#5DF17E';
                    } elseif ($hoursOfSleep <= 1) {
                        $color = '#f44336';
                    } else {
                        $color = '#FFDA7D';
                    }

                    echo "
                        <tr>
                            <td>{$row['date']}</td>
                            <td>{$row['time_of_sleep']}</td>
                            <td>{$row['wake_up_time']}</td>
                            <td>{$row['quality_of_sleep']}</td>
                            <td style='background-color: $color;'>$hoursOfSleep</td>
                            <td>
                            <a class='btn btn-edit btn-sm' href='sleep_edit.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-delete btn-sm' href='sleep_delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</a>
                              </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
            </div>
    </div>
    <br>
    <Br>
<footer class="footer">
                <div class="top-part">
                    <img src="../assets/logo-white.png" alt="Logo" class="logo">
                    <div class="links">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="workouts.php">Workouts</a>
                        <a href="about_us.php">About Us</a>
                    </div>
                </div>
        
                <div class="second-top-part">
                    <div class="links">
                        <center><a href="privacy_policy.php">Privacy Policy</a>
                        <a href="terms_of_use.php">Terms of Use</a></center>
            
                    </div>
                </div>
                <div class="bottom-part"><br>
                    <center><p3><i>© 2024 GabayGinhawa, Inc.</i></p></center>
                </div>
            </footer>
    
                <script>
     function toggleMenu() {
          var navLinks = document.querySelector('.nav-links');
          navLinks.classList.toggle('show');
        }
    
        // Add an event listener to close the menu when a link is clicked
        document.querySelectorAll('.nav-links a').forEach(function(link) {
          link.addEventListener('click', function() {
            var navLinks = document.querySelector('.nav-links');
            navLinks.classList.remove('show');
          });
        });
                document.addEventListener('DOMContentLoaded', function() {
                    // Get the profile hover element
                    var profileHover = document.querySelector('.profile-hover');
                
                    // Add a click event listener to toggle the 'clicked' class
                    profileHover.addEventListener('click', function(event) {
                        this.classList.toggle('clicked');
                        event.stopPropagation(); // Prevent the click event from reaching the document
                    });
                
                    // Add a click event listener to the document to close the dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        var dropdownContent = document.querySelector('.profile-hover .dropdown-content');
                        var isClickedInsideDropdown = profileHover.contains(event.target) || dropdownContent.contains(event.target);
                
                        if (!isClickedInsideDropdown) {
                            profileHover.classList.remove('clicked');
                        }
                    });
                });
                  </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    
</body>
</html>
