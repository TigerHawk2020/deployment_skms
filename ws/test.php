<?php 

echo "TEST<br />";

$host = "smtp.ver.ifsneutral.com";

$socket = fsockopen($host, 587, $errno, $errstr, 10);
if (!$socket) {
	echo "ERROR: ". $host . " 587 - $errstr ($errno) <br />";
} else {
	echo "SUCCESS: ". $host . " 587 - OK <br />";
}

$socket = fsockopen($host, 25, $errno, $errstr, 10);
if (!$socket) {
	echo "ERROR: ". $host . " 25 - $errstr ($errno) <br />";
} else {
	echo "SUCCESS: ". $host . " 25 - OK <br />";
}

?>