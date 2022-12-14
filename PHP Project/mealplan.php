<?php
session_start();
require_once "components/db_connect.php";

if (isset($_SESSION['adm'])) {
    $val = $_SESSION['adm'];
}
if (isset($_SESSION['user'])) {
    $val = $_SESSION['user'];
};

$sql = "SELECT meal_plan.*, recipe.picture, recipe.name, recipe.type, recipe.calories, recipe.prep_time, recipe.diet FROM meal_plan JOIN recipe ON meal_plan.fk_recipe_id = recipe.recipe_id WHERE meal_plan.fk_users_id = $val ORDER BY date, typeindex asc";
// var_dump($sql);
// exit();
$result = mysqli_query($connect, $sql);

$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
                <td id='meal_row'><img class='img-thumbnail' src='" . $row['picture'] . "'</td>
                <td id='meal_row'>" . $row['name'] . "</td>
                <td id='meal_row'>" . $row['calories'] . "</td>
                <td id='meal_row'>" . $row['prep_time'] . "</td>
                <td id='meal_row'>" . $row['diet'] . "</td>
                <td id='meal_row'>" . $row['type'] . "</td>
                <td id='meal_row'>" . $row['date'] . "</td>
                <td id='meal_row'><a href='details.php?id=" . $row['fk_recipe_id'] . "'><button class='btn btn-primary' type='button'>Info</button></a>
                <a href='actions/a_mealplan_delete.php?id=" . $row['fk_recipe_id'] . "'><button class='btn btn-danger'>Delete</button></a></td>
                </tr>";
    }
} else {
    $tbody = "<tr><td colspan='8'><center>No Data Available</center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" href="./style/style.css">
    <title>Your meal plan</title>



</head>

<body>
<?php require_once 'navbar.php' ?>
    <div class="container-fluid d-flex flex-column text-center">
        <h2 class="m-4">Your Meal plan</h2>
        <table class='table table-striped'>
            <thead class='table-secondary text-nowrap'>
                <tr>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Picture</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Recipe name</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Calories</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Preparation Time</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Diet</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Type</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Weekday</th>
                    <th class='h5' style='padding-top: 4vh; padding-bottom: 4vh;'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
        </div>
    </div>
</body>

</html>