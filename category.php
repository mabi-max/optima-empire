<?php
include('conn.php');

if(isset($_POST['add_category'])){
    // $item_category = $_POST['item_category'];
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO category(category_name) VALUES ( '{$category_name}')";
    
    $add_posts_query = mysqli_query($conn, $query);
    if($add_posts_query){
        echo "Uploaded successfully!";
    }else{
        die("Cannot upload at the moment" . mysqli_error($conn));
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
<style>
.container {
    margin-top:10px;
  position: relative;
  width: 40%;
  height: 95vh;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  float:right;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}
input{
    width:90%;
    border-left:none;
   border-right:none;
   border-top:none;
   height:6vh;
   background: #ecf0f3;
   box-shadow:0 4px 2px -2px;
}
#sub{
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
#sub:hover{
    background-color:blue;

}
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
</style>
<body>
 <!-- nav bar for admin -->
 <ul id="nav">
<li id="link"><a href="admin.php">Admin</a></li>
<li id="link"><a href="add_products.php">Add products</a></li>
<li id="link"><a href="category.php">Add category</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

    <!-- form for adding categories -->


<form method="POST" class="container">
<h1>ADD CATEGORIES</h1> 

 <label for="category_name" ><h3 style="margin-right:78%;">Category name</h3></label>
<input type="text" placeholder="Enter name" name="category_name" required=""><br>

<button type="submit" name="add_category">Add</button> 
</form>

</body>
</html>