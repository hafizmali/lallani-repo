<?php include 'startsession.php';?>
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Basic Demo 1.3.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta charset="utf-8">
<title>Lalanii Rochelle | Admin</title>
<meta name="description" content="Lalanii Rochelle | Admin" />
<?php include 'tags.php';?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="../scripts/blueimp/css/style.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="../scripts/blueimp/css/jquery.fileupload.css">
<link rel="stylesheet" href="../scripts/autoComplete/jquery.auto-complete.css">
</head>
<body>
<?php 
	include 'database.php';
	include 'validation.php';
	?>

<div class="container">
    
    <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    
	<br>


	<ul id="imglist">
			<?php
			$sqlIMG="Select * from llImage order by imageID desc";
					$resultIMG=mysql_query($sqlIMG);
					$numIMG=mysql_num_rows($resultIMG);
					$IMG=0;
					while ($IMG < $numIMG) {
					$imageID=mysql_result($resultIMG,$IMG,"imageID");
					$image=mysql_result($resultIMG,$IMG,"image");
					?>
					<li><img class="selectthisimage" src="http://lalanii.com/images/blogs/<? echo $image; ?>" height="100px" /><br><?php echo $image; ?><br><a style="color:red;" href="http://lalanii.com/process/deleteimage.php?imageID=<?php echo $imageID; ?>" class="error">delete</a></li>
					<?php
					++$IMG;
					}?>					
			</ul>
</div>
<script src="../scripts/autoComplete/jquery.auto-complete.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="../scripts/blueimp/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="../scripts/blueimp/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="../scripts/blueimp/js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'http://lalanii.com/images/blogs/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                jQuery('#files').append("<p>"+file.name+" uploaded!</p>");
				
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


function getUrlParam(paramName)
	{
	var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
	var match = window.location.search.match(reParam) ;
	return (match && match.length > 1) ? match[1] : '' ;
	}
var funcNum = getUrlParam('CKEditorFuncNum');
var select = getUrlParam('sel');
$('.selectthisimage').bind('click', function(e) {	
	var theurl=$(this).attr("src");
	if(funcNum>0){ 
	//alert(funcNum);
	//alert($url);
	window.opener.CKEDITOR.tools.callFunction(funcNum, theurl);
	//WORKS
	//var newPartyName = 'testurl';
	//window.opener.$("#cke_99_textInput").val(newPartyName);
	}else{
	if(select=="thumb"){window.opener.document.getElementById("blogThumb").value=theurl;}
	if(select=="banner"){window.opener.document.getElementById("blogBanner").value=theurl;}	
	}
	window.close();
});
</script>
</body>
</html>
