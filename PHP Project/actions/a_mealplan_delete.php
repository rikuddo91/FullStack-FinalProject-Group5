<?php

require_once '../components/db_connect.php';

if ($_GET) {
    $id = $_GET['id'];
    $sql = "DELETE FROM meal_plan WHERE fk_recipe_id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";

    } else {
        $class = "danger";
        $message = "Recipe info was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../CRUD/error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete recipe</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php require_once '../components/bootstrap.php' ?>
    

</head>

<body>
    <div class="mealplanContainer" id="messages">
            <div class="card shadow" id="messageCard">
                <div>
                    <h1>Delete recipe from my planner</h1>
                </div>
                <div class="alert alert-<?= $class; ?>" role="alert">
                    <p><?= $message; ?></p>
                </div>
                <a href='../mealplan.php'><button class="white-btn" type='button'>Home</button></a>
            </div>
    </div>
</body>

</html>