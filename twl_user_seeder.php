<?php

require_once "twl_login.php";
require_once "db_connect.php";

$statement = 'INSERT INTO twl_users (username,password,email,create_date,create_time,on_email_list)
VALUES($username,$password,$email,$create_date,$create_time,$on_email_list)';

$dbc->exec($statement);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>