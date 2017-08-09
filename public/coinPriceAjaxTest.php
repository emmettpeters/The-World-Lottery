<?php 

require "functions.php";

function pageController(){
	$data=[];
	$message = "";
	$tag = "";
	$multiplier = 1;
	var_dump(inputGet('currency'));
	$ticketCount = inputGet('ticketCount');

	if (inputHas('ticketCount') && (inputGet('ticketCount')==="")){
		header('Location:coinPriceAjaxTest.php');
	} else {
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
		}
		$total = $ticketCount * $multiplier;
		$message = "You have purchased " . $ticketCount . " tickets. Total cost is " . $total . " " . $tag;   

		
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
		<!-- <label>USD to LTC -> <span id="usdLTC"></span></label><br>
		<label>USD to BCC -> <span id="usdBCC"></span></label><br>
		<label>USD to EUR -> <span id="usdEUR"></span></label><br>
		<label>USD to JPY -> <span id="usdJPY"></span></label><br>
		<label>USD to GBP -> <span id="usdGBP"></span></label><br>
		<label>USD to CHF -> <span id="usdCHF"></span></label><br>
		<label>USD to CAD -> <span id="usdCAD"></span></label><br>
		<label>USD to AUD -> <span id="usdAUD"></span></label><br>
		<label>USD to NZD -> <span id="usdNZD"></span></label><br>
		<label>USD to ZAR -> <span id="usdZAR"></span></label><br> -->
	</div>
	<form method="GET">
		<label>How many tickets? (Integers Only)<input name="ticketCount" val=""></label><br>
		<label>USD to BTC -> <input id="usdBTC" name="usdBTC"></label><br>
		<label>USD to ETH -> <input id="usdETH" name="usdETH"></label><br>
		<select name="currency">
			<option name="currency" value="USD">USD - Dollar</option>
			<option name="currency" value="BTC">Bitcoin</option>
			<option name="currency" value="ETH">Etherium</option>
			<!-- <option name="currency" value="LTC">Litecoin</option>
			<option name="currency" value="BCC">Bitcoin Cash</option>
			<option name="currency" value="EUR">EUR - Euro</option>
			<option name="currency" value="JPY">JPY - Yen</option>
			<option name="currency" value="GBP">GBP - Pound</option>
			<option name="currency" value="CHF">CHF - Frank</option>
			<option name="currency" value="CAD">CAD - Canadian Dollar</option>
			<option name="currency" value="AUD">AUD - Australian Dollar</option>
			<option name="currency" value="NZD">NZD - New Zeland Dollar</option>
			<option name="currency" value="ZAR">ZAR - South African Rand</option> -->
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
			// console.log(response.BTC);
			$('#usdBTC').val(response.BTC);
			$('#usdETH').val(response.ETH);
			// $ltcConvert = response.LTC;
			// $bccConvert = response.BCC;
			// $eurConvert = response.EUR;
			// $jpyConvert = response.JPY;
			// $gbpConvert = response.GBP;
			// $chfConvert = response.CHF;
			// $cadConvert = response.CAD;
			// $audConvert = response.AUD;
			// $nzdConvert = response.NZD;
			// $zarConvert = response.ZAR;

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$('#ajaxCall').click(function(){
		coinPriceConversion();
		// $('#usdBTC').text($btcConvert);
		// $('#usdETH').text($ethConvert);
		// $('#usdLTC').text($ltcConvert);
		// $('#usdBCC').text($bccConvert);
		// $('#usdEUR').text($eurConvert);
		// $('#usdJPY').text($jpyConvert);
		// $('#usdGBP').text($gbpConvert);
		// $('#usdCHF').text($chfConvert);
		// $('#usdCAD').text($cadConvert);
		// $('#usdAUD').text($audConvert);
		// $('#usdNZD').text($nzdConvert);
		// $('#usdZAR').text($zarConvert);

	})
</script>

</html>

