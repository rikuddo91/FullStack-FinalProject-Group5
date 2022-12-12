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

if (isset($_SESSION['user'])) {
    $val = $_SESSION['user'];
};

// exit;

$sql = "SELECT * FROM recipe_manager JOIN recipe on
recipe_manager.fk_recipe_id = recipe.recipe_id WHERE fk_user_id = $val";
$result = mysqli_query($connect, $sql);
$tbody = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<div class='col'>
        <div class='card h-100 shadow justify-content-center'>
            <img src=" . $row['picture'] . " class='card-img-top' alt='" . $row['name'] . "'>
            <div class='card-body'>
            <h4 class='card-title text-center'><i>" . $row['name'] . "</i></h5>
            <div class='d-flex flex-column mt-auto'>
            <div class='card-body'>
            <p class='card-text'><strong>Type:</strong> " . $row['type'] . " </p>
            <p class='card-text'><strong>Preparation time:</strong> " . $row['prep_time'] . "   </p>
            <p class='card-text'><strong>Calories</strong>: " . $row['calories'] . "   </p>
            <p class='card-text'><strong>Diet:</strong> " . $row['diet'] . "   </p>
            </div>
            </div>
            <div class='d-flex flex-column align-items-center justify-content-center'>
            <span>" . "<a href='details.php?id=" . $row['recipe_id'] . "'><button class='btn btn-success cardbtn mt-4 mb-1' type='button'><span class='text-nowrap'>More Info</span></button></a></span>
            <a href='CRUD/update.php?id=" . $row['recipe_id'] . "'><button class='btn btn-warning cardbtn mb-1' type='button'><span class='text-nowrap'>Update</span></button></a>
            <a href='CRUD/delete.php?id=" . $row['recipe_id'] . "'><button class='btn btn-danger cardbtn' type='button'><span class='text-nowrap'>Delete</span></button></a>
            </div>
            </div>
            </div>
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

    <script src="https://use.fontawesome.com/releases/v6.2.0/css/all.css" crossorigin="anonymous"></script>
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