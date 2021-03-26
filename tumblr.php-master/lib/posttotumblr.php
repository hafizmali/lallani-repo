<?php
session_start();
ini_set("display_errors", 1);

//include('Tumblr/API/Client.php');
//include('Tumblr/API/RequestException.php');
//include('Tumblr/API/RequestHandler.php');

//include 'lib/Tumblr/API/Keys.php';
$consumerKey = 'shUZD5eNPMrucRPJdWhyNoIwYKabBLSx4vDd35X1Iww9yHOHap';
$consumerSecret = 'let6eJEYv7qVbu8Y3IEeljtnxQ0uZ5R0RQG6v2deIqu6XpYOpX';
// I have created a new file Keys.php
//It carries consumer-key, secret, token, token-secret
//include 'vendor/autoload.php';

use Tumblr\API\Client;

$client = new Tumblr\API\Client($consumerKey, $consumerSecret);

//$token = $_SESSION['oauth_token'];
//$tokenSecret = $_SESSION['oauth_token_secret'];

$token = 'oF0xGI3uoUoFZrx4YEGpweJGoMWy6jOJcSlJwAFvoljYbvHNCc';
$tokenSecret = 'UcHQ6j3iYmaokcbzqzXMDZLyTFgHsst3VTZbA5Jot16W6WLZi5#_=_';

$client->setToken($token, $tokenSecret);

print '<pre>';

// Retrieve User Info
$user_info = $client->getUserInfo();
print_r($user_info);

foreach ($client->getUserInfo()->user->blogs as $blog) {
    print_r($blog);
    echo $blog->name . "\n";
}
?>