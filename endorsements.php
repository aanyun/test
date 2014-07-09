<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress Official Website | Endorsements</title>

    <!-- Bootstrap core CSS .. -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link href="css/font.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	
</head>

<body>
<div class="wrapper">
    <div class="container">
    	<?php include "view/header.php";?>
	</div> <!-- / .container -->

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
			
			   <h1 class="page-header"><strong>Endorsements</strong><br />
                    <small>Want to endorse Larry Kaifesh? <a href="mailto:larry@kaifeshforcongress.com">Contact Us!</a></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Endorsements</li>
                </ol>
			  
            </div>
			
			</div>
			
	        <div class="row">
		
			
			   <div class="col-lg-5" style="padding-right: 20px;">
				<h2>Members of Congress:</h2>
				<?php 
				$con_mems = file('view/congress_member.txt');
				foreach ($con_mems as $key => $value) {
					echo "<p>".$value."</p>";
				}
				?>
				
				<h2>Organizations:</h2>

			   	<?php 
			   	ini_set("auto_detect_line_endings", true);
				if (($handle = fopen("view/organization.csv", "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					//print_r($data);					
						if($data[1]==''){
							echo '<a href="javascript:void(0)" style="pointer-events:none;">'.$data[0].'</a><br/>';
						} else {
							echo '<a href="javascript:void(0)" data-toggle="collapse" data-target="#'.str_replace(' ','_',$data[0]).'">'.$data[0].'</a><br/>';
							echo '<div class="collapse in" id="'.str_replace(' ','_',$data[0]).'">'.$data[1].'</div>';
						}
					}
				}
				?>	
			   	
				
				</div>
				
				<div class="col-lg-7">
				
				<div class="testimonial2">
						<p class="test_quote2">"Larry's commitment to conservative values and experience as a compassionate leader in the U.S. Marine Corps 
							make him an outstanding candidate, and he will fight for the issues important to voters in 
							Illinois' 8th congressional district."</p>
						<p class="test_guy2">&mdash; John Kline, 25-year veteran of the U.S. Marine Corps, Member 
of Congress (MN-2), and Chairman of the House Committee on Education and the Workforce. </p>				
					
					</div>
				
				
					<h2 style="padding-top: 15px;">8th District Elected Officials:</h2>
					
					<div class="table-responsive">
						
					<table class="table table-bordered table-hover">
					<thead class="header">
					<tr>
					<th>Name:</th>
					<th>Title:</th>
					</tr>
					</thead>
					
					<tbody>
				<?php 
				if (($handle = fopen("view/officials.csv", "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					echo "<tr>";
					foreach ($data as $key => $value) {
						echo "<td>".$value."</td>";
					}
					echo "</tr>";
				}
			}
				?>						
					</tbody>
					
					
					</table>
					</div> <!-- /.table-res-->
						
					</div> <!-- /.8 -->
				
				
				
				</div> <!-- /.row-->
				

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
					<button type="submit button" class="btn btn-lg btn-primary" style="margin-right: 11px;">Contribute</button>
						</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6" style="padding: 0;">
						<a href="get-involved.php" target="_blank">
					<button type="submit button" class="btn btn-lg btn-danger">Get Involved</button>
						</a>
						</div>
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
                    <p><a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
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

</body>

</html>
