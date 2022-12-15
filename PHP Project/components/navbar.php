<header class="header">
  
  <!--
  <div class="header-1">
    <div class="flex">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      For the Backenders: You can Put a Greeting Message in here if you want, I cant get it to work, so maybe you can. --Abdullah 
       <p id="greeting">Welcome <span><?php echo $_SESSION['email']; ?></span></p>
      <p>New ? <a href="index.php">Login</a> | <a href="register.php">Register</a></p>
    </div> 
  </div>-->
  <div class="header-2">
    <div class="flex">
      <a href="../home.php" class="logo">MealPlanner.</a>
      <nav class="navbar">
        <a href="../home.php">Home</a>
        <a aria-current="page" href="../CRUD/create.php">Create a Recipe</a>
        <a aria-current="page" href="../recipemanager.php">My Recipes</a>
        <a aria-current="page" href="../mealplan.php">My Meal Plan</a>
        <a href="../about.php">About</a>
        <a href="../contact.php">Contact</a>
      </nav>
      <div class="user-box">
        <a class="delete-btn" href="../logout.php?logout">Sign out</a>
      </div>
    </div>

</header>