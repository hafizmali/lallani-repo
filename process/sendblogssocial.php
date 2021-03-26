POSTING TO SOCIAL MEDIA... PLEASE WAIT... 
<?php 
include '../includes/database.php';


//$sqlX="Update llBlog set blogEmailed='0000-00-00' where blogID=37";
//echo "<br>sqlX:".$sqlX;
//mysql_query($sqlX);
//#!/usr/local/bin/php -q

$recentTime = strtotime('-30 minutes');
$recentdate =date('Y-m-d H:i:s', $recentTime);

$sqlSB="Select b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogThumb,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.blogEmailed < NOW() and b.blogDate > '".$recentdate."'and b.blogDate<NOW() and b.blogEmailed <> '0000-00-00 00:00:00'";
//echo "<br>sql: ".$sqlSB;


$resultSB=mysql_query($sqlSB);
$resultrowsSB=mysql_num_rows($resultSB);
$countSB=0;
if ($resultrowsSB>0) {
$numSB=mysql_num_rows($resultSB);
while ($numSB>$countSB){

//echo "<br>counter: ".$countSB;
//echo "<br>total number: ".$numSB;

$blogID = mysql_result($resultSB,$countSB,"blogID");
$blogTitle = mysql_result($resultSB,$countSB,"blogTitle");
$blogPage = mysql_result($resultSB,$countSB,"blogPage");
$blogDetail = mysql_result($resultSB,$countSB,"blogDetail");
$blogDetailPart=substr(strip_tags($blogDetail),0,60)."...";
$categoryID = mysql_result($resultSB,$countSB,"categoryID");
$subcategoryID = mysql_result($resultSB,$countSB,"subcategoryID");
$banner = mysql_result($resultSB,$countSB,"blogBanner");
$thumb = mysql_result($resultSB,$countSB,"blogThumb");
$blogEmailed = mysql_result($resultSB,$countSB,"blogEmailed");
$blogDate = mysql_result($resultSB,$countSB,"blogDate");


echo $blogTitle;
echo $blogDetail;
echo $blogDetailPart;


echo "<br>blogID: ".$blogID;
echo "<br>categoryID: ".$categoryID;
echo "<br>blogPage: ".$blogPage;
echo "<br>subcategoryID: ".$subcategoryID;
echo "<br>blogEmailed: ".$blogEmailed;
echo "<br>blogDate: ".$blogDate;
++$countSB;
}
}else{echo "<br />There are no blogs to post. End job.";}

?>
<br>
<br>
<form>
	<table border="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">blog ID:</font></td>
			<td><font face="Calibri"><input type="text" name="blogID" size="20" value="<?php echo $blogID; ?>"></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">blog page:</font></td>
			<td><font face="Calibri"><input type="text" name="blogpage" size="20" value="<?php echo $blogPage; ?>"></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">banner:</font></td>
			<td><font face="Calibri"><input type="text" name="banner" size="50" value="<?php echo $banner; ?>"></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">thumb:</font></td>
			<td><font face="Calibri"><input type="text" name="thumb" size="50" value="<?php echo $thumb; ?>"></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">blog title:</font></td>
			<td><font face="Calibri"><input type="text" name="blogtitle" size="20" value="<?php echo $blogTitle; ?>"></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">blog detail part:</font></td>
			<td><font face="Calibri">
			<textarea rows="8" name="blogDetailPart" cols="55"><?php echo $blogDetailPart; ?></textarea></font></td>
		</tr>
		<tr>
			<td valign="top">
			<p align="right"><font face="Calibri">link:</font></td>
			<td><font face="Calibri">
			<input type="text" size="75" name="link" cols="55" value="http://lalanii.com/<?php echo strtolower($blogPage); ?>.php?blogID=<?php echo $blogID; ?>"></font></td>
		</tr>
	</table>
</form>