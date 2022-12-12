<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../../components/db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    
    $sql = "UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email', password = '$password', image = '$image' WHERE users_id = {$id}";

    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "User info has been successfully updated!";
    } else {
        $class = "danger";
        $message = "Error while updating user info: <br>" . mysqli_connect_error();
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update user info</title>
    <?php require_once '../../components/bootstrap.php' ?>
    
</head>

<body>
<div class="container d-flex justify-content-center">
    <div class="card shadow" style="width: 45rem";>
        <div>
            <h1>Update user info</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
        </div>  
        <div class="d-flex justify-content-start">
        <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning border rounded" type='button'>Back</button></a>
            <a href='../../dashboard.php'><button class="btn btn-success border rounded" type='button'>Home</button></a>
        </div>
    </div>
    </div>
</body>
</html>