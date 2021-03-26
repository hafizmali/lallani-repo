<?php
session_start();
function getAccessToken() {
    $params = array(
        'grant_type' => 'authorization_code',
        'client_id' => '77ao6suf6k3xtc',
        'client_secret' => 'h5ptjtJtCZecW9fd',
        'code' => $_GET['code'],
        'redirect_uri' => 'http://lalanii.com',
    );
    // Access Token request
    echo $url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);
    // Tell streams to make a POST request
    $context = stream_context_create(
            array('http' =>
                array('method' => 'POST',
                )
            )
    );
    // Retrieve access token information
    $response = file_get_contents($url, false, $context);
    // Native PHP object, please
    $token = json_decode($response);
    // Store access token and expiration time
    $_SESSION['access_token'] = $token->access_token; // guard this! 
    $_SESSION['expires_in'] = $token->expires_in; // relative time (in seconds)
    $_SESSION['expires_at'] = time() + $_SESSION['expires_in']; // absolute time
    return true;
}

function fetch($method, $resource, $body = '') {
    $opts = array(
        'http' => array(
            'method' => $method,
            'header' => "Authorization: Bearer " . 
            $_SESSION['access_token'] . "\r\n" . 
            "x-li-format: json\r\n"
        )
    );
    $url = 'https://api.linkedin.com' . $resource;
    if (count($params)) {
        $url .= '?' . http_build_query($params);
    }
    $context = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);
    return json_decode($response);
}

if (isset($_GET['error'])) {
    echo $_GET['error'] . ': ' . $_GET['error_description'];
} elseif (isset($_GET['code'])) {
    getAccessToken();
    //$user = fetch('GET', '/v1/people/~:(firstName,lastName)');//get name
    //$user = fetch('GET', '/v1/people/~:(phone-numbers)');//get phone numbers
    $user = fetch('GET', '/v1/people/~:(location:(name))');//get country
    var_dump($user);
}
?>