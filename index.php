<!DOCTYPE html>

<html>

<head>
	<title></title>
	
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
</head>

<body>

	<h2>contact us</h2>
	
	<form class="form" action="mail.php" method="POST">
		
		<p class="name">
			<input type="text" name="name" id="name" placeholder="" >
			<label for="name">Name</label>
		</p>
		
		<p class="email">
			<input type="text" name="email" id="email" placeholder="" />
			<label for="email">Email</label>
		</p>		
	
		<p class="text"> Message</p>
		<textarea name="message" rows="6" cols="25"></textarea><br />

		
		<p class="submit">
			<input type="submit" value="Send" />
		</p>
	</form>

</body>

</html>

