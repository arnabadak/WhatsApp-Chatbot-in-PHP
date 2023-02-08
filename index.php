<?php

// Required library
require_once 'twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACCOUNT_SID';
$token = 'AUTH_TOKEN';
$client = new Client($sid, $token);

// Get the message that was sent to the Twilio number
$message = $_REQUEST['Body'];

// Determine the response to send back
switch ($message) {
    case 'hello':
        $response = "Hi there! How can I help you today?";
        break;
    case 'bye':
        $response = "Goodbye!";
        break;
    default:
        $response = "Sorry, I don't understand. Can you please rephrase your request?";
        break;
}

// Send the response back to the user
$client->messages->create(
    $_REQUEST['From'],
    array(
        'from' => 'whatsapp:+14155238886',
        'body' => $response
    )
);

?>
