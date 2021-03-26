<div id="CMMNTlineadmin">
<script>
function delcreative(postid)
{
	var postid = postid;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=delexpone&expost_id='+postid;
}
function delproducttion(postid)
{
	var postid = postid;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=delexptwo&expost_id='+postid;
}
function funtestimonial()
{
	var selector = document.getElementById('test_ids');
    var nval = selector[selector.selectedIndex].value;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=edittestimonial&testimonial_id='+nval;
}
function funexpone()
{
	var selector = document.getElementById('expost_ids');
    var nval = selector[selector.selectedIndex].value;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=editexpone&expost_id='+nval;
}
function funexptwo()
{
	var selector = document.getElementById('expost_idss');
    var nval = selector[selector.selectedIndex].value;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=editexptwo&expost_id='+nval;
}
function funport()
{
	var selector = document.getElementById('port_ids');
    var nval = selector[selector.selectedIndex].value;
	window.location.href='http://lalanii.com/admin.php?portalValue=hireme&action=editport&port_id='+nval;
}

</script>
<?php
if($_POST['action']=='addtestimonial')
{
	if($_FILES['test_title']['name'])
	{
		$test_title = $_FILES['test_title']['name']; //rename file
		move_uploaded_file($_FILES['test_title']['tmp_name'], 'hireme_img/'.$test_title);
	}
	$test_title = $test_title;
	$test_desc = $_POST['test_desc'];
	$test_author = $_POST['test_author'];
	$test_location = $_POST['test_location'];
	mysql_query("Insert into cc_testomonials set test_title='".$test_title."',test_desc='".$test_desc."',test_author='".$test_author."',test_location='".$test_location."' ");
}
if($_POST['action']=='updtestimonial')
{
	$testimonial_id = $_POST['testimonial_id'];
	//$test_title = $_POST['test_title'];
	$test_desc = $_POST['test_desc'];
	$test_author = $_POST['test_author'];
	$test_location = $_POST['test_location'];
	$ttquery ="update cc_testomonials set test_desc='".$test_desc."',test_author='".$test_author."',test_location='".$test_location."' ";
	if($_FILES['test_title']['name'])
	{
		$test_title = $_FILES['test_title']['name']; //rename file
		move_uploaded_file($_FILES['test_title']['tmp_name'], 'hireme_img/'.$test_title);
		$ttquery .= ",test_title='".$test_title."'";
	}
	echo $ttquery .= " where test_id='".$testimonial_id."'";
	mysql_query($ttquery);
}
if($_POST['action']=='updtechnology')
{
	//$testimonial_id = $_POST['testimonial_id'];
	$tec_header = $_POST['tec_header'];
	$tec_title = $_POST['tec_title'];
	$tec_desc = $_POST['tec_desc'];	
	mysql_query("update ccexp set tec_header='".$tec_header."',tec_title='".$tec_title."',tec_desc='".$tec_desc."'  where exp_id='1' ");
}
if($_POST['action']=='updabout')
{
	//$testimonial_id = $_POST['testimonial_id'];
	$about_title1 = $_POST['about_title1'];
	$about_desc1 = $_POST['about_desc1'];
	$about_title2 = $_POST['about_title2'];	
	$about_subtitle2 = $_POST['about_subtitle2'];	
	//$about_img = $_POST['about_img'];	
	$about_title3 = $_POST['about_title3'];	
	$about_subtitle3 = $_POST['about_subtitle3'];	
	$abour_desc3 = $_POST['abour_desc3'];	
	$aaquery = "update ccabout set about_title1='".$about_title1."',about_desc1='".$about_desc1."',about_title2='".$about_title2."',about_subtitle2='".$about_subtitle2."',about_title3='".$about_title3."',about_subtitle3='".$about_subtitle3."',abour_desc3='".$abour_desc3."'  ";
	if($_FILES['about_img']['name'])
	{
		$about_img = $_FILES['about_img']['name']; //rename file
		move_uploaded_file($_FILES['about_img']['tmp_name'], 'hireme_img/'.$about_img);
		$aaquery .= ",about_img='".$about_img."'";
	}
	$aaquery .= "  where aboutid='1'";
	mysql_query($aaquery);
}

