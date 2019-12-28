	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cse311l_fall2019_tns1_-alpha-";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
		echo "Connected successfully";
		$sql = "SELECT * FROM `animes`";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) 
		{
			$results = mysqli_fetch_all($result, MYSQLI_ASSOC);
			echo $results;
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>