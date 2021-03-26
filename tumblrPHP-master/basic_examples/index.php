<?php

include ("../lib/tumblrPHP.php");

// Enter your Consumer / Secret Key:
$consumer = 'shUZD5eNPMrucRPJdWhyNoIwYKabBLSx4vDd35X1Iww9yHOHap';
$secret = 'let6eJEYv7qVbu8Y3IEeljtnxQ0uZ5R0RQG6v2deIqu6XpYOpX';

// Create a new instance of the Tumblr Class with your Conumser and Secret when you create your app.
$tumblr = new Tumblr($consumer, $secret);

// Get the request tokens based on your consumer and secret and store them in $token
$callback_url = 'http://lalanii.com/tumblrPHP-master/oauth_examples/callback.php';
$token = $tumblr->getRequestToken($callback_url);

// Set session of those request tokens so we can use them after the application passes back to your callback URL
$_SESSION['oauth_token'] = $token['oauth_token'];
$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];

// Grab the Authorize URL and pass through the variable of the oauth_token
$data = $tumblr->getAuthorizeURL($token['oauth_token']);

// The user will be directed to the "Allow Access" screen on Tumblr
?>
<script>
location.href="<?php echo $data; ?>";
</script>
<?php
//header("Location: " . $data);

?>