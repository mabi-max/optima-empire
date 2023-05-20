<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.mins.js"></script>
    <script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
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

.container {
  position: relative;
  width: 450px;
  height: 600px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
#btn{
    border: none;
  outline: none;
    color: white;
  margin-top: 20px;
  background: #1DA1F2;
  height: 35px;
  width:100%;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}
</style>
<body>

<ul id="nav">
<li id="link"><a href="main.php">Home</a></li>
<li id="link"><a href="profile.php">Profile</a></li>
<li id="link"><a href="comment.php">Reviews</a></li>
<li id="link"><a href="products.php">Products</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
       
        <center>     
<div class="container">
<img style="width:100%; height:50vh; box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;" alt="profile picture" src="img/<?php echo $_SESSION['img'];?>" ></li>
<table>
    <tr> 
    <th>First name</th>  <td> <?php echo $_SESSION['fname']; ?></td>
    </tr>
    <tr>
    <th>Last name</th> <td> <?php echo $_SESSION['lname']; ?></td>
    </tr>
    <tr>
    <th>Email</th> <td>  <?php echo $_SESSION['mail']; ?></td>
    </tr>
    <tr>
    <th>Password</th>  <td>  <?php echo $_SESSION['pass']; ?></td>
    </tr>

    <tr>
    <td> <?php  
    $db_id= $_SESSION['id']; 
      echo"<td><a href='up.php?updateid=$db_id'><button class='btn btn-primary'>Update</button></a></td>"?></td>
       </tr>

       <tr>
       <td><?php  
     
    $db_id= $_SESSION['id']; 
      echo"<td><a href='del.php?deleteid=$db_id'><button class='btn btn-danger'>Delete</button></a></td>"?></td>
    </tr>
    </div>
 
</body>
</html>