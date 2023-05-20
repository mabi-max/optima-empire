<?php
session_start();
include('conn.php');
$id=$_GET['updateid'];

$sql="SELECT * FROM people where id = $id";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $db_email = $row['mail'];
    $db_fname = $row['fname'];
    $db_lname = $row['lname'];
    $db_pass = $row['pass'];
    $db_img = $row['img'];
}
if(isset($_POST['update'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email =$_POST['email'];
    $pass =$_POST['password'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

move_uploaded_file($image_temp, "img/$image");

$query = "UPDATE people set  id = '$id', 
fname='$first_name', lname='$last_name',
 mail='$email', img='$image', pass='$pass' where id = $id";
$select_query = mysqli_query($conn, $query);
if($select_query){
    echo "<script>alert('updated')</script>"; 
}else{
    echo "cannot updated"; 
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

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
#nav{
background-color: black;
list-style-type: none;
overflow: hidden;
}
#link a{
    color: white;
    float: left;
    background-color: rgb(24, 1, 1);
    padding: 20px 25px;
    text-decoration: none;
}
#link a:hover{
    background-color: grey;
}
.container {
    margin-top:50px;
  position: relative;
  width: 50%;
  height: 110vh;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
</style>
<body>
    
<ul id="nav">
<li id="link"><a href="main.php">Home</a></li>
<li id="link"><a href="profile.php">Profile</a></li>
<li id="link"><a href="reviews.php">Reviews</a></li>
<li id="link"><a href="register.php">Register</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<center>
<div class="container">
<h1>Update profile</h1>
    <form method="POST" enctype="multipart/form-data">
        <h3 style="margin-right:78%;">First name</h3>
        <input type="text" value="<?php echo  $db_fname; ?>" name="firstname" placeholder="Enter first name" require><br>
        <h3 style="margin-right:78%;"> Last name</h3>
        <input type="text" value="<?php echo  $db_lname; ?>" name="lastname" placeholder="Enter last name" require><br>
        <h3 style="margin-right:78%;"> Email</h3>
        <input type="email" value="<?php echo  $db_email; ?>" name="email" placeholder="Enter email" require><br>
        <h3 style="margin-right:78%;">Password</h3>
        <input type="password" value="<?php echo  $db_pass; ?>" name="password" placeholder="Enter password" require><br><br>
        <h3 style="margin-right:78%;">Profile picture</h3>
         <input type="file" name="image"><br><br>
        <input id="btn" type="submit" name="update" value="submit">
    </form>
    
    </center>
</body>
</html>