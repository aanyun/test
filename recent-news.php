<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress Official Website</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link href="css/font.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	
</head>

<body>
	<?php
		include "class/MysqliDb.php";
		$db = new Mysqlidb();
		$current_page = (isset($_GET['page'])&& $_GET['page']!='')? $_GET['page']-1:0;
		
		$news = $db->rawQuery("select * from news,publishers where publishers.id=idPublisher order by date desc limit 5 offset ".$current_page*5);

	?>
<div class="wrapper">
  	<div class="container">
  		<?php include "view/header.php"; ?>
	</div> <!-- / .container -->

    <div class="container">

        <div class="row">

            <div class="col-lg-9">

			   <h1 class="page-header"><strong>Recent News</strong><br />
                    <small>Subscribe to our mailing list to get the latest campaign updates!</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Recent News</li>
                </ol>
            <?php 
            //print_r($news);
            	foreach ($news as $key => $new) {
            		
            	
            ?>
			<div class="col-lg-12">
				
				<img src="<?php echo $new['logo']?>" align="right">
				
                <h3 class="date"><small><?php echo date("M d, Y",strtotime($new['date']));?></small></h3>
				<h3 class="title">"<?php echo $new['headline']?>"</h3>
                
                <p class="description"><?php echo $new['story'];?>
				<a href="<?php echo $new['link']?>" target="_blank" class="news-url">Read More »</a></p>
			</div>
			
			<div class="col-lg-12">
			<hr>
			</div>
			
			<?php 
				}
			?>


			
			
			<div class="col-lg-12 text-center">
			<ul class="pagination pagination-sm">
                
                <?php 

                if( $current_page == 0 ) echo '<li class="disabled"><a href="javascript:void(0)">« Last</a></li>';
                else echo '<li><a href="recent-news.php?page='.$current_page.'">« Last</a></li>';

                $num = $db->getOne("news","count(*) as cnt");
                $pages = ceil($num['cnt']/5);
                for( $i = 1; $i <= $pages ; $i++){
                	if( $i==$current_page+1) echo '<li class="active"><a href="recent-news.php?page='.$i.'">'.$i.'</a></li>';
                	else echo '<li><a href="recent-news.php?page='.$i.'">'.$i.'</a></li>';
                }

				if( $current_page == $pages-1 ) echo '<li class="disabled"><a href="javascript:void(0)">Next »</a></li>';
                else echo '<li><a href="recent-news.php?page='.($current_page+2).'">Next »</a></li>';

                ?>

              </ul>
			</div>
			
			
            </div>


            <div class="col-lg-3 right-column">
                <!-- /well -->
                <div class="well">
                    <h2 style="margin-top: 0;"><strong>View Archives:</strong></h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled archives">
                                <li><a href="#">July 2014</a>
                                </li>
                                <li><a href="#">June 2014</a>
                                </li>
                                <li><a href="#">May 2014</a>
                                </li>
                                <li><a href="#">April 2014</a>
                                </li>
							    <li><a href="#">March 2014</a>
                                </li>
								<li><a href="#">February 2014</a>
                                </li>
								<li><a href="#">January 2014</a>
                                </li>
								<li>December 2013
                                </li>
								<li><a href="#wild-animals">November 2013</a>
                                </li>
								<li>September 2013
                                </li>
								<li>August 2013
                                </li>
								<li>July 2013
                                </li>
								<li>June 2013
                                </li>
								<li>May 2013
                                </li>
								<li>April 2013
                                </li>
								<li>March 2013
                                </li>
								<li>February 2013
                                </li>
								<li>January 2013
                                </li>
								<li><a href="#">August 2004</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /well -->
                <div class="well2">
				
				<iframe width="210" height="118" src="https://www.youtube.com/embed/re5jXfI8nBs?rel=0" frameborder="0" allowfullscreen></iframe>

				<iframe width="210" height="118" src="https://www.youtube.com/embed/R8rts7Kai60?rel=0" frameborder="0" allowfullscreen></iframe>
								
				<button type="button" class="btn btn-lg btn-danger">View Video Archive</button>

                </div>
                <!-- /well -->
            </div>
        </div>

    </div>
    <!-- /.container -->

	
	
	
	    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-lg-7 col-md-7 subscribe">
                    <h2><strong>Stay Updated</strong><span style="font-size: 17px; color: #494949;"> &ndash; Subscribe for the latest campaign updates!</span></h3>
                    
					
					<form class="form-inline" role="form">
					<div class="row" style="margin:0;">
					  <div class="form-group adjust1">
						<label class="sr-only">First Name</label>
						<input name="firstName" class="form-control" placeholder="First Name">
					  </div>
					  <div class="form-group">
						<label class="sr-only">Last Name</label>
						<input name="lastName" class="form-control" placeholder="Last Name">
					  </div>

						  <div class="form-group adjust1" style="padding-top: 15px;">
							<label class="sr-only">Email Address</label>
							<input name="emailAddress" class="form-control" placeholder="Email Address">
						  </div>
						  <div class="form-group" style="padding-top: 15px;">
							<label class="sr-only">Zip Code</label>
							<input name="zipCode" class="form-control-sm" placeholder="Zip Code">
						  </div>
						  <span style="position: relative; top: 8px;">
						  <button type="submit" class="btn btn-danger" style="margin-left: -8px;">Submit</button>
						</span>
					  </div> <!-- /.row --> 
					</form>
					
					
                </div>
                <div class="col-lg-4 col-md-4 connect adjust2">
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
					<button type="button" class="btn btn-lg btn-primary" style="margin-right: 11px;">Contribute</button>
					<button type="button" class="btn btn-lg btn-danger">Get Involved</button>
						</div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->
	
	
        <footer>
    <div class="section-colored">

        <div class="container">

            <div class="row">
                <div class="col-lg-4">
				<div class="paidforby">Paid for by Kaifesh for Congress</div>
				<p class="subfooter">636 E. Irving Park Road<br />
					Roselle, IL 60172<br />
					Office: 847-380-6915<br />
					After hours: 224-800-8065</p>
                </div>
				<div class="col-lg-4 subfooter-center">
                    <p>Copyright &copy; Kaifesh for Congress 2014.</p>
					<img src="img/kaifesh_logo.png" class="img2" alt="Kaifesh for Congress">
				</div>
				<div class="col-lg-4 subfooter-right">
                    <p><a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
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

</body>

</html>
