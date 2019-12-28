<?php

include "connection.php";

if(isset($_POST['edit_btn']))
{
	$edit_id=$_POST['edit_id'];
    $name=$_POST ['student_name'];
    $email=$_POST ['student_email'];
    $gender=$_POST ['student_gender'];
    $age=$_POST ['student_age'];

$updateSQL="UPDATE student_info SET name='$name', email='$email',gender=$gender,age=$age 

WHERE id=$edit_id";

if($conn->query($updateSQL)){
	header("location:../index.php");
}
else{
	die($conn->error);
}

}

if(isset($_GET['id']))
{
	$edit_id=$_GET['id'];

	$selectSQL="SELECT id, name, email, gender, age FROM student_info WHERE id= $edit_id";

	$result_info= $conn->query($selectSQL);
	
	if($result_info->num_rows > 0){

	while($row_student=$result_info->fetch_assoc()){


?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Edit</title>
  </head>
  <body>

		<!-- form start -->
	<div class="container">
	  <div class="row">
	  <div class="col-md-12">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="hidden" name="edit_id" value=" <?php 
             echo $edit_id;?>">
		  <label for="">Name</label>
		  <br>
		  <input type="text" name="student_name" placeholder="Enter Your Name" value="<?php echo $row_student['name']?>" required>
		  <br>
		  <label for="">Email</label><br>
		  <input type="email" name="student_email" placeholder="Enter Your Email" value="<?php echo $row_student['email']?>" required>
		  <br>
		  <label for="" >Gender </label>
		   <br>
		  <select name="student_gender" id="" >
			<option value="0" <?php 
			if($row_student['gender']==0)
			{
				echo "selected";
			}

			?> >Male</option>
			<option value="1"  <?php 
			if($row_student['gender']==1)
			{
				echo "selected";
			}

			?>>female</option>
		  </select>
		  <br>
		 
		  <label for="">Age</label>
		   <br>
		  <input type="number" name="student_age" placeholder="Enter Your Age" value="<?php echo $row_student['age']?>" required>
		  <br>
		  <br>

		  

		  <input type="submit" name="edit_btn" value="Update">
		</form>
		<br>
	  </div>
	  </div>
	</div>

	  <!-- jQuery first-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php 

   }

    }else{
    header("location:../index.php");
}

}

else{
	header("location:../index.php");
} 

?>