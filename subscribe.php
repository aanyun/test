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
try{
    $lists = $cc->getLists(ACCESS_TOKEN);
} catch (CtctException $ex) {
    foreach ($ex->getErrors() as $error) {
        print_r($error);
    }     
}
foreach ($lists as $list) {
   echo '<option value="'.$list->id.'">'.$list->name.'</option>';
}





?>