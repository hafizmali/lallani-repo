<div id="CMMNTlineadmin">
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
  <script  src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script  src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

function allFreeEbookPopUpText() 
		    {
			   $.ajax({
			     type: "POST",
			     url: "process/selectfreeebook.php",
			     success: function(ebookDeatils) 
			     {         
			            
						var allEbookDeatils = $.parseJSON(ebookDeatils);//parse JSON
						var output = '<table><tr>';
							output += '<th class=col-xs-1>Select</th>';
				    		output += '<th class=col-xs-4>Popup Text</th>';
			    			output += '<th class=col-xs-1>Image</th>';
			    			output += '<th class=col-xs-3>Pdf</th>';
			    			output += '<th class=col-xs-1>Download#</th>';
			    			output += '<th class=col-xs-1>Action</th>';
			    		    output += '</tr>';   
						for (var i in allEbookDeatils) 
						{
						    output += '<tr >';
						    var setAttribuit = '';
						    if( allEbookDeatils[i].eBookSelect == 1)
						    {
						    	setAttribuit = 'checked';
						    }
						    output += '<td ><input id='+allEbookDeatils[i].EbookID+' type="radio" name="FreeHomePagePopup" value="" '+ setAttribuit +'></td>';
				    		output += '<td >'+ allEbookDeatils[i].popupText+'</td>';
			    			output += '<td ><img src="/images/popup/'+ allEbookDeatils[i].popupImage+'" alt="" width="42" height="42"></td>';
			    			output += '<td ><a target="_blank" href="/images/popup/'+ allEbookDeatils[i].pdfName+'">File link</td>';
			    			output += '<td >'+ allEbookDeatils[i].fileCounter+'</td>';
			    			output += '<td ><button class =eBookDeatilsEditButton  id='+ i +'>Edit</button><button class =eBookDeatilsDeleteButton  id='+ allEbookDeatils[i].EbookID +'>Delete</button></td>';
			    		    output += '</tr>';  
						}
						output += '</table>'
					 	$("#freeEBookTable").html(output);


					 	//click on edit button clear all the ebook detail 
					 	$('.eBookDeatilsEditButton').on('click', function() 
   						 {
   						 	 $("#freeEBookHeading" ).focus();
   						 	 var freeEbookId = $(this).attr('id') ;
$('#EbookID').val( allEbookDeatils[freeEbookId].EbookID);
   						 	 $('#freeEBookHeading').val( allEbookDeatils[freeEbookId].heading);
   						 	 $('#freeEBookHeadingColor').val(allEbookDeatils[freeEbookId].headingColor);
							 $('#freeEBookHeadingSize').val(allEbookDeatils[freeEbookId].headingSize);
							 $('#freeEBookHeadingFont').val(allEbookDeatils[freeEbookId].headingFont);						 
   						 	 $('#freeEBookText').val(allEbookDeatils[freeEbookId].popupText);
   						 	 $('#freeEBookTextColor').val(allEbookDeatils[freeEbookId].popupTextColor);
							 $('#freeEBookTextSize').val(allEbookDeatils[freeEbookId].popupTextSize);
							 $('#freeEBookTextFont').val(allEbookDeatils[freeEbookId].popupTextFont);
   						 	 $('#EbookID').val(allEbookDeatils[freeEbookId].EbookID);
   						 	 $('#freeEBookMailTitle').val(allEbookDeatils[freeEbookId].freeEBookMailTitle);
   						 	 $('#freeEBookOpacity').val(allEbookDeatils[freeEbookId].freeEBookOpacity);
   						 	 $('#freeEBookMailText').val(allEbookDeatils[freeEbookId].freeEBookMailText);
   						 	 $('#freeEBookThankYouMessage').val(allEbookDeatils[freeEbookId].freeEBookThankYouMessage);
   						 	 
   						 	 CKEDITOR.instances.freeEBookMailText.setData($('#freeEBookMailText').val());
   						 	 
					     });

					 	//click on delete button to delete the ebook detail 
					 	$('.eBookDeatilsDeleteButton').on('click', function() 
   						 {
   						 	 var freeEbookId = $(this).attr('id') ;
   						 	 $.ajax({
									     type: "POST",
									     url: "process/deleteEbookPopupText.php",
									     data: {
												EbookID : freeEbookId,
									            },
									     success: function(msg) 
									     {  
									     	allFreeEbookPopUpText();
									     	alert('Deatils successfully deleted');
									     	 $('#freeEBookHeading').val( '');
				   						 	 $('#freeEBookHeadingColor').val('');
											 $('#freeEBookHeadingSize').val('');
				   						 	 $('#freeEBookText').val('');
				   						 	 $('#freeEBookTextColor').val('');
											 $('#freeEBookTextSize').val('');
				   						 	 $('#EbookID').val('');
				   						 	 $('#freeEBookMailTitle').val('');
				   						 	 $('#freeEBookOpacity').val('');
				   						 	 $('#freeEBookMailText').val('');
				   						 	 $('#freeEBookThankYouMessage').val('');
				   						 	 CKEDITOR.instances.freeEBookMailText.setData('');
					                     }
								     });
   						 	 
					     });
					 	
					 	//update details on change of radio button

					 	$("input[name='FreeHomePagePopup']").on('change', function() 
   						 {
   						 	 var updateEbookId = $(this).attr('id') ;
   						 	  $.ajax({
									     type: "POST",
									     url: "process/updateEbookPopupText.php",
									     data: {
												EbookID : updateEbookId,
									            },
									     success: function(msg) 
									     {  
									     	
					                     }
								     });
					     });


					 	//update popup status on change of radio button

					 	$("input[name='popupDisplay']").on('change', function() 
   						 {
   						 	 var popupStatus = $(this).val() ;
							 var ppopupStatus = $('#ppopupDisplay').val() ;
   						 	 //alert(popupStatus);
   						 	  $.ajax({
									     type: "POST",
									     url: "process/ebookpopupstate.php",
									     data: {
												status : popupStatus,
												pstatus : ppopupStatus,
									            },
									     success: function(msg) 
									     {  
									     	//alert(msg);
					                     }
								     });
					     });

						//update popup status on change of radio button

					 	$("input[name='ppopupDisplay']").on('change', function() 
   						 {
   						 	 var ppopupStatus = $(this).val() ;
								var popupStatus = $('#popupDisplay').val() ;
   						 	 //alert(ppopupStatus);
   						 	  $.ajax({
									     type: "POST",
									     url: "process/ebookpopupstate.php",
									     data: {
												status : popupStatus,
												pstatus : ppopupStatus,
									            },
									     success: function(msg) 
									     {  
									     	//alert(msg);
					                     }
								     });
					     });

                  }
		       });
			}
			
			
			$(document).ready(function()
			{
		
				allFreeEbookPopUpText();
				//serviceImages();
				
			
			//....................................................................................................
//................................FREE E BOOK........................................................
								
						$('#freeEBookClear').click(function  () 
						{
							 $('#freeEBookHeading').val('');
   						 	 $('#freeEBookHeadingColor').val('');
   						 	 $('#freeEBookText').val('');
   						 	 $('#freeEBookTextColor').val('');
   						 	 $('#EbookID').val(''); 
   						 	 $('#freeEBookMailTitle').val('');
   						 	 $('#freeEBookOpacity').val('');
   						 	 $('#freeEBookMailText').val('');
   						 	 $('#freeEBookThankYouMessage').val('');
   						 	 CKEDITOR.instances.freeEBookMailText.setData('');
						});
				});
			
			


