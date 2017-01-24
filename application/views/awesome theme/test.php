<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Who's my Server</title>
</head>
<body>

<h1>LOGIN<h1>

<?php

	echo form_open('main/login_validation');
	
	echo validation_errors();
	
	echo "<p>Username: ";
	echo form_input('username');
	echo "</p>";
	
	echo "<p>Password: ";
	echo form_password('password');
	echo "</p>";
	
	echo "</p>";
	echo form_submit('login_submit','Login');
	echo "</p>";

	echo form_close();
	


?>
</body>
</html>