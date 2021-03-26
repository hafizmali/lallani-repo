<?php
if($_POST['sidebaradds']){
	
	$home_add_one = mysql_real_escape_string($_POST['home_add_one']);
	$home_add_two = mysql_real_escape_string($_POST['home_add_two']);
	$home_add_three = mysql_real_escape_string($_POST['home_add_three']);
	
	$fashion_add_one = mysql_real_escape_string($_POST['fashion_add_one']);
	$fashion_add_two = mysql_real_escape_string($_POST['fashion_add_two']);
	$fashion_add_three = mysql_real_escape_string($_POST['fashion_add_three']);
	
	$beauty_add_one = mysql_real_escape_string($_POST['beauty_add_one']);
	$beauty_add_two = mysql_real_escape_string($_POST['beauty_add_two']);
	$beauty_add_three = mysql_real_escape_string($_POST['beauty_add_three']);
	
	$creative_add_one = mysql_real_escape_string($_POST['creative_add_one']);
	$creative_add_two = mysql_real_escape_string($_POST['creative_add_two']);
	$creative_add_three = mysql_real_escape_string($_POST['creative_add_three']);
	
	$secret_add_one = mysql_real_escape_string($_POST['secret_add_one']);
	$secret_add_two = mysql_real_escape_string($_POST['secret_add_two']);
	$secret_add_three = mysql_real_escape_string($_POST['secret_add_three']);
	
	$nquery = "
	Update footer_adds set
	home_add_one = '$home_add_one',
home_add_one_link = '".$_POST['home_add_one_link']."',

	home_add_two = '$home_add_two',
home_add_two_link = '".$_POST['home_add_two_link']."',

	home_add_three = '".$_POST['home_add_three']."',	
home_add_three_link = '".$_POST['home_add_three_link']."',

	fashion_add_one = '".$_POST['fashion_add_one']."',
fashion_add_one_link = '".$_POST['fashion_add_one_link']."',

	fashion_add_two = '".$_POST['fashion_add_two']."',
fashion_add_two_link = '".$_POST['fashion_add_two_link']."',

	fashion_add_three = '".$_POST['fashion_add_three']."',	
fashion_add_three_link = '".$_POST['fashion_add_three_link']."',	

	beauty_add_one = '".$_POST['beauty_add_one']."',
beauty_add_one_link = '".$_POST['beauty_add_one_link']."',

	beauty_add_two = '".$_POST['beauty_add_two']."',
beauty_add_two_link = '".$_POST['beauty_add_two_link']."',

	beauty_add_three = '".$_POST['beauty_add_three']."',
beauty_add_three_link = '".$_POST['beauty_add_three_link']."',
	
	creative_add_one = '".$_POST['creative_add_one']."',
creative_add_one_link = '".$_POST['creative_add_one_link']."',

	creative_add_two = '".$_POST['creative_add_two']."',
creative_add_two_link = '".$_POST['creative_add_two_link']."',

	creative_add_three = '".$_POST['creative_add_three']."',
creative_add_three_link = '".$_POST['creative_add_three_link']."',
	
	secret_add_one = '".$_POST['secret_add_one']."',
secret_add_one_link = '".$_POST['secret_add_one_link']."',

	secret_add_two = '".$_POST['secret_add_two']."',
secret_add_two_link = '".$_POST['secret_add_two_link']."',

	secret_add_three = '".$_POST['secret_add_three']."',
secret_add_three_link = '".$_POST['secret_add_three_link']."',

sidebar_add_one = '".$_POST['sidebar_add_one']."',
sidebar_add_one_link = '".$_POST['sidebar_add_one_link']."',
sidebar_add_two = '".$_POST['sidebar_add_two']."',
sidebar_add_two_link = '".$_POST['sidebar_add_two_link']."',
sidebar_add_three = '".$_POST['sidebar_add_three']."',
sidebar_add_three_link = '".$_POST['sidebar_add_three_link']."',
sidebar_add_four = '".$_POST['sidebar_add_four']."',
sidebar_add_four_link = '".$_POST['sidebar_add_four_link']."',
sidebar_add_five = '".$_POST['sidebar_add_five']."',
sidebar_add_five_link = '".$_POST['sidebar_add_five_link']."'



";

if($_FILES['home_add_one_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["home_add_one_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["home_add_one_img"]["name"]);	
	move_uploaded_file($_FILES["home_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", home_add_one_img = '".$_FILES["home_add_one_img"]["name"]."'";
}
if($_FILES['home_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["home_add_two_img"]["name"]);
	move_uploaded_file($_FILES["home_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", home_add_two_img = '".$_FILES["home_add_two_img"]["name"]."'";
}
if($_FILES['home_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["home_add_three_img"]["name"]);
	move_uploaded_file($_FILES["home_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", home_add_three_img = '".$_FILES["home_add_three_img"]["name"]."'";
}
if($_FILES['fashion_add_one_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["fashion_add_one_img"]["name"]);
	move_uploaded_file($_FILES["fashion_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", fashion_add_one_img = '".$_FILES["fashion_add_one_img"]["name"]."'";
}
if($_FILES['fashion_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["fashion_add_two_img"]["name"]);
	move_uploaded_file($_FILES["fashion_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", fashion_add_two_img = '".$_FILES["fashion_add_two_img"]["name"]."'";
}
if($_FILES['fashion_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["fashion_add_three_img"]["name"]);
	move_uploaded_file($_FILES["fashion_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", fashion_add_three_img = '".$_FILES["fashion_add_three_img"]["name"]."'";
}
if($_FILES['beauty_add_one_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["beauty_add_one_img"]["name"]);
	move_uploaded_file($_FILES["beauty_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", beauty_add_one_img = '".$_FILES["beauty_add_one_img"]["name"]."'";
}

if($_FILES['beauty_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["beauty_add_two_img"]["name"]);
	move_uploaded_file($_FILES["beauty_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", beauty_add_two_img = '".$_FILES["beauty_add_two_img"]["name"]."'";
}
if($_FILES['beauty_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["beauty_add_three_img"]["name"]);
	move_uploaded_file($_FILES["beauty_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", beauty_add_three_img = '".$_FILES["beauty_add_three_img"]["name"]."'";
}
if($_FILES['creative_add_one_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["creative_add_one_img"]["name"]);
	move_uploaded_file($_FILES["creative_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", creative_add_one_img = '".$_FILES["creative_add_one_img"]["name"]."'";
}
if($_FILES['creative_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["creative_add_two_img"]["name"]);
	move_uploaded_file($_FILES["creative_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", creative_add_two_img = '".$_FILES["creative_add_two_img"]["name"]."'";
}
if($_FILES['creative_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["creative_add_three_img"]["name"]);
	move_uploaded_file($_FILES["creative_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", creative_add_three_img = '".$_FILES["creative_add_three_img"]["name"]."'";
}
if($_FILES['secret_add_one_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["secret_add_one_img"]["name"]);
	move_uploaded_file($_FILES["secret_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", secret_add_one_img = '".$_FILES["secret_add_one_img"]["name"]."'";
}
if($_FILES['secret_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["secret_add_two_img"]["name"]);
	move_uploaded_file($_FILES["secret_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", secret_add_two_img = '".$_FILES["secret_add_two_img"]["name"]."'";
}
if($_FILES['secret_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["secret_add_three_img"]["name"]);
	move_uploaded_file($_FILES["secret_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", secret_add_three_img = '".$_FILES["secret_add_three_img"]["name"]."'";
}



if($_FILES['sidebar_add_one_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["sidebar_add_one_img"]["name"]);
	move_uploaded_file($_FILES["sidebar_add_one_img"]["tmp_name"], $target_file);
	$nquery .= ", sidebar_add_one_img = '".$_FILES["sidebar_add_one_img"]["name"]."'";
}
if($_FILES['sidebar_add_two_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["sidebar_add_two_img"]["name"]);
	move_uploaded_file($_FILES["sidebar_add_two_img"]["tmp_name"], $target_file);
	$nquery .= ", 	sidebar_add_two_img = '".$_FILES["sidebar_add_two_img"]["name"]."'";
}
if($_FILES['sidebar_add_three_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["sidebar_add_three_img"]["name"]);
	move_uploaded_file($_FILES["sidebar_add_three_img"]["tmp_name"], $target_file);
	$nquery .= ", sidebar_add_three_img = '".$_FILES["sidebar_add_three_img"]["name"]."'";
}
if($_FILES['sidebar_add_four_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["sidebar_add_four_img"]["name"]);
	move_uploaded_file($_FILES["sidebar_add_four_img"]["tmp_name"], $target_file);
	$nquery .= ", sidebar_add_four_img = '".$_FILES["sidebar_add_four_img"]["name"]."'";
}
if($_FILES['sidebar_add_five_img']['name'] != '')
{
	$target_dir = "../lalanii/images/adds/";
	$target_file = $target_dir . basename($_FILES["sidebar_add_five_img"]["name"]);
	move_uploaded_file($_FILES["sidebar_add_five_img"]["tmp_name"], $target_file);
	$nquery .= ", sidebar_add_five_img = '".$_FILES["sidebar_add_five_img"]["name"]."'";
}

$nquery .=	" where adds_id = '1' ";
	
	mysql_query($nquery);
	
}
?>

<style>
textarea.textareaadds {
	float: left;
	width: 80%;
	margin: 10px 10px;
}
label.lbladds {
	width: 100%;
	clear: both;
	float: left;
	text-align: left;
	font-size: 14px;
	font-weight: bold;
}
h2 {
	text-align: left;
	float: left;
	width: 100%;
	margin: 20px 0px;
	border-bottom: 1px solid #ccc;
}

#updbtn_add {
    float: left;
    clear: both;
    text-align: center;
    margin: 0 auto;
    font-size: 16px;
    padding: 4px 14px;
    font-weight: bold;
}

.second_option {
    float: left;
    width: 100%;
    margin: 0px 0px 20px 0px;
}
.second_option span {
    width: 80%;
    float: left;
    text-align: center;
    font-weight: bold;
    margin-bottom: 10px;
}
</style>
<div id="taglineadmin">
  <h1>Footer Adds</h1>
  
  <?php
  	$adds_query = mysql_query("Select * from footer_adds");
	$adds_res = mysql_fetch_array($adds_query);
  ?>
  
  <form name="formADDser" method="post" action="" enctype="multipart/form-data">
    <h2>Home Page</h2>
	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='home_footer_left' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 1 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="home_add_one" class="textareaadds"><?php echo $adds_res['home_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="home_add_one_link" value="<?php echo trim($adds_res['home_add_one_link']); ?>">
		<input type="file" name="home_add_one_img">
	</div>
	
	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='home_footer_center' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 2 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="home_add_two" class="textareaadds"><?php echo $adds_res['home_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="home_add_two_link" value="<?php echo trim($adds_res['home_add_two_link']); ?>">
		<input type="file" name="home_add_two_img">
	</div>
	
	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='home_footer_right' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 3 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="home_add_three" class="textareaadds"><?php echo $adds_res['home_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="home_add_three_link" value="<?php echo trim($adds_res['home_add_three_link']); ?>">
		<input type="file" name="home_add_three_img">
	</div>


	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='fashion_footer_left' and adds_type='custom_add' ")); ?>
    <h2>FASHION</h2>
    <label class="lbladds">Add 1 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="fashion_add_one" class="textareaadds"><?php echo $adds_res['fashion_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="fashion_add_one_link" value="<?php echo trim($adds_res['fashion_add_one_link']); ?>">
		<input type="file" name="fashion_add_one_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='fashion_footer_center' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 2 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="fashion_add_two" class="textareaadds"><?php echo $adds_res['fashion_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="fashion_add_two_link" value="<?php echo trim($adds_res['fashion_add_two_link']); ?>">
		<input type="file" name="fashion_add_two_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='fashion_footer_right' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 3 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="fashion_add_three" class="textareaadds"><?php echo $adds_res['fashion_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="fashion_add_three_link" value="<?php echo trim($adds_res['fashion_add_three_link']); ?>">
		<input type="file" name="fashion_add_three_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='beauty_footer_left' and adds_type='custom_add' ")); ?>
    <h2>BEAUTY</h2>
    <label class="lbladds">Add 1 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="beauty_add_one" class="textareaadds"><?php echo $adds_res['beauty_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="beauty_add_one_link" value="<?php echo trim($adds_res['beauty_add_one_link']); ?>">
		<input type="file" name="beauty_add_one_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='beauty_footer_center' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 2 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="beauty_add_two" class="textareaadds"><?php echo $adds_res['beauty_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="beauty_add_two_link" value="<?php echo trim($adds_res['beauty_add_two_link']); ?>">
		<input type="file" name="beauty_add_two_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='beauty_footer_right' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 3 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="beauty_add_three" class="textareaadds"><?php echo $adds_res['beauty_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="beauty_add_three_link" value="<?php echo trim($adds_res['beauty_add_three_link']); ?>">
		<input type="file" name="beauty_add_three_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='creatives_footer_left' and adds_type='custom_add' ")); ?>
    <h2>CREATIVES</h2>
    <label class="lbladds">Add 1 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="creative_add_one" class="textareaadds"><?php echo $adds_res['creative_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="creative_add_one_link" value="<?php echo trim($adds_res['creative_add_one_link']); ?>">
		<input type="file" name="creative_add_one_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='creatives_footer_center' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 2 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="creative_add_two" class="textareaadds"><?php echo $adds_res['creative_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="creative_add_two_link" value="<?php echo trim($adds_res['creative_add_two_link']); ?>">
		<input type="file" name="creative_add_two_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='creatives_footer_right' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 3 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="creative_add_three" class="textareaadds"><?php echo $adds_res['creative_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="creative_add_three_link" value="<?php echo trim($adds_res['creative_add_three_link']); ?>">
		<input type="file" name="creative_add_three_img">
	</div>


	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='secrets_footer_left' and adds_type='custom_add' ")); ?>
    <h2>SECRETS</h2>
    <label class="lbladds">Add 1 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="secret_add_one" class="textareaadds"><?php echo $adds_res['secret_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="secret_add_one_link" value="<?php echo trim($adds_res['secret_add_one_link']); ?>">
		<input type="file" name="secret_add_one_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='secrets_footer_center' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 2 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="secret_add_two" class="textareaadds"><?php echo $adds_res['secret_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="secret_add_two_link" value="<?php echo trim($adds_res['secret_add_two_link']); ?>">
		<input type="file" name="secret_add_two_img">
	</div>

	<?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='secrets_footer_right' and adds_type='custom_add' ")); ?>
    <label class="lbladds">Add 3 --- Clicks:  <?php echo $tclicks; ?></label>
    <textarea name="secret_add_three" class="textareaadds"><?php echo $adds_res['secret_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="secret_add_three_link" value="<?php echo trim($adds_res['secret_add_three_link']); ?>">
		<input type="file" name="secret_add_three_img">
	</div>
    
    
    
    
    
    
    <?php $tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='home_sidebar' and adds_type='google_add' ")); ?>
    <h2>SIDEBAR --- Clicks:  <?php echo $tclicks; ?></h2>
	
    <label class="lbladds">Add 1</label>
    <textarea name="sidebar_add_one" class="textareaadds"><?php echo $adds_res['sidebar_add_one']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="sidebar_add_one_link" value="<?php echo trim($adds_res['sidebar_add_one_link']); ?>">
		<input type="file" name="sidebar_add_one_img">
	</div>

    <label class="lbladds">Add 2</label>
    <textarea name="sidebar_add_two" class="textareaadds"><?php echo $adds_res['sidebar_add_two']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="sidebar_add_two_link" value="<?php echo trim($adds_res['sidebar_add_two_link']); ?>">
		<input type="file" name="sidebar_add_two_img">
	</div>

    <label class="lbladds">Add 3</label>
    <textarea name="sidebar_add_three" class="textareaadds"><?php echo $adds_res['sidebar_add_three']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="sidebar_add_three_link" value="<?php echo trim($adds_res['sidebar_add_three_link']); ?>">
		<input type="file" name="sidebar_add_three_img">
	</div>
    
    <label class="lbladds">Add 4</label>
    <textarea name="sidebar_add_four" class="textareaadds"><?php echo $adds_res['sidebar_add_four']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="sidebar_add_four_link" value="<?php echo trim($adds_res['sidebar_add_four_link']); ?>">
		<input type="file" name="sidebar_add_four_img">
	</div>
    
    <label class="lbladds">Add 5</label>
    <textarea name="sidebar_add_five" class="textareaadds"><?php echo $adds_res['sidebar_add_five']; ?></textarea>
	<div class="second_option">
		<span>OR</span>
		<input type="text" placeholder="Link" name="sidebar_add_five_link" value="<?php echo trim($adds_res['sidebar_add_five_link']); ?>">
		<input type="file" name="sidebar_add_five_img">
	</div>
	<input type="hidden" name="sidebaradds" value="alladds">
    <input type="submit" value="Update" name="updbtn_add" id="updbtn_add">
  </form>


<?php
$outputssr .= "Adds ID,Adds Location/Page, Country, City, Click Date, User IP\r\n";
$prod_adsqr = mysql_query("SELECT * FROM `lladds` where adds_page != 'home_product'  order by adds_id asc");
while($pads_resr = mysql_fetch_array($prod_adsqr))
{
$outputssr .="\"$pads_resr[adds_id]\",\"$pads_resr[adds_page]\",\"$pads_resr[adds_country]\",\"$pads_resr[adds_city]\",\"$pads_resr[adds_click_date]\",\"$pads_resr[adds_ip]\"\r\n";
}
?>
<a target="_blank" style=" float: left;font-size: 16px;margin: 0px;" href="http://lalanii.com/alladds.csv">Export Adds Click Detail</a>
<?php

	
	$csv_filenamesr = "alladds.csv";
	$fpsr = fopen($csv_filenamesr,"w");

	fwrite($fpsr, $outputssr, strlen($outputssr));
	fclose($fpsr);



?>


</div>
