<?php
$findme='?';

$camefrom=$_SERVER['HTTP_REFERER'];
//echo $camefrom;
$camefrompos = strpos($camefrom, $findme);
if ($camefrompos>0){$fromloc=strtok($camefrom,'?');}else{$fromloc=$camefrom;}

$currentloc = $_SERVER["REQUEST_URI"];
$pos = strpos($currentloc, $findme);
if ($pos>0){$path=strtok($currentloc,'?');}else{$path=$currentloc;}

$file = basename($path);
$file =substr($file, 0, strpos($file, ".php"));
if ($file==""){$file="index";}

//no longer used:
//$_SESSION['path']=$path;
//$fromloc='lalanii.com'.$_SESSION['path'];
$validateUserID=0;
if(!isset($_SESSION['loggedin'])) { 
	//echo "validation: user not logged in<br>";
	$loggedin="no"; 
	$validateUserID=0;
	} else { 
	//echo "validation: user is logged in<br>";
	$loggedin="yes"; 
	$validateUserID=$_SESSION['userID'];
	} 
	
$sqlval="select userType,accessThrough,subscription,authReason from llUser where userID=".$validateUserID;
//echo "<br>sqlVal: ".$sqlval;
$resultval=mysql_query($sqlval);
$valnum=mysql_num_rows($resultval);
//assume the worst:
$isadmin="no";
$isreviewer='no';

	$unlock_query = mysql_query("Select * from llsettings");
	$unlock_res = @mysql_fetch_array($unlock_query);
	if($unlock_res['temp_unlock'] == 1)
	{
		$secrets="accessible";
	}else
	{
		$secrets="restricted";
	}
	
$viewingsecrets='yes';
$viewingadmin='yes';
$viewingeditor='yes';
if ($valnum>0) {
    $valUserType=mysql_result($resultval,0,"userType");
    $valAuthReason=mysql_result($resultval,0,"authReason");
    $valSubscription=mysql_result($resultval,0,"subscription");
    $valAccessThrough=mysql_result($resultval,0,"accessThrough");
	if($valUserType=='reviewer'){
		$isreviewer="yes";
		$secrets="accessible";
	}
	if(($valUserType=='admin') OR ($valUserType=='editor')){
		$isadmin="yes";
		$secrets="accessible";
		}
	if($valAccessThrough>date('Y-m-d H:i:s')){
		$secrets="accessible";
		//echo "APPROVED UNTIL ".date('m-d-Y',strtotime($valAccessThrough))."!";
		}
	}
//echo "<br>isadmin: ".$isadmin;
//echo "<br>session username: ".$_SESSION['userFirstName'];
if (false !== strpos($path,'secrets')) {$viewingsecrets='yes';}else{$viewingsecrets='no';}
if (false !== strpos($path,'admin')) {$viewingadmin='yes';}else{$viewingadmin='no';}
if (false !== strpos($path,'editor')) {$viewingeditor='yes';}else{$viewingeditor='no';}
if($viewingsecrets=="yes"){
	if($secrets!=="accessible"){
		echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/signup.php';</script>";
	
		}
	}
if(($viewingadmin=="yes")OR($viewingeditor=="yes")){
	//echo "<br>yes viewing admin page";
	if($isadmin!=="yes"){
		echo "<br>not an admin";
		if($viewingeditor=="yes"){
			//echo "<br>editor page not an andmin";
			echo "<script type='text/javascript'>window.close();</script>";
			}else{
			//echo "<br>admin page not an admin";
			echo "<script type='text/javascript'>window.location.href = '".$camefrom."';</script>";
			}
		}
	}
	
	$viewingmobile="no";
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	//echo "<br>useragent: ".$useragent;
	
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
		//echo "its mobile";
		$viewingmobile="yes";
		}else{
		//echo "its desktop";
		$viewingmobile="no";
		}
	
?>