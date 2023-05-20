<?php
include('conn.php');
if(isset($_POST['submit'])){
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email =$_POST['email'];
$pass =$_POST['password'];

$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

move_uploaded_file($image_temp, "img/$image");
$enter_values = "INSERT INTO people(fname, lname, mail, pass, img) values
('$first_name','$last_name','$email', '$pass', '$image')";
$query=mysqli_query($conn, $enter_values);
if(!$query){
    die('An error occured'. mysqli_error($conn));
}else{

    echo'<script> window.alert("Upload successful")</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <title>Document</title>
</head>
<style>
body{
    background-color: rgb(250, 255, 253);
}

input[type=text]{
    width:90%;
   border-left:none;
   border-right:none;
   border-top:none;
   height:6vh;
   background: #ecf0f3;
   box-shadow:0 4px 2px -2px;
}
input[type=email]{
    width:90%;
    border-left:none;
   border-right:none;
   border-top:none;
   height:6vh;
   background: #ecf0f3;
   box-shadow:0 4px 2px -2px;
}
input[type=password]{
    width:90%;
    border-left:none;
   border-right:none;
   border-top:none;
   height:6vh;
   background: #ecf0f3;
   box-shadow:0 4px 2px -2px;
}
#btn{
    border: none;
  outline: none;
    color: white;
  background: #1DA1F2;
  height: 40px;
  width:50%;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}
#btn:hover{
    background-color:blue;
}

@media screen and (max-width:600px){
    h3{
        font-size:16px;
    }
}
</style>
<body>

<center>

<div    class="col-md-6" style=" width: 80%; box-sizing: border-box;
  background: #ecf0f3; border-radius: 20px; padding: 40px;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;" >

<h1>Create an account with us</h1>
    <form method="POST" enctype="multipart/form-data">
        <h3 style="margin-right:78%;">First name</h3>
        <input type="text" name="firstname" placeholder="Enter first name" require><br>
        <h3 style="margin-right:78%;"> Last name</h3>
        <input type="text" name="lastname" placeholder="Enter last name" require><br>
        <h3 style="margin-right:78%;"> Email</h3>
        <input type="email" name="email" placeholder="Enter email" require><br>
        <h3 style="margin-right:78%;">Password</h3>
        <input type="password" name="password" placeholder="Enter password" require><br>
        <h3 style="margin-right:78%;">Picture</h3>
         <input type="file" name="image" ><br><br>
        <input id="btn" type="submit" name="submit" value="submit">
    </form>
    <a style="text-decoration:none; color:black;" href="login.php"><h3 >Proceed to login</h3></a> 
    </center>
    </div>
    </div>
</body>
</html>