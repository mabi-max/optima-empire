<?php 

include('conn.php');

if(isset($_POST['submit'])){
    $name=$_POST['fname'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $insert="INSERT into comment(name, email, comment)VALUES ('$name', '$email', '$comment')";
    $query=mysqli_query($conn, $insert);
    if(!$query){
        echo "cannot upload comment";
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
.hi{
    float: left;
    padding: 2px;
}
input[type=text]{
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
#btn:hover{
    background-color:blue;
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

</style>
<body>   

<ul id="nav">
<li id="link"><a href="main.php">Home</a></li>
<li id="link"><a href="profile.php">Profile</a></li>
<li id="link"><a href="comment.php">Reviews</a></li>
<li id="link"><a href="products.php">Products</a></li>
<li id="link"><a href="logout.php" style="float:right">Logout</a></li>
</ul>
<center>

<div class='container'>
<h1>COMMENT</h1>
    <form  method="POST">
    <h3 style="margin-right:78%;">Name</h3>
        <input type="text" name="fname" placeholder="Enter name"><br>
        <h3 style="margin-right:78%;">Email</h3>
        <input type="email" name="email" placeholder="Enter email"><br>
        <h3 style="margin-right:78%;">Comment</h3>
        <input type="text" name="comment" placeholder="Write your comment"><br><br>
        <input id="btn" type="submit" value="submit" name="submit">
    </form>
    <div>
    </center>
 


</body>
</html>