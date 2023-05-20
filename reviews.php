<?php
include ('conn.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<style>
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
</style>
<body>
        
<ul id="nav">
<li id="link"><a href="main.php">Home</a></li>
<li id="link"><a href="profile.php">Profile</a></li>
<li id="link"><a href="reviews.php">Reviews</a></li>
<li id="link"><a href="products.php">Products</a></li>
<li id="link"><a href="register.php">Register</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<center>
<h2>Reviews</h2><br>
<?php
$select="SELECT * from comment";
$q=mysqli_query($conn, $select);
if(!$q){
    die(mysqli_error($conn));
}
while($row = mysqli_fetch_array($q)){
    $id = $row['id'];
    $db_email = $row['email'];
    $db_name = $row['name'];
    $db_comment = $row['comment'];
    echo $db_name .' says: ' ;
    echo $db_comment . '<br>'.'<hr style="width:50%">';
}
?>
  </center>
    
</body>
</html>