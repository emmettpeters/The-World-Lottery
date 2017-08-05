<?php

require "functions.php";
require "User.php";

function pageController(){
	$data = [];
	$message = "";
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

	var_dump($usersArray);
	var_dump($emailsArray);

	if(!empty($_POST))
	{
		if ((inputGet('userName') === "") || (inputGet('password') === "") || (inputGet('email') === "")){
			$data['message'] = "userName, password and email are required to register";
			return $data;

		} else if ((inputGet('userName') !== "") || (inputGet('password') !== "") || (inputGet('email') !== "")){

			
			if(in_array(inputGet('userName'),$usersArray) && in_array(inputGet('email'),$emailsArray)){
				echo "its not in the array";
			}

			$userName = inputGet('userName');
			$password = inputGet('password');
			$email = inputGet('email');
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
			$data['message'] = "You filled out all the areas correctly!";

		}
	}
	





	// if (($userName == "") && ($password == "pass") && ($email == "ejp8611@gmail.com")){
	// 	header("Location:authorizeTWL.php");
	// 	end();
	// } else {
	// 	$message = "You do not have proper access rights to login";
	// }

	$data["message"] = $message;

	return $data;

}

extract(pageController());


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Practice Lotto Raffles</title>
		<link rel="stylesheet" href="css/worldlottery.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
		<style type="text/css">
			input{
				text-align:center;
			}

			body{
				background-color:lightgrey;
			}
		</style>
	</head>
	<body id="entirebody">
		<div id='centeringbox'>
			<main id='main'>
				<div id="border1">
					<h1><p class="whitetext">The <a id="top" class="world">World</a> Lottery</p></h1>
				</div>
				<br>
				<div id="border2">
					<h2>
						<a class="eee" id="l1">ALL of Earth,</a><br>
						<a class="eee" id="l2">ALL major currencies,</a><br>
						<a class="eee" id="l3">The BIGGEST prizes ever awarded!</a>
					</h2>
					<p id="bitcoin">(Cryptocurrency capability coming soon!!!)</p>
						<a id="l4">-------------------------------------------------------------------------</a>
						<h3><?= $message ?></h3>
					<form id="form1" method="POST" action="?">
						<p>
							<label for="userName"><input type="text" id="userName" placeholder="userName" name="userName"><p>------- userName -------</p></label>
						</p>
						<p>
							<label for="password"><input type="password" id="password" placeholder="PW" name="password"><p>------- Password -------</p></label>
						</p>
						<p>
							<label for="email"><input type="email" id="email" placeholder="EMAIL" name="email"><p>------- Email -------</p></label>
						</p>
						<p>
							<button id="createacct" type="submit">Creat account / Sign In</button>
							<button><a href="http://www.google.com" target=_"blank">View the games without an acct</a></button>
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
						<p>
							<a id="l5">Proceeds go to selected Charities and Human Interest Projects</a>
						</p>
					</summary>
				</div>
			</main>
		</div>
	</body>
</html>