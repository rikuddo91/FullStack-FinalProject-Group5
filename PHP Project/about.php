<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/bootstrap.php' ?>

    <!-- Style-Link -->
    <link rel="stylesheet" href="./style/style.css">

    <title>About</title>
</head>

<body>
    <?php require_once './navbar.php' ?>

    <div class="heading">
        <h3>About Us!</h3>
        <p><a href="index.php">Home</a> / About</p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="./images/background2.jpg" alt="">
            </div>
            <div class="content">
                <h3>Why choose us?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit odio neque minima ipsa ullam hic omnis labore illo vero atque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit repudiandae asperiores corrupti suscipit aperiam atque laudantium illum rem molestias ipsam aliquid voluptas iusto, quos maxime, sit natus. Voluptas numquam tempora nihil, sapiente optio illo labore blanditiis adipisci consequuntur quaerat cum ut exercitationem quam odio quisquam beatae? Aliquam inventore delectus perferendis?</p>
                <a href="contact.php" class="btn">Contact Us!</a>
            </div>
        </div>
    </section>

    <?php require_once './footer.php'; ?>

    <!-- ------- JS Link ------- -->
    <script src="./scripts/script.js"></script>
</body>

</html>