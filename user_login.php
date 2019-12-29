<?php


include"lib/connection.php";
$result="";
if(isset($_POST['add_btn']))
{
  $name=$_POST['user_name'];
  $email=$_POST['user_email'];
  $gender=$_POST['user_gender'];
  $age=$_POST['user_age'];
  $pass=md5($_POST['user_pass']);
  $cpass=md5($_POST['user_cpass']);

  if($pass==$cpass){
  $insertSQL= "INSERT INTO user_info(name, email, gender, age, pass)  
  VALUES('$name', '$email', $gender, $age, '$pass')";
  if($conn->query($insertSQL)){
  $result="data added successfully";
}
else
{
  die($conn->error);
} 

}

  else{
 $result = "password not matched";

}

}
$selectSQL= "SELECT * FROM user_info";
$result_users= $conn->query($selectSQL);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CRUD</title>
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
    <!-- form start -->
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <label for="">Name</label>
          <br>
          <input type="text" name="user_name" placeholder="Enter Your Name" required>
          <br>
          <label for="">Email</label><br>
          <input type="email" name="user_email" placeholder="Enter Your Email" required>
          <br>
          <label for="">Gender</label>
           <br>
          <select name="user_gender" id="">
            <option value="0" selected>Male</option>
            <option value="1">female</option>
          </select>
          <br>
         
          <label for="">Age</label>
           <br>
          <input type="number" name="user_age" placeholder="Enter Your Age" required>
          <br>

          <label for="">Password</label>
           <br>
           <input type="password" name="user_pass" placeholder="Enter Your password" required>
          <br>
          <label for="">Confirm password</label>
           <br>
           <input type="password" name="user_cpass" placeholder="Confirm Your password " required>
          <br>
          <br>

          <input type="submit" name="add_btn" value="click here">
        </form>
        <br>
      </div>
      </div>
    </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      echo $result;

      ?>
    </div>
  </div>
  
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table border="1" cellpadding="10">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Action</th>

        </tr>
<?php if($result_users->num_rows>0){ ?>
<?php while ($user_row=$result_users->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $user_row['name']; ?></td>
          <td><?php echo $user_row['email']; ?></td>
          <td><?php if($user_row['gender']==0){
            echo "Male";
          } 
          else{
          echo "Female";
        }?>
          
        </td>
          <td><?php echo $user_row['age']; ?></td>
          <td>
            <a href="lib/edit.php?id=<?php 
            echo $user_row['id'];
            ?>">Edit</a>
            <a href="lib/delete.php?id=<?php
            echo $user_row['id'];

            ?> ">Delete</a>

          </td>
        </tr>
        <?php } ?>
<?php } else { ?>

<tr>
          <td colspan="5"> No user Data to show</td>
        
        </tr>

<?php } ?>
      </table>
    </div>
  </div>
</div>
    <!-- form end -->
    
    <!-- jQuery first-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>