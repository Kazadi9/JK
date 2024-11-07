<?php  

# Check if all required fields are submitted
if(isset($_POST['username']) &&
   isset($_POST['name']) &&
   isset($_POST['phone']) &&
   isset($_POST['sexe']) &&
   isset($_POST['password']) &&
   isset($_POST['fonction'])) {

   # Database connection file
   include '../db.conn.php';
   
   # Get data from POST request and store them in variables
   $name = $_POST['name'];
   $username = $_POST['username'];
   $phone = $_POST['phone'];
   $sexe = $_POST['sexe'];
   $password = $_POST['password'];
   $fonction = $_POST['fonction'];

   # Making URL data format
   $data = 'name='.$name.'&username='.$username;

   # Simple form validation
   if (empty($name)) {
      $em = "Name is required";
      header("Location: ../../signup.php?error=$em");
      exit;
   } else if(empty($username)) {
      $em = "Username is required";
      header("Location: ../../signup.php?error=$em&$data");
      exit;
   }  else if(empty($phone)) {
      $em = "Phone number is required";
      header("Location: ../../signup.php?error=$em&$data");
      exit;
   } else if(empty($sexe)) {
      $em = "Sexe is required";
      header("Location: ../../signup.php?error=$em&$data");
      exit;
   } else if(empty($password)) {
	$em = "Password is required";
	header("Location: ../../signup.php?error=$em&$data");
	exit;
   }else if(empty($fonction)) {
      $em = "Fonction is required";
      header("Location: ../../signup.php?error=$em&$data");
      exit;
   } else {
      # Checking the database if the username is taken
      $sql = "SELECT username FROM users WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      if($stmt->rowCount() > 0) {
         $em = "The username ($username) is taken";
         header("Location: ../../signup.php?error=$em&$data");
         exit;
      } else {
         # Profile Picture Uploading
         if (isset($_FILES['pp'])) {
            $img_name  = $_FILES['pp']['name'];
            $tmp_name  = $_FILES['pp']['tmp_name'];
            $error  = $_FILES['pp']['error'];

            if($error === 0) {
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
               $img_ex_lc = strtolower($img_ex);
               $allowed_exs = array("jpg", "jpeg", "png");

               if (in_array($img_ex_lc, $allowed_exs)) {
                  $new_img_name = $username. '.'.$img_ex_lc;
                  $img_upload_path = '../../uploads/'.$new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);
               } else {
                  $em = "You can't upload files of this type";
                  header("Location: ../../signup.php?error=$em&$data");
                  exit;
               }
            }
         }

         # Password hashing
         $password = password_hash($password, PASSWORD_DEFAULT);

         # Insert data into the database
         if (isset($new_img_name)) {
            $sql = "INSERT INTO users (name, username, phone, sexe, password, fonction, p_p)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $phone, $sexe, $password, $fonction, $new_img_name]);
         } else {
            $sql = "INSERT INTO users (name, username, phone, sexe, password, fonction)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $phone, $sexe, $password, $fonction]);
         }

         # Success message
         $sm = "Account created successfully";
         header("Location: ../../index.php?success=$sm");
         exit;
      }
   }
} else {
   header("Location: ../../signup.php");
   exit;
}
