<div id="CMMNTlineadmin">
<h1>Comment Manager</h1>
			<ul class="commentadmin underline">
				<li class="">blogTitle</li>					
				<li class="">comment</li>
				<li class="">commentDate</li>
				<li class="">userName</li>					
				<!--li class="" style="float:right;"><a href="process/.php?CMMNTID=" class="delete">deny</a></li-->
				<li class="" style="float:right;"></li>
			</ul>
		<?php
		$sqlCMMNT="Select c.*,b.blogTitle,u.userFirstName,u.userLastName from llComment c join llBlog b on c.blogID=b.blogID join llUser u on c.userID=u.userID where c.approved=0 order by c.commentDate desc";
		$resultCMMNT=mysql_query($sqlCMMNT);
		$numCMMNT=mysql_num_rows($resultCMMNT);
		$CMMNT=0;
		while ($CMMNT < $numCMMNT) {
		$commentID=mysql_result($resultCMMNT,$CMMNT,"commentID");
		$comment=mysql_result($resultCMMNT,$CMMNT,"comment");
		$blogTitle=mysql_result($resultCMMNT,$CMMNT,"blogTitle");
		$commentDate=date("m/d/Y",strtotime(mysql_result($resultCMMNT,$CMMNT,"commentDate")));
		$userFirstName=mysql_result($resultCMMNT,$CMMNT,"userFirstName");		
		$userLastName=mysql_result($resultCMMNT,$CMMNT,"userLastName");		
		$approved=mysql_result($resultCMMNT,$CMMNT,"approved");
		?>
			<ul class="commentadmin">	
				<li class=""><? echo $blogTitle; ?></li>					
				<li class=""><? echo $comment; ?></li>
				<li class=""><? echo $commentDate; ?></li>
				<li class=""><? echo $userFirstName; ?>&nbsp;<? echo $userLastName; ?></li>					
				<!--li class="" style="float:right;"><a href="process/.php?CMMNTID=" class="delete">deny</a></li-->
				
                <li class="" style="float:right;width:90px;"><a href="process/deletecomment.php?commentID=<?php echo $commentID; ?>" class="next">Delete</a></li><li class="" style="float:right;width:90px;"><a href="process/approvecomment.php?commentID=<?php echo $commentID; ?>" class="next">approve</a></li>
			</ul>
		<?php
		++$CMMNT;
		}
		?>

		
</div>