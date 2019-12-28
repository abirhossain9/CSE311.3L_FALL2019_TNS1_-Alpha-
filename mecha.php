	<?php
		include_once 'includes/dbh.inc.php';
	?>
<!DOCTYPE html>
<html>
<head>

<title>Mecha animes</title>
</head>
<body>
<h3>All Mecha Animes</h3>
</body>
</html>
<?php
	$sql = "SELECT * FROM `animes` WHERE Genere_Name LIKE Mecha" ;
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