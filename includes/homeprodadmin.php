<?php
if($_GET['tact'] == 'del')
{
	mysql_query("Delete from llproducts where home_prod_id='".$_GET['ppid']."'");
}
if($_POST['form_type'] == 'psec'){
	
	$prod_title = mysql_real_escape_string($_POST['prod_title']);
	$prod_name = mysql_real_escape_string($_POST['prod_name']);
	$calenderd = $_POST['calenderd'];
	
	$prod_price = $_POST['prod_price'];
	$fashion_add_two = $_POST['fashion_add_two'];
	$fashion_add_three = $_POST['fashion_add_three'];
	
if($_POST['action_type'] == 'edit'){	
	$nquery = "
	Update llproducts set

	prod_title = '".$_POST['prod_title']."',
	prod_name = '".$_POST['prod_name']."',
	prod_price = '".$_POST['prod_price']."',	
	subscribe_title = '".$_POST['subscribe_title']."',
	subscribe_txt = '".$_POST['subscribe_txt']."',
	prod_click = '".$_POST['prod_click']."',
prod_click_url = '".$_POST['prod_click_url']."',
	prod_color = '".$_POST['prod_color']."',
	calenderd = '".$_POST['calenderd']."'

";

if($_FILES['prod_img']['name'] != '')
{	
	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["prod_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["prod_img"]["name"]);	
	move_uploaded_file($_FILES["prod_img"]["tmp_name"], $target_file);
	$nquery .= ", prod_img = '".$_FILES["prod_img"]["name"]."'";



}


$nquery .=	" where home_prod_id = '".$_POST['home_prod_id']."' ";
	
	mysql_query($nquery);
}




if($_POST['action_type'] == 'insert')	{
	$nquery = "
	Insert into llproducts set

	prod_title = '".$_POST['prod_title']."',
	prod_name = '".$_POST['prod_name']."',
	prod_price = '".$_POST['prod_price']."',	
	subscribe_title = '".$_POST['subscribe_title']."',
	subscribe_txt = '".$_POST['subscribe_txt']."',
	prod_click = '".$_POST['prod_click']."',
	prod_click_url = '".$_POST['prod_click_url']."',
	prod_color = '".$_POST['prod_color']."',
	calenderd = '".$_POST['calenderd']."'

";

	if($_FILES['prod_img']['name'] != '')
	{	
		
		$target_dir = "../lalanii/images/adds/";
		$file_name = basename($_FILES["prod_img"]["name"]);
		$target_file = $target_dir . $file_name;
		
		//$target_file = $target_dir . basename($_FILES["prod_img"]["name"]);	
		move_uploaded_file($_FILES["prod_img"]["tmp_name"], $target_file);
		$nquery .= ", prod_img = '".$_FILES["prod_img"]["name"]."'";
	
	
	
	}



	
	mysql_query($nquery);
}

	
}


if($_POST['form_type'] == 'ssec'){


	
	$nquery = "
	Update llsettings set
 
	creative_bg_color = '".$_POST['creative_bg_color']."',
	fashion_bg_color = '".$_POST['fashion_bg_color']."',
	secret_bg_color = '".$_POST['secret_bg_color']."',
	beauty_bg_color = '".$_POST['beauty_bg_color']."',
	home_bg_color = '".$_POST['home_bg_color']."',

	creative_bg_enable = '".$_POST['creative_bg_enable']."',
	fashion_bg_enable = '".$_POST['fashion_bg_enable']."',
	secret_bg_enable = '".$_POST['secret_bg_enable']."',
	beauty_bg_enable = '".$_POST['beauty_bg_enable']."',
	home_bg_enable = '".$_POST['home_bg_enable']."',

temp_unlock = '".$_POST['temp_unlock']."',





hiremep1 = '".$_POST['hiremep1']."',
hiremep2 = '".$_POST['hiremep2']."',
hiremep3 = '".$_POST['hiremep3']."',
hiremep4 = '".$_POST['hiremep4']."',
hiremep5 = '".$_POST['hiremep5']."',
hiremep6 = '".$_POST['hiremep6']."',
hiremep7 = '".$_POST['hiremep7']."',
hiremep8 = '".$_POST['hiremep8']."',

home_popup = '".$_POST['home_popup']."',
email_posts = '".$_POST['email_posts1'].','.$_POST['email_posts2'].','.$_POST['email_posts3'].','.$_POST['email_posts4']."',
insta_sec = '".$_POST['insta_sec']."',

first_circle_url = '".$_POST['first_circle_url']."',
first_circle_text = '".$_POST['first_circle_text']."',

second_circle_url = '".$_POST['second_circle_url']."',
second_circle_text = '".$_POST['second_circle_text']."',

third_circle_url = '".$_POST['third_circle_url']."',
third_circle_text = '".$_POST['third_circle_text']."',

social_yep = '".$_POST['social_yep']."',
social_whi = '".$_POST['social_whi']."',
social_tw = '".$_POST['social_tw']."',
social_insta = '".$_POST['social_insta']."',
social_pin = '".$_POST['social_pin']."',
social_fb = '".$_POST['social_fb']."',
social_good = '".$_POST['social_good']."',
social_tum = '".$_POST['social_tum']."',
social_g = '".$_POST['social_g']."',
social_link = '".$_POST['social_link']."',
social_you = '".$_POST['social_you']."'

";

if($_FILES['first_circle_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["first_circle_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["first_circle_img"]["name"]);	
	move_uploaded_file($_FILES["first_circle_img"]["tmp_name"], $target_file);
	$nquery .= " , first_circle_img = '".$_FILES["first_circle_img"]["name"]."'";
}
if($_FILES['second_circle_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["second_circle_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["second_circle_img"]["name"]);	
	move_uploaded_file($_FILES["second_circle_img"]["tmp_name"], $target_file);
	$nquery .= " , second_circle_img = '".$_FILES["second_circle_img"]["name"]."'";
}
if($_FILES['third_circle_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["third_circle_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["third_circle_img"]["name"]);	
	move_uploaded_file($_FILES["third_circle_img"]["tmp_name"], $target_file);
	$nquery .= " , third_circle_img = '".$_FILES["third_circle_img"]["name"]."'";
}

if($_FILES['left_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["left_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["left_img"]["name"]);	
	move_uploaded_file($_FILES["left_img"]["tmp_name"], $target_file);
	$nquery .= " , left_img = '".$_FILES["left_img"]["name"]."'";
}

if($_FILES['right_img']['name'] != '')
{	
	$target_dir = "../lalanii/images/adds/";
	$file_name = basename($_FILES["right_img"]["name"]);
	$target_file = $target_dir . $file_name;
	
	//$target_file = $target_dir . basename($_FILES["right_img"]["name"]);	
	move_uploaded_file($_FILES["right_img"]["tmp_name"], $target_file);
	$nquery .= ", right_img = '".$_FILES["right_img"]["name"]."'";
}


 $nquery .=	" where settings_id = '1' ";
	
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

input.nin {
    width: 50%;
    float:left;clear:both;
    margin: 10px;
}

#list_productss{
    float: left;
  
    border: 1px solid gray;
    padding: 4px;
}
#list_productss td {
    border: 1px solid gray;
    padding: 5px;
}
</style>
<div id="taglineadmin">
  <h1>Home Page & Subscribe Page</h1>
  
  <?php
if($_GET['tact'] == 'edit')
{
  	$adds_query = mysql_query("Select * from llproducts where home_prod_id = ".$_GET['ppid']."");
	$adds_res = mysql_fetch_array($adds_query);
}

  ?>
  
  <form name="formADDsde" method="post" action="" enctype="multipart/form-data">
    <h2>Products Section <a style="color:red;font-size:14px;" href="http://lalanii.com/admin.php?portalValue=homeprod">Add New Product</a></h2>
	<label class="lbladds">Calender Display</label>
    <input class="nred" name="calenderd" type="radio" <?php if($adds_res['calenderd'] == '1'){ ?> checked <?php } ?> value="1">Yes <input class="nred"  name="calenderd" type="radio" <?php if($adds_res['calenderd'] == '0'){ ?> checked <?php } ?> value="0">No 

    <label class="lbladds">Product Main Title</label>
    <input class="nin" type="text" placeholder="Title" name="prod_title" value="<?php echo trim($adds_res['prod_title']); ?>">

	<label class="lbladds">Product Name</label>
	<input class="nin" type="text" placeholder="Name" name="prod_name" value="<?php echo trim($adds_res['prod_name']); ?>">

	<label class="lbladds">Product Price</label>
	<input class="nin" type="text" placeholder="Price" name="prod_price" value="<?php echo trim($adds_res['prod_price']); ?>">

<div style="float:left;    width: 100%;">
<label class="lbladds">Product Clickable</label>
	<input class="nred" name="prod_click" type="radio" <?php if($adds_res['prod_click'] == '1'){ ?> checked <?php } ?> value="1">Yes <input class="nred"  name="prod_click" type="radio" <?php if($adds_res['prod_click'] == '0'){ ?> checked <?php } ?> value="0">No 
</div>

<label class="lbladds">Image Click URL</label>
	<input class="nin" type="text" placeholder="URL" name="prod_click_url" value="<?php echo trim($adds_res['prod_click_url']); ?>">

<label class="lbladds">Border Color</label>
	<input class="nin" type="color" placeholder="Color" name="prod_color" value="<?php echo trim($adds_res['prod_color']); ?>">




	<label class="lbladds">Product Image</label>
	<input class="nin" type="file" name="prod_img">  


<div id="list_productss">
<table>
	<tr><td width="10%">ID</td><td width="20%">Product Img</td><td width="30%"><b>Product Name</b></td><td width="10%"><b>Price</b></td><td width="10%"><b>Clicks</b></td><td width="20%"><b>Action</b></td></tr>
	<?php
  	$products_query = mysql_query("Select * from llproducts ");
	while($products_res = mysql_fetch_array($products_query)){

	$tclicks = @mysql_num_rows(mysql_query("Select * from lladds where adds_page='home_product' and adds_type='".$products_res['home_prod_id']."' "));
  	?>
	<tr><td><?php echo $products_res['home_prod_id']; ?></td><td ><img width="50" src="http://lalanii.com/images/adds/<?php echo $products_res['prod_img']; ?>"/></td><td><?php echo $products_res['prod_name']; ?></td><td><?php echo  $products_res['prod_price']; ?></td><td><?php echo $tclicks; ?></td><td><a href="http://lalanii.com/admin.php?portalValue=homeprod&ppid=<?php echo $products_res['home_prod_id']; ?>&tact=edit">Edit</a> | <a href="http://lalanii.com/admin.php?portalValue=homeprod&ppid=<?php echo $products_res['home_prod_id']; ?>&tact=del">Delete</a></td></tr>
	<?php } ?>
</table>
<br />
<?php
$outputss .= "Product ID,Product Name, Country, City, Click Date, User IP\r\n";
$prod_adsq = mysql_query("SELECT llproducts.home_prod_id,llproducts.prod_name,lladds.adds_country,lladds.adds_city,lladds.adds_click_date,lladds.adds_ip FROM `lladds` INNER JOIN llproducts ON llproducts.home_prod_id=lladds.adds_type order by lladds.adds_id asc");
while($pads_res = mysql_fetch_array($prod_adsq))
{
$outputss .="\"$pads_res[home_prod_id]\",\"$pads_res[prod_name]\",\"$pads_res[adds_country]\",\"$pads_res[adds_city]\",\"$pads_res[adds_click_date]\",\"$pads_res[adds_ip]\"\r\n";
}
?>
<a target="_blank" style=" float: left;font-size: 16px;margin: 0px;" href="http://lalanii.com/allproducts.csv">Export Products Detail</a>
<?php

	
	$csv_filenames = "allproducts.csv";
	$fps = fopen($csv_filenames,"w");

	fwrite($fps, $outputss, strlen($outputss));
	fclose($fps);



?>
</div>


	 <h2>Subscribe Section</h2>	

    <label class="lbladds">Subscribe Main Title</label>
    <input class="nin" type="text" placeholder="Title" name="subscribe_title" value="<?php echo trim($adds_res['subscribe_title']); ?>">

	<label class="lbladds">Subscribe Text</label>
	<input class="nin" type="text" placeholder="Name" name="subscribe_txt" value="<?php echo trim($adds_res['subscribe_txt']); ?>">

	
<br /><br /><br />
	<input type="hidden" value="psec" name="form_type"> 
  <?php
if($_GET['tact'] == 'edit')
{
?>
	<input type="hidden" value="edit" name="action_type">
<input type="hidden" value="<?php echo $adds_res['home_prod_id']; ?>" name="home_prod_id">
<input type="submit" value="Update" name="updbtn_add" id="updbtn_add">
<?php }else { ?>
    	<input type="hidden" value="insert" name="action_type">
<input type="submit" value="Add" name="updbtn_add" id="updbtn_add">
<?php } ?>
  </form>
<hr style="float: left; clear: both; width: 100%;" />



<h1 style="float: left; clear: both; width: 100%;">SignUp Page & Others Page</h1>
  
  <?php
  	$adds_query = mysql_query("Select * from llsettings ");
	$adds_res = mysql_fetch_array($adds_query);
  ?>
  
  <form name="formADDsee" method="post" action="" enctype="multipart/form-data">
   	
	<label class="lbladds">Signup Page Left Image</label>
	<input class="nin" type="file" name="left_img">  
<br />
	<label class="lbladds">Signup Page Right Image</label>
	<input class="nin" type="file" name="right_img">  
<br />
	<label class="lbladds">Temporarily Unlock (PAID Subscription)</label>
	<input value="1" style="float: left;width:20px;" class="nin" <?php if($adds_res['temp_unlock'] == 1){ ?>checked<?php } ?> type="checkbox" name="temp_unlock">  
<br />
<label class="lbladds">Home Page Background Color</label>
	<input class="nin" type="color" placeholder="Color" name="home_bg_color" value="<?php echo trim($adds_res['home_bg_color']); ?>"><span style="float:left;"><input type="checkbox" <?php if($adds_res['home_bg_enable'] == 1){ ?>checked<?php } ?> name="home_bg_enable" value="1"> Enable Color</span>

<label class="lbladds">Creative Page Background Color</label>
	<input class="nin" type="color" placeholder="Color" name="creative_bg_color" value="<?php echo trim($adds_res['creative_bg_color']); ?>"><span style="float:left;"><input type="checkbox" <?php if($adds_res['creative_bg_enable'] == 1){ ?>checked<?php } ?> name="creative_bg_enable" value="1"> Enable Color</span>

<label class="lbladds">Fashion Page Background Color</label>
	<input class="nin" type="color" placeholder="Color" name="fashion_bg_color" value="<?php echo trim($adds_res['fashion_bg_color']); ?>"><span style="float:left;"><input type="checkbox" <?php if($adds_res['fashion_bg_enable'] == 1){ ?>checked<?php } ?> name="fashion_bg_enable" value="1"> Enable Color</span>

<label class="lbladds">Secret Page Background Color</label>
	<input class="nin" type="color" placeholder="Color" name="secret_bg_color" value="<?php echo trim($adds_res['secret_bg_color']); ?>"><span style="float:left;"><input type="checkbox" <?php if($adds_res['secret_bg_enable'] == 1){ ?>checked<?php } ?> name="secret_bg_enable" value="1"> Enable Color</span>

<label class="lbladds">Beauty Page Background Color</label>
	<input class="nin" type="color" placeholder="Color" name="beauty_bg_color" value="<?php echo trim($adds_res['beauty_bg_color']); ?>"><span style="float:left;"><input type="checkbox" <?php if($adds_res['beauty_bg_enable'] == 1){ ?>checked<?php } ?> name="beauty_bg_enable" value="1"> Enable Color</span>
<br /><br />
<label class="lbladds">Hire Me Pages Control</label>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep1'] == 1){ ?>checked<?php } ?> name="hiremep1" value="1"> Call - Text - Email</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep2'] == 1){ ?>checked<?php } ?> name="hiremep2" value="1"> Schedule an Appointment</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep3'] == 1){ ?>checked<?php } ?> name="hiremep3" value="1"> Brand Ambassador</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep4'] == 1){ ?>checked<?php } ?> name="hiremep4" value="1"> Philosophy</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep5'] == 1){ ?>checked<?php } ?> name="hiremep5" value="1"> Portfolio</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep6'] == 1){ ?>checked<?php } ?> name="hiremep6" value="1"> Curriculum Vitae</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep7'] == 1){ ?>checked<?php } ?> name="hiremep7" value="1"> Work with My Agency</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['hiremep8'] == 1){ ?>checked<?php } ?> name="hiremep8" value="1"> Shop Lalanii's Boutique</span>
<br /><br />
<div style="float:left;width:100%;margin: 20px 0px;">
<label class="lbladds">Social Icons Control</label>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_yep'] == 1){ ?>checked<?php } ?> name="social_yep" value="1"> yelp</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_whi'] == 1){ ?>checked<?php } ?> name="social_whi" value="1"> we heart it</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_tw'] == 1){ ?>checked<?php } ?> name="social_tw" value="1"> twitter</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_insta'] == 1){ ?>checked<?php } ?> name="social_insta" value="1"> instagram</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_pin'] == 1){ ?>checked<?php } ?> name="social_pin" value="1"> pinterest</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_fb'] == 1){ ?>checked<?php } ?> name="social_fb" value="1"> facebook</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_good'] == 1){ ?>checked<?php } ?> name="social_good" value="1"> goodreads</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_tum'] == 1){ ?>checked<?php } ?> name="social_tum" value="1"> tumblr</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_g'] == 1){ ?>checked<?php } ?> name="social_g" value="1"> google</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_link'] == 1){ ?>checked<?php } ?> name="social_link" value="1"> linkedin</span>
<span style="float:left;width:100%;text-align: left;"><input type="checkbox" <?php if($adds_res['social_you'] == 1){ ?>checked<?php } ?> name="social_you" value="1"> youtube</span>
<br /><br />
</div>
<label class="lbladds">Home Popup  opening seconds (1000 is equal to 1 sec)</label>
	<input class="nin" type="text"  name="home_popup" value="<?php echo trim($adds_res['home_popup']); ?>"> 

