<?php 
include('../includes/startsession.php');
include('../includes/database.php');
//error_reporting(-1);
/*echo("You should see ".$_SESSION['name']." on the next page");*/
$userName=$_POST['userName'];
$userPass=$_POST['userPass'];
$fromloc=$_SERVER['SERVER_NAME'].$_POST['fromloc'];
/*
echo '<br>'.$userName;
echo '<br>'.$userPass;
echo '<br>FROMlOC: '.$fromloc;
echo "<br>loggedin: ".$_SESSION['loggedin']."<br>";
echo "<br>userid: ".$_SESSION['userID']."<br>";
echo "<br>userName: ".$_SESSION['userName']."<br>";
echo "<br>userfirstname: ".$_SESSION['userFirstName']."<br>";
*/
if($_SESSION['loggedin']=="yes")
	{
		//echo "already loggedin'";
		//echo "window.location.href = 'http://".$fromloc."'?loggedin'";
		?>
		<script type='text/javascript'>window.location.href = 'http://<?php echo $fromloc; ?>?loggedin';</script>
        <?php
		//die("Already logged in! <a href='http://lalanii.com/process/logout.php'>log out</a>");
		//die(Header('Location:http://'.$fromloc.'?loggedin'));
		
	} 
	else
	{   
	//echo "<br>made it to line29";
	$uname = mysql_real_escape_string($_POST['userName']); 
	$pass = mysql_real_escape_string($_POST['userPass']);
	 $sql = "SELECT * FROM llUser WHERE userName = '".$uname."' AND userPass = '".$pass."'";
	//echo '<br>'.$sql;
	$result=mysql_query($sql);
	while($num=mysql_num_rows($result)){
	$x=0;

	 $_SESSION['userID']=mysql_result($result,$x,"userID");
	$_SESSION['userName']=mysql_result($result,$x,"userName");
	$_SESSION['userFirstName']=mysql_result($result,$x,"userFirstName");
	$_SESSION['userType']=mysql_result($result,$x,"userType");
	
	if($num < 1)
	{
		//echo "invalidlogin";
		?>
		<script type='text/javascript'>
		window.location.href = 'http://lalanii.com/message.php';
        </script>";
        <?php
		
	}
	$_SESSION['loggedin'] = "yes";
	/*
	echo "loggedin: ".$_SESSION['loggedin']."<br>";
	echo "userid: ".$_SESSION['userID']."<br>";
	echo "userName: ".$_SESSION['userName']."<br>";
	echo "userfirstname: ".$_SESSION['userFirstName']."<br>";
	echo "logged in, redirect= 'http://".$fromloc."'";
	*/
	if ($fromloc=='lalanii.com/signup.php'){
		?>
        	<script type='text/javascript'>
				window.location.href = 'http://lalanii.com';
            </script>
        <?php
	}else{
		?>
			<script type='text/javascript'>
			window.location.href = '<?php echo $_SERVER['HTTP_REFERER']; ?>';
            </script>
    	<?php
	}
	die("You are now logged in! <a href='http://lalanii.com/index.php'>Go to the home page</a>."); 	
	}
	
	}	
?>