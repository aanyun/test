<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress Official Website | Request a Yard Sign</title>

    <!-- Bootstrap core CSS .. -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
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
			
			   <h1 class="page-header"><strong>Request a Yard Sign</strong><br />
                    <small>Thank you for supporting the Kaifesh for Congress campaign! All fields are required.</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Request a Yard Sign</li>
                </ol>
			  
            </div> <!-- / .12 -->
			
			</div> <!-- /.row -->
			
			
			
			
			<div class="col-lg-12" style="padding-bottom: 40px;">
 <form action="submit-sign.php" method="post" id="sign" >
		<div class="form-inline form" role="form">
		<input type="hidden" id="noBot" value="" />
		<div class="form-group">
		<label for="inputFirstName" class="col-sm-3 control-label" style="margin-top: 5px;">First Name:</label>
		<div class="col-sm-8" style="padding-bottom: 10px;">
		<input type="text" name="fname" id="fname" class="form-control" style="width: 360px;" placeholder="First Name">
		</div>
		</div> <!-- / .form-group -->

		<div class="form-group">
		<label for="inputLastName" class="col-sm-3 control-label" style="margin-top: 5px;">Last Name:</label>
		<div class="col-sm-8" style="padding-bottom: 10px;">
		<input type="text" name="lname" id="lname" class="form-control" style="width: 360px;" placeholder="Last Name">
		</div>
		</div> <!-- / .form-group -->
		
		<div class="form-group">
		<label for="inputAddress" class="col-sm-3 control-label" style="margin-top: 5px;">Address:</label>
		<div class="col-sm-8" id="inputAddress">
		<input type="text" name="addr1" id="addr1" class="form-control" style="width: 360px;" placeholder="Address">
		</div>
		</div> <!-- / .form-group -->
		
		<div class="form-group">
		<label for="inputCity" class="col-sm-3 control-label" style="margin-top: 5px;">City:</label>
		<div class="col-sm-8" id="inputCity">
		<input type="text" name="city" id="city" class="form-control" style="width: 360px;" placeholder="City">
		</div>
		</div> <!-- / .form-group -->
		
		<div class="form-group">
		<label for="inputZip" class="col-sm-3 control-label" style="margin-top: 5px;">Zip Code:</label>
		<div class="col-sm-8" id="inputZip">
		<input type="text" name="zip" id="zip" class="form-control" maxlength="5" style="width: 360px;" placeholder="Zip Code">
		</div>
		</div> <!-- / .form-group -->
		
		<div class="form-group">
		<label for="inputEmail" class="col-sm-3 control-label" style="margin-top: 5px;">Email:</label>
		<div class="col-sm-8" id="inputEmail">
		<input type="text" name="contact_email" id="contact_email" class="form-control" style="width: 360px;" placeholder="Email Address">
		</div>
		</div> <!-- / .form-group -->
		
		<div class="form-group">
		<label for="inputComments" class="col-sm-3 control-label" style="margin-top: 5px;">Comments:</label>
		<div class="col-sm-8" style="padding-bottom: 10px;">
		<textarea type="text" name="comments" id="comments" class="form-control" style="width: 360px;" placeholder="Comments and Questions"></textarea>
		</div>
		</div>		<!-- / .form-group -->
		
		
			
<div class="row">	
    <div class="form-group" style="margin-left: 15px;">
  
  	<div class="col-lg-5 col-md-6 col-sm-6">
  		<button class="btn btn-md btn-default btn-block" type="reset" style="width: 136px;">Reset</button>
	</div>
	<div class="col-lg-5 col-lg-push-1 col-md-6 col-sm-6 space">
        <button class="btn btn-md btn-primary btn-block" type="submit button" onclick="submit()" style="width: 136px;">Submit</button>
	</div>
	
	</div> <!-- / .form-group -->
</div><!-- /. row -->
	
</div>	<!-- /.form-inline -->
</form>		
			
			</div> <!-- / .12 -->
			
			

    </div>
    <!-- /.container -->

	
	
	
	
	    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6 subscribe">
																<h2><strong>Stay Updated</strong><span style="font-size: 17px; color: #494949;"> &ndash; Subscribe for the latest campaign updates!</span></h3>


											<div class="form-inline" role="form">
											<div class="row" style="margin:0;">
											  <div class="form-group adjust1">
												<label class="sr-only">First Name</label>
												<input name="firstName" class="form-control" placeholder="First Name">
											  </div>
											  <div class="form-group fix">
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
												  <span class="subscribeBtn">
												  <button type="button" id='subscrbesubmit' class="btn btn-danger" style="margin-left: -8px;">Submit</button>
												</span>
											  </div> <!-- /.row --> 
											</div>
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

</body>

</html>
