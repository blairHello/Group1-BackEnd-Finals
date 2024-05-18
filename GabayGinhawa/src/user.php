
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/GabayGinhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="../css/user.css">
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
    <a href="water_admin.php">Water Intake Data</a>
    <a href="#">Activity Tracker Data</a>
    <a href="#">Mood Tracker Data</a>
    <a href="#">Caloric Intake Data</a>
    <a href="#">Sleep Tracker Data</a>
   
</div>

<body>
<br>
<br>
<br>    <div class="container my-5">
<h2><b>User List</h2></b>
        <a class="btn btn-primary new-user" href="user_create.php" role="button">New User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Birthdate</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <?php
                    include "config.php";

                    //Check connection
                    if ($connection->connect_error) {
                        die("Connection failed: ". $connection->connect_error);
            
                    }
                    //read all row from database table
                    $sql = "SELECT * FROM tb_user";
                    $result = $connection->query($sql);

                    if (!$result){
                        die("Invalid query: ". $connection->error);
                    }

                    //read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                   
<tr>
                <td>$row[id]</td>
                <td>$row[firstname]</td>
                <td>$row[surname]</td>
                <td>$row[birthdate]</td>
                <td>$row[email]</td>
                <td>
                <a class='btn btn-primary btn-sm' href='user_edit.php?id=$row[id]'>Edit</a>
                <a class='btn btn-primary btn-sm' href='user_delete.php?id=$row[id]'>Delete</a>
                </td>
</tr>
";
                    }
    ?>
              </tbody>      

        </table>
    </div>
</body>
</html>