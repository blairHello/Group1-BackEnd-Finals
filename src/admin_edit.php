<?php
include "config.php";


$id ="";
$firstname = "";
$surname = "";
$birthdate = "";
$email = "";

$errorMessage ="";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD']== 'GET') {
    //GET METHOD: SHOW DATA OF USER
    if ( !isset($_GET["id"])){
        header("location: admin.php");
        exit;
    }
    $id = $_GET["id"];
    
//READ ROW OF SELECTED USER FROM DB TABLE
 $sql = "SELECT * FROM tb_admin WHERE id=$id";
 $result = $connection->query($sql);
 $row = $result->fetch_assoc();

if(!$row){
    header("location:admin.php");
    exit;
}
$firstname = $row["firstname"];
$surname = $row["surname"];
$birthdate = $row["birthdate"];
$email = $row["email"];

}
else {
    //POST METHOD UPDATE DATA OF USER
    $id = $_POST["id"];
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];

    do {
        if ( empty($id) || empty($firstname) || empty($surname) || empty($birthdate)|| empty($email)){
            $errorMessage = "All the fields are required.";
            break;
    
    } 
    $sql = "UPDATE tb_admin " .
    " SET firstname = '$firstname', surname = '$surname', birthdate = '$birthdate', email = '$email'" .
     "WHERE id = $id";


$result = $connection ->query($sql);
if (!$result){
    $errorMessage = "Invalid query: " . $connection->error;
    break;
}
$successMessage = "User data updated.";
header("location: admin.php");
    }
    while (true);
}
?>
<!DOCTYPE html>
<html>
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/forms.css">

</head>
<body>
    <div class="container my-5">
        <h2>Update Admin Data</h2>

<?php
if ( !empty($errorMessage)){
    echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
     </div>   ";
} ?>




<form method="post" action="admin_edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Surname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Birthdate</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

       


            <?php
if ( !empty($successMessage)){
    echo "
    <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6'
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
     </div>  
    </div>
</div> ";
} 
?>


<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-sm-3 d-grid">
        <a class="btn btn-outline primary" href="admin.php" role="button">Cancel</a>
    </div>
</div>


        </form>
    </div>
</body>
</html>