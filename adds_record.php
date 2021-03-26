<?php
include 'includes/database.php';
require_once('geoplugin.class/geoplugin.class.php');
$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
 
$geoplugin->locate();
 
$ads_click_ip = "{$geoplugin->ip}";
$ads_city = "{$geoplugin->city}";
$ads_country = "{$geoplugin->countryName}";
$ads_lang = "{$geoplugin->longitude} - {$geoplugin->latitude}";
	//"Region: {$geoplugin->region} \n".
	//"Area Code: {$geoplugin->areaCode} \n".
	//"DMA Code: {$geoplugin->dmaCode} \n".
	//"Currency Code: {$geoplugin->currencyCode} <br />\n".
	//"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
	//"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";
/* 
if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	//our visitor is not using the same currency as the base currency
	echo "<p>At todays rate, US$100 will cost you " . $geoplugin->convert(100) ." </p>\n";
}
 
 find places nearby 
$nearby = $geoplugin->nearby();
if ( isset($nearby[0]['geoplugin_place']) ) {
	echo "<pre><p>Some places you may wish to visit near " . $geoplugin->city . ": </p>\n";
	foreach ( $nearby as $key => $array ) {
 
		echo ($key + 1) .":<br />";
		echo "\t Place: " . $array['geoplugin_place'] . "<br />";
		echo "\t Country Code: " . $array['geoplugin_countryCode'] . "<br />";
		echo "\t Region: " . $array['geoplugin_region'] . "<br />";
		echo "\t County: " . $array['geoplugin_county'] . "<br />";
		echo "\t Latitude: " . $array['geoplugin_latitude'] . "<br />";
		echo "\t Longitude: " . $array['geoplugin_longitude'] . "<br />";
		echo "\t Distance (miles): " . $array['geoplugin_distanceMiles'] . "<br />";
		echo "\t Distance (km): " . $array['geoplugin_distanceKilometers'] . "<br />";
 
	}
	echo "</pre>\n";
}*/

$adds_location = $nrecord;
$adds_page = $_POST['adpage'];
$adds_type = $_POST['adtype'];
$adds_clicks = 1;
$adds_status = 1;
$adds_click_date = date('d-m-Y h:i:s A');

//echo "Insert into lladds set adds_location='$adds_location',adds_page='$adds_page',	adds_type='$adds_type',adds_clicks='1',adds_status='1',adds_click_date='$adds_click_date',adds_click_location=''";

mysql_query("Insert into lladds set adds_country='$ads_country',adds_page='$adds_page',	adds_type='$adds_type',adds_clicks='1',adds_status='1',adds_click_date='$adds_click_date',adds_city='$ads_city',adds_lang='$ads_lang',adds_ip='$ads_click_ip'");
?>