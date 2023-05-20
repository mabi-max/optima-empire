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
</head>
<style>
body{
    background-color: rgb(250, 255, 253);
}
#nav{
  /* position: fixed;
  top: 0; */
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
.hi{
    float: left;
    padding: 2px;
}
#link a:hover{
    background-color: grey;
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

<!-- fetch category items from database -->

<?php 
if(isset($_GET['orderid'])){
    $id=$_GET['orderid'];
$query = "SELECT * FROM items where item_id =$id ";
$select_all_items = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($select_all_items)){
    $item_id = $row['item_id'];
    $item_category =$row['category_name'];
    $item_name = $row['item_name'];
    $item_image = $row['item_image'];
    $item_price = $row['item_price'];
    $item_date = $row['item_date'];
 }
}
 ?>
 <ul style=" list-style-type:none; margin-right:10px">
    <li>
    <div 
    class="hi" style="width:33%;">
        <img src="img/<?php echo $item_image; ?>" style="width:100%; height:40vh; ">
        <div class="desc" style="background-color:gray; height:14vh;" >
        <h4><br><?php echo $item_name; ?> </h4>
       <input type="button" value="plus" onclick="increase()">
        <input id="number" type="text"  value="0">
        <input type="button" value="minus" onclick="decrease()">

        </div>
    </div>
    </li>
   
    </ul>
</body>
<script>
var i=0;
function increase(){
    document.getElementById('number').value = ++i;
}
function decrease(){
    document.getElementById('number').value = --i;
}

</script>
</html>