<?php 

 if(isset($_POST['submit']))
{

   $name= $_POST['name'];
   $mailfrom= $_POST['mailfrom'];
   $message= $_POST['message'];


   $mailTo="nabilalshad01@gmail.com"
    $headers= "From ".  $mailfrom ;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;
   mail($mailTo,  $txt, $headers);
   header("Location: index.php?mailsend");

}

?>