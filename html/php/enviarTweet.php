<?php

function post_tweet($tweet_text) {

  require_once('tmh/tmhOAuth.php');
  require_once 'twitterFull.inc'; 
  
  $connection->request('POST', 
    $connection->url('1/statuses/update'), 
    array('status' => $tweet_text));
  
  return $connection->response['code'];
}
?>