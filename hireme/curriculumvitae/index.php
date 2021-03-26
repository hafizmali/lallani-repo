<?php include('../../includes/database.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Lalanii Rochelle | Curriculum Vitae</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/isotope.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/type/fontello.css" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet">
        <link href="css/color/grey.css" rel="stylesheet">

        <!-- Colors Style -->
        <link rel="stylesheet" href="css/color/yellow.css">
        <link rel="stylesheet" href="css/color/orange.css">
        <link rel="stylesheet" href="css/color/red.css">
        <link rel="stylesheet" href="css/color/pink.css">
        <link rel="stylesheet" href="css/color/pansy.css">
        <link rel="stylesheet" href="css/color/purple.css">
        <link rel="stylesheet" href="css/color/blue.css">
        <link rel="stylesheet" href="css/color/green.css">
        <link rel="stylesheet" href="css/color/turquise.css">
        <link rel="stylesheet" href="css/color/grey.css">
        <link rel="stylesheet" href="css/color/indigodye.css">
        <link rel="stylesheet" href="css/color/melonred.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="melonred"> <!-- set your favourite theme color here! (yellow, orange, red, pink, pansy, purple, blue, green, turquise, grey, indigodye, melonred) -->
        <!-- Loading Page -->
    	<div id="mask">   
            <div class="loader">
              <img src="img/loading.GIF" alt='loading'>
            </div>
        </div>
    	<!-- Introduction -->
    	<div id="anchor1"></div>
        <div id="slides-1" class="intro">
            <div class="slides-container">
              <img alt="">
              <img alt="">
            </div>
        </div>
        <div class="main-title">
         <?php
    $head_q = mysql_fetch_array(mysql_query("Select * from ccheader where head_id='1'"));
		?>
            <div class="profile-pic"><img src="../../head_img/<?php echo $head_q['head_img']; ?>" alt="alt" /></div>
            <div class="title-container">
                <ul>
              
                    <li class="t-current"><?php echo $head_q['head_title']; ?></li>
                    <li style="color:#cccccc;"><?php echo $head_q['head_title2']; ?></li>
                    <li style="color:#cccccc;"><?php echo $head_q['head_title3']; ?></li>
               
                </ul>
                <div class="spacer-header"></div>
                <div class="second-title"><?php echo $head_q['head_desc']; ?></div>
                <!--a href="LalaniiRochelleMFACreativeWP.pdf"><div class="buy-logo">PDF Resume<span></span></div></a-->
        	</div>
        </div>
        <div id="logx"></div>
        <!-- Navigation Menus -->
        <header class="header">
            <div class="logo"><a style="text-decoration: none;color: #000;" href="http://lalanii.com/"><span><span>LR</span></span>LALANII ROCHELLE, MFA</a></div>
            <nav id="nav2" role="navigation">
                <a class="jump-menu" title="Show navigation">Show navigation</a>
                <ul>
                    <li class="current"><a href="index.php#anchor1">home</a></li>
                    <li><a href="index.php#anchor2">about</a></li>
                    <li><a href="index.php#anchor3">Experience</a></li>
                    <li><a href="index.php#anchor4">services</a></li>
                    <li><a href="index.php#anchor5">portfolio</a></li>
                    <li><a href="index.php#anchor6">contact</a></li>
                </ul>
            </nav>
            <nav class="menu">
                <ul id="nav">
                    <li class="current"><a href="index.php#anchor1">home</a></li>
                    <li><a href="index.php#anchor2">about</a></li>
                    <li><a href="index.php#anchor3">Experience</a></li>
                    <li><a href="index.php#anchor4">services</a></li>
                    <li><a href="index.php#anchor5">portfolio</a></li>
                    <li><a href="index.php#anchor6">contact</a></li>
                </ul>
            </nav>
        </header>
        <!-- My Philosophy -->
        <?php
    $about_q = mysql_fetch_array(mysql_query("Select * from ccabout where aboutid='1'"));
		?>
        <article id="anchor2" class="content menu-top dark">
        	<header class="title one"><?php echo $about_q['about_title1']; ?></header>
            <div class="spacer"></div>
            <div class="title two"><?php echo $about_q['about_desc1']; ?></div>
            
            </section>
        </article>
        <!-- About Me -->
        <article class="content light">
        	<div class="full">
                <!-- About Me / Slider -->
            	<section class="half car-show-1">
                	<header class="title-one"><?php echo $about_q['about_subtitle2']; ?></header>
                    <div class="title-two"><?php echo $about_q['about_title2']; ?></div>
                    <div class="show hideme dontHide">
                        <div class="caroussel">
                            <div class="caroussel-list">
                                <div class="car-img"><img src="../../hireme_img/<?php echo $about_q['about_img']; ?>" alt='img'></div>
                                <!--div class="car-img"><img src="img/caroussel/caroussel-02.jpg" alt='img'></div>
                                <div class="car-img"><img src="img/caroussel/caroussel-03.jpg" alt='img'></div-->
                            </div>
                        </div>
                        <div class="car-prev"></div>
                        <div class="car-next"></div>
                    </div>
                    <div class="controller">
                    	<ul>
                        </ul>
                    </div>
                </section>
                <!-- About Me / Paragraph -->
                <section class="half">
                	<header class="title-one"><?php echo $about_q['about_subtitle3']; ?></header>
                    <div class="title-two"><?php echo $about_q['about_title3']; ?></div>
                    <div class="half-content hideme dontHide">
                    	<?php echo nl2br($about_q['abour_desc3']); ?>
                    </div>
                </section>
            </div>
            <div class="clear"></div>
        </article> 
        <!-- Work Experience -->
        <article id="anchor3" class="content dark">
            <div class="full">
                <header class="title one">Creative Work Experience</header>
                <div class="spacer"></div>
                <div class="title two"> </div>
                <div class="half-content hideme dontHide">
                    <!-- Start Work History Posts -->
                    <div class="classic-blog">
                        <div class="posts">
                            <!-- post -->  
                            <?php
            $expone_nq = mysql_query("Select * from cc_expost where ex_sec_id=1 order by expost_id DESC");
			while($exponeres = mysql_fetch_array($expone_nq) ){
			?>
                            <div class="post">
                                <div class="date-wrapper"> 
                                    <a href="blog-post.html" class="date">
	                                    <div class="datecontent">
		                                    <span class="day"><?php echo date("M",strtotime($exponeres['post_date'])); ?></span> 
		                                    <span class="month"><?php echo date("Y",strtotime($exponeres['post_date'])); ?></span> 
	                                    </div>
                                    </a> 
                                </div>
                                <div class="format-wrapper"> <i class="icon-calendar-1"></i> </div>
                                <div class="post-content">
                                    <div class="post-title"><a href="blog-post.html"><?php echo $exponeres['expost_title']; ?></a></div>
                                    <div class="meta"> 
                                      	<span><i class="icon-briefcase"></i><?php echo $exponeres['expost_bus']; ?></span> 
                                      	<span> <i class="icon-clock-1"></i><?php echo $exponeres['expost_date']; ?></span> 
                                    </div>
                                    <p><?php echo $exponeres['expost_desc']; ?></p>
                                    
                                </div>
                            </div>
			<?php } ?>
                        </div>
					</div>
				</div>
			</div>
            <div class="full">
                <header class="title one">Production Work Experience</header>
                <div class="spacer"></div>
                <div class="title two"> </div>
                <div class="half-content hideme dontHide">
                    <!-- Start Work History Posts -->
                    <div class="classic-blog">
                        <div class="posts">
<?php
            $exptwo_nq = mysql_query("Select * from cc_expost where ex_sec_id=2 order by expost_id DESC");
			while($exptwores = mysql_fetch_array($exptwo_nq) ){
			?>                    
						<div class="post">
                                <div class="date-wrapper"> 
	                                <a href="blog-post.html" class="date">
		                                <div class="datecontent">
		                                    <span class="day"><?php echo date("M",strtotime($exptwores['post_date'])); ?></span> 
		                                    <span class="month"><?php echo date("Y",strtotime($exptwores['post_date'])); ?></span> 
		                                </div>
	                                </a> 
                                </div>
                                <div class="format-wrapper"> <i class="icon-calendar-1"></i> </div>
                                <div class="post-content">
                                    <div class="post-title"><a href="blog-post.html"><?php echo $exptwores['expost_title']; ?></a></div>
                                    <div class="meta"> 
                                        <span><i class="icon-briefcase"></i><?php echo $exptwores['expost_bus']; ?></span> 
                                      	<span><i class="icon-clock-1"></i><?php echo $exptwores['expost_date']; ?></span> 
                                    </div>
                                    <p><?php echo $exptwores['expost_desc']; ?></p>
                                     
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>                
            </div>
		</div>
		<div class="clear"></div>
	</article>
        <div class="clear"></div>
        <!-- Got Featured -->  
        <article class="parallax p-one">
        	<div class="p-title-one">EDUCATION INFORMS EXPERIENCE</div>
            <div class="p-title-two">ACCOLADES</div>
            <div class="spacer"></div>
            <div class="p-image-02">
                <div class="p-image-second hideme-slide dontHide delay"><img src="img/parallax/p-image-03.png" alt='img'></div>
                <div class="p-image-first hideme-slide dontHide"><img src="img/parallax/p-image-02.png" alt='img'></div>
            </div>
        </article>
        <!-- Some Fun Facts -->  
        </article>
        <article class="content dark">
        	<section class="full">
            	<header class="title one">Some fun facts</header>
                <div class="spacer"></div>
                <div class="title two"></div>
                <div class="f-container">
                    <div class="f-element hideme dontHide">
                        <i class="fun-icon icon-s-twitter"></i>
                        <div class="milestone-counter" data-perc="98984">
                       		<span class="milestone-count highlight">0</span> <!-- Initial Value = 0 -->
                            <div class="milestone-details">Tweets</div>
                        </div>
                    </div>
                    <div class="f-element hideme dontHide">
                        <i class="fun-icon icon-user-1"></i>
                        <div class="milestone-counter" data-perc="234">
                       		<span class="milestone-count highlight">0</span> <!-- Initial Value = 0 -->
                            <div class="milestone-details">Clients Worked</div>
                        </div>
                    </div>
                    <div class="f-element hideme dontHide">
                        <i class="fun-icon icon-star"></i>
                        <div class="milestone-counter" data-perc="487">
                       		<span class="milestone-count highlight">0</span> <!-- Initial Value = 0 -->
                            <div class="milestone-details">Projects Completed</div>
                        </div>
                    </div>
                    <div class="f-element hideme dontHide">
                        <i class="fun-icon icon-cup"></i>
                        <div class="milestone-counter" data-perc="54751">
                       		<span class="milestone-count highlight">0</span> <!-- Initial Value = 0 -->
                            <div class="milestone-details">Coffee Cups</div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clear"></div>
        </article>
        <!-- Responsive -->  
        <article class="technologies">
        <?php
    $tech_q = mysql_fetch_array(mysql_query("Select * from ccexp where exp_id='1'"));
		?>
        	<div class="techheader"><?php echo $tech_q['tec_header']; ?></div>
            <div class="techtitle"><?php echo $tech_q['tec_title']; ?></div>
            
            <div class=""><?php echo nl2br($tech_q['tec_desc']); ?></div>
            
 
        </article>
        <!-- Services -->  
        <article id=anchor4 class="content dark">
        	<header class="title one">My Services</header>
            <div class="spacer"></div>
            <div class="title two">I take pride in my creative approach crafting stunning, functional and engaging work that delights and delivers results.</div>
            <div class="s-container services-container">
                <section class="services">
                        <div class="sl-element hideme dontHide">
                            <div class="sl-ico"><div class="sl-ico-icon"><i class="icon-heart"></i></div></div>
                            <div class="sl-title">LIFESTYLE BLOGGER</div>
                        </div>
                        <div class="sl-element hideme dontHide">
                            <div class="sl-ico"><div class="sl-ico-icon"><i class="icon-brush"></i></div></div>
                            <div class="sl-title">CREATIVE COPYWRITING</div>
                        </div>
                        <div class="sl-element hideme dontHide">
                            <div class="sl-ico"><div class="sl-ico-icon"><i class="icon-vcard"></i></div></div>
                            <div class="sl-title">SOCIAL MEDIA MANAGEMENT</div>
                        </div>
                        <div class="sl-element hideme dontHide">
                            <div class="sl-ico"><div class="sl-ico-icon"><i class="icon-up-hand"></i></div></div>
                            <div class="sl-title">UI/UX & CONSULTATION</div>
                        </div>
                        <div class="clear"></div>
               </section>
           </div>
        </article>
        <!-- What I do -->  
        <article class="content light">
        	<div class="full">
                <!-- Skills --> 
                <section class="half hideme dontHide">
                	<div class="title-one">WHAT I DO</div>
                    <div class="title-two">My Awesome Skills</div>
                    <div class="half-content">
                    	<div class="sk-container">
                            <div class="skill-content">
                                <div class="progress-bar skill-1">
                                  <div class="skill-in" title="90"><div class="info-skills">consultation <span>- 90%</span></div></div>
                                </div>
                            </div>
                            <div class="skill-content">
                                <div class="progress-bar skill-2">
                                  <div class="skill-in" title="70"><div class="info-skills">web design <span>- 70%</span></div></div>
                                </div>
                            </div>
                            <div class="skill-content">
                                <div class="progress-bar skill-3">
                                  <div class="skill-in" title="80"><div class="info-skills">online marketing <span>- 80%</span></div></div>
                                </div>
                            </div>
                            <div class="skill-content">
                                <div class="progress-bar skill-4">
                                  <div class="skill-in" title="90"><div class="info-skills">production <span>- 90%</span></div></div>
                                </div>
                            </div>
                            <div class="skill-content">
                                <div class="progress-bar skill-5">
                                  <div class="skill-in" title="100"><div class="info-skills">copywriting <span>- 100%</span></div></div>
                                </div>
                            </div>
							<div class="skill-content">
                                <div class="progress-bar skill-5">
                                  <div class="skill-in" title="100"><div class="info-skills">blogging & brand ambassador <span>- 100%</span></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Clients -->  
                <section class="half car-show-3 hideme dontHide">
                	<div class="title-one">Testimonials</div>
                    <div class="title-two">My Happy Clients</div>
                    <div class="show">
                        <div class="caroussel-3">
                            <div class="caroussel-list-3">
                                <div class="car-quote">
                                	<div class="testimonials">
                                    <?php
            $testimonial_nq = mysql_query("Select * from cc_testomonials");
			while($testres = mysql_fetch_array($testimonial_nq) ){
			?>
                                    	<div class="avatar"><img src="../../hireme_img/<?php echo $testres['test_title']; ?>" alt='img'></div>
                                        <div class="comment">"<?php echo $testres['test_desc']; ?>"<br><br><span><?php echo $testres['test_author']; ?> </span><?php echo $testres['test_location']; ?></div>
                                        <div class="clear q-spacer"></div>
             <?php } ?>          
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- 
                        <div class="car-prev-2"></div>
                        <div class="car-next-2"></div> -->
                    </div>
                    <div class="controller-2"><ul> </ul></div>
                </section>
            </div>
            <div class="clear"></div>
        </article>
        <div class="clear"></div>
        <!-- Video -->  
      <!--   <article class="container-video">
        	<div class="parallax-info">
                <div class="p-video-title">Show <span><img src="img/video-ico.png" alt='img'></span> Reel</div>
            </div>
            <div class="mk-video-mask"></div>
            
        </article> -->
        <!-- Portfolio -->  
        <article id=anchor5 class="content dark">
        	<header class="title one">My Portfolio</header>
            <div class="spacer"></div>
            <div class="title two">Everything I have ever done has been to the best of my ability. No halfsies.</div>
            <div id="portfolio" class="container">
                <div class="section portfoliocontent">
                    <section id="options" class="clear">
                        <div id="filters" class="option-set clearfix foliomenu hideme dontHide" data-option-key="filter">
                          <a href="index.html#filter" data-option-value="*" class="p-selected folio-btn"><div class="portfolio-btn">All</div></a>
                          <a href="index.html#filter" data-option-value=".social" class="folio-btn"><div class="portfolio-btn">Social Media</div></a>
                          <a href="index.html#filter" data-option-value=".copywriting" class="folio-btn"><div class="portfolio-btn">Copywriting</div></a>
                          <a href="index.html#filter" data-option-value=".blogging" class="folio-btn"><div class="portfolio-btn">Blogging</div></a>
                          <a href="index.html#filter" data-option-value=".Design" class="folio-btn"><div class="portfolio-btn">Design</div></a>
                        </div>
                    </section>
                    <div class="clear"></div>
                    <div id="project-show"></div>
                    <section class="project-window">
                        <div class="project-content"></div><!-- AJAX Dinamic Content -->
                    </section>
                    <section id="i-portfolio" class="clear">
                    	<div class="inici"></div>
                        <div class="ch-grid element social music" id="portfolio-1.html">
                            <a href="img/portfolio/thumb-01.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-01.png" alt='img'>
                                <div><span><span class="p-category"></span>Freepeople<span class="cat2">Brand Ambassador | Blogger</span></span></div>
                            </a>
                        </div>

                        <div class="ch-grid element graphic copywriting" id="portfolio-2.html">
                            <a href="img/portfolio/thumb-02.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-02.png" alt='img'>
                                <div><span><span class="p-category"></span>Relay Collective | LumiBloom<span class="cat2">Social Media</span></span></div>
                            </a>    
                        </div>
                        
                        <div class="ch-grid element Design" id="portfolio-1b.html">
                            <a href="img/portfolio/thumb-03.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-03.png" alt='img'>
                                <div><span><span class="p-category"></span>Nastygal<span class="cat2">Copywriting | Ghostwriting</span></span></div>
                            </a>    
                        </div>
                        
                        <div class="ch-grid element illustration" id="portfolio-3.html">
                            <a href="img/portfolio/thumb-04.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-04.png" alt='img'>
                                <div><span><span class="p-category"></span>Melanie Lyne<span class="cat2">Product Descriptions</span></span></div>
                            </a>    
                        </div>
                        
                        <div class="ch-grid element graphic vector" id="portfolio-1c.html">
                            <a href="img/portfolio/thumb-05.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-05.png" alt='img'>
                                <div><span><span class="p-category"></span>Jeffrey Campbell<span class="cat2">Blogger</span></span></div>
                            </a>
                        </div>

                        <div class="ch-grid element graphic vector illustration" id="portfolio-1d.html">
                            <a href="img/portfolio/thumb-06.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-06.png" alt='img'>
                                <div><span><span class="p-category"></span>Indo Hair<span class="cat2">Blogging</span></span></div>
                            </a>
                        </div>
                        
                        <div class="ch-grid element music" id="portfolio-4.html">
                            <a href="img/portfolio/thumb-07.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-07.png" alt='img'>
                                <div><span><span class="p-category"></span>Urban Outfitters<span class="cat2">Brand Ambassador</span></span></div>
                            </a>
                        </div>
                        
                        <div class="ch-grid element graphic vector music" id="portfolio-1e.html">
                            <a href="img/portfolio/thumb-08.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-08.png" alt='img'>
                                <div><span><span class="p-category"></span>Modcloth<span class="cat2">Product Descriptions</span></span></div>
                            </a>
                        </div>
                        
                        <div class="ch-grid element illustration music" id="portfolio-4b.html">
                            <a href="img/portfolio/thumb-09.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-09.png" alt='img'>
                                <div><span><span class="p-category"></span>Forever21<span class="cat2">Visual Merchandiser | Stylist</span></span></div>
                            </a>
                        </div>
                        
                        <div class="ch-grid element music" id="portfolio-3b.html">
                            <a href="img/portfolio/thumb-10.png" data-lightbox="roadtrip">
                                <img class="ch-item" src="img/portfolio/thumb-10.png" alt='img'>
                                <div><span><span class="p-category"></span>bebe<span class="cat2">Copywriter | Editor</span></span></div>
                            </a>
                        </div>
                        
                        <div class="final"></div>
                    </section>
                </div>
            </div>
            <div class="clear"></div>
            <section class="list_carousel responsive hideme dontHide">
                <ul id="logos">
                    <li><img src="img/logos/logo-01.png" alt="logo"></li>
                    <li><img src="img/logos/logo-02.png" alt="logo"></li>
                    <li><img src="img/logos/logo-03.png" alt="logo"></li>
                    <li><img src="img/logos/logo-04.png" alt="logo"></li>
                    <li><img src="img/logos/logo-05.png" alt="logo"></li>
                    <li><img src="img/logos/logo-06.png" alt="logo"></li>
                    <!--li><img src="img/logos/logo-07.png" alt="logo"></li-->
                </ul>
                <div class="clearfix"></div>
            </section>
        </article>
        <!-- Footer -->  
        <footer id=anchor6 class="footer light">
            <div class="footer-container">
            	<div class="title one no-top">hello</div>
                <div class="spacer"></div>
                <div class="title two f-bottom">Need to book me for a project? Need a blogger? Social Media Manager? Brand Ambassador? Drop me a line here. 87% of my clients are by referral. Discounted rates available for referrals.</div>
                <!-- Contact Information -->  
                <div class="foot-third hideme dontHide">
                    <div class="f-title-one">contact</div>
                    <div class="f-title-two">Get In Touch</div>
                    <div class="f-data adress"><span class="contactleft"><i class="f-data-icon icon-location"></i> Address:</span><span class="contactright">Culver City, CA 90230</span></div>
                    <div class="f-data phone"><span class="contactleft"><i class="f-data-icon icon-mobile"></i> Phone:</span><span class="contactright">310.987.2951</span></div>
                    <div class="f-data e-mail"><span class="contactleft"><i class="f-data-icon icon-mail-1"></i> Email:</span><span class="contactright"><a href="mailto:lalanii@lalanii.com">lalanii@lalanii.com</a></span></div>
                </div>
                <!-- Contact Form -->  
                <div class="foot-two-third hideme dontHide">
                    <form method="post" id="contactForm" action="processForm.php">
                        <div class="clearfix">
                            <div class="grid_4 alpha mb"><label>Name</label>
                                <input type="text" name="senderName" id="senderName" placeholder="Name *" class="requiredField" />
                            </div>
                            <div class="grid_4 mb"><label>Email</label>
                                <input type="text" name="senderEmail" id="senderEmail" placeholder="Email Address *" class="requiredField email" />
                            </div>
                        </div>
                        <div><label>Message</label>
                            <textarea name="message" id="message" placeholder="Message *" class="requiredField" rows="8"></textarea>
                        </div>
                        <input type="submit" id="sendMessage" name="sendMessage" value="Send Email" />
                    </form>
                </div>
            </div>
        </footer>
        <!-- Go Up - Arrow -->  
        <a href="index.html#" class="scrollup"><img src="img/up-arrow.png"></a>
        <!-- Location Map -->  
        <div id="maps">
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <div class="map-content">
            	<div class="wpgmappity_container inner-map" id="wpgmappitymap"></div>
            </div>
        </div>
        <!-- Social Icons -->  
        <div class="socialFooter">
            <div class="social-icons">
                    <div class="s-media"><a href="https://www.linkedin.com/in/lalaniigrant" target="_blank"><span><span><i class="icon-s-linkedin"></i></span></span></a></div>
                    <div class="s-media"><a href="https://www.facebook.com/pages/Author-Lalanii-R-Grant/106764956090989?ref=hl" target="_blank"><span><span><i class="icon-s-facebook"></i></span></span></a></div>
                    <div class="s-media"><a href="https://twitter.com/lalanii" target="_blank"><span><span><i class="icon-s-twitter"></i></span></span></a></div>
            </div>
            <div class="clear"></div>
            <!-- Copy Rights -->  
            <div class="copy">Lalanii Rochelle © Copyright 2007- 2015</div>            
        </div>
        <!-- Scripts -->  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.inview.js"></script>
        <script type="text/javascript" 	src="js/jquery.sticky.js"></script>
		<script src="js/superslides-0.6.2/dist/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/popup/jquery.magnific-popup.js"></script> 
		<script type="text/javascript" src="js/caroussel/jquery.contentcarousel.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/test.js"></script>
        <script src="js/superslides.js"></script>
        <script src="js/lightbox.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </body>
</html>
