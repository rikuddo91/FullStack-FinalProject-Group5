<?php
session_start();
require_once '../components/db_connect.php';

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
    $user = $_SESSION['user'];
};
 if(isset($_POST['filter'])){
    $category=$_POST['category'];
    
     $sql =  "SELECT * FROM recipe_manager JOIN recipe on
     recipe_manager.fk_recipe_id = recipe.recipe_id 
      WHERE recipe_manager.fk_user_id = '{$user}' AND ((recipe.type = '{$category}') OR (recipe.diet = '{$category}'))";

    $result = mysqli_query($connect, $sql);
    
    $typeOfCourse ='';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $typeOfCourse .= "<div class='col-lg-4 col-md-6 col-sm-12'>
            <div class='card h-100 shadow justify-content-center'>
                <img src=" . $row['picture'] . " class='card-img-top' alt='" . $row['name'] . "'>
                <div class='card-body'>
                <h4 class='card-title text-center'><i>" . $row['name'] . "</i></h5>
                <p class='card-text mt-5'><strong>Type:</strong> " . $row['type'] . "   </p>
                <p class='card-text'><strong>Preparation time:</strong> " . $row['prep_time'] . "   </p>
                <p class='card-text'><strong>Calories</strong>: " . $row['calories'] . "   </p>
                <p class='card-text'><strong>Diet:</strong> " . $row['diet'] . "   </p>
                </div>
                <div class='d-flex flex-column align-items-center justify-content-center'>
                <span>" . "<a href='../details.php?id=" . $row['recipe_id'] . "'><button class='btn btn-success cardbtn mt-4 mb-1' type='button'><span class='text-nowrap'>More Info</span></button></a></span>
                <a href='../CRUD/update.php?id=" . $row['recipe_id'] . "'><button class='btn btn-warning cardbtn mb-1' type='button'><span class='text-nowrap'>Update</span></button></a>
                <a href='../CRUD/delete.php?id=" . $row['recipe_id'] . "'><button class='btn btn-danger cardbtn mb-2' type='button'><span class='text-nowrap'>Delete</span></button></a>
                </div>
                
                </div>
            </div>";
         
        };
    }
    else {
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
    
</head>

<body>
    <?php require_once '../navbar1.php' ?>

   
        <div class="manageProduct">
        <div class='row row-cols-xl-4 g-5'>
            <tbody>
                <?=$typeOfCourse ?>
            </tbody>
          
        </div>
    </div>
      
        <div class='d-flex justify-content-end'>
                <a href="../recipemanager.php"><button class='btn btn-success text-white' type="button">Back</button></a>
            </div>
    </div>
    <?php require_once '../footer.php' ?>
</body>
