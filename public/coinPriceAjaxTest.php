<?php 

require "functions.php";

function pageController(){
	$data=[];
	$message = "";
	$tag = "";
	$multiplier = 1;

	if (inputGet('ticketCount') ===""){
		$ticketCount = 0;
		$data['message'] = "Please select the amount of tickets you would like to purchase.";
		return $data;
	} else {
		$ticketCount = inputGet('ticketCount');
		$btcConv = inputGet('usdBTC');
		$ethConv = inputGet('usdETH');
		switch (inputGet('currency')){
			case "USD":
			$tag = "US Dollars";
			$multiplier = 1;
			break;
			case "BTC":
			$tag = "Bitcoin";
			$multiplier = inputGet('usdBTC');
			break;
			case "ETH":
			$tag = "Etherium";
			$multiplier = inputGet('usdETH');
			break;
			case "LTC":
			$tag = "Litecoin";
			$multiplier = inputGet('usdLTC');
			break;
			case "BCC":
			$tag = "Bitcoin Cash";
			$multiplier = inputGet('usdBCC');
			break;
			case "EUR":
			$tag = "Euro";
			$multiplier = inputGet('usdEUR');
			break;
			case "JPY":
			$tag = "Yen";
			$multiplier = inputGet('usdJPY');
			break;
			case "GBP":
			$tag = "Pound";
			$multiplier = inputGet('usdGBP');
			break;
			case "CHF":
			$tag = "Frank";
			$multiplier = inputGet('usdCHF');
			break;
			case "CAD":
			$tag = "Canadian Dollar";
			$multiplier = inputGet('usdCAD');
			break;
			case "AUD":
			$tag = "Australian Dollar";
			$multiplier = inputGet('usdAUD');
			break;
			case "NZD":
			$tag = "New Zeland Dollar";
			$multiplier = inputGet('usdNZD');
			break;
			case "ZAR":
			$tag = "South African Rand";
			$multiplier = inputGet('usdZAR');
			break;
		}
		$total = $ticketCount * $multiplier;
		$message = "Confirm your purchase of " . $ticketCount . " tickets. Total cost is " . $total . " " . $tag;	
	}
	$data['message'] = $message;	
	return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Coin price ajax test</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="ajaxTest">
	<h1><?= $message ?></h1>
		<button id='ajaxCall'><h1>Ajax test</h1></button><br>
	</div>
	<form method="POST">
		<label>How many tickets? (Integers Only)<input name="ticketCount" val=""></label><br>
		<label>USD to BTC -> <input id="usdBTC" name="usdBTC"></label><br>
		<label>USD to ETH -> <input id="usdETH" name="usdETH"></label><br>
		<label>USD to LTC -> <input id="usdLTC" name="usdLTC"></label><br>
		<label>USD to BCC -> <input id="usdBCC" name="usdBCC"></label><br>
		<label>USD to EUR -> <input id="usdEUR" name="usdEUR"></label><br>
		<label>USD to JPY -> <input id="usdJPY" name="usdJPY"></label><br>
		<label>USD to GBP -> <input id="usdGBP" name="usdGBP"></label><br>
		<label>USD to CHF -> <input id="usdCHF" name="usdCHF"></label><br>
		<label>USD to CAD -> <input id="usdCAD" name="usdCAD"></label><br>
		<label>USD to AUD -> <input id="usdAUD" name="usdAUD"></label><br>
		<label>USD to NZD -> <input id="usdNZD" name="usdNZD"></label><br>
		<label>USD to ZAR -> <input id="usdZAR" name="usdZAR"></label><br>
		<select name="currency">
			<option name="currency" value="USD">USD - Dollar</option>
			<option name="currency" value="BTC">BTC - Bitcoin</option>
			<option name="currency" value="ETH">ETH - Etherium</option>
			<option name="currency" value="LTC">LTC - Litecoin</option>
			<option name="currency" value="BCC">BCC - Bitcoin Cash</option>
			<option name="currency" value="EUR">EUR - Euro</option>
			<option name="currency" value="JPY">JPY - Yen</option>
			<option name="currency" value="GBP">GBP - Pound</option>
			<option name="currency" value="CHF">CHF - Frank</option>
			<option name="currency" value="CAD">CAD - Canadian Dollar</option>
			<option name="currency" value="AUD">AUD - Australian Dollar</option>
			<option name="currency" value="NZD">NZD - New Zeland Dollar</option>
			<option name="currency" value="ZAR">ZAR - South African Rand</option>
		</select>
		<button type='submit'>Submit</button>
	</form>
</body>
<script src="JS/jquery-3.2.1.js"></script>
<script>
	function coinPriceConversion(){
		$.ajax({
			url: 'https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=BTC,ETH,LTC,BCC,EUR,JPY,GBP,CHF,CAD,AUD,NZD,ZAR',
			type: 'GET',
			dataType: 'json'
		})
		.done(function(response) {
			console.log("success");
			$('#usdBTC').val(response.BTC);
			$('#usdETH').val(response.ETH);
			$('#usdLTC').val(response.LTC);
			$('#usdBCC').val(response.BCC);
			$('#usdEUR').val(response.EUR);
			$('#usdJPY').val(response.JPY);
			$('#usdGBP').val(response.GBP);
			$('#usdCHF').val(response.CHF);
			$('#usdCAD').val(response.CAD);
			$('#usdAUD').val(response.AUD);
			$('#usdNZD').val(response.NZD);
			$('#usdZAR').val(response.ZAR);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	coinPriceConversion();

	$('#ajaxCall').click(function(){
		coinPriceConversion();
	})

	setInterval(function(){
		coinPriceConversion();
	},300000)
</script>

</html>