if($_POST['action']=='updhead')
{
	//$testimonial_id = $_POST['testimonial_id'];
	$head_title = $_POST['head_title'];
	$head_title2 = $_POST['head_title2'];
	$head_title3 = $_POST['head_title3'];	
	$head_desc = $_POST['head_desc'];	
	$hh_q = "update ccheader set head_title='".$head_title."',head_title2='".$head_title2."',head_title3='".$head_title3."',head_desc='".$head_desc."' ";
	if($_FILES['head_img']['name'])
	{
		$head_img = $_FILES['head_img']['name']; //rename file
		move_uploaded_file($_FILES['head_img']['tmp_name'], 'head_img/'.$head_img);
		$hh_q .= ",head_img='".$head_img."'";
	}
	$hh_q .= " where head_id='1'";
	mysql_query($hh_q);
}


if($_POST['action']=='addexpone')
{
	$expost_title = $_POST['expost_title'];
	$expost_desc = $_POST['expost_desc'];
	$expost_bus = $_POST['expost_bus'];
	$expost_date = $_POST['expost_date'];
	$post_date = $_POST['post_date'];
	$ex_sec_id = 1;
	mysql_query("Insert into cc_expost set expost_title='".$expost_title."',expost_desc='".$expost_desc."',post_date='".$post_date."',expost_bus='".$expost_bus."',expost_date='".$expost_date."',ex_sec_id='".$ex_sec_id."' ");
}
if($_POST['action']=='updexpone')
{
	$expost_id = $_POST['expost_id'];
	$expost_title = $_POST['expost_title'];
	$expost_desc = $_POST['expost_desc'];
	$expost_bus = $_POST['expost_bus'];
	$expost_date = $_POST['expost_date'];
	$post_date = $_POST['post_date'];
	$ex_sec_id = 1;
	mysql_query("update cc_expost set expost_title='".$expost_title."',expost_desc='".$expost_desc."',post_date='".$post_date."',expost_bus='".$expost_bus."',expost_date='".$expost_date."' where expost_id='".$expost_id."' and ex_sec_id='".$ex_sec_id."' ");
}
if($_GET['action']=='delexpone')
{
	$expost_id = $_GET['expost_id'];
	
	mysql_query("Delete from  cc_expost  where expost_id='".$expost_id."' and ex_sec_id='1' ");
}

if($_POST['action']=='addexptwo')
{
	$expost_title = $_POST['expost_title'];
	$expost_desc = $_POST['expost_desc'];
	$expost_bus = $_POST['expost_bus'];
	$expost_date = $_POST['expost_date'];
	$post_date = $_POST['post_date'];
	$ex_sec_id = 2;
	mysql_query("Insert into cc_expost set expost_title='".$expost_title."',expost_desc='".$expost_desc."',expost_bus='".$expost_bus."',expost_date='".$expost_date."',post_date='".$post_date."',ex_sec_id='".$ex_sec_id."' ");
}
if($_POST['action']=='updexptwo')
{
	$expost_id = $_POST['expost_id'];
	$expost_title = $_POST['expost_title'];
	$expost_desc = $_POST['expost_desc'];
	$expost_bus = $_POST['expost_bus'];
	$expost_date = $_POST['expost_date'];
	$post_date = $_POST['post_date'];
	$ex_sec_id = 2;
	mysql_query("update cc_expost set expost_title='".$expost_title."',expost_desc='".$expost_desc."',expost_bus='".$expost_bus."',post_date='".$post_date."',expost_date='".$expost_date."' where expost_id='".$expost_id."' and ex_sec_id='".$ex_sec_id."' ");
}
if($_GET['action']=='delexptwo')
{
	$expost_id = $_GET['expost_id'];
	//echo "Delete from  cc_expost  where expost_id='".$expost_id."' and ex_sec_id='2' ";
	mysql_query("Delete from  cc_expost  where expost_id='".$expost_id."' and ex_sec_id='2' ");
}


if($_POST['action']=='addport')
{
	if($_FILES['port_img']['name'])
	{
		$port_img = $_FILES['port_img']['name']; //rename file
		move_uploaded_file($_FILES['port_img']['tmp_name'], 'portfolio_img/'.$port_img);
	}
	
	//$port_id = $_POST['port_id'];
	$port_title = $_POST['port_title'];
	$port_stitle = $_POST['port_stitle'];
	$port_cat = $_POST['port_cat'];
	$port_img = $_POST['port_img'];
	mysql_query("Insert into cc_portfolio set port_title='".$port_title."',port_stitle='".$port_stitle."',port_cat='".$port_cat."',port_img='".$port_img."' ");
}
if($_POST['action']=='updport')
{
	$port_id = $_POST['port_id'];
	$port_title = $_POST['port_title'];
	$port_stitle = $_POST['port_stitle'];
	$port_cat = $_POST['port_cat'];
	$port_img = $_POST['port_img'];
	$fquery = "update cc_portfolio set port_title='".$port_title."',port_stitle='".$port_stitle."',port_cat='".$port_cat."'";
	if($_FILES['port_img']['name'])
	{
		$port_img = $_FILES['port_img']['name']; //rename file
		move_uploaded_file($_FILES['port_img']['tmp_name'], 'portfolio_img/'.$port_img);
		$fquery .= ",port_img='".$port_img."'";
	}
	$fquery .= " where port_id='".$port_id."'";
	mysql_query($fquery);
}
?>
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
</style>