<label class="lbladds">First bubble Image</label>
<img style="float:left;" src="http://lalanii.com/images/adds/<?php echo $adds_res['first_circle_img']; ?>" width="50" height="50">
	<input class="nin" type="file" name="first_circle_img">  
<br />
<label class="lbladds">First bubble URL</label>
	<input class="nin" type="text" name="first_circle_url" value="<?php echo $adds_res['first_circle_url']; ?>">  
<br />
<label class="lbladds">First bubble Text</label>
	<input class="nin" type="text" name="first_circle_text" value="<?php echo $adds_res['first_circle_text']; ?>">  
<br />


<label class="lbladds">Second bubble Image</label>
<img style="float:left;" src="http://lalanii.com/images/adds/<?php echo $adds_res['second_circle_img']; ?>" width="50" height="50">
	<input class="nin" type="file" name="second_circle_img">  
<br />
<label class="lbladds">Second bubble URL</label>
	<input class="nin" type="text" name="second_circle_url" value="<?php echo $adds_res['second_circle_url']; ?>">  
<br />
<label class="lbladds">Second bubble Text</label>
	<input class="nin" type="text" name="second_circle_text" value="<?php echo $adds_res['second_circle_text']; ?>">  
<br />

<label class="lbladds">Third bubble Image</label>
<img style="float:left;" src="http://lalanii.com/images/adds/<?php echo $adds_res['third_circle_img']; ?>" width="50" height="50">
	<input class="nin" type="file" name="third_circle_img">  
