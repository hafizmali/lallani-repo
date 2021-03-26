<?php

session_start();

include ("../lib/tumblrPHP.php");

// Enter your Consumer / Secret Key:
$consumer = "shUZD5eNPMrucRPJdWhyNoIwYKabBLSx4vDd35X1Iww9yHOHap";
$secret = "let6eJEYv7qVbu8Y3IEeljtnxQ0uZ5R0RQG6v2deIqu6XpYOpX";

// Create a new instance of the Tumblr Class with your Conumser and Secret when you create your app.
$tumblr = new Tumblr($consumer, $secret);

// Get the request tokens based on your consumer and secret and store them in $token
//$token = $tumblr->getRequestToken();

// Set session of those request tokens so we can use them after the application passes back to your callback URL
//$_SESSION['oauth_token'] = $token['oauth_token'];
//$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];


$token = 'oF0xGI3uoUoFZrx4YEGpweJGoMWy6jOJcSlJwAFvoljYbvHNCc';
$tokenSecret = 'UcHQ6j3iYmaokcbzqzXMDZLyTFgHsst3VTZbA5Jot16W6WLZi5#_=_';
$tumblr->setToken($token, $tokenSecret);

// Grab the Authorize URL and pass through the variable of the oauth_token
//$data = $tumblr->getAuthorizeURL($token['oauth_token']);

//http://lalanii.com/?oauth_token=qXPCCNThM55py6wKTKWqExyZOz0AtRt6PyowcohC6c7GnlYHb6&oauth_verifier=ojmUZjDw9NMIxAjO9wrpbKktYzILmW6sTGM2s6wK57oda7BGNp#_=_

// The user will be directed to the "Allow Access" screen on Tumblr

print '<pre>';

// Retrieve User Info
$user_info = $tumblr->getUserInfo();
print_r($user_info);

foreach ($tumblr->getUserInfo()->user->blogs as $blog) {
    print_r($blog);
    echo $blog->name . "\n";
}

?>
<script>
//location.href="<?php echo $data; ?>";
</script>
<?php
?>