<div class="header_sec allsect" id="header_sec">
<h1>Header Section</h1>
<?php
    $head_q = mysql_fetch_array(mysql_query("Select * from ccheader where head_id='1'"));
		?>
    <form id="headerfrm" class="stylefrm" action="" method="post" enctype="multipart/form-data">
    	<div class="fieldsec">
    		<label>Image</label>
        	<input type="file" name="head_img" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Title 1</label>
        	<input type="text" name="head_title" value="<?php echo $head_q['head_title']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Title 2</label>
        	<input type="text" name="head_title2" value="<?php echo $head_q['head_title2']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Title 3</label>
        	<input type="text" name="head_title3" value="<?php echo $head_q['head_title3']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Description</label>
        	<textarea name="head_desc"><?php echo $head_q['head_desc']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<input type="hidden" name="action" value="updhead">
            <input type="hidden" name="head_id" value="1">
    		<input type="submit" value="Update" class="frmbtn" />  
        </div>
    </form>
</div>	

<div class="aboutsec allsect" id="">
<h1>About Section</h1>
<?php
    $about_q = mysql_fetch_array(mysql_query("Select * from ccabout where aboutid='1'"));
		?>
    <form id="aboutfrm" class="stylefrm" action="" method="post" enctype="multipart/form-data">
    	<div class="fieldsec">
    		<label>Main Title</label>
        	<input type="text" name="about_title1" value="<?php echo $about_q['about_title1']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Main Desc</label>
        	<textarea name="about_desc1"><?php echo $about_q['about_desc1']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Left Section Title</label>
        	<input type="text" name="about_title2" value="<?php echo $about_q['about_title2']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Left Section Sub Title</label> 
        	<input type="text" name="about_subtitle2" value="<?php echo $about_q['about_subtitle2']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Left Section Image</label>
        	<input type="file" name="about_img" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Right Section Title</label>
        	<input type="text" name="about_title3" value="<?php echo $about_q['about_title3']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Right Section Sub Title</label>
        	<input type="text" name="about_subtitle3" value="<?php echo $about_q['about_subtitle3']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Right Section Desc</label>
        	<textarea name="abour_desc3"><?php echo $about_q['abour_desc3']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<input type="hidden" name="action" value="updabout">
            <input type="hidden" name="aboutid" value="1">
    		<input type="submit" value="Update" class="frmbtn" />  
        </div>
    </form>
</div>		

<div class="expsec allsect" id="">
<h1>Experience Section</h1>
<h3>CREATIVE WORK EXPERIENCE</h3>
    <form id="expfrm1" class="stylefrm" action="" method="post">
    	<div class="fieldsec">
    		<label>Select CREATIVE For Editing</label>
        	<select id="expost_ids" onChange="return funexpone();" >
            <option>...Select CREATIVE...</option>
            <?php
            $expone_nq = mysql_query("Select * from cc_expost where ex_sec_id=1");
			while($exponeres = mysql_fetch_array($expone_nq) ){
			?>
            
            	<option <?php if($_GET['expost_id']==$exponeres['expost_id']){ ?> selected <?php } ?>  value="<?php echo $exponeres['expost_id']; ?>"><?php echo substr($exponeres['expost_title'],0,25).'...'; ?></option>
            <?php } ?>
            </select>
        </div>
        <?php
    if($_GET['action']=='editexpone'){
	$getexpost_id = $_GET['expost_id'];
    $expone_q = mysql_fetch_array(mysql_query("Select * from cc_expost where expost_id='".$getexpost_id."' and ex_sec_id=1"));
	}
		?>
    	<div class="fieldsec">
    		<label>Post Title</label>
        	<input type="text" name="expost_title" value="<?php echo $expone_q['expost_title']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Post Desc</label>
        	<textarea name="expost_desc"><?php echo $expone_q['expost_desc']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Post Company</label>
        	<textarea name="expost_bus"><?php echo $expone_q['expost_bus']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Post Date</label>
        	<textarea name="expost_date"><?php echo $expone_q['expost_date']; ?></textarea>
        </div>
		<div class="fieldsec">
    		<label>Publish Date</label>
        	<input type="text" name="post_date" value="<?php echo $expone_q['post_date']; ?>" placeholder="<?php echo date('d-m-Y'); ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		 <?php if($_GET['action']=='editexpone'){ ?>
            <input type="hidden" name="action" value="updexpone">
            <input type="hidden" name="ex_sec_id" value="2">
            <input type="hidden" name="expost_id" value="<?php echo $_GET['expost_id']?>">
    		<input type="submit" value="Update" class="frmbtn" />
            <a href="http://lalanii.com/admin.php?portalValue=hireme#testimonial_sec">Clear Form</a>
			<input type="button" value="Delete This Post" onclick="return delcreative('<?php echo $getexpost_id; ?>');">
            <?php }else { ?>
            <input type="hidden" name="action" value="addexpone">
    		<input type="submit" class="frmbtn" />
            <?php } ?>
        </div>
    </form>
