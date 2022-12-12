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

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM users WHERE user_status != '$status'";
$result = mysqli_query($connect, $sql);

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded' src='" . $row['image'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td><a href='adm_crud/update.php?id=" . $row['users_id'] . "'><button class='btn btn-primary btn-sm m-2' type='button'>Edit</button></a>
             <a href='adm_crud/delete.php?id=" . $row['users_id'] . "'><button class='btn btn-danger btn-sm m-2' type='button'>Delete</button></a></td>
            </tr>";
    }
} else {
    $tbody = "<tr><td colspan='6'><center>No Data Available </center></td></tr>";
}
$sql1 = "SELECT * FROM users where user_status = 'adm'";
$result1 = mysqli_query($connect, $sql1);
//this variable will hold the body for the Admin
$tbody1 = '';
if (mysqli_num_rows($result1)  > 0) {
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        $tbody1 .= "<tr>
            <td>" . $row1['first_name'] . ' ' . $row1['last_name'] . "</td>
            </tr>";
    }
}

$sql2 = "SELECT * FROM users where user_status = 'adm'";
$result2 = mysqli_query($connect, $sql2);
//this variable will hold the body for the Admin
$tbody2 = '';
if (mysqli_num_rows($result2)  > 0) {
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $tbody2 .= $row2['image'];
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
    <title>Dashboard</title>

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" href="./style/style.css">
    
</head>

<body>
    <!-- navbar for admin -->
    <?php require_once './adminNavbar.php' ?>



    <div class="container">
        <div class="row">
            <div>
                <img class="rounded" src="<?= $tbody2 ?>" alt="Adm avatar">

                <h4><?= $tbody1 ?></h4>
                <p class="lead">(Administrator)</p>

            </div>
            <div>
                <p>User Information</p>
                <table class='table table-striped bg-light'>
                    <thead class='table-secondary'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Email</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php require_once 'footer.php' ?>
</body>

</html>