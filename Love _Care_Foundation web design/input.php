
<?php
// define variables and set to empty values
  $nameErr = $emailErr = $genderErr =$subjectErr = $phoneErr =$ageErr=$contactErr=$messageErr= "";
  $name = $email = $gender = $subject = $phone = $age = $contact= $message= "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = input($_POST["name"]);
           if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; 
          }

    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    }
     else {
      $email = input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
    }
      
    if (empty($_POST["phone"])) {
      $phoneErr = "Phone is required";
    } else {
      $phone = input($_POST["phone"]);
    }

    if (empty($_POST["subject"])) {
      $subjectErr = "Subject is required";
    } else {
      $subject = input($_POST["subject"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = input($_POST["gender"]);
    }
    if (empty($_POST["age"])) {
      $ageErr = "Age is required";
    } else {
      $age = input($_POST["age"]);
    }
    if (empty($_POST["contact"])) {
      $contactErr = "Contact is required";
    } else {
      $contact = ($_POST["contact"]);
    }
    if (empty($_POST["gender"])) {
      $messageErr = "Message is required";
    } else {
      $message = input($_POST["message"]);
    }
  }

  // sanitize sql
    // $sanitize=false;
    // $san =isset($_GET['name'])? $_GET['name'] : "";
    // if ($sanitize) {
    //     $name = addslashes($name);
    // }


  function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
// function allowed_get_params($allowed_params=[]){
//       $allowed_array=[];
//       foreach ($allowed_params as $param) {
//           if (isset($_POST[$param])) {
//               $allowed_array[$param]=$_POST[$param];
//           }
//           else {
//               $allowed_array[$param]=NULL;
//           }
//       }
//       return $allowed_array;
      
//     }

//my database connection from here
    $string = "mysql:dbname=loveandcare;host=localhost";
    $user = 'root';
    $password = '';
    try{
         $db = new PDO($string, $user, $password);
         
         
     }
     catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
         die();
     }


     if (isset($_POST['name'])
         &&isset($_POST['email'])
         &&isset($_POST['subject'])
         &&isset($_POST['phone'])
         &&isset($_POST['message'])
         &&isset($_POST['gender'])
         &&isset($_POST['contact'])) {
      
     
          $name = ($_POST['name']); 
          $email = ($_POST['email']); 
          $phone = ($_POST['phone']); 
          $subject = ($_POST['subject']); 
          $message = ($_POST['message']); 
          $age = ($_POST['age']); 
          $gender = ($_POST['gender']);
          $contact = ($_POST['contact']);
          $contact_method=implode(", ", $contact);
   

    }
     if(!empty($name)
      &&(!empty($email))
      &&(!empty($phone))
      &&(!empty($subject))
      &&(!empty($age))) {

      $result=$db->prepare("INSERT INTO contact
                                               (name, 
                                                email, 
                                                phone, 
                                                subject, 
                                                message, 
                                                age, 
                                                gender,
                                                contact, 
                                                datein)
                            VALUES
                                   (:name, 
                                    :email,
                                    :phone, 
                                    :subject, 
                                    :message, 
                                    :age, 
                                    :gender
                                    :contact_method
                                    now()
                                    )
                           ");


      $result->bindParam(':name',$name ,PDO::PARAM_STR);
      $result->bindParam(':email',$email,PDO::PARAM_STR);
      $result->bindParam(':phone',$phone,PDO::PARAM_INT);
      $result->bindParam(':subject',$subject,PDO::PARAM_STR);
      $result->bindParam(':message',$message,PDO::PARAM_STR);
      $result->bindParam(':age',$age,PDO::PARAM_INT);
      $result->bindParam(':gender',$gender,PDO::PARAM_STR);
      $result->bindParam(':contact_method',$contact_method,PDO::PARAM_STR);

      $result->execute();
      
      if ($result) {
        header("Location:response.php");
    }
    else{
        header("Location:response_err.php")
      }
    }
    else{
      header("Location:responseerr.php")
    } 

    

?>
