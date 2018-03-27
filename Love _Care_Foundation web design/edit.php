
<?php
    try{
   require_once'pdo_connect.php';
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $edit=$_GET['id'];
   $sql= 'SELECT id, name, email, phone, subject, message, age, gender, contact, datein FROM contact WHERE id=' . $edit . ' LIMIT 1';
   $result=$db->query($sql);
   // $result->bindValue(":id", $edit);

   //set fetch mode
   $result->setFetchMode(PDO::FETCH_OBJ); 
   $errorInfo=$db->errorInfo();
  }  
   catch(Exception $e){
   $error = $e->getMessage();

   } 
     while ( $row=$result-> fetch()) {
     $id= $row->id ;
	 $name=  $row->name;
     $email=$row->email;
	 $phone= $row->phone;
	 $subject=$row->subject;
	 $message=$row->message;
     $age=$row->age;
	 $gender=$row->gender;
	 $contact=$row->contact;
	 $datein=$row->datein;
     };
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Record Update</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-striped">
    <thead>

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
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
    	<tr>
    		<td><input type="text" name="id" value="<?php echo $id;?>"></td>
    		<td><input type="text" name="name" value="<?php echo $name;?>"></td>
    		<td><input type="text" name="email" value="<?php echo $email;?>"></td>
    		<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
    		<td><?php echo $subject;?></td>
    		<td><?php echo $message;?></td>
    		<td><?php echo $age;?></td>
    		<td><?php echo $gender;?></td>
            <td><?php echo $contact;?></td>
    		<td><?php echo $datein;?></td>

    		<td><a href=""><button class="btn btn-primary">Update</button></a></td>
    		<td><a href=""><button class="btn btn-danger">Delete</button></a></td>
    		
    	</tr>
    
    </tbody>

</body>
</html>
