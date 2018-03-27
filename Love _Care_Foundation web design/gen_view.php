<?php
    try{
   require_once'pdo_connect.php';
   $sql= 'SELECT id, name, email, phone, subject, message, age, gender, contact, datein FROM contact ORDER BY id';
   $result=$db->query($sql);

   //set fetch mode
   $result->setFetchMode(PDO::FETCH_OBJ); 
   $errorInfo=$db->errorInfo();

   
  }  
   catch(Exception $e){
   $error = $e->getMessage();

   } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Love and Care View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

	<header class="border" style="background-color:gray">
		<img src="image/logo.jpg" class="img border" alt="logo" width="55" >
	</header><br><br/> 
<?php if (isset($error)){
  echo "<p>$error</p>";
}
 
?>

  <div class="col-lg-12 ">
  
  
  <table class="table table-striped">
    <thead class="thead-dark">

      <tr>
        <th>S/N</th> 
        <th>Name</th> 
        <th>Email</th>
        <th>Phone</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Contact Method</th>
        <th>Date</th>
        
      </tr>
    </thead>
    
    <?php while($row = $result-> fetch()) { ?>
        
    <tbody>
    	<tr>
    		<td><?php echo $row->id ;?></td>
    		<td><?php echo $row->name;?></td>
    		<td><?php echo $row->email;?></td>
    		<td><?php echo $row->phone;?></td>
    		<td><?php echo $row->subject;?></td>
    		<td><?php echo $row->message;?></td>
    		<td><?php echo $row->age;?></td>
    		<td><?php echo $row->gender;?></td>
        <td><?php echo $row->contact;?></td>
    		<td><?php echo $row->datein;?></td>
      
    	</tr>
    <?php } ?>
    </tbody>

    
  </table>
  </div>
</div>

</body>
</html>
