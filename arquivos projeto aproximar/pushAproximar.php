<?php

// Put your device token here (without spaces):
$deviceTokenJaderIpod = '0fd9f0cab3d8a099d8438ac65cd0ed9abf04306e1dd20beccedf9cd795fc1d2d';
$deviceTokenJaderIpad = '44e8dca055afdd8b8cc51e5667d08baf89eaf38cf0b71d5ef1ee6245d9171e64';

$deviceToken = $deviceTokenJaderIpod;
//$deviceToken = $deviceTokenJaderIpad;

//$deviceToken = trim($deviceToken);

// Put your private key's passphrase here:
$passphrase = '1234';

// Put your alert message here:
$message = 'My first push notification!';

////////////////////////////////////////////////////////////////////////////////

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', './filesAproximarPush/ck.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
$body['aps'] = array(
	'alert' => $message,
	'sound' => 'default'
	);

// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo 'Message not delivered' . PHP_EOL;
else
	echo 'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
fclose($fp);
