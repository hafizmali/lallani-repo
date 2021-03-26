<?php
include ("../includes/startsession.php");
include ("../includes/database.php");
include ("../includes/authnetdata.php");
//include ("../includes/authnetfunction.php");

require_once('paypal.class.php');  // include the class file
$p = new paypal_class;             // initiate an instance of the class
//$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url

$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url

$userID=$_POST['userID'];
$subscription=$_POST['subscription'];
$subscriptione=$_POST['subscriptione'];
$_SESSION['subscription'] = $subscription;

if ((strtoupper($subscription))=="MONTHLY"){
	$monthly="ON";
}elseif ((strtoupper($subscription))=="YEARLY"){
	$yearly="ON";
}elseif ((strtoupper($subscription))=="LIFETIME"){
	$lifetime="ON";
}

//$card_num=$_POST['card_num'];
//$card_code=$_POST['card_code'];
$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
//$address=$_POST['address'];
//$city=$_POST['city'];
//$state=$_POST['state'];
//$zip=$_POST['zip'];
//$country=$_POST['country'];
$refId=1; // update to a unique number built off timestamp or some shit
$startdate= date('Y-m-d', strtotime("+1 week"));


/* echo "<br>userID: ".$userID;
echo "<br>monthly: ".$monthly;
echo "<br>yearly: ".$yearly;
echo "<br>lifetime: ".$lifetime;
echo "<br>card_num: ".$card_num;
echo "<br>card_code: ".$card_code;
echo "<br>first_name: ".$first_name;
echo "<br>last_name: ".$last_name;
echo "<br>address: ".$address;
echo "<br>city: ".$city;
echo "<br>state: ".$state;
echo "<br>zip: ".$zip;
echo "<br>country: ".$country;
 */
//$exp_month=$_POST['exp_month'];
//$exp_year=$_POST['exp_year'];
//$exp_date = $exp_year."-".$exp_month;
$amount="0.00";

if (strtoupper($monthly)=='ON'){$amount="4.99";$description="Lalanii.com Monthly Subscription";$intervalunit="months";$intervalLength=1;$ptype = 'subs';}
if (strtoupper($yearly)=='ON'){$amount="40.00";$description="Lalanii.com Annual Subscription";$intervalunit="days";$intervalLength=365;$ptype = 'subs';}
if (strtoupper($lifetime)=='ON'){
	$amount="100.00";
	$description="Lalanii.com Lifetime Access";
	$ptype = 'subs';
}
/* 
echo "melissas data:<br>";
echo "one time: ".$response_array[0]."<br>";
echo "recurring: ".$resultCode."<br>";
 */

if($subscriptione == 'ebook')
{
		$pdfquery = mysql_query("Select * from paidbook where peBookSelect = '1' ");
		$pdfresult = mysql_fetch_array($pdfquery);
		
	$amount = $amount + $pdfresult['ppdfamount'];
	if($subscription != '')
	{
		$ptype = 'boths';
	}
	else
	{
		$ptype = 'ebook';
	}
}
 
 
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?oid='.$_SESSION['user_id'];
// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':      // Process and order...

      //$p->add_field('business', 'alex@cbizsol.com');
	  $p->add_field('business', 'editor@creativewritingagency.com');
	  $p->add_field('currency_code', 'USD');
	  $p->add_field('return', $this_script.'&action=success&ptype='.$ptype.'&user_id='.$userID);
      $p->add_field('cancel_return', $this_script.'&action=cancel&user_id='.$userID);
      $p->add_field('notify_url', $this_script.'&action=ipn&user_id='.$userID);	  
      $p->add_field('item_name', 'Total Amount');
      $p->add_field('amount', $amount);
      $p->submit_paypal_post(); // submit the fields to paypal
      //$p->dump_fields();      // for debugging, output a table of all the fields
      
	  break;
      
   case 'success':      // Order was successful...
	
	echo "payment Success.";
	 // exit;
	 
	 
		$check_q = mysql_query("Select * from llUser where userID='".$_GET['user_id']."'");
		$nuser_res = @mysql_fetch_array($check_q);
	 
	if($_GET['ptype'] == 'subs')
	 	{
		$subscription = $nuser_res['subscription'];
		$sql="UPDATE llUser SET userType='super', authResponse='OK',authText='Successful.' where userID='".$_GET['user_id']."'";
		mysql_query($sql);
		}
		
	if($_GET['ptype'] == 'ebook')
	 	{
		$subscription = 'paidebook';
		$sql="UPDATE llUser SET subscriptione='paidebook' where userID='".$_GET['user_id']."'";
		mysql_query($sql);
		}
		
	if($_GET['ptype'] == 'boths')
	 	{
		$subscription = 'boths';
		$sql="UPDATE llUser SET userType='super', authResponse='OK',authText='Successful.',subscriptione='paidebook' where userID='".$_GET['user_id']."'";
		mysql_query($sql);
		
		}
	 
		
		?>
        
