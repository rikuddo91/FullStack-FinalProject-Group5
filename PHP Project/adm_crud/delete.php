<?php
session_start();
require_once '../components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}
//initial bootstrap class for the confirmation message
$class = 'd-none';
//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE users_id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $fname = $data['first_name'];
        $lname = $data['last_name'];
        $email = $data['email'];
        $image = $data['image'];
    }
}
//the POST method will delete the user permanently
if ($_POST) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE users_id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "alert alert-success";
        $message = "Successfully Deleted!";
        header("refresh:3;url=../dashboard.php");
    } else {
        $class = "alert alert-danger";
        $message = "Ooops! Something went wrong: <br>" . $connect->error;
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <?php require_once '../components/bootstrap.php' ?>
    
</head>

<body>
    <div class="container d-flex justify-content-center">
    <div class="card shadow" style="width: 45rem";>
    <fieldset>
        <legend class='h2'>Delete user info<br></legend>
        <img class='rounded' src='<?php echo $image ?>' alt="<?php echo $fname ?>">
        <br>
        <div class="<?php echo $class; ?>" role="alert">
        <p><?php echo ($message) ?? ''; ?></p>
        </div>
        <hr>
        <table class="table">
            <tr>
                <td><?php echo "$fname $lname" ?></td>
                <td><?php echo $email ?></td>
            </tr>
        </table>
        <h5>Do you really want to delete info of this user?</h5>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="picture" value="<?php echo $picture ?>" />
            <button class="btn btn-danger" type="submit">Yes</button>
            <a href="../dashboard.php"><button class="btn btn-success" type="button">Cancel</button></a>
        </form>
    </fieldset>
    </div>
    </div>
</body>
</html>