<?php 
include ("conn.php"); 
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


<div class="col-md-12" style="background-color:rgb(177, 178, 179)">
   
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>First name</th>
            <th>Last name</th> 
            <th>Email</th> 
            <th>Password</th> 
            <th>Operations</th>
        </tr>
    </thead>

  <tbody>

<?php 
$query = "SELECT * FROM people";
    $select_query = mysqli_query($conn, $query);
    if(!$select_query){
       die("Query failed". mysqli_error($conn)); 
    }
    
    while($row = mysqli_fetch_array($select_query)){
         $id = $row['id'];
         $db_email = $row['mail'];
         $db_fname = $row['fname'];
         $db_lname = $row['lname'];
         $db_pass = $row['pass'];
       

         echo"<tr>";
echo"<td> $id</td> <td> $db_fname</td> <td> $db_lname</td> <td> $db_email</td> <td> $db_pass</td>
 <td><a href='delete.php?deleteid=$id'>Delete</a></td>";
echo"<tr/>";
    }
   ?> 
   
</body>
</html>