<h3>PRODUCTION WORK EXPERIENCE</h3>   

    <form id="expfrm2" class="stylefrm" action="" method="post">
    	<div class="fieldsec">
    		<label>Select PRODUCTION For Editing</label>
        	<select id="expost_idss" onChange="return funexptwo();" >
            <option>...Select PRODUCTION...</option>
            <?php
            $exptwo_nq = mysql_query("Select * from cc_expost where ex_sec_id=2");
			while($exptwores = mysql_fetch_array($exptwo_nq) ){
			?>
            
            	<option <?php if($_GET['expost_id']==$exptwores['expost_id']){ ?> selected <?php } ?>  value="<?php echo $exptwores['expost_id']; ?>"><?php echo substr($exptwores['expost_title'],0,25).'...'; ?></option>
            <?php } ?>
            </select>
        </div>
        <?php
    if($_GET['action']=='editexptwo'){
	$getexpost_id = $_GET['expost_id'];
    $exptwo_q = mysql_fetch_array(mysql_query("Select * from cc_expost where expost_id='".$getexpost_id."' and ex_sec_id=2"));
	}
		?>
    	<div class="fieldsec">
    		<label>Post Title</label>
        	<input type="text" name="expost_title" value="<?php echo $exptwo_q['expost_title']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Post Desc</label>
        	<textarea name="expost_desc"><?php echo $exptwo_q['expost_desc']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Post Company</label>
        	<textarea name="expost_bus"><?php echo $exptwo_q['expost_bus']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Post Date</label>
        	<textarea name="expost_date"><?php echo $exptwo_q['expost_date']; ?></textarea>
        </div>
		<div class="fieldsec">
    		<label>Publish Date</label>
        	<input type="text" name="post_date" value="<?php echo $exptwo_q['post_date']; ?>" placeholder="<?php echo date('d-m-Y'); ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		 <?php if($_GET['action']=='editexptwo'){ ?>
            <input type="hidden" name="action" value="updexptwo">
            <input type="hidden" name="ex_sec_id" value="2">
            <input type="hidden" name="expost_id" value="<?php echo $_GET['expost_id']?>">
    		<input type="submit" value="Update" class="frmbtn" />
            <a href="http://lalanii.com/admin.php?portalValue=hireme#testimonial_sec">Clear Form</a>
			<input type="button" value="Delete This Post" onclick="return delproducttion('<?php echo $getexpost_id; ?>');">
            <?php }else { ?>
            <input type="hidden" name="action" value="addexptwo">
    		<input type="submit" class="frmbtn" />
            <?php } ?>
        </div>
    </form>
    
<h3>TECHNOLOGIES</h3>    
    <form id="techfrm" class="stylefrm" action="" method="post">
    	<?php
    $tech_q = mysql_fetch_array(mysql_query("Select * from ccexp where exp_id='1'"));
		?>
    	<div class="fieldsec">
    		<label>Super Title</label>
        	<input type="text" name="tec_header" value="<?php echo $tech_q['tec_header']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Main Title</label>
        	<input type="text" name="tec_title" value="<?php echo $tech_q['tec_title']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Post Desc</label>
        	<textarea name="tec_desc"><?php echo $tech_q['tec_desc']; ?></textarea>
        </div>
        
        <div class="fieldsec">
    		
            <input type="hidden" name="action" value="updtechnology">
            <input type="hidden" name="exp_id" value="1">
    		<input type="submit" value="Update" class="frmbtn" />          
           
        </div>
    </form>
        
</div>	

