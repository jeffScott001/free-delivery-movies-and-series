<?php
    if(isset($_GET['sign_out'])){
        session_start();
        session_destroy();
        header('Location: http://localhost/online_freedelivery_movies_series/index.php'); 
    } else {
        header('Location: http://localhost/online_freedelivery_movies_series/index.php'); 
    }