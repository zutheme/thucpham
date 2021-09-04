<?php
require_once realpath(__DIR__) . '/Autoload.php';

TechAPIAutoloader::register();

use TechAPI\Constant;
use TechAPI\Client;
use TechAPI\Auth\ClientCredentials;

// config api
Constant::configs(array(
    'mode'            => Constant::MODE_LIVE,
    //'mode'            => Constant::MODE_SANDBOX,
    'connect_timeout' => 15,
    'enable_cache'    => false,
    'enable_log'      => true,
    'log_path'    => realpath(__DIR__) . '/logs'
));


// config client and authorization grant type
function getTechAuthorization()
{    
    $client = new Client(
        '196beeac4e2fEEbba9681e5F10168Aaebd094711',
        'af3bfA5517553198c77a9C2629efF3f2b8597f7B70236a1917f4A49efe85Da8b8d7a3869',
        //array('send_mt_active') 
        array('send_brandname', 'send_brandname_otp')
    );
    
    return new ClientCredentials($client);
}