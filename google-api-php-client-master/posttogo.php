<?php
require_once 'src/Google/autoload.php'; // or wherever autoload.php is located

/* Client ID
904402428151-h7rtktng0e12vqg2hdpb7saj1qsh70gp.apps.googleusercontent.com
Client secret
uDoRHqV7Yva2-e9CVRkJMCsv */

  $client = new Google_Client();
  $client->setApplicationName("Client_Library_Examples");
  $client->setDeveloperKey("lalanii-1041");

  $service = new Google_Service_Books($client);
  $optParams = array('filter' => 'free-ebooks');
  $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

  foreach ($results as $item) {
    echo $item['volumeInfo']['title'], "<br /> \n";
  }
?>