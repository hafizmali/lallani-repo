<?php
if(isset($_POST))
{
    include('../includes/database.php');

	$email = $_POST['subcriberEmail'];
	$pageurl = $_POST['currentPageUrl'];
	$freeEbookID = intval($_POST['freeEbookID']);

	$path = dirname(__FILE__);
	$firstName = '';
	$lastName = '';
	$userType='user';
	$terms = 1;
	$termsDate=date("Y-m-d h:i:s");
	$emailCategory = '20,22,21,23,';
	$emailSubcategory = '32,36,41,28,29,30,39,40,34,35,37,38,24,25,26,';
	$emailTopic= '41,38,37,36,40,42,39,';
	$agreecheckbox = 1;
$userPass = '321';

	if(isset($_POST['subcriberName']))
	{
	    $firstName = $_POST['subcriberName'];
	}

   $sqlIns="INSERT INTO llUser (userFirstName,userEmail,userName,userPass,userType,termDate,terms,emailCategory,emailSubcategory,emailTopic) 
    VALUES 
    ('".$firstName."','".$email."','".$firstName."','".$firstName.$userPass."','".$userType."','".$termsDate."','".$agreecheckbox."','".$emailCategory."','".$emailSubcategory."','".$emailTopic."')";
    //echo "<br>"."sqlIns: ".$sqlIns;
    mysql_query($sqlIns);
	$lastids = mysql_insert_id();

require_once($path.'/../includes/MailChimp.php');
$MailChimp = new \Drewm\MailChimp('02a75ca18dadb975ba00b54dbcd376dd-us6');
$result = $MailChimp->call('lists/subscribe', array(
                'id'                => '350767bbd2 ',
                'email'             => array('email'=>$email),
                'merge_vars'        => array('FNAME'=>$firstName, 'LNAME'=>$lastName),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));

//send ebook 

$sql_select="SELECT * FROM freeebook WHERE eBookSelect = 1 AND EbookID = $freeEbookID";
	 
$resultEbook = mysql_query($sql_select);

if(mysql_num_rows($resultEbook) > 0)
{
	$pdfName 	 = mysql_result($resultEbook, 0, 'pdfName');
	$fileCounter = mysql_result($resultEbook, 0, 'fileCounter');
	$mailTitle 	 = mysql_result($resultEbook, 0, 'mailTitle');
	$MailText    = mysql_result($resultEbook, 0, 'MailText');

}


$emailBody = "
				<html>
				<head>
				<title>Free Ebook</title>
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
	$fileatname = 'ebook.pdf';
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
if(mail($to, $subject, $message, $headers)) 
{
	//var_dump($message);
	$fileCounter = $fileCounter + 1;
	$sql ="UPDATE freeebook SET fileCounter = $fileCounter WHERE EbookID = $freeEbookID";
	mysql_query($sql);
    //echo "The email was sent.";
}
else 
{
    //echo "There was an error sending the mail.";
}


/*-----------2nd Email --------------*/

$nto = $email;
$nsubject = "Your Lalanii.com Login Details";

$nmessage = "
<div style='text-align: center;font-size: 14px;font-weight: normal;'>
<strong>Here are the login details:</strong><br />
Username: ".$firstName."<br />
Password: ".$firstName.$userPass."<br /><br /></div>

<div style='text-align: center;font-size: 16px;font-weight: bold;'>Login To Get Access to Your Lalanii.com Account<br /><br /><a href='http://lalanii.com/signup.php'><img src='http://lalanii.com/images/signinbtn.png'></a></div><br /><br />

<div style='text-align: center;font-size: 16px;font-weight: bold;'>Get Access To My Secret Premium Membership Blogs Here!<br /><br /><a href='http://lalanii.com/subscribe.php?u=".$lastids."'><img src='http://lalanii.com/images/utpbtn.png'></a></div><br /><br />

<div style='text-align: center;font-size: 16px;font-weight: bold;'>Download Her E-Book Now For $3!<br /><br /><a href='http://lalanii.com/subscribe2.php?u=".$lastids."'><img src='http://lalanii.com/images/ddbtn.png'></a></div>


";

// Always set content-type when sending HTML email
$nheaders = "MIME-Version: 1.0" . "\r\n";
$nheaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$nheaders .= 'From: <lalanii@lalanii.com>' . "\r\n";

mail($nto,$nsubject,$nmessage,$nheaders);





echo '<script>window.location="'.$pageurl.'?eBook='.$freeEbookID.'"</script>';




}




?>