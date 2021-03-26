<div id="CMMNTlineadmin">
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
  <script  src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script  src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

function allPaidEbookPopUpText() 
		    {
			   $.ajax({
			     type: "POST",
			     url: "process/selectpaidebook.php",
			     success: function(ebookDeatils) 
			     {         
			            
						var allEbookDeatils = $.parseJSON(ebookDeatils);//parse JSON
						var output = '<table><tr>';
							output += '<th class=col-xs-1>Select</th>';
				    		output += '<th class=col-xs-4>Title</th>';			    			
			    			output += '<th class=col-xs-3>Pdf</th>';
output += '<th class=col-xs-1>Cost</th>';
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
						    output += '<td ><input id='+allEbookDeatils[i].PEbookID+' type="radio" name="PaidHomePagePopup" value="" '+ setAttribuit +'></td>';
				    		output += '<td >'+ allEbookDeatils[i].heading+'</td>';
			    			output += '<td ><a target="_blank" href="/images/popup/'+ allEbookDeatils[i].pdfName+'">File link</td>';
output += '<td >'+ allEbookDeatils[i].ppdfamount+'</td>';
			    			output += '<td >'+ allEbookDeatils[i].fileCounter+'</td>';
			    			output += '<td ><button class =eBookDeatilsEditButton  id='+ i +'>Edit</button><button class =eBookDeatilsDeleteButton  id='+ allEbookDeatils[i].PEbookID +'>Delete</button></td>';
			    		    output += '</tr>';  
						}
						output += '</table>'
					 	$("#ppaidEBookTable").html(output);


					 	//click on edit button clear all the ebook detail 
					 	$('.eBookDeatilsEditButton').on('click', function() 
   						 {
//alert('test');
   						 	 $("#paidEBookHeading" ).focus();
   						 	 var PaidPEbookID = $(this).attr('id') ;
   						 	 $('#paidEBookHeading').val( allEbookDeatils[PaidPEbookID].heading);
   						 	 $('#paidEBookHeadingColor').val(allEbookDeatils[PaidPEbookID].headingColor);
							 $('#paidEBookHeadingSize').val(allEbookDeatils[PaidPEbookID].headingSize);
							 $('#paidEBookHeadingFont').val(allEbookDeatils[PaidPEbookID].headingFont);					 	
   						 	 $('#PEbookID').val(allEbookDeatils[PaidPEbookID].PEbookID);
   						 	 $('#paidEBookMailTitle').val(allEbookDeatils[PaidPEbookID].paidEBookMailTitle); 
  						 	 $('#paidEBookCost').val(allEbookDeatils[PaidPEbookID].ppdfamount); 
   						 	 $('#paidEBookMailText').val(allEbookDeatils[PaidPEbookID].paidEBookMailText);
   						 	 $('#paidEBookThankYouMessage').val(allEbookDeatils[PaidPEbookID].paidEBookThankYouMessage);
   						 	 
   						 	 CKEDITOR.instances.paidEBookMailText.setData($('#paidEBookMailText').val());
   						 	 
					     });

					 	//click on delete button to delete the ebook detail 
					 	$('.eBookDeatilsDeleteButton').on('click', function() 
   						 {
   						 	 var PaidPEbookID = $(this).attr('id') ;
   						 	 $.ajax({
									     type: "POST",
									     url: "process/deletePaidbookPopupText.php",
									     data: {
												PEbookID : PaidPEbookID,
									            },
									     success: function(msg) 
									     {  
									     	allPaidEbookPopUpText();
									     	alert('Deatils successfully deleted');
									     	 $('#paidEBookHeading').val( '');
				   						 	 $('#paidEBookHeadingColor').val('');
											 $('#paidEBookHeadingSize').val('');				   						 	
				   						 	 $('#PEbookID').val('');
				   						 	 $('#paidEBookMailTitle').val('');
											 $('#paidEBookCost').val('');
				   						 	 $('#paidEBookOpacity').val('');
				   						 	 $('#paidEBookMailText').val('');
				   						 	 $('#paidEBookThankYouMessage').val('');
				   						 	 CKEDITOR.instances.paidEBookMailText.setData('');
					                     }
								     });
   						 	 
					     });
					 	
					 	//update details on change of radio button

					 	$("input[name='PaidHomePagePopup']").on('change', function() 
   						 {
   						 	 var updatePEbookID = $(this).attr('id') ;
   						 	  $.ajax({
									     type: "POST",
									     url: "process/updatepaidebook.php",
									     data: {
												PEbookID : updatePEbookID,
									            },
									     success: function(msg) 
									     {  
									     	
					                     }
								     });
					     });


						//update popup status on change of radio button

					 	$("input[name='ebookDisplay']").on('change', function() 
   						 {
   						 	 var ebookStatus = $(this).val() ;
   						 	 //alert(popupStatus);
   						 	  $.ajax({
									     type: "POST",
									     url: "process/ebookpaidstate.php",
									     data: {
												status : ebookStatus,
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
		
				allPaidEbookPopUpText();
				//serviceImages();
				
			
			//....................................................................................................
//................................FREE E BOOK........................................................
								
						$('#paidEBookClear').click(function  () 
						{
							 $('#paidEBookHeading').val('');
   						 	 $('#paidEBookHeadingColor').val('');
   						 	 $('#paidEBookText').val('');
   						 	 $('#paidEBookTextColor').val('');
   						 	 $('#PEbookID').val(''); 
   						 	 $('#paidEBookMailTitle').val('');
							 $('#paidEBookCost').val('');
   						 	 $('#paidEBookOpacity').val('');
   						 	 $('#paidEBookMailText').val('');
   						 	 $('#paidEBookThankYouMessage').val('');
   						 	 CKEDITOR.instances.paidEBookMailText.setData('');
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
.paidEBookLabel {
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
	#tabs-14 #ppaidEBookTable input[type=radio]
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
	  #ppaidEBookTable tr td,
	  #ppaidEBookTable tr th
	  {
	  	text-align: center;
	  }
	   #ppaidEBookTable tr td img{
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
			  	
	

<div class="col-xs-6"><h2>Paid E-Book </h2></div>
			  	<div style="margin-top:20px;font-size:20px;" class="col-xs-6">
			  	<label>Show Paid Ebook ..</label>
			  	<?php 
			  	$sql_select="SELECT status FROM ebookpopup WHERE id = 366";
	 
				$resultEbook = mysql_query($sql_select);

				if(mysql_num_rows($resultEbook) > 0)
				{
					
					$status = mysql_result($resultEbook, 0, 'status');
				}
				if($status == 1)
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" id="ebookDisplay" name="ebookDisplay" value="1" checked> On';
					echo '<input style="height: 16px;width: 18px;" type="radio" id="ebookHide" name="ebookDisplay" value="0"> Off';
				}
				else
				{
					echo '<input style="height: 16px;width: 18px;" type="radio" name="ebookDisplay" value="1" > On';
					echo '<input style="height: 16px;width: 18px;" type="radio" name="ebookDisplay" value="0" checked> Off';
				}
			  	?>
			  		
				 	
			  	</div>


			  	<div class="col-xs-12">
			  	<form action="/process/paidEbook.php" method="post" enctype="multipart/form-data">
				  	<div class="row"> 
				  	<input type="hidden" id="PEbookID" name="PEbookID" value="">   
					    <div  class="col-xs-12">
							<label style="" for="paidEBookHeading" class="paidEBookLabel">Heading</label>
							<input required='required' type="text" id="paidEBookHeading" name="paidEBookHeading" />
							<input type="color" id="paidEBookHeadingColor" name="paidEBookHeadingColor" />
					    </div>
                        <div  class="col-xs-12">
							<label style="" for="paidEBookHeading" class="paidEBookLabel">Heading Font & Size</label>
							<select name="paidEBookHeadingFont" id="paidEBookHeadingFont">
                            	<option value="impact_labelregular">ImpactLabel Regular</option>
                                <option value="impactlabel">ImpactLabel Reversed</option>
                            </select>
							<input style="width:100px;" placeholder="Like 12px" type="text" id="paidEBookHeadingSize" name="paidEBookHeadingSize" />
					    </div>
							    
						<div  class="col-xs-12">
							<label style="" for="paidEBookCost" class="paidEBookLabel">PDF Cost</label>
							<input required='required' type="text" id="paidEBookCost" name="paidEBookCost" />
					    </div>
							   
						<div style="margin-bottom: 20px;" class="col-xs-12">
		                	<label style=" " for="paidEBookPDF" class="paidEBookLabel">PDF</label>
		                	<input style="" class="" accept="application/msword,application/pdf,application/vnd.ms-powerpoint" type="file" name="paidEBookPDF" >
		                </div>

		                <h2 style="margin: 0 0px 5px 14px;">Mail Text</h2>

		                <div  class="col-xs-12">
							<label style="" for="paidEBookMailTitle" class="paidEBookLabel">Title</label>
							<input required='required' type="text" id="paidEBookMailTitle" name="paidEBookMailTitle" />
					    </div>
							    
						<div class="col-xs-12">
							<label style="" for="paidEBookMailText" class="paidEBookLabel">Description</label>
							<textarea class="col-xs-12" style="width: 100%;" required style="resize:none" name="paidEBookMailText" id="paidEBookMailText"></textarea>
							<script>
									CKEDITOR.replace('paidEBookMailText');
									CKEDITOR.config.removePlugins = 'about,flash,iframe,forms,stylescombo';
									CKEDITOR.config.filebrowserImageBrowseUrl = '/includes/imagemanager.php';
									CKEDITOR.config.filebrowserWindowWidth = '650';
									CKEDITOR.config.filebrowserWindowHeight = '480';
								</script>
						</div>
		                 <div  class="col-xs-12">
							<label style="" for="paidEBookThankYouMessage" class="paidEBookLabel">Thank You Text</label>
							<textarea required style="resize:none" name="paidEBookThankYouMessage" id="paidEBookThankYouMessage"></textarea>
					    </div>	        
				  	</div>	
				  <input type="submit" name='Save Details' value="Save Details">
				  <input type="button" id="paidEBookClear" name='paidEBookClear' value="Clear">

			  	</form>
			  	</div> 
			  	<div style="margin-left:0px; margin-top: 40px;" class="col-xs-12">
				  	<table id="ppaidEBookTable">
				  	
			    	</table>
		    	</div>
			</div>
		
</div>