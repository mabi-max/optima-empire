<?php
include('conn.php');
if(isset($_POST['btnsubmit'])){

$user_name = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

//we select all username fields from the database and check if username already exists
$sql_user = "SELECT * FROM user WHERE username = '$user_name'";
$user_query = mysqli_query($conn, $sql_user);

//we check if the username field is empty and less than 6 characters
if(empty($user_name)){
    $name_error = "Please insert your username";
}elseif(strlen($user_name) < 6){
    $name_error = "Username cannot be less than 6 characters";
}elseif(mysqli_num_rows($user_query) > 0){
    $name_error = "Username already exists";
}

//we check if the password field is empty, less than 6 characters and contains an uppercase letter
if(empty($pass)){
    $pass_error = "Please fill out the password field";
}elseif(strlen($user_name) < 6){
    $pass_error = "Password must be betweeen 6 to 8 characters";
}elseif(!preg_match("/[A-Z]/", $pass)){
    $pass_error = "Password must contain at least one uppercase letter";
}

//we send the data to the database table if there is no error
if(empty($name_error) && empty($pass_error)){
$enter_values = "INSERT INTO user (username, pass, img) values('$user_name', '$pass', '$image')";
$query=mysqli_query($conn, $enter_values);
if(!$query){
    die('An error occured'. mysqli_error($conn));
}elseif(!isset($_POST['agree'])){
  $success = "You have not agreed to our terms and conditions";
}

else{
  
    $success = "Registration successful";
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
<input type="text" name="username" placeholder="Enter user name" required><br> <br>
 <?php
        if(isset($name_error)){
            echo "<p style='color:red'>$name_error</p>";
        }
        ?>
<input type="password" name="pass" placeholder="Enter password" required><br> <br>
 <?php
        if(isset($pass_error)){ 
            echo "<p style='color:red'>$pass_error</p>";
        }
        ?>
Profile picture <input type="file" name="image" ><br><br>

         Agree to terms of service <input type="checkbox" name="agree"> <br><br>

<input type="submit" name="btnsubmit" value="submit">
<?php
        if(isset($success)){
            echo "<p style='color:green'>$success</p>";
        }
        ?>
</form>

<?php
$query = "SELECT * FROM user";
$select_all_items = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($select_all_items)){
    $user_id = $row['id'];
    $user_name =$row['username'];
    $user_image = $row['img'];

    echo $user_id ; 
   echo $user_name;
  echo "<img src='img/$user_image'>";
 }
  
?>
    
</body>
</html>