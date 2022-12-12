<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard

if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// echo ($result);
// exit;

$sql = "SELECT * FROM recipe";
$result = mysqli_query($connect, $sql);
$tbody = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
        <div class='col'>
        <div class='card h-100 shadow justify-content-center'>
            <img src=" . $row['picture'] . " class='card-img-top' alt='" . $row['name'] . "'>
            <h4 class='card-title text-center mt-3'><i>" . $row['name'] . "</i></h4>
            <div class='d-flex flex-column mt-auto'>
            <div class='card-body'>
            <p class='card-text'><strong>Type:</strong> " . $row['type'] . " </p>
            <p class='card-text'><strong>Preparation time:</strong> " . $row['prep_time'] . "   </p>
            <p class='card-text'><strong>Calories</strong>: " . $row['calories'] . "   </p>
            <p class='card-text'><strong>Diet:</strong> " . $row['diet'] . "   </p>
            </div>
            </div>
            <div class='d-flex flex-column align-items-center justify-content-center'>
            <a href='details.php?id=" . $row['recipe_id'] . "' class='btn btn-success btn-sm cardbtn mt-3 mb-1' type='button'><span class='text-nowrap'>More Info</span></a>
            <a href='dateselect.php?id=" . $row['recipe_id'] . "&type=" . $row['type'] . "' class='btn btn-primary btn-sm cardbtn mb-2' type='button'><span class='text-nowrap'>Add to plan!</span></a>            
            </div></div>
        </div>";
    };
} else {
    $tbody =  "<tr><td colspan='8'><center>No Data Available</center></td></tr>";
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require_once 'components/bootstrap.php' ?>


</head>

<body>
    <?php require_once 'navbar.php' ?>

    <div class="text-center" style="background-image: url(https://cdn.pixabay.com/photo/2017/09/16/19/21/salad-2756467_960_720.jpg);
            background-size: cover;">
        <h1> MealPlanner menu</h1>
        <div>
            <p class="lead">Choose your favourite dishes and organize your day!</p>
            <div class="d-flex justify-content-center">
                <form method="POST" action="actions/a_filter.php">
                    <select name="category" class="rounded shadow" style="background-color: #E6E7EB">
                        <option value="#">Your personal filter: </option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="regular">Regular</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="high-protein">High-protein</option>
                        <option value="low-carb">Low-carb</option>
                    </select>
                    <br>
                    <button class="btn btn-success" name="filter">Look for it!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class='row'>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </div>
    </div>
    <?php require_once 'footer.php' ?>
</body>

</html>