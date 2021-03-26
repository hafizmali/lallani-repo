<!DOCTYPE html>
<html lang="en">
<head>
	
  <!-- favicon 
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
  <link rel="shortcut icon" href="images/CWAfavicon.ico" />

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  
  <!-- Page Info
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->  
  <title>Creative Writing Agency</title>
  <meta name="description" content="">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/main.css">
  
	
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="#">
  
  
  

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

</head>
<body class="index" id="page">
   <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please 
            <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   <![endif]-->	

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 
<?php include 'includes/database.php' ?>
<?php 
 error_reporting(E_ALL);
 session_start();
  if(isset($_SESSION['paymentType']) && isset($_SESSION['productName']) && isset($_SESSION['userID']))
  {
		//get all values for order table 
		$userID = $_SESSION['userID'];
		$paymentMethod = $_SESSION['paymentMethod'];
		$paymentType = $_SESSION['paymentType'];
		
		$date = date("Y-m-d H:i:s");
		$item_transaction = "";
		
		if($paymentMethod == 'paypal') 
		{
			$item_no            = $_REQUEST['item_number'];
			$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
			$item_price         = $_REQUEST['amt']; // Paypal received amount
			$product_status     = $_REQUEST['st'];  // Paypal transaction status
			 // Paypal received currency type
			 
			$price = $totalAmt;
			 
			
			//Rechecking the product price and currency details
			if($item_price == $price)
			{
			    //echo "<h1>Welcome, Guest</h1>";
			    //echo "<h1>Payment Successful</h1>";
			}
			else
			{
				echo '<b>Payment Failure</b>. <br>';
				echo '<br><br>Press back button to go back to the previous page';
				?>
				<button ><a style="font-size: 12px;" href="http://staging.creativewritingagency.com/checkout.php">Back</a></button>
				<?php 
				die();
				echo "<script type='text/javascript'>window.location.href = 'http://staging.creativewritingagency.com/';</script>";
			}
			
			$totalAmt      = $item_price;
		    $transactionID = mysql_real_escape_string($item_transaction);
		}
		
		// get transaction id for payment type credit card
		else 
		{
			$totalAmt = $_SESSION['totalAMT'];
		    $transactionID = mysql_real_escape_string($_SESSION['transactionID']);
			
		}
	   
		
		
		$sql = "INSERT INTO cwaorder".
	      " (userID, transactionID, paymentMethod, paymentType, date, totalAmt) ".
	      " VALUES ".
	      "($userID, '$transactionID', '$paymentMethod', '$paymentType', '$date', $totalAmt)";
		
		//var_dump($sql);
		
		//inserting new row in pointDetails table
	   	
		$response = mysql_query($sql);
		
		$orderID =  mysql_insert_id();
		
		foreach ($_SESSION['productName'] as $key => $value) 
		{
			//echo $key.'='.$value;
		//product price from data	
		
		$sqlProduct = "INSERT INTO productsale".
	      " (orderID, productID, quantity) ".
	      " VALUES ".
	      "($orderID, $key, '$value')";
		 mysql_query($sqlProduct);
		}
		
		$_SESSION['paymentType'] = '';
		$_SESSION['paymentType'] = '';
		$_SESSION['productName'] = '';
		$_SESSION['cartItem'] = '';
		
		//send mail to admin and editor 
		$username = $_SESSION['userName'];
		
		$to = 'info@creativewritingagency.com,editor@creativewritingagency.com,manoj.patidar@gyrix.co';
		
		//$to = 'manoj.patidar@gyrix.co,  kirti,kirti.nirkhiwale@gyrix.co';
		$subject = "New Order";

			$message = "
					<html>
					<head>
					<title>HTML email</title>
					</head>
					<body>
					
					<table>
					    <tr>
					     <td>Name:</td>
					     <td>$username</td>
					    </tr>
					    <tr>
					     <td>Transaction ID:</td>
					     <td>$transactionID</td>
					    </tr>
					    <tr>
					     <td>Payment Method:</td>
					     <td>$paymentMethod</td>
					    </tr>
					    <tr>
					     <td>payment Type:</td>
					     <td>$paymentType</td>
					    </tr>
					    <tr>
					     <td>Total:</td>
					     <td>$totalAmt</td>
					    </tr>
					    <tr>
					     <td>Response:</td>
					     <td>This Transaction has been approved</td>
					    </tr>
					
					";
						$message .= '';
					
						$message .= "
					</table>
					</body>
					</html>
					";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: Info@CreativeWritingAgency.com' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";

			mail($to, $subject, $message, $headers);
			
		?>php
		 <div style="font-family: rexbold" class="container-nomb">
				<div style="    width: 600px;    margin-left: 259px;" class="dialogbox" id="dialog" title="Message">
				  <img src="images/logo-dialog.png" style = "width:564px;border-radius:0px;">
				  <pre style="background-color: white;border: 0px;text-align: center;" id="textpopup">
					 <h1 style="font-family: rexbold;FONT-SIZE: 54PX;">Payment Successful</h1>		
					 <p style="font-family: rexbold;font-size: 25PX;">Press Home button to go to the home page</p>
					 <button style="margin-left: -291PX;" ><a style="font-size: 12px;" href="http://staging.creativewritingagency.com/">Home</a></button>
				 </pre>
	 			</div>
	 </div>
	 <?php 
	 die();
	 echo "<script type='text/javascript'>window.location.href = 'http://staging.creativewritingagency.com/';</script>";
  }
  else
  {
	 echo "<script type='text/javascript'>window.location.href = 'http://staging.creativewritingagency.com/';</script>";
  }

?>
 
  </body>
</html>