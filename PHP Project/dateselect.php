<?php
$id = $_GET["id"];
$type = $_GET['type'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" href="./style/style.css">
    <title>Date selector</title>

</head>

<body>
    <fieldset class="card">
        <legend class='h4'>Your Meal planner</legend>
        <form action="actions/a_time.php" method="post" enctype="multipart/form-data">
            <h2">When would you like to have your meal?</h2>
            <br>
            <h5>Select a date:<br><br>
                <input class='form-control' type="date" name="date" step="any">
                <input type="hidden" name="recipe_id" value="<?php echo $id ?>" />
                <input type="hidden" name="type" value="<?php echo $type ?>" />
            </h5>
            <a href="home.php"><button class='btn btn-warning mt-3 me-2' type="button">Back</button></a>
            <button class='btn btn-success' type="submit">Confirm</button>

        </form>
    </fieldset>
</body>

</html>