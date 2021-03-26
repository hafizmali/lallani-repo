<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Admin</title>
<meta name="title" content="Lalanii Rochelle | Creatives" />
<meta name="description" content="<!--PAGE_DESCRIPTION-->" />
<?php include 'includes/tags.php';?>

</head>
<body onload="portalShow('<?php echo $_GET['portalValue']; ?>');return false;">
<div id="main">
	<?php include 'includes/includes.php';?>
		<div id="content">	
			<ul id="portalMenu">
				<li><a href="" onClick="closePortal();return false;" id="dashboard">Dashboard</a></li>
<?php if($_SESSION['userType'] != 'editor'){ ?>
				<li><a href="javascript:void(window.open('http://lalanii.com/includes/blogmanager.php','blogmanager<?php echo $blogID; ?>','width=1044,height=700,scrollbars=1,top=100,left=100'))" id="blogs" class="portalSelect">Blogs</a></li>
				<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="taglines" class="portalSelect">Taglines</a></li>
				<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="users" class="portalSelect">Users</a></li>
				<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="comments" class="portalSelect">Comments</a></li>
                <li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="hireme" class="portalSelect">Hire Me</a></li> 
<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="homepopup" class="portalSelect">Home Popup</a></li>
<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="paidpdf" class="portalSelect">Paid PDF</a></li>
<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="footeradds" class="portalSelect">Footer Adds</a></li>
<li><a href="" onClick="passPortalValue($(this).attr('id'));return false;" id="homeprod" class="portalSelect">Options</a></li>
<?php } ?>
			</ul>
			<div id="portalContent">
				<ul id="portalDashboard" class="portalitem">
					<h3>Dashboard</h3>
					<li><a href="javascript:void(window.open('http://lalanii.com/includes/blogmanager.php','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100'))"><span>Blogs</span></a></li>
					<li><a href="" onClick="passPortalValue('taglines');return false;"><span>Taglines</span></a></li>
					<li><a href="" onClick="passPortalValue('users');return false;"><span>Users</span></a></li>					
				</ul>		
				<!--div id="showblogs" class="portalitem hidden"><?php include 'includes/blogadmin.php';?></div-->
				<div id="showtaglines" class="portalitem hidden"><?php include 'includes/taglineadmin.php';?></div>
<?php if($_SESSION['userType'] != 'editor'){ ?>
				<div id="showusers" class="portalitem hidden"><?php include 'includes/useradmin.php';?></div>
				<div id="showcomments" class="portalitem hidden"><?php include 'includes/commentadmin.php';?></div>
                <div id="showhireme" class="portalitem hidden"><?php include 'includes/hiremeadmin.php';?></div>
                <div id="showhomepopup" class="portalitem hidden"><?php include 'includes/homepopupadmin.php';?></div>
				<div id="showpaidpdf" class="portalitem hidden"><?php include 'includes/paidpdfadmin.php';?></div>
				<div id="showfooteradds" class="portalitem hidden"><?php include 'includes/footeraddsadmin.php';?></div>
				<div id="showhomeprod" class="portalitem hidden"><?php include 'includes/homeprodadmin.php';?></div>
<?php } ?>
			</div>			
		</div>
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>
<?php include 'includes/scripts.php';?>
<script>
$(window).load(function() {
	portalShow('<?php echo $_GET['portalValue']; ?>');
});
</script>