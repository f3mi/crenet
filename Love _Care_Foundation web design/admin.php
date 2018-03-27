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

<div class="row">
  <div class="col-lg-2 text-center" style="background-color:rgb();">
    
    <h2>Welcome User</h2>
  </div>
  <div class="col-lg-10 col-md-12">
  
              
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
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
    <?php
    $connect=mysqli_connect('localhost','root','','loveandcare');
     if(mysqli_connect_errno($connect)){
     	echo "failed to connect to database".mysqli_connect_errno();
     }
     $result=mysqli_query($connect,"SELECT * FROM contact");
    ?>
    <?php while($row= mysqli_fetch_array($result)):?>
    <tbody>
    	<tr>
    		<td><?php echo $row['id'];?></td>
    		<td><?php echo $row['name'];?></td>
    		<td><?php echo $row['email'];?></td>
    		<td><?php echo $row['phone'];?></td>
    		<td><?php echo $row['subject'];?></td>
    		<td><?php echo $row['message'];?></td>
    		<td><?php echo $row['age'];?></td>
    		<td><?php echo $row['gender'];?></td>
        <td><?php echo $row['contact'];?></td>
    		<td><?php echo $row['datein'];?></td>
    		<td><a href=""><button class="btn btn-primary">View</button></a></td>
    		<td><a href=""><button class="btn btn-primary">Reply</button></a></td>
    		<td><a href=""><button class="btn btn-danger">Delete</button></a></td>
    	</tr>
    <?php endwhile;?>
    </tbody>

    
  </table>
  </div>
</div>

</body>
</html>