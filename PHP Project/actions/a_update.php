<?php
session_start();

require_once '../components/db_connect.php';
if ($_POST) {
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];
    $prep_time = $_POST['prep_time'];
    $calories = $_POST['calories'];
    $diet = $_POST['diet'];
    $picture = $_POST['picture'];
    $url = $_POST['url'];
    $type = $_POST['type'];
    $id = $_POST['id'];
    
    $typeindex='';
    if ($type = 'breakfast') {
        $typeindex = 1;
    }
    if ($type = 'lunch') {
        $typeindex = 2;
    }
    if ($type = 'dinner') {
        $typeindex = 3;
    }

    $sql = "UPDATE recipe SET name = '$name', ingredients = '$ingredients', description = '$description', prep_time = $prep_time, calories = $calories, diet = '$diet', picture = '$picture', url = '$url', type = '$type', typeindex = $typeindex WHERE recipe_id ={$id}";

    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Recipe info has been successfully updated!";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
    <title>Update</title>
    <link rel="stylesheet" href="../style/style.css">
    <?php require_once '../components/bootstrap.php' ?>
   
</head>

<body>
    <div class="container " id="messages">
        <div class="card shadow" style="width: 45rem" ;>
            <div>
                <h1>Update status</h1>
            </div>
            <div class="alert alert-<?= $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>

            </div>
            <a href='../recipes.php'><button class="btn btn-success border rounded" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>