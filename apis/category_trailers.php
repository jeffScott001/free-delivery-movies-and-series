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

    $videos = new stdClass();
    if(isset($_GET['playlist'])){
        $playlist_id =  $_GET['playlist'];
        $api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=20&playlistId=$playlist_id&key=$yt_api"; 
        $playlist = file_get_contents($api_url);
        if($playlist) {
            session_start();
            $_SESSION['object'] = $playlist;
            $videos = json_decode($playlist);
        } else {
            $videos = array('msg'=>'No contents');
        }

        

    }
