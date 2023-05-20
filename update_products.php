<?php
include('conn.php');

// Get id of product to be updated
$id=$_GET['update'];
    $query = "SELECT * FROM items where item_id = $id";
    $select_all_items = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($select_all_items)){
        $item_id = $row['item_id'];
        $item_name = $row['item_name'];
        $item_image = $row['item_image'];
        $item_price = $row['item_price'];
        $item_date = $row['item_date'];
        $item_category =$row['category_name'];
    }

if(isset($_POST['create_post'])){
    $item_category = $_POST['item_category'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_date = date('d-m-y'); 

    $item_name = mysqli_real_escape_string($conn, $item_name);
    
    $query = "UPDATE items SET  category_name= '$item_category', item_name= '$item_name', 
     item_price='$item_price' WHERE item_id=$id";
    
    $add_posts_query = mysqli_query($conn, $query);
    if($add_posts_query){
        echo "Uploaded successfully!";
    }else{
        die("Cannot upload at the moment" . mysqli_error($conn));
    }
}

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
    margin-top:10px;
  position: relative;
  width: 40%;
  height: 95vh;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;

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
button{
    border: none;
  outline: none;
    color: white;
  background: #1DA1F2;
  height: 40px;
  width:100%;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}
button:hover{
    background-color:blue;

}
</style>
<body>
<!-- nav bar for admin -->
<ul id="nav">
<li id="link"><a href="admin.php">Admin</a></li>
<li id="link"><a href="add_products.php">Add products</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
    <!-- add posts for categories -->
<center>
    <form method="POST" enctype="multipart/form-data" class="container">

    <h1>UPDATE PRODUCTS</h1> 

<label for="item_name" ><h3 style="margin-right:78%;">Item name</h3></label>
<input type="text" value='<?php echo  $item_name;?>' name="item_name" required=""><br>
            
       <label for="item_category"><h3 style="margin-right:78%;">Category</h3></label>
       <input type="text" value='<?php echo  $item_category;?>' name="item_category" required=""><br>

            <label for="item_price"><h3 style="margin-right:78%;">Price</h3></label>
       <input type="text"  value='<?php echo  $item_price;?>' name="item_price" required=""> <br><br>

       
     <button type="submit"  name="create_post">submit</button> 
    </form><br><br>

</body>
</html>