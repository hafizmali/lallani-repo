<?php

include('../includes/startsession.php');
include('../includes/database.php');
include('mainxlxclass.php');

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
$target_dir = "excels/";
$cdate = date('m-d-Y');
$temp = explode(".", $_FILES["xml_file"]["name"]);
$newfilename = $temp[0] . '-'.$cdate.'.' . end($temp); 

$target_file = $target_dir . basename($newfilename);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["xml_file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "xlsx") {
    echo "Sorry, only xlsx files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["xml_file"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $newfilename). " has been uploaded.";
		 echo "The file has been uploaded.";		
		
		
		
	$xlsx = new SimpleXLSX("excels/".$newfilename);

	//echo "<pre>";
	//print_r( $xlsx->rows() );echo "</pre>";
	
	
	$nrecord = $xlsx->rows();
	
	$totalrecord = count($nrecord);
	$i = 0;
$fr = 0; 
?>
        <table width="100%">
<tr><td><strong>ID</strong></td><td><strong>Blog Title</strong></td><td><strong>Detail</strong></td><td><strong>Blog Date</strong></td><td><strong>Blog Added</strong></td><td><strong>Blog Page</strong></td><td><strong>User ID</strong></td><td><strong>Sticky Blog</strong></td><td><strong>Author ID</strong></td><td><strong>Secret Blog</strong></td><td><strong>Image Link</strong></td><td><strong>SubCategory ID</strong></td><td><strong>Sneak Peak Blog</strong></td><td><strong>Blog Banner</strong></td><td><strong>Blog Thumb</strong></td></tr>
<?php
	foreach($nrecord as $nresult)
	{
		if( $i++ < 1){
        	continue;
    	}else if($nresult[1] == ''){ continue; }else { $fr++; }
		
		?>

<tr><td><?php echo  $nresult[0]; ?></td><td><?php echo  $nresult[1]; ?></td><td><?php echo  $nresult[2]; ?></td><td><?php echo  $nresult[3]; ?></td><td><?php echo  $nresult[4]; ?></td><td><?php echo  $nresult[5]; ?></td><td><?php echo  $nresult[6]; ?></td><td><?php echo  $nresult[7]; ?></td><td><?php echo  $nresult[8]; ?></td><td><?php echo  $nresult[9]; ?></td><td><?php echo  $nresult[10]; ?></td><td><?php echo  $nresult[11]; ?></td><td><?php echo  $nresult[12]; ?></td><td><?php echo  $nresult[13]; ?></td><td><?php echo  $nresult[14]; ?></td></tr>



        <?php
		
			$blogID = $nresult[0];
			$blogTitle = $nresult[1];
			$blogDetail = $nresult[2]; 
			$blogDetail = addslashes($blogDetail);
			$blogDate = $nresult[3];
			$blogAdded = $nresult[4];
			$blogPage = $nresult[5];
			$userID = $nresult[6];
			$stickyBlog = $nresult[7];
			$authorID = $nresult[8];
			$secretBlog = $nresult[9];
			$imageLink = $nresult[10];
			$subcategoryID = $nresult[11];
			$sneakpeekBlog = $nresult[12];
			$blogBanner = $nresult[13];
			$blogThumb = $nresult[14];
			//$blogID = $nresult[15];
			//$blogID = $nresult[16];
			//echo "Insert into llBlog set blogTitle='$blogTitle', blogDetail='$blogDetail', blogDate='$blogDate', blogAdded='$blogAdded', blogPage='$blogPage', userID='$userID', stickyBlog='$stickyBlog', authorID='$authorID', secretBlog='$secretBlog', subcategoryID='$subcategoryID', sneakpeekBlog='$sneakpeekBlog', blogBanner='$blogBanner', blogThumb='$blogThumb' ";
if($blogTitle != ''){
			mysql_query("Insert into llBlog set blogTitle='$blogTitle', blogDetail='$blogDetail', blogDate='$blogDate', blogAdded='$blogAdded', blogPage='$blogPage', userID='$userID', stickyBlog='$stickyBlog', authorID='$authorID', secretBlog='$secretBlog', subcategoryID='$subcategoryID', sneakpeekBlog='$sneakpeekBlog', blogBanner='$blogBanner', blogThumb='$blogThumb' ");
	}
		
	} 
		
	?>
</table>
<h3>Total Records : <?php echo $fr; ?></h3>
<?php	
		
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}







}

	
	
?>
<style>
table {
    border: 1px solid #CCC;
    background: #f2f2f2;
    margin: 20px 0px;
}
td {
    border: 1px solid #ccc;text-align:center;
}
form {
    margin: 20px 0px;
}
</style>
<div style="text-align:center;margin:0 auto;">
<h2>Please upload file with extension .xlsx</h2>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="xml_file" id="xml_file">
<input type="submit" name="submit" value="Upload">
</form>
</div>