
<?php
include('conn.php');

if(isset($_POST['create_post'])){
    // $item_category = $_POST['item_category'];
    $item_name = $_POST['item_name'];
    $item_image = $_FILES['item_image']['name'];
    $item_image_temp = $_FILES['item_image']['tmp_name'];
    $item_price = $_POST['item_price'];
    $category_id = $_POST['category_id'];
    $item_date = date('d-m-y'); 

    move_uploaded_file($item_image_temp, "img/$item_image");
    $query = "INSERT INTO items(item_name, category_id, item_image, item_price, item_date) 
    VALUES ( '{$item_name}', '{$category_id}', '{$item_image}', '{$item_price}', '{$item_date}')";
    
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
</style>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="main.js"></script>
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
</style>
<body>
 <!-- nav bar for admin -->
<ul id="nav">
<li id="link"><a href="admin.php">Admin</a></li>
<li id="link"><a href="add_products.php">Add products</a></li>
<li id="link"><a href="category.php">Add category</a></li>
<li id="link" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

    <!-- form for adding products -->
<center>
    <form method="POST" enctype = "multipart/form-data" class="container">
           <h1>ADD PRODUCTS</h1> 

           <label for="item_name" ><h3 style="margin-right:78%;">Item name</h3></label>
       <input type="text" placeholder="Enter name" name="item_name" required=""><br>
<!-- 
       <label for="item_category" ><h3 style="margin-right:78%;">Category</h3></label>
       <input type="text" placeholder="Enter Category" name="item_category" required=""><br> -->

            <label for="item_price"><h3 style="margin-right:78%;" >Price</h3></label><br>
       <input type="text"  placeholder="Enter Price" name="item_price" required=""> <br>
       <br> <br>
       <select name="Category">
       <optgroup label="select category">Select category
      <?php

       $query = "SELECT * FROM category";
    $select_all_items = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($select_all_items)){
        $id = $row['id'];
        $cat = $row['category_name'];
    
        ?>
         <!-- // Set the primary key as the value-->
        <option value="<?php echo $id; ?>"> <?php echo $cat ?> 
    </option>
                </optgroup>
    <?php
    }
?>
</select> <br>

       <label for="item_image"><h3 style="margin-right:78%;">Item Image</h3></label>
       <input type="file" name="item_image"><br><br>
      

     <button id="sub" type="submit"  name="create_post">submit</button> 
    </form>
    </center>
<br>

    
    <br>

<!-- fetch categories in form of a table -->
<div class="col-md-6" style="background-color:rgb(177, 178, 179)">
   
   <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>

        </tr>
    </thead>

    <tbody>
    <?php
    $query = "SELECT * FROM items";
    $select_all_items = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($select_all_items)){
        $item_id = $row['item_id'];
        $item_name =$row['item_name'];
        $item_image = $row['item_image'];
        $item_price = $row['item_price'];
        $item_date = $row['item_date'];
        $item_category =$row['category_name'];

        echo "<tr>";
        echo "<td><img width='100' src = 'img/$item_image' alt = ''></td>";
        echo "<td>$item_name</td>";
        echo "<td>$item_category</td>";
        echo "<td>$item_price</td>";

        echo "<td><a href ='update_products.php?update=$item_id'><button class='btn '>Update</button></a></td>";

        echo "<td><a href ='add_products.php?delete={$item_id}'><button class='btn btn-danger'>Delete</button></a></td>";

       
        echo "</tr>";
    }
    ?>
</table>
</div>



<?php
if (isset($_GET['delete'])){
   
    $post_delete_id = $_GET['delete'];

$query = "DELETE FROM items WHERE item_id = {$post_delete_id}";
$delete_query = mysqli_query($conn, $query);

}
?>
</body>
</html>