</script>

<style>
.fieldsec {
    clear: both;
    width: 100%;
    text-align: left;
    margin: 10px 0px;
}
.fieldsec label {
    width: 200px;
    font-weight: bold;
    vertical-align: middle;
    display: inline-block;
    border-bottom: 1px #ccc dotted;
    margin-bottom: 10px;
}
.fieldsec textarea, .fieldsec input[type="text"] {
    width: 60%;
}
.allsect h1 {
	border-bottom: 1px solid #ccc;
}
.allsect {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0px;
    width: 100%;
}

	#tabs-14 form div
	{
		margin-top: 20px;
	}
.freeEBookLabel {
    float: left;
    width: 82px;
    text-align: left;
}
	#tabs-14 form input[type=submit],
	#tabs-14 form input[type=button]
	{
		margin-left: 20%;
	    border-radius: 13px;
	    font-size: 18px;
	    color: white;
	    padding: 6px 26px;
	    background: #5B97D0;
	    margin-left: 10px;
	    font-family: ssprobold;
	    margin-top:20px;
	}
	#tabs-14 form input[type=submit]
	{
		margin-left: 15%;
	}
	{

	}
	#tabs-14 form div input,
	#tabs-14 form div textarea
	{
		width: 400px;
	}
	#tabs-14 #freeEBookTable input[type=radio]
	{
		height: 20px;
		width:17px;
	}
	#tabs-14 form div input[type=color]
	{
		position: absolute;
    	margin-left: 10px;
    	width: 36px;
	}
	.eBookDeatilsEditButton,
	.eBookDeatilsDeleteButton
	{
		background-color: #5B97D0;
    	border-radius: 9px;
    	    width: 69px;
	}
		.ui-widget input
		{
			font-size: .9em;
		}
		.spacer input {
		    width: 145px !important;
		}
		 #sortable, #sortableProduct
		 { 
		 	list-style-type: none; 
		 	margin: 0; 
		 	padding: 0; 
		 	width: 60%; 
		 }
	  #sortable li,
	  #sortableProduct li 
	  { 
	  	margin: 0 3px 3px 3px; 
	  	padding: 0.4em; 
	  	padding-left: 1.5em; 
	  	font-size: 1.4em; 
	  	height: 18px; 
	  }
	  #sortable li span,
	  #sortableProduct li span 
	  { 
	  	position: absolute; 
	  	margin-left: -1.3em; 
	  	margin-top: 39px;
	  }
	  
	   #sortable li,
	   #sortableProduct li
	  {
	  	    height: 113px;
    		width: 167%;
	  }
	  #freeEBookTable tr td,
	  #freeEBookTable tr th
	  {
	  	text-align: center;
	  }
	   #freeEBookTable tr td img{
	  	    margin-top: 35px;
	  }
	  .col-xs-12 {
    float: left;
    clear: both;
    width: 100%;
}

