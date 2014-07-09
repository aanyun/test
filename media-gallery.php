<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress Official Website | Media Gallery</title>

    <!-- Bootstrap core CSS .. -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		
	
</head>

<body>
	<?php
		include "class/MysqliDb.php";
		$db = new Mysqlidb();
		$current_page = (isset($_GET['page'])&& $_GET['page']!='')? $_GET['page']-1:0;
		$type = (isset($_GET['type'])&& $_GET['type']!='')? $_GET['type']:'0,1';
		$news = $db->rawQuery("select * from media where type in (".$type.") order by id desc limit 12 offset ".$current_page*12);

	?>
<div class="wrapper">
    <div class="container">
    	<?php include "view/header.php";?>
	</div> <!-- / .container -->

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
			
			   <h1 class="page-header"><strong>Media Gallery</strong><br />
                    <small>You can filter results by selecting a category below. Click to view maximum size.</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active"><a href="media-gallery.php">Media Gallery (View All Media)</a> | <a href="media-gallery.php?type=0">Photos</a> | <a href="media-gallery.php?type=1">Videos</a></li>
					
                </ol>
			  
            </div>
			
			</div>
			
			
            <div class="col-lg-12 media-gallery">
				<ul class="gallery clearfix">

            	<?php 
            	foreach ($news as $key => $new) {
            		
            		if($key%3==0) echo "<div class='row'>";
            	?>


                <li class="col-md-4 portfolio-item">

                <?php 
                if($new['type']==1){
                	if(strpos($new['url'], 'youtube')!== false){
	                	$videolink = $new['url'];
	                	if(strpos($new['url'], 'watch')!== false){
		               	$new['url'] = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","https://www.youtube.com/embed/$1",$new['url']);
	                	}
                ?>	
                	<a href='<?php echo $videolink?>' rel="prettyPhoto[mixed]" alt="<?php echo $new['title']?>" title="<?php echo $new['desc']?>">
	                <iframe width="100%" height="100%"
					src='<?php echo $new["url"]?>'>
					</iframe>
					</a>
				<?php
					} else {
						echo $new['url'];
					}
				}else {
				?>
	                <a href="<?php echo $new['url']?>" rel="prettyPhoto[mixed]" alt="<?php echo $new['title']?>" title="<?php echo $new['desc']?>">
	                    <img class="img-responsive" src="<?php echo $new['url']?>">
	                </a>
	            <?php
	        	}
	            ?>
					<p class="title"><small><strong><?php echo $new['title']?></strong><br />
					<?php echo $new['desc']?>
					</small></p>				
				
            	</li>


        	<?php 
        		if($key%3==2) echo "</div>";
				}
			?>
		</ul>
		</div>
		<div class="col-lg-12 text-center">
			<ul class="pagination pagination-sm">
                
                <?php 

                if( $current_page == 0 ) echo '<li class="disabled"><a href="javascript:void(0)">« Last</a></li>';
                else echo '<li><a href="media-gallery.php?page='.$current_page.'">« Last</a></li>';

                $num = $db->getOne("media","count(*) as cnt");
                $pages = ceil($num['cnt']/12);
                for( $i = 1; $i <= $pages ; $i++){
                	if( $i==$current_page+1) echo '<li class="active"><a href="media-gallery.php?page='.$i.'">'.$i.'</a></li>';
                	else echo '<li><a href="media-gallery.php?page='.$i.'">'.$i.'</a></li>';
                }

				if( $current_page == $pages-1 ) echo '<li class="disabled"><a href="javascript:void(0)">Next »</a></li>';
                else echo '<li><a href="media-gallery.php?page='.($current_page+2).'">Next »</a></li>';

                ?>

            </ul>
		</div>
    </div>
    <!-- /.container -->

	
	
	
	    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6 subscribe">
					<?php include "view/subscribeform.php";?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 connect adjust2">
					<h2><strong>Stay Connected</strong><span style="font-size: 17px; color: #494949;"> with Larry Kaifesh!</span></h3>
					<hr class="divideConnect"> </hr>
					
					<a href="https://www.facebook.com/Kaifeshforcongress" target="_blank">
						<img src="img/fb_icon.png" class="connect_icon">
					</a>
					<a href="https://twitter.com/LarryKaifesh" target="_blank">
						<img src="img/twitter_icon.png" class="connect_icon">
					</a>
					<a href="https://www.youtube.com/user/kaifeshforcongress" target="_blank">
						<img src="img/youtube_icon.png" class="connect_icon">
					</a>
					<a href="https://www.linkedin.com/in/kaifeshforcongress" target="_blank">
						<img src="img/linkedin_icon.png" class="connect_icon">
					</a>					
					<a href="https://plus.google.com/110076519787570184443/posts" target="_blank">
						<img src="img/gplus_icon.png" class="connect_icon">
					</a>
					<a href="http://www.pinterest.com/larrykaifesh/" target="_blank">
						<img src="img/pin_icon.png" class="connect_icon">
					</a>
					<a href="mailto:larry@kaifeshforcongress.com">
						<img src="img/email_icon.png" class="position: relative; top: -3px;">
					</a>

						<div style="margin-top: 15px;">
						
						
		<div class="col-lg-6 col-md-6 col-sm-6" style="padding: 0;">
		<a href="https://secure.jotform.us/larrykaifesh/kaifeshforcongress" target="_blank">
  		<button class="btn btn-lg btn-primary btn-block" type="reset" style="width: 158px;">Contribute</button>
		</a>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 space" style="padding: 0;">
		<a href="get-involved.php" target="_blank">
        <button class="btn btn-lg btn-danger btn-block" type="submit button" onclick="submit()" style="width: 158px;">Get Involved</button>
		</a>
		</div>
						
						

						</div>
						
                </div> <!-- / .4 -->
            </div> <!-- /.row -->
           

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
	
	
        <footer>
    <div class="section-colored">

        <div class="container">

            <div class="row">
                <div class="col-lg-4 hide-1200minus">
				<div class="paidforby">Paid for by Kaifesh for Congress</div>

				<p class="subfooter ">804 E Nerge Rd.<br />
					Roselle, IL 60172<br />
					Office: 847-380-6915<br />
					After hours: 224-800-8065</p>
					

                </div>
				<div class="col-lg-4 col-md-12 hide-1200minus subfooter-center">
                    <p>Copyright &copy; Kaifesh for Congress 2014.</p>
					<img src="img/kaifesh_logo.png" class="img2" alt="Kaifesh for Congress">
				</div>
				<div class="col-lg-4 hide-1200minus subfooter-right">
                    <p><a href="#">Privacy Policy</a> | <a href="contact-us.php">Contact</a></p>
					</div>
				
				 <div class="col-md-4 col-md-push-4 hide-1200plus text-center">
				 <span class="subfooter">Copyright &copy; Kaifesh for Congress 2014.</span><br />
				 <img src="img/kaifesh_logo.png" class="img2" alt="Kaifesh for Congress" style="margin-top: 18px;">
				</div>
				
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
	
    <!-- /.section-colored -->
	    <div class="section-colored2 text-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="desclaimer">Larry Kaifesh is a Colonel in the United States Marine Corps Reserve.
					<br />Use of his military rank, job titles, and photographs in uniform does not imply endorsement by the Marine Corps, Department of the Navy or the Department of Defense. </p>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->
	</footer>
	
</div>
<!-- /.wrapper -->



    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/main.js"></script>	
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script>
		$(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',social_tools:false,gallery_markup: ''});
	</script>


</body>

</html>
