	<?php
		include_once 'includes/dbh.inc.php';
	?>
<!DOCTYPE html>
<html>
<head>

<title>Romantic animes</title>
</head>
<body>
<!-- navabar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="index.html">Anime Database</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Anime
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item sh" href="action.php">Action</a>
          <a class="dropdown-item sof" href="adventure.php">Adventure</a>
          <a class="dropdown-item mys" href="comedy.php">Comedy</a>
		  <a class="dropdown-item mys" href="drama.php">Drama</a>
		  <a class="dropdown-item mys" href="fantasy.php">Fantasy</a>
		  <a class="dropdown-item mys" href="horror.php">Horror</a>
		  <a class="dropdown-item mys" href="mecha.php">Mecha</a>
		  <a class="dropdown-item mys" href="mystery.php">Mystery</a>
		  <a class="dropdown-item mys" href="romance.php">Romance</a>
		  <a class="dropdown-item mys" href="sci.php">Science Fiction</a>
		  <a class="dropdown-item mys" href="sol.php">Slice Of Life</a>
		  <a class="dropdown-item mys" href="shn.php">Shounen</a>
		  <a class="dropdown-item mys" href="shj.php">Shoujo</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Support And contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- navbar finish -->
<h3>All Romantic Animes</h3>
</body>
</html>
<?php
	$sql = "SELECT * FROM `animes` WHERE Genere_Name LIKE Romance" ;
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