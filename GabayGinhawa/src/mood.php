<!DOCTYPE html>
<<<<<<< HEAD:GabayGinhawa/src/mood.php
<html>
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mood Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/mood.css">
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
    <img src="../assets/mood-bg-header.png" alt="Header Image" class="header-image">

    <div class="container my-5">
        <h2>Mood  <i class="fas fa-smile"></i></h2>
        <p>Track your mood!</p>
        <br>

        <a class="btn btn-primary" href="mood_create.php" role="button"><i class="fas fa-plus"></i>  Add Entry</a>
        <br>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Mood</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Your database connection here
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "registration_login_db";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: ". $connection->connect_error);
                }

                // Read all rows from the mood tracker table
                $sql = "SELECT * FROM tb_mood_tracker";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: ". $connection->connect_error);
                }

                // Read data of each row
                while($row = $result->fetch_assoc()){
                    // Determine color based on mood
                    if ($row['mood'] == 1) {
                        $color = '#f44336';  // Red
                    } elseif ($row['mood'] == 2 || $row['mood'] == 3) {
                        $color = '#FFDA7D';  // Yellow
                    } else {
                        $color = '#5DF17E';  // Green
                    }

                    echo "
                        <tr>
                            <td>{$row['date']}</td>
                            <td style='background-color: $color;'>{$row['mood']}</td>
                            <td>{$row['notes']}</td>
                            <td>
                            <a class='btn btn-edit btn-sm' href='mood_edit.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-delete btn-sm' href='mood_delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</a>
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
    <br>



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

</body>
</html>
=======
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
    <link rel="stylesheet" href="/css/moodstyles.css">
</head>

<body>
    <div class="container">
        <form action="submit.php" method="post">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date"><br><br>

            <label>Your Mood Today:</label>
            <div class="rating-form">
                <label for="super-happy" class="lb">
                    <input type="radio" name="rating" class="super-happy" id="super-happy" value="super-happy">
                    <svg class="svg" viewBox="0 -2 28 28">
                        <path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path>
                    </svg>
                </label>
                <label for="neutral" class="lb">
                    <input type="radio" name="rating" class="neutral" id="neutral" value="neutral">
                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 -2 28 28">
                        <path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z"></path>
                    </svg>
                </label>
                <label for="super-sad" class="lb">
                    <input type="radio" name="rating" class="super-sad" id="super-sad" value="super-sad">
                    <svg class="svg" viewBox="0 -2 28 28">
                        <path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z"></path>
                    </svg>
                </label>
            </div>

            <textarea id="entry" name="entry" rows="4" cols="50" placeholder="Enter your notes here..."></textarea><br><br>

            <input type="submit" name="submit" value="Save Entry">
        </form>
    </div>
</body>

</html>
>>>>>>> d8e852937feb1c509330a1fccefbdd64e8fb4fad:src/mood.php
