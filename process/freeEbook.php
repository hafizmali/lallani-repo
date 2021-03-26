<?php

error_reporting(0);
if(empty($_POST))
{
	echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=homepopup';</script>";
	die();
}
//print_r($_FILES);
if(!empty($_FILES['freeEBookPDF']["name"]))
{
   $pdfName = $_FILES['freeEBookPDF']["name"];
}
if(!empty($_FILES['freeEBookImage']["name"]))
{
   $popupImage = $_FILES['freeEBookPDF']["name"];
}

include('../includes/database.php');

// variable initialization 
$EbookID 		= null;
$heading 		= mysql_real_escape_string($_POST['freeEBookHeading']);
$headingColor 	= $_POST['freeEBookHeadingColor'];
$headingSize 	= $_POST['freeEBookHeadingSize'];
$headingFont 	= $_POST['freeEBookHeadingFont'];

$popupText 		= mysql_real_escape_string($_POST['freeEBookText']);
$popupTextColor	= $_POST['freeEBookTextColor'];
$popupTextFont	= $_POST['freeEBookTextFont'];
$popupTextSize	= $_POST['freeEBookTextSize'];

$freeEBookMailTitle = mysql_real_escape_string($_POST['freeEBookMailTitle']);
$freeEBookMailText = mysql_real_escape_string($_POST['freeEBookMailText']);
$ThankYouMessage = mysql_real_escape_string($_POST['freeEBookThankYouMessage']);
$pdfName 		= '';
$popupImage 	= '';
$opacity = $_POST['freeEBookOpacity'];
$target_dir = "../images/popup/";
$imageSet = 0;
$pdfSet = 0;

var_dump($EbookID);
// check id is set or not
if(isset($_POST['EbookID']))
{
	$EbookID = $_POST['EbookID'];
}

// pdf attached or not
if(!empty($_FILES['freeEBookPDF']["name"]))
{
   $pdfName = $_FILES['freeEBookPDF']["name"];
   $fileNamePDF = basename($_FILES["freeEBookPDF"]["name"]);
}

// checking popup image attached or not
if(!empty($_FILES['freeEBookImage']["name"]))
{
   $popupImage = $_FILES['freeEBookImage']["name"];
   $fileNameImage = basename($_FILES["freeEBookImage"]["name"]);
}


// upload popup image
if(!empty($_FILES["freeEBookImage"]["name"]))
{
	$targetFileImage = $target_dir . $fileNameImage;
	$imageFileType = pathinfo($targetFileImage,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	 {
		$check = getimagesize($_FILES["freeEBookImage"]["tmp_name"]);
		if($check !== false) 
		{
			//echo "<br>File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else 
		{
			//echo "<br>File is not an image.";
			$uploadOk = 0;
			$uploaderror='invalid';
		}
	}
	
	$actual_name = pathinfo($popupImage,PATHINFO_FILENAME);
	$original_name = $actual_name;
	$extension = pathinfo($popupImage, PATHINFO_EXTENSION);
	
	//adding current time after the image name
	$i = time();           
    $actual_name = (string)$original_name.$i;
    $popupImage = $actual_name.".".$extension;
    $targetFileImage = $target_dir . $popupImage; 
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) 
	{
		//echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		$uploaderror='type';
	}
	else 
	{
		
		if (move_uploaded_file($_FILES["freeEBookImage"]["tmp_name"], $targetFileImage))
		{
			//echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$uploaderror='0';	
			$imageSet = 1;		
		} 
		else 
		{
			//echo "<br>Sorry, there was an error uploading your file.";
			$uploaderror='unknown';
			$imageSet = 0;
		}
	}
}

// upload popup pdf for free e-book
if(!empty($_FILES["freeEBookPDF"]["name"]))
{
	$targetFilePDF = $target_dir . $fileNamePDF;
	$imageFileType = pathinfo($targetFilePDF,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	 {
		$check = getimagesize($_FILES["freeEBookPDF"]["tmp_name"]);
		if($check !== false) 
		{
			//echo "<br>File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} 
		else 
		{
			//echo "<br>File is not an image.";
			$uploadOk = 0;
			$uploaderror='invalid';
		}
	}
	
	$actual_name = pathinfo($pdfName ,PATHINFO_FILENAME);
	$original_name = $actual_name;
	$extension = pathinfo($pdfName, PATHINFO_EXTENSION);
	
	//adding current time after the image name
	$i = time();           
    $actual_name = (string)$original_name.$i;
    $pdfName = $actual_name.".".$extension;
    $targetFilePDF = $target_dir . $pdfName; 
	
	// Allow certain file formats
	if (move_uploaded_file($_FILES["freeEBookPDF"]["tmp_name"], $targetFilePDF))
	{
		var_dump(move_uploaded_file($_FILES["freeEBookPDF"]["tmp_name"], $targetFilePDF));
		$uploaderror='0';	
		$pdfSet = 1;		
	} 
	else 
	{
		//echo "<br>Sorry, there was an error uploading your file.";
		$uploaderror='unknown';
		$pdfSet = 0;
	}
}
     //echo $EbookID;
//echo $pdfSet;

	// check id is present or not according to id handle insert or update query
	if($EbookID != null)
	{	    
		   //update free e- book table according to files exits or not  
		   	$sql="UPDATE freeebook SET ";
			$sql.= "heading='".$heading."',";
			$sql.= "headingColor='".$headingColor."',";
			$sql.= "headingFont='".$headingFont."',";
			$sql.= "headingSize='".$headingSize."',";
			$sql.= "mailTitle='".$freeEBookMailTitle."',";
			$sql.= "mailText='".$freeEBookMailText."',";
			$sql.= "opacity='".$opacity."',";
			$sql.= "ThankYouMessage='".$ThankYouMessage."',";
			$sql.= "popupTextColor='".$popupTextColor."',";
			$sql.= "popupTextSize='".$popupTextSize."',";
			$sql.= "popupTextFont='".$popupTextFont."',";
			if(($pdfSet == 1) && ($pdfName != ''))
			{
				$sql.= "pdfName='".$pdfName."',";
			}
			if(($imageSet == 1) && ($popupImage != ''))
			{
				$sql.= "popupImage='".$popupImage."',";
			}
			
			$sql.= "popupText='".$popupText."' ";
			echo $sql.="WHERE EbookID =".$EbookID;
			

		    mysql_query($sql);
	}
	else 
	{       
		    // insert details in freeebook table 
		$sql = "INSERT INTO freeebook ".
			      "(heading,headingColor,headingSize,headingFont,popupText,popupTextColor,popupTextSize,popupTextFont,pdfName,popupImage,mailText,mailTitle,ThankYouMessage,opacity) ".
			      "VALUES ".
			      "('$heading','$headingColor','$headingSize','$headingFont','$popupText','$popupTextColor','$popupTextSize','$popupTextFont','$pdfName','$popupImage','$freeEBookMailText','$freeEBookMailTitle','$ThankYouMessage',$opacity)";
				
				 mysql_query($sql);
				echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=homepopup';</script>";
		
	}
			   
	echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=homepopup';</script>";
		
?>

  