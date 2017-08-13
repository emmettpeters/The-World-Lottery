<?php

require_once "../twl_login.php";
require_once "../db_connect.php";
require_once "functions.php";



function pageController($dbc){
	$data=[];

	//searching for all users
	$query = 'SELECT * FROM twl_users';
	$stmt = $dbc->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($result);

	if (!empty($_REQUEST) && (inputGet('username') !== "") && (inputGet('password') !== "") && (inputGet('email') !== "")){
		echo "it fired!";

		$username = inputGet('username');
		$password = inputGet('password');
		$email = inputGet('email');
		$create_date = date('Y-m-d');
		if (inputHas('emailList')){
			$on_email_list = 1;
		} else {
			$on_email_list = 0;
		};
		$query = "INSERT INTO twl_users (username,password,email,create_date,on_email_list)
		VALUES(?,?,?,?,?)";

		$stmt = $dbc->prepare($query);

		$stmt->execute(array($username,$password,$email,$create_date,$on_email_list));

	}

	return $data;
}

extract(pageController($dbc));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login/Register</title>
</head>
<body>
<h1>The World Lottery</h1>
	<form method="GET">
		<label>Username<input id="username" name="username"></label><br>
		<label>Password<input id="password" name="password"></label><br>
		<label>Email<input id="email" name="email"></label><br>
		<label>Join Email List<input name="emailList"type="checkbox" checked></label><br>
		<button type="submit">Register</button>
	</form>
</body>
</html>