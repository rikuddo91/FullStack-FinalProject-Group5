<?php
session_start();
require_once 'components/db_connect.php';


if (isset($_GET['id'])) {
  //    $sql = "SELECT * FROM recipe_manager JOIN recipe on
  //      recipe_manager.fk_recipe_id = recipe.recipe_id WHERE recipe_manager_id = {$_GET['id']}";
  $sql = "SELECT * FROM recipe WHERE recipe_id = {$_GET['id']}";
  $result = mysqli_query($connect, $sql);
  $body = "";
  if ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $body .= "<div id='imgDiv' class='col col-lg-6'>
    <img src='" . $row['picture'] . "' class=' img-responsive shadow mt-3 mb-5 bg-light rounded border border-secondary'; alt='...'>
    </div>
     
    <div id='detailsDiv' class='col col-lg-6 col-md-8'>
      <div class='card-body shadow mt-3 mb-3 bg-light rounded '>
        <h3 class='card-title text-center'>Details</h3>
            <hr>
            <p class='card-text '><span class='fw-bold'>Course:</span> " . $row['type'] . "</p>
            <hr>
            <p class='card-text '><span class='fw-bold'>Preparation time:</span> " . $row['prep_time'] . " minutes</p>
            <hr>
            <p class='card-text'><span class='fw-bold'>Calories:</span> " . $row['calories'] . "</p>
            <hr>
            <p class='card-text'><span class='fw-bold'>Suitable diet:</span> " . $row['diet'] . "</p>
            <hr>
            <p class='card-text'><span class='fw-bold'>Ingredients:</span> " . $row['ingredients'] . "</p>
            <hr>
            <p class='card-text'><span class='fw-bold'>Description:</span> " . $row['description'] . "</p>
            <div id='btnsDiv' class='row'>
              <div class='col-6'>
                <a href='".$row['url']."' ><button class='white-btn' type='button'>Link to the recipe</button></a>
              </div>
              <div class='col-2'>
                  <a href='home.php'><button class='option-btn' type='button'>Back</button></a>   
                </div>
            </div>
      </div> 
    </div>
       
      ";
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
  <?php require_once 'components/bootstrap.php' ?>
  <link rel="stylesheet" href="./style/style.css">
  <title>Document</title>

</head>

<body>
  <?php require_once 'navbar.php' ?>
  <div class="detailsContainer">
    <h1><?php echo $name ?></h1>
    <div class="row">
      <?php echo $body ?>
    </div>
  </div>

  <?php require_once 'footer.php' ?>
</body>

   
</body>

</html>

