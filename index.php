<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/be994c5cbf.js" crossorigin="anonymous"></script>
    <title>ScottMovies</title>
</head>
<body class="">
    <div class="container-index">
        <?php if(isset($_GET['msg'])){ ?>
            <div class="confirm-msg"> <span class="cancel">X</span> YOUR ORDER HAS BEEN SUCCESSFULLY PLACED, WE WILL GET BACK TO YOU REGARDING THE DELIVERY. THANK YOU FOR SHOPPING WITH US</div>
        <?php }?>
        <div class="cover">
            <div class="logo-index">
                <p class="logo-title-index">JeffMovies</p>
            </div>
            <div class="user-known">
                <div class="loggers-btn-index">
                    <?php if(isset($_SESSION['verified'])) {?>
                        <p class="user">Welcome <?php echo $_SESSION['user_name'];  ?><i id="drop-down-index" class="fas fa-caret-down domant"></i></p>
                        <div id="list" class="options domant">
                            <a href="#">Profile</a>
                            <a href="#">Favorites</a>
                            <a href="http://localhost/online_freedelivery_movies_series/auth/logout.php?sign_out=1">Log Out</a>
                        </div>
                    <?php }else { ?>
                        <a class="sign-in-btn-index" href="http://localhost/online_freedelivery_movies_series/user/login.php">Log In</a> <span >|</span>
                        <a class="register-btn-index" href="http://localhost/online_freedelivery_movies_series/user/register.php">Register</a>
                    <?php } ?>
                </div> 
            </div>
            <div class="video-container-index">
                        <iframe class="iframe-more-details\" src="https://www.youtube.com/embed/-jtZB-CsE3s?rel=0&controls=0&autoplay=1&loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <div class="links-landing-page">
                <a href="all_trailers.php">Trailers</a>
                <a href="http://localhost/online_freedelivery_movies_series/movies_trailers.php?playlist_name=all_movies&playlist=PL3kx5h2TrYGweGaJ7yoHBtil5dnlhn6nK">Movies Trailers</a>
                <a href="http://localhost/online_freedelivery_movies_series/series_trailers.php?playlist_name=all_series&playlist=PL3kx5h2TrYGweGaJ7yoHBtil5dnlhn6nK">Series Trailers</a>
            </div>
        </div>
    </div>
    <div class="about-section">
        
    </div>
    <script src="js/main.js"></script>
  </body>
  </html>

