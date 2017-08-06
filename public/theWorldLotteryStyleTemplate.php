
<!DOCTYPE html>
<html>
<head>
	<title>The World Lottery Style Template</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/theWorldLottery.css">
</head>
<!-- need to put background hero video in body and fixed position -->
<body>
	<div id="header" class="header w100">
		<?php include 'headerTemplate.php' ?>
	</div>

	<div id="heroContainer" class="dropdown">
		<?php include 'heroAreaTemplate.php' ?>
	</div>

	<div id="spacer">
		<div id="quoteSpaceMaintainer">
			<div class='quote container text-center'>
		  		<p id='random_quote'></p>
			</div>
		</div>
	</div>

	<main id="content" class="w100">	
		<?php include 'mainContentTemplate.php' ?>
	</main>

	<script src="JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="JS/theWorldLottery.js"></script>
</body>
    
</html>













