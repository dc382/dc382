#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $user = $argv[1];
  $passwd = sha1($argv[2]);
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "Login";
$request['username'] = $user;
$request['password'] = $passwd;
$response = $client->send_request($request);
//$response = $client->publish($request);


echo $argv[0]." END".PHP_EOL;