<div class="expsec allsect" id="">
<h1>Services Section</h1>
<h3>TESTIMONIALS</h3>
    <form id="testfrm" class="stylefrm" action="" method="post" enctype="multipart/form-data">
    	<div class="fieldsec">
    		<label>Select Testimonial For Editing</label>
        	<select id="test_ids" onChange="return funtestimonial();" >
             <option>...Select Testimonial...</option>
            <?php
            $testimonial_nq = mysql_query("Select * from cc_testomonials");
			while($testres = mysql_fetch_array($testimonial_nq) ){
			?>
           
            	<option <?php if($_GET['testimonial_id']==$testres['test_id']){ ?> selected <?php } ?>  value="<?php echo $testres['test_id']; ?>"><?php echo substr($testres['test_desc'],0,25).'...'; ?></option>
            <?php } ?>
            </select>
        </div>
        <?php
if($_GET['action']=='edittestimonial'){
	$gettestid = $_GET['testimonial_id'];
    $testimonial_q = mysql_fetch_array(mysql_query("Select * from cc_testomonials where test_id='".$gettestid."'"));
	}
		?>
    	<div class="fieldsec">
    		<label>Testimonial Image</label>
        	<input type="file" name="test_title" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Testimonial Desc</label>
        	<textarea name="test_desc"><?php echo $testimonial_q['test_desc']; ?></textarea>
        </div>
        <div class="fieldsec">
    		<label>Testimonial Author</label>
        	<input type="text" name="test_author" class="" id="" value="<?php echo $testimonial_q['test_author']; ?>" />
        </div>
        <div class="fieldsec">
    		<label>Testimonial Location</label>
        	<input type="text" name="test_location" class="" id="" value="<?php echo $testimonial_q['test_location']; ?>" />
        </div>
        <div class="fieldsec">        	
            <?php if($_GET['action']=='edittestimonial'){ ?>
            <input type="hidden" name="action" value="updtestimonial">
            <input type="hidden" name="testimonial_id" value="<?php echo $_GET['testimonial_id']?>">
    		<input type="submit" value="Update" class="frmbtn" />
            <a href="http://lalanii.com/admin.php?portalValue=hireme#testimonial_sec">Clear Form</a>
            <?php }else { ?>
            <input type="hidden" name="action" value="addtestimonial">
    		<input type="submit" class="frmbtn" />
            <?php } ?>
        </div>
    </form>
<h3>MY PORTFOLIO</h3>
    <form id="portfoliofrm" class="stylefrm" action="" method="post" enctype="multipart/form-data">
    	<div class="fieldsec">
    		<label>Select Portfolio For Editing</label>
        	<select id="port_ids" onChange="return funport();" >
            <option>...Select Portfolio...</option>
            <?php
            $port_nq = mysql_query("Select * from cc_portfolio");
			while($portres = mysql_fetch_array($port_nq) ){
			?>
            
            	<option <?php if($_GET['port_id']==$portres['port_id']){ ?> selected <?php } ?>  value="<?php echo $portres['port_id']; ?>"><?php echo substr($portres['port_title'],0,25).'...'; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="fieldsec">
    		<label>Select Category</label>
        	<select name="port_cat">
             <?php
            $portcat_nq = mysql_query("Select * from cc_portfoliocat");
			while($portcatres = mysql_fetch_array($portcat_nq) ){
			?>
            	<option value="<?php echo $portcatres['portfcat_id']; ?>"><?php echo $portcatres['portfcat_title']; ?></option>
                <?php } ?>
            </select>
        </div>
                <?php
if($_GET['action']=='editport'){
	$getportid = $_GET['port_id'];
    $port_q = mysql_fetch_array(mysql_query("Select * from cc_portfolio where port_id='".$getportid."'"));
	}
		?>
    	<div class="fieldsec">
    		<label>Portfolio Title</label>
        	<input type="text" name="port_title" value="<?php echo $port_q['port_title']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Portfolio Sub Title</label>
        	<input type="text" name="port_stitle" value="<?php echo $port_q['port_stitle']; ?>" class="" id="" />
        </div>
        <div class="fieldsec">
    		<label>Image</label>
        	<input type="file" name="port_img" class="" id="" />
        </div>
       
        <div class="fieldsec">
    		<?php if($_GET['action']=='editport'){ ?>
            <input type="hidden" name="action" value="updport">
            <input type="hidden" name="port_id" value="<?php echo $_GET['port_id']?>">
    		<input type="submit" value="Update" class="frmbtn" />
            <a href="http://lalanii.com/admin.php?portalValue=hireme#port_sec">Clear Form</a>
            <?php }else { ?>
            <input type="hidden" name="action" value="addport">
    		<input type="submit" class="frmbtn" />
            <?php } ?>
        </div>
    </form>
        
</div>	

		
</div>