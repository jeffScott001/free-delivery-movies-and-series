 <nav class="nav-bar">
    <h1 id="logo-text"><a href="/">JeffMovies</a></h1>
      <ul class="nav-links">
        <li class="nav-link"><a href="http://localhost/online_freedelivery_movies_series/index.php">Home</a></li>
        <li class="nav-link"><a href="http://localhost/online_freedelivery_movies_series/index.php#about">About</a></li>
        <li class="nav-link"><a href="http://localhost/online_freedelivery_movies_series/index.php#contact">Contact</a></li>
      </ul>
      <!-- <div class="loggers-btn">
        <a href="http://localhost/online_freedelivery_movies_series/user/login.php" class="btn" id="login">Log In</a>
        <a href="http://localhost/online_freedelivery_movies_series/user/register.php" class="btn" id="register">Register</a>
        <a href="user/logout.php" class="btn" id="logout">Log Out</a>
      </div> -->
      <div class="loggers-btn">
                    <?php if(isset($_SESSION['verified'])) {?>
                        <p class="user-nav">Welcome <?php echo $_SESSION['user_name'];  ?><i id="drop-down-index" class="fas fa-caret-down domant"></i></p>
                        <div id="list" class="options-nav domant">
                            <a href="#">Profile</a>
                            <a href="#">Favorites</a>
                            <a href="http://localhost/online_freedelivery_movies_series/auth/logout.php?sign_out=1">Log Out</a>
                        </div>
                    <?php }else { ?>
                        <a class="sign-in-btn-index" href="http://localhost/online_freedelivery_movies_series/user/login.php">Log In</a> <span >|</span>
                        <a class="register-btn-index" href="http://localhost/online_freedelivery_movies_series/user/register.php">Register</a>
                    <?php } ?>
                </div> 
      <div class="cart-icon">
        <div class="cart-container">
          <i class="fas fa-film"></i>
          <span class="count-container">0</span>
          <input type="checkbox" class="cart-active">
        </div>
        <div class="cart-items-container domant">
          <div class="cart-items-container2"></div>
          <a href="http://localhost/online_freedelivery_movies_series/order.php" class="confirm-order-cart">Order</a>
        </div>
      </div>
    </nav>
