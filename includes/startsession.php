<?php 
ini_set(session.save_path, '/lalanii/tmp');
ini_set('session.cookie_lifetime', 86400);
ini_set('session.gc_maxlifetime', 86400);
session_start();

/*if(!isset($_SESSION)){$_SESSION['name'] = "lalanii";echo "a new session was started sessionid: ".session_id();}else{session_save_path("ltmp");session_start();$x  = $_SESSION['name'];echo("<br>The session is already started".$x."<br>");}
echo "<br>print session info: ";
print_r($_SESSION);*/
?>
<!DOCTYPE html>