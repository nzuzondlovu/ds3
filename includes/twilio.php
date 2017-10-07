<?php

require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;

$sid = 'AC2206a30e3daefec792b395fb89533404';
$token = '724b617c8cf343b1c7d07c570b0cc28c';
$client = new Client($sid, $token);

$client->messages->create(
    '+27'.$cell,
    array(

        'from' => '+12014904916',

        'body' => "$message"
        )
    );
?>