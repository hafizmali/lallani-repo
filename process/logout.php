<?php include '../includes/startsession.php';?>
<?php
/*
session_start();
unset($_SESSION['lalanii']); 
session_unset();
	*/
unset($loggedin);
unset($_SESSION['loggedin']);
unset($_SESSION['userID']);
unset($_SESSION['userFirstName']);
unset($_SESSION['flag']);
echo $loggedin;
echo $_SESSION['loggedin'];
echo $_SESSION['userID'];
echo $_SESSION['userFirstName'];
session_destroy();
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/index.php';</script>";

?>