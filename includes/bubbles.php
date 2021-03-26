<?php
$bubble_query = mysql_query("Select * from llsettings");
$bubble_res = mysql_fetch_array($bubble_query);
?>
<ul id="options">
	<li id="lisubscribe" class="libubbles" style="background-image:url(http://lalanii.com/images/adds/<?php echo $bubble_res[first_circle_img]; ?>);">
		<div class="opaqueBubbles"></div>
		<?php if ($secrets=="accessible"){?>
		<a class="bubbles" href="<?php echo $bubble_res[first_circle_url]; ?>" id="bubblesubscribe"><span><?php echo $bubble_res[first_circle_text]; ?></span></a>
		<?php }else{ ?>
		<a class="bubbles" href="<?php echo $bubble_res[first_circle_url]; ?>" id="bubblesubscribe"><span><?php echo $bubble_res[first_circle_text]; ?></span></a>
		<?php } ?>
	</li>
	<li id="lifeatured" class="libubbles" style="background-image:url(http://lalanii.com/images/adds/<?php echo $bubble_res[second_circle_img]; ?>);">
		<div class="opaqueBubbles"></div>
		<a class="bubbles" href="<?php echo $bubble_res[second_circle_url]; ?>" id="bubblefeatured"><span><?php echo $bubble_res[second_circle_text]; ?></span></a>
	</li>
	<li id="lischedule" class="libubbles" style="background-image:url(http://lalanii.com/images/adds/<?php echo $bubble_res[third_circle_img]; ?>);">
		<div class="opaqueBubbles"></div>
		<a class="bubbles" href="<?php echo $bubble_res[third_circle_url]; ?>" id="bubbleschedule"><span><?php echo $bubble_res[third_circle_text]; ?></span></a>
	</li>
</ul>
