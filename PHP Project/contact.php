<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Font-Awesome-Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style-Link -->
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
<?php require_once './navbar.php' ?>

    <div class="heading">
        <h3>Contact Us!</h3>
        <p><a href="index.php">Home</a> / Contact</p>
    </div>

    <section class="contact">
        <form action="" method="post">
            <h3>Get in touch!</h3>
            <input type="text" name="name" required placeholder="Enter your Name..." class="box">
            <input type="email" name="email" required placeholder="Enter your E-Mail..." class="box">
            <input type="number" name="number" min="0" required placeholder="Enter your Number..." class="box">
            <textarea name="message" cols="30" rows="10" placeholder="Enter your Message..." class="box"></textarea>
            <input type="submit" value="Send Message" name="send" class="btn">
        </form>
    </section>

    <?php require_once 'footer.php' ?>

    <!-- ------- JS Link ------- -->
    <script src="./scripts/script.js"></script>
</body>

</html>