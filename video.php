<?php
  session_start();
  $video_data = json_decode($_SESSION['object'])->items;
  if(isset($_GET['videoid'])){

      function compare($var){
          $id = $_GET['videoid'];
          if(isset($var->id->videoId)){
            return($var->id->videoId == $id);
          }
      }
      $details = array_filter($video_data, "compare");
      
  }
?>
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
<body class="more-details">
<?php
  include ("inc/navbar.php");
?>
<body>
    <div  class="video-more-details-container">
      <div>
       
        <div class="viewer-details">
        <a class="here" href="#here">Make an Order</a>
          <?php echo "<iframe class=\"iframe-more-details\" src=\"https://www.youtube.com/embed/".$_GET['videoid']."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>"; ?>
        </div>

        <div class="description-container">
          <?php foreach($details as $detail): ?>
            <h4><?php echo $detail->snippet->title;?></h4>
            <p><?php echo $detail->snippet->description;?></p> 
            <input id="title-video" type="hidden" value="<?php echo $detail->snippet->title?>">
            <input id="thumnail-video" type="hidden" value="<?php echo $detail->snippet->thumbnails->default->url?>">
          <?php endforeach; ?>
        </div>
        <div class="seasons">
          <ul>
            <li>Season 2 | <span>Episodes: 20</span></li>
            <li>Season 1 | <span>Episodes: 20</span></li>
            <li>Season 3 | <span>Episodes: 20</span></li>
            <li>Season 4 | <span>Episodes: 20</span></li>
            <li>Season 5 | <span>Episodes: 20</span></li>
            <li>Season 6 | <span>Episodes: 20</span></li>
            <li>Season 7 | <span>Episodes: 20</span></li>
            <li>Season 8 | <span>Episodes: 20</span></li>
            <li>Season 9 | <span>Episodes: 20</span></li>
            <li>Season 10 |  <span>Episodes: 20</span></li>
            <li>Season 11 |  <span>Episodes: 20</span></li>
          </ul>
        </div>  
      </div>
      <div id="here" class="add-to-cart">
            <div id="add-to-cart-btn" class="icon-add active">
              <p>Click To Place Order</p>
            <i class="fas fa-film"></i>
            <i class="fas fa-plus"></i>
            </div>
            <div class="select-season inactive">
              <p>Select the Seasons</p>
              <ul id="seasons-list">
              <li>S01</li>
              <li>S02</li>
              <li>S03</li>
              <li>S04</li>
              <li>S05</li>
              </ul>
              <p><i id="foward-season-btn" class="fas fa-chevron-right"></i></p>
            </div>
            <div id="episodes-container" class="select-episodes inactive">
              <p class="seasons-list">S01</p>
              <ul class="episodes-lists">
                <li>S01E01</li>
                <li>S01E02</li>
                <li>S01E03</li>
                <li>S01E04</li>
                <li>S01E05</li>
              </ul>
              <p class="seasons-list">S02</p>
              <ul class="episodes-lists">
                <li>S02E01</li>
                <li>S02E02</li>
                <li>S02E03</li>
                <li>S02E04</li>
                <li>S02E05</li>
                <li>S02E06</li>
                <li>S02E07</li>
                <li>S02E08</li>
                <li>S02E09</li>
                <li>S02E10</li>
              </ul>
              <p class="seasons-list">S03</p>
              <ul class="episodes-lists">
                <li>S03E01</li>
                <li>S03E02</li>
                <li>S03E03</li>
                <li>S03E04</li>
                <li>S03E05</li>
                <li>S03E06</li>
                <li>S03E07</li>
                <li>S03E08</li>
                <li>S03E09</li>
                <li>S03E10</li>
              </ul>
              <p class="seasons-list">S04</p>
              <ul class="episodes-lists">
                <li>S04E01</li>
                <li>S04E02</li>
                <li>S04E03</li>
                <li>S04E04</li>
                <li>S04E05</li>
                <li>S04E06</li>
                <li>S04E07</li>
                <li>S04E08</li>
                <li>S04E09</li>
                <li>S04E10</li>
              </ul>
              <p class="seasons-list">S05</p>
              <ul class="episodes-lists">
                <li>S05E01</li>
                <li>S05E02</li>
                <li>S05E03</li>
                <li>S05E04</li>
                <li>S05E05</li>
                <li>S05E06</li>
              </ul>
              <p><i id="backward-episodes-btn" class="fas fa-chevron-left"></i><i id="foward-episodes-btn" class="fas fa-chevron-right"></i></p>
            </div>
            <div class="confirm-order inactive">
              <button class="btn-confirm">Confirm</button>
              <button class="btn-view">View Order</button>
              <p><i id="confirm-backward-btn" class="fas fa-chevron-left"></i></p>
            </div>    
      </div>
    </div>
<script src="js/video.js"></script>
<script src="js/nav_cart2.js"></script>
</body>
</html>
