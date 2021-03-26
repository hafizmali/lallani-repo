<?php
header('Content-type: application/xml');
require_once '../includes/database.php'; // configure appropriately
require_once 'rss_feed.php'; // configure appropriately

// database connection settings
$a_db = array(
  "db_server" => "107.180.10.147",
  "db_name" => "dbmaster",
  "db_user" => "lalanii",
  "db_passwd" => "L@l@n11DB",
); 

/*$hostname="107.180.10.147";
$username="dbmaster";
$password="L@l@n11DB";
$dbname="lalanii";*/
 
 
// set more namespaces if you need them
$xmlns = 'xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"';
 
// configure appropriately - pontikis.net is used as an example
$a_channel = array(
  "title" => "http://lalanii.com",
  "link" => "http://lalanii.com",
  "description" => "lalanii",
  "language" => "en",
  "image_title" => "pontikis.net",
  "image_link" => "hhttp://lalanii.com",
  "image_url" => "http://www.pontikis.net/feed/rss.png",
);
$site_url = 'http://lalanii.com'; // configure appropriately
$site_name = 'Tech blog & web labs'; // configure appropriately
 
$rss = new rss_feed($a_db, $xmlns, $a_channel, $site_url, $site_name);
echo $rss->create_feed();
?>