<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($_POST['submit']))
{
	$user = stripslashes($_POST['username']);
	$options = [
	'cost' => 12,
	];
	$passwd = password_hash(stripslashes($_POST['password']), PASSWORD_BCRYPT, $options);


//No database, circumvention for testing

	if ($_POST['username'] == "admin" && $_POST['password'] == "password")
	{
		echo "Welcome, you are now logged in";
		Header("Location: account.html");
	} else {
		echo "Sorry, the login information was incorrect";
		Header("Location: index.html");
	}
}

$request = array();
$request['type'] = "Login";
$request['username'] = $user;
$request['password'] = $passwd;
$response = $client->send_request($request);
//$response = $client->publish($request);


?>
