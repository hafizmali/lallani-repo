SENDING BLOGS... PLEASE WAIT...
<?php 
include '../includes/database.php';
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]).'...';
      }
      return $text;
    }	
	
	
function myTruncate2($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  $string = substr($string, 0, $limit);
  if(false !== ($breakpoint = strrpos($string, $break))) {
    $string = substr($string, 0, $breakpoint);
  }

  return $string . $pad;
}
	

$sqlSB="Select b.secretBlog,b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.blogID=999 ";
//echo "<br>sql: ".$sqlSB;


$resultSB=mysql_query($sqlSB);
$countSB=0;
$numSB=mysql_fetch_array($resultSB);

//echo $numSB['blogDetail'];
echo $nns = strip_tags(limit_text($numSB['blogDetail'],120),'<p><a><div><br /><br><img><span><b><strong><h1><h2><h3>');



$to = "haseeb@pearl-soft.com";
$subject = "My subject";
$txt = $nns;
$headers = "From:lalanii@lalanii.com\r\n";
	$headers .= "Reply-To:lalanii@lalanii.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	

mail($to,$subject,$txt,$headers);
//$shortdesc = myTruncate2($numSB['blogDetail'], 120);
  //echo $shortdesc;


/*if ($resultSB) {
$numSB=mysql_num_rows($resultSB);
while ($numSB>$countSB){

//echo "<br>counter: ".$countSB;
//echo "<br>total number: ".$numSB;

$blogID = mysql_result($resultSB,$countSB,"blogID");
$blogTitle = mysql_result($resultSB,$countSB,"blogTitle");
$blogPage = mysql_result($resultSB,$countSB,"blogPage");
$blogDetail = mysql_result($resultSB,$countSB,"blogDetail");
$blogDetailPart = limit_text($blogDetail,120); //substr($blogDetail,0,350)."...";
$categoryID = mysql_result($resultSB,$countSB,"categoryID");
$subcategoryID = mysql_result($resultSB,$countSB,"subcategoryID");
$banner = mysql_result($resultSB,$countSB,"blogBanner");
$secretBlog=mysql_result($resultSB,$countSB,"secretBlog");

exit;
}
}*/


?>

