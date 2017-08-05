<?php

require "functions.php";
require "User.php";

function pageController(){
	$data = [];
	$message = "";
	$data['message']="";
	$fileName = "userDataBase.log";

	$handle = fopen($fileName, 'r');
	$contents = trim(fread($handle, filesize($fileName)));
	$contentsArray = explode("\n", $contents);
	fclose($handle);

	foreach($contentsArray as $key => $user)
	{
		$userString = substr($user, 1, -1);
		$userArray = explode(",", $userString);
		$usersArray[] = substr($userArray[0],12,-1);
		$emailsArray[] = substr($userArray[2],9,-1);	
	}

	if(!empty($_POST))
	{
		if ((inputGet('userName') === "") || (inputGet('password') === "") || (inputGet('email') === "")){
			$data['message'] = "USERNAME, PASSWORD and EMAIL<br>are required to register a new account";
			return $data;

		} else if ((inputGet('userName') !== "") || (inputGet('password') !== "") || (inputGet('email') !== ""))
		{
			if (in_array(inputGet('userName'),$usersArray) && inputGet('userName') !== null){
				$data['message']="Username has already been taken";
				return $data;
			}

			if (in_array(inputGet('email'),$emailsArray) && inputGet('email') !== null){
				$data['message']="Email has already been taken";
				return $data;
			}

			if(!in_array(inputGet('userName'),$usersArray) && !in_array(inputGet('email'),$emailsArray))
			{
				$userName = inputGet('userName');
				$email = inputGet('email');
				$password = inputGet('password');
				$rememberuserName = inputGet('rememberuserNameY');
				$onEmailList = inputGet('onEmailListY');

				if($rememberuserName===0){
					$rememberuserNameVal = false;
				} else {
					$rememberuserNameVal = true;
				}
				if($onEmailList===0){
					$onEmailListVal = false;
				} else {
					$onEmailListVal = true;
				}
				$newUser = new User($userName,$password,$email,$onEmailListVal,$rememberuserNameVal);
				append($fileName,json_encode($newUser) . PHP_EOL);
				
			}
		}
	}
	





	// if (($userName == "") && ($password == "pass") && ($email == "ejp8611@gmail.com")){
	// 	header("Location:authorizeTWL.php");
	// 	end();
	// } else {
	// 	$message = "You do not have proper access rights to login";
	// }

	// $data["message"] = $message;

	return $data;

}

extract(pageController());


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Practice Lotto Raffles</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/worldlottery.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
		<style type="text/css">
			
		</style>
	</head>
	<body  id="entirebody">
		<br>
		<div id='centeringbox'>
			<main id='main'>
				<div id="border1">
					<h1><p class="whitetext" id="top"><em>The World Lottery</em></p></h1>
				</div>
				<br>
				<div id="border2">
					<h2>
						<a class="eee" id="l1">All of Earth</a><br>
						<a class="eee" id="l2">All MAJOR currencies</a><br>
						<a class="eee" id="l3">The BIGGEST prizes ever awarded!</a>
					</h2>
					<p id="bitcoin">( Cryptocurrency capability coming soon!!! )</p>
						<p>
							<span id="l5">Proceeds go to selected Charities and Human Interest Projects</span>
						</p>
						<p id="l4">-------------------------------------------------------------------------</p>
						<h3 id="errorMessage"><?= $message ?></h3>
					<form id="form1" method="POST" action="?">
						<p>
							<label for="userName"><input type="text" id="userName" placeholder="UN" name="userName"><p>------- username -------</p></label>
						</p>
						<p>
							<label for="password"><input type="password" id="password" placeholder="PW" name="password"><p>------- password -------</p></label>
						</p>
						<p>
							<label for="email"><input type="email" id="email" placeholder="EMAIL" name="email"><p>------- email -------</p></label>
						</p>
						<p>
							<button class="btn btn-primary" id="createacct" type="submit">Creat account / Sign In</button>
							<button class="btn btn-secondary"><a href="http://www.google.com" target=_"blank">View the games without an acct</a></button>
						</p>
						<p id="personalinfo">*Your personal info will only ever be viewable/editable by you
						</p>
						<p>
							<label id="emaillist" for="email"><input type="checkbox" id="email" name="onEmailListY" value="Y" checked>Join email list</label>
							<label id="rememberuserName" for="remember"><input type="checkbox" id="remember" name="rememberuserNameY" value="Y" checked>Remember my userName</label>
						</p>
					</form>
					<summary>
						<p>
							<a class="linkage" href="http://www.google.com" target=_blank><em>World Lottery Information</em></a>
						</p>
						<p>
							<a class="linkage" href="#top"><em>Top of page</em></a>
						</p>
					</summary>
				</div>
			</main>
		</div>
	</body>
	<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</html>