<header class="header">

  <!-- For the Backenders: You can Put a Greeting Message in here if you want, I cant get it to work, so maybe you can. --Abdullah -->
  <!-- <p id="greeting">Welcome <span><?php echo $_SESSION['email']; ?></span></p> -->

  <div class="header-2">
    <div class="flex">
      <a href="../dashboard.php" class="logo">MealPlanner.</a>
      <nav class="navbar">
        <a href="../dashboard.php">Home</a>
        <a aria-current="page" href="../CRUD/create.php">Create a Recipe</a>
        <a aria-current="page" href="../recipes.php">Recipes</a>
        <a class="nav-link" href="../adm_crud/create.php">Create a user</a>
      </nav>
      <div class="user-box">
        <a class="delete-btn" href="logout.php?logout">Sign out</a>
      </div>
    </div>

</header>