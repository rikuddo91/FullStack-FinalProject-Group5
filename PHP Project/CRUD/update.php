<?php
require_once '../components/db_connect.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM recipe WHERE recipe_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $ingredients = $data['ingredients'];
        $description = $data['description'];
        $prep_time = $data['prep_time'];
        $calories = $data['calories'];
        $diet = $data['diet'];
        $url = $data['url'];
        $type = $data['type'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Recipe</title>
    <?php require_once '../components/bootstrap.php' ?>
    <link rel="stylesheet" href="../style/style.css">

</head>

<body>
    <?php require_once '../components/navbar.php' ?>
    <fieldset class="container d-flex flex-column border p-4 bg-light">
        <h1 class="mb-4 text-center">Update recipe </h1>
        <div class="d-flex justify-content-center"><img class='img-thumbnail rounded' style="max-width:19rem; justify-content:center;" src='<?php echo $picture ?>' alt="<?php echo $name ?>"> </div>
        
        <form action="../actions/a_update.php" method="post" enctype="multipart/form-data">
            <hr>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="<?php echo $name ?>" value="<?php echo $name ?>" /></td>
                </tr>
                <tr>
                    <th>Ingredients</th>
                    <td><input class='form-control' type="any" name="ingredients" placeholder="<?php echo $ingredients ?>" value="<?php echo $ingredients ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="<?php echo $description ?>" value="<?php echo $description ?>" /></td>
                </tr>
                <tr>
                    <th>Time for preparation</th>
                    <td><input class='form-control' type="any" name="prep_time" placeholder="<?php echo $prep_time ?>" value="<?php echo $prep_time ?>" /></td>
                </tr>
                <tr>
                    <th>Calories</th>
                    <td><input class='form-control' type="any" name="calories" placeholder="<?php echo $calories ?>" value="<?php echo $calories ?>" /></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><select class='form-control text-muted' type="text" name="type" step="any">
                            <option value="">Please choose an option</option>
                            <option value="breakfast">breakfast</option>
                            <option value="lunch">lunch</option>
                            <option value="dinner">dinner</option>
                        </select></td>
                </tr>

                <th>Diet</th>
                <td><select class='form-control text-muted' type="text" name="diet" step="any">
                        <option value="">Please choose an option</option>
                        <option value="regular">regular</option>
                        <option value="vegetarian">vegetarian</option>
                        <option value="high-protein">high-protein</option>
                        <option value="low-carb">low-carb</option>
                    </select></td>

                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="any" name="picture" placeholder="<?php echo $picture ?>" value="<?php echo $picture ?>" /></td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td><input class='form-control' type="any" name="url" placeholder="Please insert the link of the webpage" value="<?php echo $url ?>" /></td>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['recipe_id'] ?>" />
                    <input type="hidden" name="image" value="<?php echo $data['picture'] ?>" />

                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="../recipes.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <?php require_once '../components/footer.php' ?>
</body>

</html>