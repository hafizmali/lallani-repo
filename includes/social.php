 <?php
  	$social_query = mysql_query("Select * from llsettings ");
	$social_res = mysql_fetch_array($social_query);
  ?>
  

<ul id="social">
	<?php if($social_res['social_yep'] == 1){ ?><li><a href="http://www.yelp.com/user_details?userid=3RUJ2GJCz2v9gfkehyXFaQ" target="_blank" id="yelp">yelp</a></li><?php } ?>
	<?php if($social_res['social_whi'] == 1){ ?><li><a href="http://weheartit.com/LalaniiRochelle" target="_blank" id="weheartit">we heart it</a></li><?php } ?>
	<?php if($social_res['social_tw'] == 1){ ?><li><a href="https://twitter.com/lalanii" target="_blank" id="twitter">twitter</a></li><?php } ?>
	<?php if($social_res['social_insta'] == 1){ ?><li><a href="http://instagram.com/lalanii" target="_blank" id="instagram">instagram</a></li><?php } ?>
	<?php if($social_res['social_pin'] == 1){ ?><li><a href="https://www.pinterest.com/lalanii/" target="_blank" id="pinterest">pinterest</a></li><?php } ?>
	<?php if($social_res['social_fb'] == 1){ ?><li><a href="https://www.facebook.com/pages/Author-Lalanii-R-Grant/106764956090989?ref=hl" target="_blank" id="facebook">facebook</a></li><?php } ?>
	<?php if($social_res['social_good'] == 1){ ?><li><a href="https://www.goodreads.com/user/show/3577224-lalanii" target="_blank" id="goodreads">goodreads</a></li><?php } ?>
	<?php if($social_res['social_tum'] == 1){ ?><li><a href="http://fashionpoetrylalanii.com" target="_blank" id="tumblr">tumblr</a></li><?php } ?>
	<?php if($social_res['social_g'] == 1){ ?><li><a href="https://plus.google.com/u/1/b/101293006253647208992/101293006253647208992/about" target="_blank" id="google">google+</a></li><?php } ?>
	<?php if($social_res['social_link'] == 1){ ?><li><a href="https://www.linkedin.com/in/lalaniigrant" target="_blank" id="linkedin">linkedin</a></li><?php } ?>
    <?php if($social_res['social_you'] == 1){ ?><li><a href="https://www.youtube.com/channel/UCHo6v7CIXvXVaKBvJ9FaFCA" target="_blank" id="youtube">youtube</a></li><?php } ?>
</ul>