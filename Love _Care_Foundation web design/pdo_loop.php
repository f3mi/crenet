<?php
    try{
   require_once'pdo_connect.php';
   $sql= 'SELECT id, name, email, phone, subject, message, age, gender, contact, datein FROM contact ORDER BY id';
   $result=$db->query($sql);

   //set fetch mode
   $result->setFetchMode(PDO::FETCH_OBJ); 
   $errorInfo=$db->errorInfo();

   //print_r($errorInfo); 
   $numrows = $result->rowCount();
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
<body>

	<header class="border" style="background-color:gray">
		<img src="image/logo.jpg" class="img border" alt="logo" width="55" >
	</header><br><br/> 
<?php if (isset($error)){
  echo "<p>$error</p>";
}
 
?>
<div class="row">
  <div class="col-lg-2 text-center" style="background-color:#eee;">
    <br><br/>
    
    <h2>Dashboard</h2>
    <br></br>
    <p>Welcome Admin</p>
    <?php echo "<strong><p>Total table results: $numrows</strong></p>"?>
    <br><br/>
    <form>
      <input type="Search" name="search" placeholder="Search">
      <button class="btn btn-primary">Search</button>
    </form>
    <br><br/>
    LINKS
    <a href="index.php"><p>Visit Main Site</p></a>
    <a href="#"><p>View Volunteers</p></a>
    <a href="#"><p>Logout</p></a>
  </div>
  <div class="col-lg-10 ">
  
  
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
        <th>Action</th>
        <th>Action</th>
        
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

    	<td><a href="edit.php?id='.$row->id.'"><button class="btn btn-primary" value="">Edit</button></a></td>
    	<td><a href="delete.php?id='.$row->id.'"><button class="btn btn-danger">Delete</button></a></td>
      
    	</tr>
    <?php } ?>
    </tbody>

    
  </table>
  </div>
</div>

</body>
</html>
