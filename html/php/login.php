<?php

/**
 * Demonstration of the various OAuth flows. You would typically do this
 * when an unknown user is first using your application. Instead of storing
 * the token and secret in the session you would probably store them in a
 * secure database with their logon details for your website.
 *
 * When the user next visits the site, or you wish to act on their behalf,
 * you would use those tokens and skip this entire process.
 *
 * The Sign in with Twitter flow directs users to the oauth/authenticate
 * endpoint which does not support the direct message permission. To obtain
 * direct message permissions you must use the "Authorize Application" flows.
 *
 * Instructions:
 * 1) If you don't have one already, create a Twitter application on
 *      https://dev.twitter.com/apps
 * 2) From the application details page copy the consumer key and consumer
 *      secret into the place in this code marked with (YOUR_CONSUMER_KEY
 *      and YOUR_CONSUMER_SECRET)
 * 3) Visit this page using your web browser.
 *
 * @author themattharris
 */

require 'tmh/tmhOAuth.php';
require 'tmh/tmhUtilities.php';
require 'twitter.inc';

$here = tmhUtilities::php_self();
session_start();

function outputError($tmhOAuth) {
  echo 'Error: ' . $tmhOAuth->response['response'] . PHP_EOL;
  tmhUtilities::pr($tmhOAuth);
}

// reset request?
if ( isset($_REQUEST['wipe'])) {
  //session_destroy();
  session_unset();
  session_destroy();
  setcookie(session_name(), '', time()-3600); 
  header("Location: index.php");

// already got some credentials stored?
} elseif ( isset($_SESSION['access_token']) ) {
  $tmhOAuth->config['user_token']  = $_SESSION['access_token']['oauth_token'];
  $tmhOAuth->config['user_secret'] = $_SESSION['access_token']['oauth_token_secret'];

  $code = $tmhOAuth->request('GET', $tmhOAuth->url('1/account/verify_credentials'));
  if ($code == 200) {
    $resp = json_decode($tmhOAuth->response['response']);
	  
	  
	/*echo 'access_token = '.$_SESSION['access_token']['oauth_token'];  
	echo 'oauth_token_secret = '.$_SESSION['access_token']['oauth_token_secret'];*/
	  
    //Save things!!!!    
    // tokens, id, screen_name, profile_url, bio
    //echo $resp->screen_name;
    $_SESSION['twitter'] = $resp->screen_name;

	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");


	//Creo la consulta
	$mi_query = 'SELECT twitter, admin, username
				 FROM usuario
				 WHERE twitter='.$resp->id;

	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	if($result -> num_rows >= 1){
		$registro = $result -> fetch_assoc();
		$_SESSION['admin'] = $registro['admin'];
	}else{
		$mi_query = "INSERT INTO usuario VALUES ('".
						$resp->id_str."','".
						$resp->screen_name."', '".
						$_SESSION['access_token']['oauth_token']."','".
						$_SESSION['access_token']['oauth_token_secret']."',0)";		
		$result = $con -> query($mi_query);		
		$_SESSION['admin'] = 0;		
		$_SESSION['username'] = $resp->screen_name;	
	}
	
	$con -> close();	
    header("Location: index.php");
  } else {
    outputError($tmhOAuth);
  }
  //header("Location: {$_SESSION['ref']}");
// we're being called back by Twitter
} elseif (isset($_REQUEST['oauth_verifier'])) {
  $tmhOAuth->config['user_token']  = $_SESSION['oauth']['oauth_token'];
  $tmhOAuth->config['user_secret'] = $_SESSION['oauth']['oauth_token_secret'];

  $code = $tmhOAuth->request('POST', $tmhOAuth->url('oauth/access_token', ''), array(
    'oauth_verifier' => $_REQUEST['oauth_verifier']
  ));

  if ($code == 200) {
    $_SESSION['access_token'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);
    unset($_SESSION['oauth']);
    header("Location: {$here}");
  } else {
    outputError($tmhOAuth);
  }

// start the OAuth dance
} elseif ( isset($_REQUEST['authenticate']) || isset($_REQUEST['authorize']) ) {
//  $callback = isset($_REQUEST['oob']) ? 'oob' : $here;
  $_SESSION['ref'] = $_SERVER['HTTP_REFERER'];
  $params = array(
    'oauth_callback'     => $here
  );

  /**
if (isset($_REQUEST['force_write'])) :
    $params['x_auth_access_type'] = 'write';
  elseif (isset($_REQUEST['force_read'])) :
    $params['x_auth_access_type'] = 'read';
  endif
**/

  $code = $tmhOAuth->request('POST', $tmhOAuth->url('oauth/request_token', ''), $params);

  if ($code == 200) {
    $_SESSION['oauth'] = $tmhOAuth->extract_params($tmhOAuth->response['response']);
//    $method = isset($_REQUEST['authenticate']) ? 'authenticate' : 'authorize';
    $method = 'authenticate';
//  $force  = isset($_REQUEST['force']) ? '&force_login=1' : '';
//    $authurl = $tmhOAuth->url("oauth/{$method}", '') .  "?oauth_token={$_SESSION['oauth']['oauth_token']}{$force}";
    $authurl = $tmhOAuth->url("oauth/{$method}", '') .  "?oauth_token={$_SESSION['oauth']['oauth_token']}";
    header("Location: {$authurl}");    
  } else {
    outputError($tmhOAuth);
  }
}
