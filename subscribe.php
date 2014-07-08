<?php

require 'src/Ctct/autoload.php';
use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\Contacts\EmailAddress;
use Ctct\Exceptions\CtctException;

define("APIKEY", "zhrr9fu8gasaj6rcg2mnskxb");
define("ACCESS_TOKEN", "4d3a3913-15ac-42b7-9b01-c3edc9e2f062");

$cc = new ConstantContact(APIKEY);
//echo $response = $cc->getContactByEmail(ACCESS_TOKEN, 'anyunww@gmail.com');
// attempt to fetch lists in the account, catching any exceptions and printing the errors to screen

if (isset($_POST['email']) && strlen($_POST['email']) > 1) {
    $action = "Getting Contact By Email Address";
    try {
        // check to see if a contact with the email addess already exists in the account
        $response = $cc->getContactByEmail(ACCESS_TOKEN, $_POST['email']);

        // create a new contact if one does not exist
        if (empty($response->results)) {
            $action = "Creating Contact";

            $contact = new Contact();
            $contact->addEmail($_POST['email']);
            $contact->addList('1');
            $contact->first_name = $_POST['fn'];
            $contact->last_name = $_POST['ln'];
            $returnContact = $cc->addContact(ACCESS_TOKEN, $contact); 

        // update the existing contact if address already existed
        } else {            
            $action = "Updating Contact";

            $contact = $response->results[0];
            $contact->addList($_POST['list']);
            $contact->first_name = $_POST['first_name'];
            $contact->last_name = $_POST['last_name'];
            $returnContact = $cc->updateContact(ACCESS_TOKEN, $contact);  
        }

        if (isset($returnContact)) {
        	if($returnContact['id']==null||$returnContact['id']==''){
        		header('subscribe_success.php');
        	}else{
				header('subscribe_fail.php');
        	}
    	} else{
				header('subscribe_fail.php');
        }
        
    // catch any exceptions thrown during the process and print the errors to screen
    } catch (CtctException $ex) {
        echo '<span class="label label-important">Error '.$action.'</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors()); 
        echo '</pre></div>';
        die();
    }
} 





?>