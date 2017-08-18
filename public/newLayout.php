<?php


?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/newLayout.css">
	<title>New Layout</title>
</head>
<body>
	<!-- header to template later -->
	
<?php include "newLayoutHeader.php"; ?>
<br>
<div class="container">
	<div class="row" id="links">
		<input name="username" placeholder="Username"><input placeholder="Password" type="password" name="password"><input placeholder="Email" type="email" name="email">
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div id="partOne" class="mainParts">
			<h4>Game Area</h4><hr>
		</div>
		<div id="partTwo" class="mainParts">
			<div id="heightMaint">
				<h4>Chat Area</h4><hr>
				<div id='chatContent'>
				</div>
			</div>
			<form method="POST">
				<input id="chatInput" name="chatInput" placeholder="Say Something">
			</form>
			<div id="partThree" class="mainParts">
				<h4>Other Area</h4><hr>
			</div>
		</div>
	</div>
</div>



<?php include "newLayoutFooter.php"; ?>	

</body>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
	
	$(function(){
	    var x = 0;
	    setInterval(function(){
	        x-=1;
	        $('body').css('background-position', x + 'px 0');
	    }, 80);
	});
</script>

</html>















