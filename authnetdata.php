<?php
//echo "<br>authnetdata is included<br>";
/****NOTE***
Please download the PHP SDK available at https://developer.authorize.net/downloads/ for more current code.
*/

/*
D I S C L A I M E R                                                                                          
WARNING: ANY USE BY YOU OF THE SAMPLE CODE PROVIDED IS AT YOUR OWN RISK.                                                                                   
Authorize.Net provides this code "as is" without warranty of any kind, either express or implied, including but not limited to the implied warranties of merchantability and/or fitness for a particular purpose.   
Authorize.Net owns and retains all right, title and interest in and to the Automated Recurring Billing intellectual property.
*/

/*
take care to assure that username and transkey are stored in a secure manner
*/

// $login="26g34AHy9"; //live login
// $trankey="8t6b68b2DMB34Sp4";//live transaction key

$login="9Rqj54V9"; //sandbox login
$trankey="4R2q9y49EpVAh68f";//sandbox transaction key
//https://api.authorize.net/xml/v1/request.api
$host = "api.authorize.net";
//$path = "/gateway/transact.dll";
$path = "/xml/v1/request.api";

?>
