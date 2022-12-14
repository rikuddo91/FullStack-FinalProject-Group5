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
            <a href='details.php?id=" . $row['recipe_id'] . "' class='btn' style='width: 11rem; padding: 13px;' type='button'><span class='text-nowrap'>More Info</span></a>
            <a href='dateselect.php?id=" . $row['recipe_id'] . "&type=" . $row['type'] . "' class='btn mb-5' style='width: 13rem; padding: 13px;' type='button'><span class='text-nowrap'>Add to plan!</span></a>            
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
    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" href="./style/style.css">
    <title>Home</title>

</head>

<body>
    <?php require_once 'navbar.php' ?>

    <section class="home">
        <div class="content">
            <h3> MealPlanner menu</h3>
            <p class="lead">Choose your favourite dishes and organize your day!</p>
            <div class="d-flex justify-content-center">
                <form method="POST" action="actions/a_filter.php">
                    <select name="category" class="filter" style="background-color: #E6E7EB">
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
                    <button class="btn" name="filter">Look for it!</button>
                </form>
            </div>
        </div>
    </section>

    <br>

    <div class="container">
        <div class='row'>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </div>
    </div>

    <br>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="./images/background4.jpg" alt="">
            </div>
            <div class="content">
                <h3>About Us!</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore, tempore. Quam voluptas perferendis ipsa voluptatibus, quo repellat vel consequatur fugit ipsam, temporibus cumque non quas amet eum veniam vitae!</p>
                <a href="about.php" class="btn">Read more</a>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php' ?>
</body>

</html>