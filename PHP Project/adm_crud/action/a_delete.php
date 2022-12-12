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
    $id = $_POST['users_id'];

    $sql = "DELETE FROM users WHERE users_id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "User info has been successfully deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
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
    <title>Delete user info</title>
    <?php require_once '../../components/boot.php' ?>

</head>

<body>
<div class="container d-flex justify-content-center">
    <div class="card shadow" style="width: 45rem";>
        <div>
            <h1>Delete user info</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
        </div>
        <a href='../index.php'><button class="btn btn-success border rounded" type='button'>Home</button></a>
    </div>
    </div>
</body>
</html>