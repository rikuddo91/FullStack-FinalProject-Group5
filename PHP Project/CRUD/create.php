<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/bootstrap.php' ?>


    <title>Add recipe</title>

</head>

<body>
    <fieldset class="card">
        <legend class='h2'>Add recipe</legend>
        <form action="../actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Recipe name" /></td>
                </tr>
                <tr>
                    <th>Ingredients</th>
                    <td><input class='form-control' type="text" name="ingredients" placeholder="Ingredients" step="any" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Description" step="any" /></td>
                </tr>
                <tr>
                    <th>Preparation time</th>
                    <td><input class='form-control' type="number" name="prep_time" placeholder="Preparation time" step="any" /></td>
                </tr>
                <tr>
                    <th>Calories</th>
                    <td><input class='form-control' type="number" name="calories" placeholder="Calories" step="any" /></td>
                </tr>
                <tr>
                    <th>Diet</th>
                    <td><select class='form-control text-muted' type="text" name="diet" step="any">
                            <option value=""> --choose an option--</option>
                            <option value="regular">regular</option>
                            <option value="vegetarian">vegetarian</option>
                            <option value="high-protein">high-protein</option>
                            <option value="low-carb">low-carb</option>
                        </select></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td><input class='form-control' type="text" name="url" placeholder="URL to preparation instruction" step="any" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="text" name="picture" placeholder="URL of picture" /></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><select class='form-control text-muted' type="text" name="type" step="any">
                            <option value=""> --choose an option--</option>
                            <option value="breakfast">breakfast</option>
                            <option value="lunch">lunch</option>
                            <option value="dinner">dinner</option>
                        </select></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Upload</button></td>
                    <td><a href="../home.php"><button class='btn btn-warning' type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>