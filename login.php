<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($_POST['submit']))
{
	$user = $_POST['username'];
	$passwd = $_POST['password'];

	/*if ($username == "admin" && $password == "mypassword")
	{
		$user = $username;
		$passwd = $password;
	} else {
		echo "Sorry, the login information was incorrect";
	}*/
}

$request = array();
$request['type'] = "Login";
$request['username'] = $user;
$request['password'] = $passwd;
$response = $client->send_request($request);
$response = $client->publish($request);


?>
