<?php

if( empty($_POST['noBot']) && isset($_POST['contact_email'])) { 
		   
			// Where it goes
			// $email_to = "shadyandlucky@gmail.com";
			$email_to = "anyunww@gmail.com";
			$email_subject = "Kaifesh for Congress Contact Us form request";
			
			$fname  = $_POST['fname']; // required
			$lname  = $_POST['lname']; // required
			$addr1  = $_POST['addr1']; // required
			$city  = $_POST['city']; // required
			$zip  = $_POST['zip']; // required
			$contact_email  = $_POST['contact_email']; // required
			$comments  = $_POST['comments']; // required
			
			
			$header = "From: anyunww@gmail.com\r\n";
			$header .= "Reply-To: larry@kaifeshforcongress.com\r\n";
			$header .= "Return-Path: larry@kaifeshforcongress.com\r\n";
			$header = "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			
			function died($error) {
				// Error Codes
				echo "We are very sorry, but there were error(s) found with the form you submitted. ";
				echo "Please go back and fill out all of the required information.<br /><br />";
				die();
			}
			 
			// validation expected data exists
			if( empty($_POST['fname']) ||
				empty($_POST['lname']) ||
				empty($_POST['addr1']) ||
				empty($_POST['city']) ||
				//empty($_POST['zip']) ||
				empty($_POST['contact_email']) ||
				empty($_POST['comments'])) 
				{
				//died('Please fill in all required sections. If the section does not apply, please put "N/A."');    
                $return['msg'] = "Please fill in all required sections. If the section does not apply, please put N/A.";	
				returnArray($return);			
				} else {
			
					$email_message = "Form details below. \n\n\n";
					
					function clean_string($string) {
						$bad = array("content-type","bcc:","to:","cc:","href");
						return str_replace($bad,"",$string);
					}    
					
					$email_message .= "First Name: ".clean_string($fname)."\r\n";
					$email_message .= "Last Name: ".clean_string($lname)."\r\n";
					$email_message .= "Contact E-Mail: ".clean_string($contact_email)."\r\n";
					$email_message .= "\n";
					$email_message .= "Address: ".clean_string($addr1)."\r\n";
					$email_message .= "City: ".clean_string($city)."\r\n";
					$email_message .= "Zip Code: ".clean_string($zip)."\r\n";
					$email_message .= "\n";
					$email_message .= "Comments/Questions: ".clean_string($comments)."\r\n";
					ini_set('sendmail_from', $_POST['contact_email']);
					    $headers = 'From: '.$_POST['fname'].$_POST['lname'].' '.$_POST['contact_email']."\r\n" ;
					    $headers .='X-Mailer: PHP/' . phpversion();
					    $headers .= "MIME-Version: 1.0\r\n";
					    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					mail($email_to, $email_subject, $email_message, $headers,"-f ".$_POST['contact_email']);
					
			}
		}
		
		
		else {
			echo "<error>
					<status>fail</status>
					<reason>You are a bot!!</reason>
				</error>";
			die();
			}
							
?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaifesh for Congress Official Website | Contact</title>

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
			
			   <h1 class="page-header"><strong>Contact Us</strong><br />
                    <small>Please fill out the form below to contact Larry Kaifesh. All fields are required.</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
					<li><a href="contact-us.php">Contact</a></li>
                    <li class="active">Thank You!</li>
                </ol>
			  
            </div>
			
			</div>
			
			<div class="col-lg-12 text-center" style="padding-bottom: 40px;">
.
					<h2>Thank you for contacting Kaifesh for Congress!<br />We will get back to you as soon as possible.</h2>
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

</body>

</html>

