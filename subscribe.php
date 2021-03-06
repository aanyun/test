<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

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
// $lists = $cc->getLists(ACCESS_TOKEN);

// foreach ($lists as $list) {
//     echo '<option value="'.$list->id.'">'.$list->name.'</option>';
// }
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
            $contact->addList('1');
            $contact->first_name = $_POST['fn'];
            $contact->last_name = $_POST['ln'];
            $returnContact = $cc->updateContact(ACCESS_TOKEN, $contact);  
        }

        if (isset($returnContact)) {
        echo json_encode($returnContact); 
    	} else echo "error";
        
    // catch any exceptions thrown during the process and print the errors to screen
    } catch (CtctException $ex) {
    	echo "error";
        die();
    }
} 





?>