<?php
session_start();

require_once '../components/db_connect.php';
$error = false;
$mealError = '';

if ($_POST) {
    $date = $_POST['date'];
    $id = $_POST['recipe_id'];
    $type = $_POST['type'];

    if (isset($_SESSION['adm'])) {
        $val = $_SESSION['adm'];
    }
    if (isset($_SESSION['user'])) {
        $val = $_SESSION['user'];
    };

    $query = "SELECT meal_plan.date, meal_plan.fk_users_id, recipe.type FROM meal_plan join recipe on meal_plan.fk_recipe_id = recipe.recipe_id where meal_plan.date = '$date' AND recipe.type = '$type'";

    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);

    if ($count != 0) {
        $error = true;

        if ($type == "breakfast") {
            $class = "danger";
            $mealError = "Breakfast has already been chosen for this date. Select different meal type.";
        }
        if ($type == "lunch") {
            $class = "danger";
            $mealError = "Lunch has already been chosen for this date. Select different meal type.";
        }
        if ($type == "dinner") {
            $class = "danger";
            $mealError = "Dinner has already been chosen for this date. Select different meal type.";
        } else {
            $class = "danger";
            $mealError = "You have already planned your menu for this date";
        }
    }

    if (!$error) {

        $sql = "INSERT INTO meal_plan (meal_plan_id, fk_users_id, fk_recipe_id,  date, fk_recipe_manager_id) VALUES (NULL, $val, $id, '$date', NULL)";

        if (mysqli_query($connect, $sql) === true) {
            $class = "success";
            $message = "Meal successfully added to your meal planner!";
        } else {
            $class = "danger";
            $message = "Error while creating record. Please try again: <br>" . $connect->error;
        }
    }
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php require_once '../components/bootstrap.php' ?>

</head>

<body>
    <div class="dateselectMessage" id="messages">
        <div id="messageCard" class="card shadow">
            <div>
                <h1>Update status</h1>
            </div>
            
            <div class="alert alert-<?= $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($mealError) ?? ''; ?></p>
            </div>
            <a href='../recipes.php'><button class="white-btn" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>