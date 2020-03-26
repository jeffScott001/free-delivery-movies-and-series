<?php require_once './apis/category_trailers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/be994c5cbf.js" crossorigin="anonymous"></script>
    <title>ScottMovies</title>
</head>
<body class="main">
<?php
  include ("inc/navbar.php");  
  include ("inc/searchbar.php");
?>

  <div class="container">
    <div class="categories-container">
    
    <ul class="categories-list">
        <li><h1 class="title-cat" href="index.php">Series</h1></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=all_series&playlist=PL3kx5h2TrYGweGaJ7yoHBtil5dnlhn6nK">All</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=action&playlist=PL3kx5h2TrYGweGaJ7yoHBtil5dnlhn6nK">Action</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=animation&playlist=lMtP-vxyE-A&list=PLBDA074E6B463154D">Animation</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=drama&playlist=PLCDWgWmd8TqAQQ5hPtfmWuyls-tUl5EJd">Drama</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=sci-fi&playlist=playlist=PLSBlhbfM-l3t5iuu_3GJ39nwwc-fBqRoW">SC-FI</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=horror&playlist=playlist=3Y9XeruN5RY&list=PLriZt3RmcI33ZsErogMXngeeT7Mwq1FNe">Horror</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?playlist_name=thriller&playlist=playlist=PLelK7aEMtfK2wpv7tv472alrDpNwO_0jw">Thriller</a></li>
      </ul>
    </div>
    <div class="trailers-container">
      <?php foreach($videos->items as $video):?>
        <div class="video">
        <input id="title-video" type="hidden" value="<?php echo $video->snippet->title?>">
        <input id="thumnail-video" type="hidden" value="<?php echo $video->snippet->thumbnails->default->url?>">
          <iframe width="250" height="200" src="https://www.youtube.com/embed/<?php echo $video->id->videoId; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <p class="video-title"><?php echo $video->snippet->title; ?></p>
          <a href="video.php?videoid=<?php echo $video->id->videoId; ?>" class="link-class">More Details | Make Order</a>
           <!--add to Cart -->
           <div class="icon-add-main active">
            <i id="add-to-cart-btn" class="fas fa-cart-plus"></i>
            <span id="add-to-cart-btn">Add to cart</span>
          </div>
          <div class="select-season inactive">
            <p>Select the Seasons</p>
            <ul id="seasons-list">
            <li class="seasons-lists">S01</li>
            <li class="seasons-lists">S02</li>
            <li class="seasons-lists">S03</li>
            <li class="seasons-lists">S04</li>
            <li class="seasons-lists">S05</li>
            <li class="seasons-lists">S06</li>
            <li class="seasons-lists">S07</li>
            <li class="seasons-lists">S08</li>
            <li class="seasons-lists">S09</li>
            <li class="seasons-lists">S10</li>
            </ul>
            <p><i id="foward-season-btn" class="fas fa-chevron-right"></i></p>
          </div>
          <div class="select-episodes inactive">
            <p>S01</p>
            <ul>
              <li class="episode-lists">S01E01</li>
              <li class="episode-lists">S01E02</li>
              <li class="episode-lists">S01E03</li>
              <li class="episode-lists">S01E04</li>
              <li class="episode-lists">S01E05</li>
              <li class="episode-lists">S01E06</li>
              <li class="episode-lists">S01E07</li>
              <li class="episode-lists">S01E08</li>
              <li class="episode-lists">S01E09</li>
              <li class="episode-lists">S01E10</li>
            </ul>
            <p>S02</p>
            <ul>
            <li class="episode-lists">S02E01</li>
              <li class="episode-lists">S02E02</li>
              <li class="episode-lists">S02E03</li>
              <li class="episode-lists">S02E04</li>
              <li class="episode-lists">S02E05</li>
              <li class="episode-lists">S02E06</li>
              <li class="episode-lists">S02E07</li>
              <li class="episode-lists">S02E08</li>
              <li class="episode-lists">S02E09</li>
              <li class="episode-lists">S02E10</li>
            </ul>
            <p>S03</p>
            <ul>
              <li class="episode-lists">S03E01</li>
              <li class="episode-lists">S03E02</li>
              <li class="episode-lists">S03E03</li>
              <li class="episode-lists">S03E04</li>
              <li class="episode-lists">S03E05</li>
              <li class="episode-lists">S03E06</li>
              <li class="episode-lists">S03E07</li>
              <li class="episode-lists">S03E08</li>
              <li class="episode-lists">S03E09</li>
              <li class="episode-lists">S03E10</li>
            </ul>
            <p>S04</p>
            <ul>
              <li class="episode-lists">S04E01</li>
              <li class="episode-lists">S04E02</li>
              <li class="episode-lists">S04E03</li>
              <li class="episode-lists">S04E04</li>
              <li class="episode-lists">S04E05</li>
              <li class="episode-lists">S04E06</li>
              <li class="episode-lists">S04E07</li>
              <li class="episode-lists">S04E08</li>
              <li class="episode-lists">S04E09</li>
              <li class="episode-lists">S04E10</li>
            </ul>
            <p>S05</p>
            <ul>
              <li class="episode-lists">S05E01</li>
              <li class="episode-lists">S05E02</li>
              <li class="episode-lists">S05E03</li>
              <li class="episode-lists">S05E04</li>
              <li class="episode-lists">S05E05</li>
              <li class="episode-lists"S05>E06</li>
              <li class="episode-lists">S05E07</li>
              <li class="episode-lists">S05E08</li>
              <li class="episode-lists">S05E09</li>
              <li class="episode-lists">S05E10</li>
            </ul>
            <p><i id="backward-episodes-btn" class="fas fa-chevron-left"></i><i id="foward-episodes-btn" class="fas fa-chevron-right"></i></p>
          </div>
          <div class="confirm-order inactive">
            <button id='btn-confirm' class="btn-confirm">Confirm</button>
            <button class="btn-view">View Order</button>
            <p><i id="confirm-backward-btn" class="fas fa-chevron-left"></i></p>
          </div>   
          </div>
      <?php endforeach;?>
    </div>
    <div class="pagination-container">
      <button class="more-videos" id="20">More Trailers <br><i class="fas fa-chevron-circle-down"></i></button>
        <!-- <p class="back"><i class="fas fa-arrow-left"></i></p>
        <p class="forward"><i class="fas fa-arrow-right"></i></p> -->
    </div>
  </div>
  <body>
    <!-- <script src="js/main.js"></script> -->
    <script src="js/nav_cart2.js"></script>
    <script src="js/main_cart.js"></script>  
  </body>
  </html>

