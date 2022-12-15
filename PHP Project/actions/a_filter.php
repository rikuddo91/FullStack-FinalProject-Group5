<?php
require_once '../components/db_connect.php';

if (isset($_POST['filter'])) {
    $category = $_POST['category'];

    $sql = "SELECT * FROM recipe WHERE (type = '{$category}') OR (diet = '{$category}') ";
    $result = mysqli_query($connect, $sql);
    $typeOfCourse = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $typeOfCourse .= "<div class='col-lg-4 g-3'>
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
                <span>" . "<a href='../details.php?id=" . $row['recipe_id'] . "'><button class='btn btn-success btn-sm cardbtn mt-3 mb-1' type='button'><span class='text-nowrap'>More Info</span></button></a></span>
                <a href='../dateselect.php?id=" . $row['recipe_id'] . "&type=" . $row['type'] . "' class='btn btn-primary btn-sm cardbtn mb-2' type='button'><span class='text-nowrap'>Add to plan!</span></a>
               
                </div>
                </div>
            </div>";
        };
    } else {
        $typeOfCourse =  "<tr><td colspan='8'><center>No Data Available</center></td></tr>";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort</title>
    <?php require_once '../components/bootstrap.php' ?>
    <link rel="stylesheet" href="../style/style.css">

</head>

<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">

    <div>
    <div class='row row-cols-xl-4 g-5 mt-4'>
            <tbody>
                <?= $typeOfCourse ?>
            </tbody>

        </div>
    </div>
    </div>

    <?php require_once '../components/footer.php' ?>
</body>
