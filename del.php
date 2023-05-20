<?php
include('conn.php');
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$query = "DELETE FROM people where id = $id";
$select_query = mysqli_query($conn, $query);
if($select_query){
    header("Location: admin.php"); 
}




}
?>
