<?php 
session_start();
include "conn.php";
if(isset($_POST['submit']) && isset($_POST['agree'])){ 
    $user_name = $_POST['email'];
    $password = $_POST['password'];
    
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM people WHERE mail='{$user_name}'";

    $select_query = mysqli_query($conn, $query);
    if(!$select_query){
       die("Query failed". mysqli_error($conn)); 
    }
    while($row = mysqli_fetch_array($select_query)){
         $db_id = $row['id'];
         $db_fname = $row['fname'];
         $db_lname = $row['lname'];
         $db_user_name = $row['mail'];
         $db_password = $row['pass'];
         $db_img = $row['img'];
    }
    if($user_name !==$db_user_name && $password !== $db_password ){
     echo "<script>window.alert Your username and password do not match</script>";
        
 
    }else  if($user_name ==$db_user_name && $password == $db_password ) {
        $_SESSION['id']=  $db_id;  
        $_SESSION['lname']= $db_lname;  
        $_SESSION['pass']= $db_password;
        $_SESSION['img']= $db_img;
        $_SESSION['fname']= $db_fname;
        $_SESSION['mail']=$user_name;
        header("Location: main.php");
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
body{
    background-color: rgb(250, 255, 253);
}

input[type=text]{
    width:90%;
   border-radius:8px;
   height:6vh;
}
input[type=email]{
    width:90%;
    border-radius:8px;
   height:6vh;
   border: none;
  outline: none;
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 30px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}
input[type=password]{
    width:90%;
    border-radius:8px;
   height:6vh;
   border: none;
  outline: none;
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 30px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}
#btn{
    border: none;
  outline: none;
    color: white;
  margin-top: 20px;
  background: #1DA1F2;
  height: 45px;
  width:100%;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

.container {
    margin-top:50px;
  position: relative;
  width: 400px;
  height: 550px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
.brand-logo {
  height: 100px;
  width: 100px;
  background: url("img/user.png");
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
}
</style>
<body>


<center>
<div class="container" >
<div class="brand-logo"></div>
<h1>LOGIN</h1>
    <form method="POST">
        <h3 style="margin-right:78%;"> Email</h3>
        <input type="email" name="email" placeholder="example@mail.com" require><br>
        <h3 style="margin-right:80%;">Password</h3>
        <input type="password" name="password" placeholder="password" require><br><br>
        Agree to terms of service<input type="checkbox" name="agree" id="">
        <input id="btn" type="submit" name="submit" value="Sign in">
    </form>
    <a href="register.php" style="text-decoration:none; "><h3 style="color:black;">Sign up</h3></a> 
    </center>
    </div>
</body>
</html>