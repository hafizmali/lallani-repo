<?php
session_start();
include ("../includes/startsession.php");
include ("../includes/database.php");


$method = $_POST['paypalm'];
$_SESSION['paymentMethod'] = $method;
/*if(isset($_POST['paymentType']))
{
	$paymentType = $_POST['paymentType'];
	$_SESSION['paymentType'] = $paymentType;
}*/

$userID=$_POST['userID'];
$_SESSION['userID'] = $userID;
$subscription=$_POST['subscription'];
$subscriptione=$_POST['subscriptione'];
$_SESSION['subscription'] = $subscription;

if ((strtoupper($subscription))=="MONTHLY"){
	$monthly="ON"; $_SESSION['monthly'] = "ON";
}elseif ((strtoupper($subscription))=="YEARLY"){
	$yearly="ON"; $_SESSION['yearly'] = "ON";
}elseif ((strtoupper($subscription))=="LIFETIME"){
	$lifetime="ON"; $_SESSION['lifetime'] = "ON";
}

$exp_month=$_POST['exp_month'];
$exp_year=$_POST['exp_year'];
$exp_date = $exp_year."-".$exp_month;
$amount="0.00";


if($method === 'paypalm')
{}
else 
{
	
include ("../includes/authnetdata.php");
//include ("../includes/authnetfunction.php");

$card_num=$_POST['card_num'];
$card_code=$_POST['card_code'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$email=$_POST['email'];
$country=$_POST['country'];
$refId=1; // update to a unique number built off timestamp or some shit
//$startdate= date('Y-m-d', strtotime("+1 week"));
$startdate  = date('Y-m-d', strtotime("now"));
$exp_date   = $_POST['exp_year']."-".$_POST['exp_month'];


if (strtoupper($monthly)=='ON'){$amount="4.99";$description="Lalanii.com Monthly Subscription";$intervalunit="months";$intervalLength=1;$ptype = 'subs';}
if (strtoupper($yearly)=='ON'){$amount="40.00";$description="Lalanii.com Annual Subscription";$intervalunit="days";$intervalLength=365;$ptype = 'subs';}
if (strtoupper($lifetime)=='ON'){
	//$amount="100.00";
	$amount="100.00";
	$description="Lalanii.com Lifetime Access";
	$ptype = 'subs';
// By default, this sample code is designed to post to our test server for
// developer accounts: https://test.authorize.net/gateway/transact.dll
// for real accounts (even in test mode), please make sure that you are
// posting to: https://secure.authorize.net/gateway/transact.dll

$amount = number_format((float)$amount, 2);

//$post_url = "https://test.authorize.net/gateway/transact.dll";
$post_url = "https://secure.authorize.net/gateway/transact.dll";

$post_values = array(
			
			// the API Login ID and Transaction Key must be replaced with valid values
		
			"x_login"				=> $login,
			"x_tran_key"			=> $trankey,
		
			"x_version"				=> "3.1",
			"x_delim_data"			=> "TRUE",
			"x_delim_char"			=> "|",
			"x_relay_response"		=> "FALSE",
		
			"x_type"				=> "AUTH_CAPTURE",
			"x_method"				=> "CC",
			"x_card_num"			=> $card_num,
			"x_exp_date"			=> $exp_date,
			"x_card_code"			=> $card_code,
		
			"x_amount"				=> $amount,
			"x_description"			=> $description,
		
			"x_first_name"			=> $first_name,
			"x_last_name"			=> $last_name,
			"x_address"				=> $address,
			"x_state"				=> $state,
			"x_zip"					=> $zip,
			"x_test_request"		=> "FALSE"
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		

		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object
		
		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);
		
		//var_dump($response_array);
		// The results are output to the screen in the form of an html numbered list.

			if ((strtoupper($lifetime))=='ON'){
				$authResponse=$response_array[0];
				$authReason=$response_array[1];
				$authText=$response_array[2];
			}else{
				$authResponse=$resultCode;
				$authReason=$code;
				$authText=$text;
			}
		
		if($response_array[0]==2||$response_array[0]==3)
		{
			//success
			echo '<b>Payment Failure</b>. <br>';
			echo '<b>Error String</b>: '.$response_array[3];
			//print_r($response_array);
			$authText = $response_array[3];
			$authResponse='Error';
			
			
			$subscriptionn = 'none';
			$subscription = 'none';
			$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID='$userID'";
			mysql_query($sql);
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		}
		else
		{
			$ptid = $response_array[6];
			$ptidmd5 = $response_array[7];
			$status=$response_array[0];
			
			
			echo "$ptid "."Payment Success";
			$_SESSION['transactionID'] = $ptid;
			$_SESSION['totalAMT'] = $amount;			
			
			
			$accessThrough="9999-12-31";
			$subscription="lifetime";
			//$authResponse=1;
			
			
				
				
					$subscriptionn = $subscription;
					$sql="UPDATE llUser SET userType='super', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID='$userID'";
					mysql_query($sql);
				
				
				?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		   
		}

//end lifetime/one time
}
else if($subscriptione == 'eproduct')
{
		$prodquery = mysql_query("Select * from llproducts where home_prod_id = '1' ");
		$prodresult = mysql_fetch_array($prodquery);		
		
		/*-------------------------------------------*/
		
		//$amount = $amount + $pdfresult['ppdfamount'];
		//$ptype = 'ebook';
		
		$amount=$prodresult['prod_price'];
		$description=$prodresult['prod_name'];
		$ptype = 'eproduct';
		
		$amount = number_format((float)$amount, 2);

		//$post_url = "https://test.authorize.net/gateway/transact.dll";
		$post_url = "https://secure.authorize.net/gateway/transact.dll";

		$post_values = array(
			
			// the API Login ID and Transaction Key must be replaced with valid values
		
			"x_login"				=> $login,
			"x_tran_key"			=> $trankey,
		
			"x_version"				=> "3.1",
			"x_delim_data"			=> "TRUE",
			"x_delim_char"			=> "|",
			"x_relay_response"		=> "FALSE",
		
			"x_type"				=> "AUTH_CAPTURE",
			"x_method"				=> "CC",
			"x_card_num"			=> $card_num,
			"x_exp_date"			=> $exp_date,
			"x_card_code"			=> $card_code,
		
			"x_amount"				=> $amount,
			"x_description"			=> $description,
		
			"x_first_name"			=> $first_name,
			"x_last_name"			=> $last_name,
			"x_address"				=> $address,
			"x_state"				=> $state,
			"x_zip"					=> $zip,
			"x_test_request"		=> "FALSE"
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		
		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object
		
		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);
		
		//var_dump($response_array);
		// The results are output to the screen in the form of an html numbered list.

			if ((strtoupper($lifetime))=='ON'){
				$authResponse=$response_array[0];
				$authReason=$response_array[1];
				$authText=$response_array[2];
			}else{
				$authResponse=$resultCode;
				$authReason=$code;
				$authText=$text;
			}
			
		if($response_array[0]==2||$response_array[0]==3)
		{
			//success
			echo '<b>Payment Failure</b>. <br>';
			echo '<b>Error String</b>: '.$response_array[3];
			//print_r($response_array);
			$authText = $response_array[3];
			$authResponse='Error';
			$today=date('Y-m-d H:i:s');
			
			$subscriptionn = 'none';
			//$sql="UPDATE llUser SET subscriptione='',ebook_status='0' where userID='$userID'";
			//mysql_query($sql);
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		}
		else
		{
			$ptid = $response_array[6];
			$ptidmd5 = $response_array[7];
			$status=$response_array[0];
			
			
			echo "$ptid "."Payment Success";
			$_SESSION['transactionID'] = $ptid;
			$_SESSION['totalAMT'] = $amount;			
			
			
			$accessThrough="9999-12-31";
			//$subscription="none";
			//$authResponse=1;
			$today=date('Y-m-d H:i:s');
			
				
			$subscriptionn = 'paidebook';
			$sql="UPDATE llUser SET subscriptione='paidebook' , ebook_status='1' , ebook_date='$today' where userID='$userID'";
			mysql_query($sql);
			
			if(mail($to, $subject, $message, $headers)) 
			{
				
				//$pfileCounter = $pfileCounter + 1;
				//$sql ="UPDATE paidbook SET pfileCounter = $pfileCounter WHERE PEbookID = $PEbookID";
				//mysql_query($sql);

				//echo "The email was sent.";
			}
			else 
			{
				//echo "There was an error sending the mail.";
			}
				
				
				
				?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		   
		}
	
} 
else if($subscriptione == 'ebook')
{
		$pdfquery = mysql_query("Select * from paidbook where peBookSelect = '1' ");
		$pdfresult = mysql_fetch_array($pdfquery);
		
		if(mysql_num_rows($pdfquery) > 0)
		{
			$pdfName 	 = mysql_result($pdfquery, 0, 'ppdfName');
			$fileCounter = mysql_result($pdfquery, 0, 'pfileCounter');
			$mailTitle 	 = mysql_result($pdfquery, 0, 'pmailTitle');
			$MailText    = mysql_result($pdfquery, 0, 'pMailText');
			$PEbookID = mysql_result($pdfquery, 0, 'PEbookID');
			$pfileCounter = mysql_result($pdfquery, 0, 'pfileCounter');
		}
		
		$emailBody = "
				<html>
				<head>
				<title>Paid Ebook</title>
				</head>
				<body>
				<div style='text-align:center'>
				$MailText
				</div>
				</body>
				</html>
				";
				
		$name        = "Name goes here";
		$to          = $email;
		$from        = "lalanii@lalanii.com";
		$subject     = $mailTitle;
		$fileatt     = "/home/lalanii/public_html/lalanii/images/popup/".$pdfName;
		$fileatttype = "application/pdf";
		$fileatname  = $pdfName;
		$headers 	 = "From: $from";
		
		if($fileatname == '')
		{
			$fileatname = 'E-BOOK LALA TEST 2 PDF1453195142.pdf';
		}
		
		// File
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);

// This attaches the file
$semi_rand     = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers      .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .

" boundary=\"{$mime_boundary}\"";


$message = '';

$data = chunk_split(base64_encode($data));


$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatttype};\n" .
" name={".$fileatname."}\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$fileatname}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"-{$mime_boundary}-\n";


 $message .= "--".$mime_boundary."\r\n";
 $message .= "Content-type: text/html; charset=\"utf-8\"\r\n";
 $message .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
 $message .= $emailBody."\r\n\r\n";
 $message .= "--".$mime_boundary."--\r\n\r\n";
//Send the email

		
		/*-------------------------------------------*/
		
		//$amount = $amount + $pdfresult['ppdfamount'];
		//$ptype = 'ebook';
		
		$amount=$pdfresult['ppdfamount'];
		$description="BUY E-BOOK!";
		$ptype = 'ebook';
		
		$amount = number_format((float)$amount, 2);

//$post_url = "https://test.authorize.net/gateway/transact.dll";
$post_url = "https://secure.authorize.net/gateway/transact.dll";

		$post_values = array(
			
			// the API Login ID and Transaction Key must be replaced with valid values
		
			"x_login"				=> $login,
			"x_tran_key"			=> $trankey,
		
			"x_version"				=> "3.1",
			"x_delim_data"			=> "TRUE",
			"x_delim_char"			=> "|",
			"x_relay_response"		=> "FALSE",
		
			"x_type"				=> "AUTH_CAPTURE",
			"x_method"				=> "CC",
			"x_card_num"			=> $card_num,
			"x_exp_date"			=> $exp_date,
			"x_card_code"			=> $card_code,
		
			"x_amount"				=> $amount,
			"x_description"			=> $description,
		
			"x_first_name"			=> $first_name,
			"x_last_name"			=> $last_name,
			"x_address"				=> $address,
			"x_state"				=> $state,
			"x_zip"					=> $zip,
			"x_test_request"		=> "FALSE"
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		
		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object
		
		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);
		
		//var_dump($response_array);
		// The results are output to the screen in the form of an html numbered list.

			if ((strtoupper($lifetime))=='ON'){
				$authResponse=$response_array[0];
				$authReason=$response_array[1];
				$authText=$response_array[2];
			}else{
				$authResponse=$resultCode;
				$authReason=$code;
				$authText=$text;
			}
			
			if($response_array[0]==2||$response_array[0]==3)
		{
			//success
			echo '<b>Payment Failure</b>. <br>';
			echo '<b>Error String</b>: '.$response_array[3];
			//print_r($response_array);
			$authText = $response_array[3];
			$authResponse='Error';
			$today=date('Y-m-d H:i:s');
			
			$subscriptionn = 'none';
			$sql="UPDATE llUser SET subscriptione='',ebook_status='0' where userID='$userID'";
			mysql_query($sql);
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		}
		else
		{
			$ptid = $response_array[6];
			$ptidmd5 = $response_array[7];
			$status=$response_array[0];
			
			
			echo "$ptid "."Payment Success";
			$_SESSION['transactionID'] = $ptid;
			$_SESSION['totalAMT'] = $amount;			
			
			
			$accessThrough="9999-12-31";
			//$subscription="none";
			//$authResponse=1;
			$today=date('Y-m-d H:i:s');
			
				
					$subscriptionn = 'paidebook';
					$sql="UPDATE llUser SET subscriptione='paidebook' , ebook_status='1' , ebook_date='$today' where userID='$userID'";
			mysql_query($sql);
			
			if(mail($to, $subject, $message, $headers)) 
			{
				//var_dump($message);
				$pfileCounter = $pfileCounter + 1;
				$sql ="UPDATE paidbook SET pfileCounter = $pfileCounter WHERE PEbookID = $PEbookID";
				mysql_query($sql);
				//echo "The email was sent.";
			}
			else 
			{
				//echo "There was an error sending the mail.";
			}
				
				
				
				?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		   
		}
	
}
else {
	// do recurring ARB here
	
	//$intervalLength = 1;   //for month
   	
	//$intervalLength = 7;    //for day
	
	//$intervalunit = 'months';
	//$intervalunit = 'days';
	
	//$description="creativewritingagency.com monthly payment";
	
	$exp_date = $_POST['exp_year']."-".$_POST['exp_month'];
	
	$exp_date = date ('Y-m',strtotime($exp_date));
	
	
	
	$content='<?xml version="1.0" encoding="utf-8"?>';
	$content.='<ARBCreateSubscriptionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">';
	$content.='<merchantAuthentication>';
	$content.='<name>' . $login . '</name>';
	$content.='<transactionKey>' . $trankey . '</transactionKey>';
	$content.='</merchantAuthentication>';
	$content.='<refId>' . $refId . '</refId>';
	$content.='<subscription>';
	$content.='<name>' . $description . '</name>';
	/*COPIED PAYMENT SCHEDULE*/
	/*
	$content.='<paymentSchedule><interval><length>1</length><unit>months</unit></interval><startDate>2015-05-17</startDate><totalOccurrences>12</totalOccurrences><trialOccurrences>1</trialOccurrences></paymentSchedule>';
	*/
	
	$content.='<paymentSchedule>';
	$content.='<interval>';
	$content.='<length>'.$intervalLength.'</length>';
	$content.='<unit>'. $intervalunit .'</unit>';
	$content.='</interval>';
	$content.='<startDate>' . $startdate . '</startDate>';
	$content.='<totalOccurrences>24</totalOccurrences>';
	$content.='<trialOccurrences>1</trialOccurrences>';
	$content.='</paymentSchedule>';
	
	$content.='<amount>'. $amount .'</amount>';
	$content.='<trialAmount>0.00</trialAmount>';
	$content.='<payment>';
	$content.='<creditCard>';
	$content.='<cardNumber>' . $card_num . '</cardNumber>';
	$content.='<expirationDate>' . $exp_date . '</expirationDate>';
	$content.='</creditCard>';
	$content.='</payment>';
	$content.='<billTo>';
	$content.='<firstName>'. $first_name . '</firstName>';
	$content.='<lastName>' . $last_name . '</lastName>';
	$content.='<address>'. $address .'</address>';
	$content.='<city>' . $city . '</city>';
	$content.='<state>'. $state .'</state>';
	$content.='<zip>' . $zip . '</zip>';
	$content.='<country>' . $country . '</country>';
	$content.='</billTo>';
	$content.='</subscription>'; 
	$content.='</ARBCreateSubscriptionRequest>';
	
	/* echo "<br>the content: ".$content; */
	//send the xml via curl

	$response = send_request_via_curl($host,$path,$content);
	
			if ((strtoupper($lifetime))=='ON'){
				$authResponse=$response_array[0];
				$authReason=$response_array[1];
				$authText=$response_array[2];
			}else{
				$authResponse=$resultCode;
				$authReason=$code;
				$authText=$text;
			}
	
	
	if ($response)
	{
			
		
		list ($refId, $resultCode, $code, $text, $subscriptionId) = parse_return($response);
		
			if ((strtoupper($lifetime))=='ON'){
				$authResponse=$response_array[0];
				$authReason=$response_array[1];
				$authText=$response_array[2];
			}else{

				$authResponse=$resultCode;
				$authReason=$code;
				$authText=$text;
			}
			
			
	    
		if($resultCode == "OK" || $resultCode == "Ok" || $resultCode == "ok")
		{
			echo $_SESSION['transactionID'] = $subscriptionId;
			echo $_SESSION['totalAMT'] = $amount;
			echo "Transaction Success. <br>";
			echo $response.'<br>'  ;
			
			$accessThrough="0000-00-00";
			$today=date('Y-m-d H:i:s');
			
			if (((strtoupper($authResponse))=="OK") AND ((strtoupper($monthly))=="ON")){$accessThrough=date('Y-m-d H:i:s',strtotime("+1 month",strtotime($today)));$subscription="monthly";}

			if (((strtoupper($authResponse))=="OK") AND ((strtoupper($yearly))=="ON")){$accessThrough=date('Y-m-d H:i:s',strtotime("+1 year", strtotime($today)));$subscription="yearly";}
			
			
			
			
			
				$subscriptionn = $subscription;
				$sql="UPDATE llUser SET userType='super', accessThrough='$accessThrough',authResponse='$authResponse',subscriptionid='".$_SESSION['transactionID']."',subscription='$subscription',authText='$authText',authReason='$authReason' where userID='$userID'";
				mysql_query($sql);
			
			
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		}
		else
		{
			echo "Transaction Failed. <br>";
			echo $response.'<br>'  ;
			$subscriptionn = 'none';
			$subscription = 'none';
			$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID='$userID'";
			mysql_query($sql);
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
		}
	
	}
	else
	{
			echo "Transaction Failed. <br>";
			echo $response.'<br>'  ;
			$subscriptionn = 'none';
			$subscription = 'none';
			$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID='$userID'";
			mysql_query($sql);
			?>
            <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscriptionn; ?>';</script>
            <?php
			
	}
 
 	
	
	
//end recurring payment ARB
}


/*$fp = fopen('data.log', "a");
fwrite($fp, "$refId\r\n");
fwrite($fp, "$subscriptionId\r\n");
fwrite($fp, "$amount\r\n");
fclose($fp);*/







}
/*
echo "<br />".$sql;
echo "<br />Record Updated";
echo "<br />starting: ".$startdate;
echo "<br />subscription session: ".$_SESSION['subscription'];
echo "<br />responsecode: ".$_SESSION['responsecode'];
*/
/* $_SESSION['loggedin']="yes";
$_SESSION['response']=$authResponse;
$_SESSION['responsereason']=$authResponseReason;
$_SESSION['userID']=$userID; */


?>