<br />
<label class="lbladds">Third bubble URL</label>
	<input class="nin" type="text" value="<?php echo $adds_res['third_circle_url']; ?>" name="third_circle_url">  
<br />
<label class="lbladds">Third bubble Text</label>
	<input class="nin" type="text" value="<?php echo $adds_res['third_circle_text']; ?>" name="third_circle_text">  
<br />


<div style="float:left;width:100%;margin:20px 0px;">
<?php 
	

?>
<label class="lbladds">Weekly Email Posts Section</label><br /><br />

<span style="float:left;line-height: 22px;"><b>Post 1:</b></span>
<select name="email_posts1" style="float: left;margin: 0px 10px;width: 230px;">
<option value="0">-- Select Post --</option>
<?php 
$email_posts = explode(',',$adds_res['email_posts']);

$cr_query = mysql_query("Select * from llBlog");
while($cr_q_res = mysql_fetch_array($cr_query))
{
?>
<option <?php if($email_posts[0] == $cr_q_res['blogID']){ ?>selected<?php } ?> value="<?php echo $cr_q_res['blogID']; ?>"><?php echo $cr_q_res['blogTitle']; ?></option>
<?php } ?>
</select>


<span style="float:left;line-height: 22px;"><b>Post 2:</b></span>
<select name="email_posts2" style="float: left;margin: 0px 10px;width: 230px;">
<option value="0">-- Select Post --</option>
<?php 
$cr_query = mysql_query("Select * from llBlog");
while($cr_q_res = mysql_fetch_array($cr_query))
{
?>
<option <?php if($email_posts[1] == $cr_q_res['blogID']){ ?>selected<?php } ?> value="<?php echo $cr_q_res['blogID']; ?>"><?php echo $cr_q_res['blogTitle']; ?></option>
<?php } ?>
</select>
<br /><br />
<span style="float:left;line-height: 22px;"><b>Post 3:</b></span>
<select name="email_posts3" style="float: left;margin: 0px 10px;width: 230px;">
<option value="0">-- Select Post --</option>
<?php 
$cr_query = mysql_query("Select * from llBlog");
while($cr_q_res = mysql_fetch_array($cr_query))
{
?>
<option <?php if($email_posts[2] == $cr_q_res['blogID']){ ?>selected<?php } ?> value="<?php echo $cr_q_res['blogID']; ?>"><?php echo $cr_q_res['blogTitle']; ?></option>
<?php } ?>
</select>

<span style="float:left;line-height: 22px;"><b>Post 4:</b></span>
<select name="email_posts4" style="float: left;margin: 0px 10px;width: 230px;">
<option value="0">-- Select Post --</option>
<?php 
$cr_query = mysql_query("Select * from llBlog");
while($cr_q_res = mysql_fetch_array($cr_query))
{
?>
<option <?php if($email_posts[3] == $cr_q_res['blogID']){ ?>selected<?php } ?> value="<?php echo $cr_q_res['blogID']; ?>"><?php echo $cr_q_res['blogTitle']; ?></option>
<?php } ?>
</select>


<label style="margin-top: 20px;" class="lbladds">Instagram & Twitter Section</label><br /><br />
<input class="nred" name="insta_sec" type="radio" <?php if($adds_res['prod_click'] == '1'){ ?> checked <?php } ?> value="1">Hide Insta/Show Twitter <input class="nred"  name="insta_sec" type="radio" <?php if($adds_res['insta_sec'] == '0'){ ?> checked <?php } ?> value="0">Show Insta/Hide Twitter 

</div>
<br /><br />


	<input type="hidden" value="ssec" name="form_type"> 
    <input type="submit" value="Update" name="updbtn_add" id="updbtn_add">
  </form>
</div>
