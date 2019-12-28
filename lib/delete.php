<?php
include"connection.php";

if(isset($_GET['id'])){
	
	$delete_id = $_GET['id'];

	$deleteSQL="DELETE FROM student_info WHERE id= $delete_id";
	
	if ($conn->query($deleteSQL)) {
		header("location:../index.php");

	}
	else
	{
		die($conn->error);
	}

}

else
{
	header("location:../index.php");
}

?>