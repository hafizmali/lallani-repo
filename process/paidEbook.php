<?php

error_reporting(0);
if(empty($_POST))
{
	echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=paidpdf';</script>";
	die();
}
//print_r($_FILES);
if(!empty($_FILES['paidEBookPDF']["name"]))
{
   $pdfName = $_FILES['paidEBookPDF']["name"];
}
if(!empty($_FILES['paidEBookImage']["name"]))
{
   $popupImage = $_FILES['paidEBookPDF']["name"];
}

include('../includes/database.php');

// variable initialization 
$PEbookID 		= null;
$heading 		= mysql_real_escape_string($_POST['paidEBookHeading']);
$headingColor 	= $_POST['paidEBookHeadingColor'];
$headingSize 	= $_POST['paidEBookHeadingSize'];
$headingFont 	= $_POST['paidEBookHeadingFont'];
$ppdfamount 	= $_POST['paidEBookCost'];


$paidEBookMailTitle = mysql_real_escape_string($_POST['paidEBookMailTitle']);
$paidEBookMailText = mysql_real_escape_string($_POST['paidEBookMailText']);
$ThankYouMessage = mysql_real_escape_string($_POST['paidEBookThankYouMessage']);
$pdfName 		= '';
$popupImage 	= '';
$opacity = $_POST['paidEBookOpacity'];
$target_dir = "../images/popup/";
$imageSet = 0;
$pdfSet = 0;

var_dump($PEbookID);
// check id is set or not
if(isset($_POST['PEbookID']))
{
	$PEbookID = $_POST['PEbookID'];
}

// pdf attached or not
if(!empty($_FILES['paidEBookPDF']["name"]))
{
   $pdfName = $_FILES['paidEBookPDF']["name"];
   $fileNamePDF = basename($_FILES["paidEBookPDF"]["name"]);
}

// checking popup image attached or not
if(!empty($_FILES['paidEBookImage']["name"]))
{
   $popupImage = $_FILES['paidEBookImage']["name"];
   $fileNameImage = basename($_FILES["paidEBookImage"]["name"]);
}


// upload popup image
if(!empty($_FILES["paidEBookImage"]["name"]))
{
	$targetFileImage = $target_dir . $fileNameImage;
	$imageFileType = pathinfo($targetFileImage,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	 {
		$check = getimagesize($_FILES["paidEBookImage"]["tmp_name"]);
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
		
		if (move_uploaded_file($_FILES["paidEBookImage"]["tmp_name"], $targetFileImage))
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
if(!empty($_FILES["paidEBookPDF"]["name"]))
{
	$targetFilePDF = $target_dir . $fileNamePDF;
	$imageFileType = pathinfo($targetFilePDF,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	 {
		$check = getimagesize($_FILES["paidEBookPDF"]["tmp_name"]);
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
	if (move_uploaded_file($_FILES["paidEBookPDF"]["tmp_name"], $targetFilePDF))
	{
		var_dump(move_uploaded_file($_FILES["paidEBookPDF"]["tmp_name"], $targetFilePDF));
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
     
	// check id is present or not according to id handle insert or update query
	if($PEbookID != null)
	{	    
		   //update free e- book table according to files exits or not  
		   	$sql="UPDATE paidbook SET ";
			$sql.= "pheading='".$heading."',";
			$sql.= "pheadingColor='".$headingColor."',";
			$sql.= "pheadingFont='".$headingFont."',";
			$sql.= "pheadingSize='".$headingSize."',";
			$sql.= "pmailTitle='".$paidEBookMailTitle."',";
			$sql.= "ppdfamount='".$ppdfamount."',";
			$sql.= "pmailText='".$paidEBookMailText."',";

			$sql.= "pThankYouMessage='".$ThankYouMessage."' ";

			if($pdfSet == 1 && $pdfName != '')
			{
				$sql.= ", ppdfName='".$pdfName."' ";
			}
		
			
		
			$sql.="WHERE PEbookID =".$PEbookID;
			
		    
		    mysql_query($sql);
	}
	else 
	{       
		    // insert details in paidEBook table 
		$sql = "INSERT INTO paidbook ".
			      "(pheading,pheadingColor,pheadingSize,pheadingFont,ppdfName,pmailText,pmailTitle,pThankYouMessage,ppdfamount) ".
			      "VALUES ".
			      "('$heading','$headingColor','$headingSize','$headingFont','$pdfName','$paidEBookMailText','$paidEBookMailTitle','$ThankYouMessage','$ppdfamount')";
				
				 mysql_query($sql);
				echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=paidpdf';</script>";
		
	}
	
	echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/admin.php?portalValue=paidpdf';</script>";
		
?>

  