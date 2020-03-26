<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
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
echo $yt_json;