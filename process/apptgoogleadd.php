<?php
include '../includes/startsession.php';
include('../includes/database.php');
$date=$_GET['date'];
$hour=$_GET['hour'];
$requestfrom=$_SESSION['userID'];

//echo "<br>from user: ".$requestfrom;
$usersql="Select * from llUser where userID=".$requestfrom;
$userresults=mysql_query($usersql);
if($userresults){
	$from_fullname=mysql_result($userresults,0,"userFirstName")." ".mysql_result($userresults,0,"userLastName");
	$from_email=mysql_result($userresults,0,"userEmail");
	$from_phone=mysql_result($userresults,0,"userPhone");
	
}else{
	$from="Error obtaining userID ".$requestfrom;
	$email="error";
	$phone="error";
	
}

	//$firstname is the first name of target
	//$lastname is the last name of target
	//$email is the targets email address
	//$meeting_date is straight from a DATETIME mysql field and assumes UTC.
	//$meeting_name is the name of your meeting
	//$meeting_duration is the duration of your meeting in seconds (3600 = 1 hour)
	$firstname = "Lalanii";
	$lastname = "";
	$email = "creativeconfusioneditors@gmail.com";
	//$email = "lysadies@msn.com";
	$meeting_date = $date." ".$hour.":00:00"; //mysql format
	$meeting_name = "Appt Request: ".$_SESSION['userFirstName'];
	$meeting_duration = 3600;
	
	
	$from_name = $_SESSION['userFirstName']." via Lalanii.com";
	$from_address = $from_email;
	$subject = "Lalanii.com Appointment Request"; //Doubles as email subject and meeting subject in calendar
	$meeting_description = "You have a new appointment request from Lalanii.com\n\n";
	$meeting_location = "Phone"; //Where will your meeting take place
 
 
	//Convert MYSQL datetime and construct iCal start, end and issue dates
	$meetingstamp = STRTOTIME($meeting_date . " UTC");    
	$dtstart= GMDATE("Ymd\THis\Z",$meetingstamp);
	$dtend= GMDATE("Ymd\THis\Z",$meetingstamp+$meeting_duration);
	$todaystamp = GMDATE("Ymd\THis\Z");
 
	//Create unique identifier
	$cal_uid = DATE('Ymd').'T'.DATE('His')."-".RAND()."@lalanii.com";
 
	//Create Mime Boundry
	$mime_boundary = "----Meeting Booking----".MD5(TIME());
 
	//Create Email Headers
	$headers = "From: ".$from_name." <".$from_address.">\n";
	$headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
 
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
	$headers .= "Content-class: urn:content-classes:calendarmessage\n";
 
	//Create Email Body (HTML)
	$message .= "--$mime_boundary\n";
	$message .= "Content-Type: text/html; charset=UTF-8\n";
	$message .= "Content-Transfer-Encoding: 8bit\n\n";
 
	$message .= "<html>\n";
	$message .= "<body>\n";
	//$message .= '<p>Aloha '.$firstname.' '.$lastname.',</p>';
	$message .= '<p>Aloha '.$firstname.' '.$lastname.',</p>';
	$message .= '<p>You have a new appointment request from Lalanii.com<br>';
	$message .= 'From: '.$from."<br>";
	$message .= 'Email: <a href="mailto:'.$email.'">'.$email."</a><br>";
	$message .= 'Phone: '.$phone."<br>";
	$message .= '<a href="http://lalanii.com/process/apptapprove.php?date='.$date.'&hour='.$hour.'">accept and add meeting to Lalanii.com database</a><br></p>';    
	$message .= "</body>\n";
	$message .= "</html>\n";
	$message .= "--$mime_boundary\n";
 
	//Create ICAL Content (Google rfc 2445 for details and examples of usage) 
	$ical =    'BEGIN:VCALENDAR
PRODID:-//Microsoft Corporation//Outlook 11.0 MIMEDIR//EN
VERSION:2.0
METHOD:PUBLISH
BEGIN:VEVENT
ORGANIZER:MAILTO:'.$from_address.'
DTSTART:'.$dtstart.'
DTEND:'.$dtend.'
LOCATION:'.$meeting_location.'
TRANSP:OPAQUE
SEQUENCE:0
UID:'.$cal_uid.'
DTSTAMP:'.$todaystamp.'
DESCRIPTION:'.$meeting_description.'
SUMMARY:'.$subject.'
PRIORITY:5
CLASS:PUBLIC
END:VEVENT
END:VCALENDAR';   
 
	$message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST\n';
	$message .= "Content-Transfer-Encoding: 8bit\n\n";
	$message .= $ical;            
 
	//SEND MAIL
	$mail_sent = @MAIL( $email, $subject, $message, $headers );
	//echo "mail sent: ".$mail_sent;
	IF($mail_sent)     {
$sql="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." ".$hour.":00:00','".$date." ".$hour.":00:00','tentatively booked')";
mysql_query($sql);
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/hireme/appointment.php';</script>";
	} ELSE {
		echo "<a href='http://lalanii.com/hireme/appointment.php'>There was an error. please go back or click here to try again.</a>";
		RETURN FALSE;
	}   

 ?>