<?php
session_start();
require_once 'components/db_connect.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$res = mysqli_query($connect, "SELECT * FROM recipe");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$tbody = '';

if ($res->num_rows > 0) {
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $tbody .= "<div class='col'>
    <div class='card h-100 shadow justify-content-center'>
    <img src='".$row['picture']."' class='card-img-top' alt='".$row['name']."'>
    <h4 class='card-title text-center mt-3'><i>" . $row['name'] . "</i></h5>
    <div class='d-flex flex-column mt-auto'>
            <div class='card-body'>
            <p class='card-text'><strong>Type:</strong> " . $row['type'] . " </p>
            <p class='card-text'><strong>Preparation time:</strong> " . $row['prep_time'] . "   </p>
            <p class='card-text'><strong>Calories</strong>: " . $row['calories'] . "   </p>
            <p class='card-text'><strong>Diet:</strong> " . $row['diet'] . "   </p>
            </div>
            </div>
    <div class='d-flex flex-column align-items-center justify-content-center'>
    <a href='CRUD/update.php?id=". $row['recipe_id'] . "'class='btn btn-success btn-sm cardbtn mt-3 mb-1' type='button'><span class='text-nowrap'>Update</span></a>
    <a href='CRUD/delete.php?id=". $row['recipe_id'] . "'class='btn btn-primary btn-sm cardbtn mb-2' type='button'><span class='text-nowrap'>Delete</span></a>
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
    <title>Recipes</title>

    <?php require_once 'components/bootstrap.php'?>
    
  </head>
  
<body>
    <!-- Special navbar for admin with creating recipe function -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MealPlanner</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="CRUD/create.php?">Create new recipe</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php?logout">Sign out</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <p class='h2 mt-5 mb-5'>Recipe collection</p>
            <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['recipe_id'] ?>" />
            <input type="hidden" name="picture" value="<?php echo $picture ?>" />
            </form>
    </div>  
    <div class="container">
        <div class='row row-cols-xl-4'>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </div>
    </div>
    
    <?php require_once 'footer.php'?>
</body>
</html>