<script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscription; ?>';</script>

        <?php
	// echo "user_id...".$_SESSION['user_id'];
	 //  header('Location:../payment_success.php');
      break;
   case 'cancel':       // Order was canceled...
      // The order was canceled before being completed.
	  ?>
      <script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=none';</script>
      <?php
      break;
   case 'ipn':          // Paypal is calling page for IPN validation...
  // echo "hello";
   
      // It's important to remember that paypal calling this script.  There
      // is no output here.  This is where you validate the IPN data and if it's
      // valid, update your database to signify that the user has payed.  If
      // you try and use an echo or printf function here it's not going to do you
      // a bit of good.  This is on the "backend".  That is why, by default, the
      // class logs all IPN data to a text file.
      if ($p->validate_ipn()) {
          
         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.
  
         // Check the paypal documentation for specifics on what information

         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.
		 /*******************************Data Insertion***************************************/
		//if ($p->GetCartId1()){
		
		$tm=date("Y-m-d h:m:s",time("now"));
		 $oid = $_REQUEST['oid'];
	  $isset=$mysql->record_insert(tblpaymentsreceived,array('user_id' => $oid,'amount'=>$p->ipn_data['mc_gross'],'trans_id'=>$p->ipn_data['txn_id'],'t_time'=>$tm ),false); 
		 	 
		
		
		 $subject = 'Instant Payment Notification - Recieved Payment';
         //$to = 'alex@cbizsol.com';    //  your email
	$rec = $mysql->fetch_row("tbl_user","id = '".$oid."'",array ('range' => '*'));

         $to=$rec['email'];
		 $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";
         $headers = 'From:'.$p->ipn_data['payer_email']."\r\n" .
   				    'Reply-To:'.$p->ipn_data['payer_email'] . "\r\n" .
   				    'X-Mailer: PHP/' . phpversion();
		 
         foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
          mail($to, $subject, $body, $headers, $p->ipn_data['payer_email']);
		 	 
		
        

	  //}
	  }
      break;
 }     
 
 
 
 
 
if ((strtoupper($lifetime))=='ON'){
		$authResponse=$response_array[0];
		$authReason=$response_array[1];
		$authText=$response_array[2];
	}else{
		$authResponse=$resultCode;
		$authReason=$code;
		$authText=$text;
	}
$subscription="none";
$accessThrough= date("Y-m-d h:i:s");//"0000-00-00";
$today=date('Y-m-d H:i:s');
//echo "<br>today: ".$today;

if($subscriptione == 'ebook')
{
	$sql="UPDATE llUser SET subscriptione='buyebook' where userID=$userID";
	mysql_query($sql);	
}

if ($lifetime=="ON")
{
	$accessThrough="9999-12-31";$subscription="lifetime";
	
	$_SESSION['subscription']=$subscription;
	$_SESSION['responsecode']=$response_array[0].$resultCode;
	$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID=$userID";
	mysql_query($sql);	
	
}
if ($monthly=="ON")
{
	$accessThrough=date('Y-m-d H:i:s',strtotime("+1 month",strtotime($today)));$subscription="monthly";
	
	$_SESSION['subscription']=$subscription;
	$_SESSION['responsecode']=$response_array[0].$resultCode;
	$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID=$userID";
	mysql_query($sql);	
		
}
if ($yearly=="ON")
{
	$accessThrough=date('Y-m-d H:i:s',strtotime("+1 year", strtotime($today)));$subscription="yearly";
	
	$_SESSION['subscription']=$subscription;
	$_SESSION['responsecode']=$response_array[0].$resultCode;
	$sql="UPDATE llUser SET userType='user', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$authText',authReason='$authReason' where userID=$userID";
	mysql_query($sql);	
		
}

//echo "<br>accessthrough: ".$accessThrough;

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
