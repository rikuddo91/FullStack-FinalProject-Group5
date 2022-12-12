<?php
session_start();
require_once 'components/db_connect.php';

// it will never let you open index (login) page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
    exit;
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard.php"); // redirects to home.php
}

$error = false;
$email = $pass = $emailError = $passError = '';

if (isset($_POST['btn-login'])) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['password']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password";
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing

        $sql = "SELECT users_id, first_name, last_name, password, user_status FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1 && $row['password'] == $password) {
            if ($row['user_status'] == 'adm') {
                $_SESSION['adm'] = $row['users_id'];
                header("Location: dashboard.php");
            } else {
                $_SESSION['user'] = $row['users_id'];
                header("Location: home.php");
            }
        } else {
            $errTyp = "danger";
            $errMSG = "Ooops! Something went wrong. Please try again.";
        }
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
    <title>Document</title>
    <?php require_once 'components/bootstrap.php'?>
    
  </head>

<body>
<div class="container d-flex justify-content-center">
        <form class="card" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2 class="display-5 text-center">Log in to MealPlanner</h2>
            <hr />
            
            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert p-3 alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                </div>

            <?php
            }
            ?>

            <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" maxlength="40" />
            <span class="text-danger"><?php echo $emailError; ?></span>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Password"  maxlength="15" />
            <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
            <button class="btn btn-md btn-primary btn-sm" type="submit" name="btn-login">Sign In</button>
            <hr />
            <p class="lead">Already registered?</p>
            <a class="btn btn-success btn-sm" href="register.php">Sign up</a>
        </form>
    </div>
</body>
</html>

