<?php
    try{
   require_once'pdo_connect.php';
  }
   catch(Exception $e){
   $error = $e->getMessage();

   } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Love and Care Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-color:gray">
	<header class="border" style="background-color:white">
		<img src="image/logo.jpg" class="img border" alt="logo" width="55" >
	</header>
	<br><br/>
	<div>
		<form class="text-center">
			<textarea cols="100" rows="20" name="textarea" placeholder="reply with a message"></textarea>
			<br><br/>
			<input type="text" name="text" span="6" />
			<button class="btn btn-success">Send</button>
			
		</form>
	</div>
</body>
</html>