	<?php
		include_once 'includes/dbh.inc.php';
	?>
<!DOCTYPE html>
<html>
<head>

<title>Fantasy animes</title>
</head>
<body>
<h3>All Fantasy Animes</h3>
</body>
</html>
<?php
	$sql = "SELECT * FROM `animes` WHERE Genere_Name LIKE Fantasy" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Anime_ID"]. " - Name: " . $row["Anime_Name"]. " " .$row["Anime_Cover_Picic"] "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>