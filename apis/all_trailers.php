<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    // Get the channel data
    // UCRg_lFHDC6WXQnXG7S9anxA 
    // UC_x5XG1OV2P6uZZ5FSM9Ttw
    // UCbGvldOvvO89dit8MqVRnzQ
    $yt_api = "AIzaSyCFSJnKGBC6WXHeT_1rQIjgTcnOC_f4ef8";
    $channelId = "UC_x5XG1OV2P6uZZ5FSM9Ttw";

  // Call for the videos
  // $ch = curl_init();
  $yt_api_url = "https://www.googleapis.com/youtube/v3/search?key=$yt_api&channelId=$channelId&part=snippet,id&order=date&maxResults=20";
  // curl_setopt($ch, CURLOPT_URL, $yt_api_url);

  // curl_setopt($ch, CURLOPT_HEADER, 0);

  // curl_exec($ch);
  // curl_close($ch);
  $yt_json = file_get_contents($yt_api_url);
  if($yt_api) {
    session_start();
    $_SESSION['object'] = $yt_json;
    $videos = json_decode($yt_json);
  } else {
    $videos = array('msg'=>'No contents');

  }
 
  // var_dump($videos->items);
  // session_start();
  // $_SESSION['object'] = $yt_json;
  // echo $yt_json;






  



  // Next page call
  // if(isset($_GET['page'])){
  //   $yt_next_api = "https://www.googleapis.com/youtube/v3/search?pageToken=CBkQAA&part=snippet&maxResults=25&order=relevance&q=site%3Ayoutube.com&topicId=%2Fm%2F02vx4&key={YOUR_API_KEY}";
  //   $yt_json = file_get_contents($yt_next_api);
  //   echo  $yt_json;
  // }

  
   
