
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title><link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
</head>

<header>
    <nav style="background-color: white;">
        <div class="logo-container">
            <a href="admin_dashboard.php">
                <img src="../assets/gg-logo.png" alt="GabayGinhawa-logo">
            </a>
        </div>
       
        
        <div class="user-controls">
            <div class="user-controls">

      
            </div>
           
                <div class="profile-container">
                    <div class="profile-hover">
                        <img class="profile-image" src="../assets/profile.png" alt="User Profile">
                        <ul class="dropdown-content">
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="menu-icon" onclick="toggleMenu()">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                </nav>
            </header>

</head>
<div id="quickLinks">
    <a href="user.php">User Management</a>
    <a href="admin.php">Admin Management</a>
 
</div>
</html>