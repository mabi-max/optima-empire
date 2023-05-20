<?php
$conn= mysqli_connect("localhost", "root", "", "optima" );
if(!$conn){
    die("cannot connect".mysqli_error($conn));
}

?>