th.col-xs-1 {
    width: 20%;
}
th.col-xs-3 , th.col-xs-4 {
    width: 27%;
}
	</style>

<div id="tabs-14" >
			  	
			  	<div class="col-xs-6"><h2>Free E-Book </h2></div>
			  	<div style="margin-top:20px;font-size:20px;" class="col-xs-6">
			  	<label>Show lead magnet ..</label>
			  	<?php 
			  	$sql_select="SELECT status FROM ebookpopup WHERE id = 362";
	 
				$resultEbook = mysql_query($sql_select);

				if(mysql_num_rows($resultEbook) > 0)
				{
					
					$status = mysql_result($resultEbook, 0, 'status');
				}
				if($status == 1)
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" id="popupDisplay" name="popupDisplay" value="1" checked> On';
					echo '<input style="height: 16px;width: 18px;" type="radio" id="popupHide" name="popupDisplay" value="0"> Off';
				}
				else
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" name="popupDisplay" value="1" > On';
					echo '<input style="height: 16px;width: 18px;" type="radio" name="popupDisplay" value="0" checked> Off';
				}
			  	?>
			  		
				 	
			  	</div>
				<div style="margin-top:20px;font-size:20px;" class="col-xs-6">
			  	<label>Show Bottom Popup ..</label>
			  	<?php 
			  	$sql_select="SELECT pstatus FROM ebookpopup WHERE id = 362";
	 
				$resultEbook = mysql_query($sql_select);

				if(mysql_num_rows($resultEbook) > 0)
				{
					
					$pstatus = mysql_result($resultEbook, 0, 'pstatus');
				}
				if($pstatus == 1)
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" id="ppopupDisplay" name="ppopupDisplay" value="1" checked> On';
					echo '<input style="height: 16px;width: 18px;" type="radio" id="ppopupHide" name="ppopupDisplay" value="0"> Off';
				}
				else
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" name="ppopupDisplay" value="1" > On';
					echo '<input style="height: 16px;width: 18px;" type="radio" name="ppopupDisplay" value="0" checked> Off';
				}
			  	?>
			  		
				 	
			  	</div>
			  	<div class="col-xs-12">
			  	<form action="/process/freeEbook.php" method="post" enctype="multipart/form-data">
				  	<div class="row"> 
				  	<input type="hidden" id="EbookID" name="EbookID" value="">   
					    <div  class="col-xs-12">
							<label style="" for="freeEBookHeading" class="freeEBookLabel">Heading</label>
							<input required='required' type="text" id="freeEBookHeading" name="freeEBookHeading" />
							<input type="color" id="freeEBookHeadingColor" name="freeEBookHeadingColor" />
					    </div>
                        <div  class="col-xs-12">
							<label style="" for="freeEBookHeading" class="freeEBookLabel">Heading Font & Size</label>
							<select name="freeEBookHeadingFont" id="freeEBookHeadingFont">
                            	<option value="impact_labelregular">ImpactLabel Regular</option>
                                <option value="impactlabel">ImpactLabel Reversed</option>
                            </select>
							<input style="width:100px;" placeholder="Like 12px" type="text" id="freeEBookHeadingSize" name="freeEBookHeadingSize" />
					    </div>
							    
						<div class="col-xs-12">
							<label style="height: 95px;" for="freeEBookText" class="freeEBookLabel">PopUp Text</label>
							<textarea required style="resize:none" name="freeEBookText" id="freeEBookText"></textarea>
							<input type="color" id="freeEBookTextColor" name="freeEBookTextColor" />
						</div>
                         <div  class="col-xs-12">
							<label style="" for="freeEBookText" class="freeEBookLabel">PopUp Text Font & Size</label>
							<select name="freeEBookTextFont" id="freeEBookTextFont">
                            	<option value="impact_labelregular">ImpactLabel Regular</option>
                                <option value="impactlabel">ImpactLabel Reversed</option>
                            </select>
							<input style="width:100px;" placeholder="Like 12px" type="text" id="freeEBookTextSize" name="freeEBookTextSize" />
					    </div>
		
		                <div class="col-xs-12">
		                	<label style=" " for="freeEBookImage" class="freeEBookLabel">PopUp Image</label>
		                	<input style="" class="" accept="image/*" type="file" name="freeEBookImage" >
		                </div>
		                <div class="col-xs-12">
		                	<label  for="freeEBookImage" class="freeEBookLabel">Opacity</label>
		                	<input required="required" style="width:100px;float:left; " step="0.01" min="0" max="1"  type="number" id="freeEBookOpacity" name="freeEBookOpacity" value="1" >
		                </div>
							   
						<div style="margin-bottom: 20px;" class="col-xs-12">
		                	<label style=" " for="freeEBookPDF" class="freeEBookLabel">PDF</label>
		                	<input style="" class="" accept="application/msword,application/pdf,application/vnd.ms-powerpoint" type="file" name="freeEBookPDF" >
		                </div>

		                <h2 style="margin: 0 0px 5px 14px;">Mail Text</h2>

		                <div  class="col-xs-12">
							<label style="" for="freeEBookMailTitle" class="freeEBookLabel">Title</label>
							<input required='required' type="text" id="freeEBookMailTitle" name="freeEBookMailTitle" />
					    </div>
							    
						<div class="col-xs-12">
							<label style="" for="freeEBookMailText" class="freeEBookLabel">Description</label>
							<textarea class="col-xs-12" style="width: 100%;" required style="resize:none" name="freeEBookMailText" id="freeEBookMailText"></textarea>
							<script>
									CKEDITOR.replace('freeEBookMailText');
									CKEDITOR.config.removePlugins = 'about,flash,iframe,forms,stylescombo';
									CKEDITOR.config.filebrowserImageBrowseUrl = '/includes/imagemanager.php';
									CKEDITOR.config.filebrowserWindowWidth = '650';
									CKEDITOR.config.filebrowserWindowHeight = '480';
								</script>
						</div>
		                 <div  class="col-xs-12">
							<label style="" for="freeEBookThankYouMessage" class="freeEBookLabel">Thank You Text</label>
							<textarea required style="resize:none" name="freeEBookThankYouMessage" id="freeEBookThankYouMessage"></textarea>
					    </div>	        
				  	</div>	
				  <input type="submit" name='Save Details' value="Save Details">
				  <input type="button" id="freeEBookClear" name='freeEBookClear' value="Clear">

			  	</form>
			  	</div> 
			  	<div style="margin-left:0px; margin-top: 40px;" class="col-xs-12">
				  	<table id="freeEBookTable">
				  	
			    	</table>
		    	</div>
			</div>
		
</div>