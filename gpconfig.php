<?php
session_start();
// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';
$client_id = '672170710609-12c787nspi6lq29ctmi47e2mgo23b5ud.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/food_store/vivie_catering/google.php'; // Callback URL
// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
$google_oauthv2 = new Google_Oauth2Service($gclient);
?>


<!-- <?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '672170710609-12c787nspi6lq29ctmi47e2mgo23b5ud.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/food_store/vivie_catering/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?> -->
