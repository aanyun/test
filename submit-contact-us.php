<?php

		if(isset($_POST['contact_email'])) {
		   
			// Where it goes
			$email_to = "shadyandlucky@gmail.com";
			$email_subject = "Kaifesh for Congress Contact Us form request";
			
			$fname  = $_POST['fname']; // required
			$lname  = $_POST['lname']; // required
			$addr1  = $_POST['addr1']; // required
			$city  = $_POST['city']; // required
			$zip  = $_POST['zip']; // required
			$contact_email  = $_POST['contact_email']; // required
			$comments  = $_POST['comments']; // required
			$header = "From: ". $contact_email;
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
					
					mail($email_to, $email_subject, $email_message, $header);
					
					$return['status'] = true;
					$return['msg'] = "Thank You For Contacting Kaifesh for Congress!";
					returnArray($return);
			}
		}
		    		


?>
