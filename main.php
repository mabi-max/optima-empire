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
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.mins.js"></script>
    <title>Document</title>
</head>
<style>
body{
    background-color: rgb(250, 255, 253);
}


 a:hover{
    background-color: grey;
}
.hi{
    float: left;
    padding: 2px;
}

#btn{
background-color: black;
color:white;
height:4vh;
width:10%;
border-radius:6px;
}
#btn:hover{
    background-color:blue;
}
@media screen and (max-width:600px){
    h1{
        font-size:22px;
    }
    h2{
        font-size:20px;
    }
}

</style>
<body>

  <center>
        <div class="hello" style="background-color: white;width:90%; height: 16vh;">
        
        <img class="img-responsive" style="width:5%; float:left" src="img/<?php echo $_SESSION['img'];?>" >
    
         <h1  style="color: blue;">Hello <?php echo $_SESSION['fname'].',';?> welcome to optima empire.</h1>
         <h2 class="hello" style="color: blue;">Your go-to clothing store.</h2> 
    </div>
 </center>

<!-- navigation bar -->
<nav class= "navbar navbar-inverse " >
    <div class= "container">
    <button  class="navbar-toggle" data-toggle="collapse" data-target="#collapse">   
    <span class="sr-only"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
        <div class="collapse navbar-collapse" id="collapse">
        <ul class = "nav navbar-nav">  
<li ><a href="main.php">Home</a></li>
<li ><a href="profile.php">Profile</a></li>
<li ><a href="reviews.php">Reviews</a></li>
<li ><a href="products.php">Products</a></li>
<li ><a href="logout.php">Logout</a></li>

</ul>
</div>
</nav>
    <!-- close navigation bar -->

 <!-- image carousel -->
        <div style="width:100%; float:right;">
        <div><img class="mySlides" src="img/d.jpg" style="height:69vh; width:100%; "></div>
        <div><img class="mySlides" src="img/a.jpg" style="height:69vh; width:100%; "></div>    
        <div><img class="mySlides" src="img/b.jpg" style="height:69vh; width:100%; "> </div>

   </div>
   <center>
<h1 style="color:blue"> What's trending</h1>
  <center>
 
  
  <ul style="list-style-type:none;">
    <li>

    <div class="hi" style="width:33%;">
        <img class="img-responsive" src="img/a.jpg" alt="profile picture" style="width:100%; height:40vh; ">
        <div class="desc" style="background-color:gray; height:14vh;" ><h4><br>Skirts </h4></div>
    </div>

    
    </li>
    <li>
    <div class="hi" style="width:33%;">
        <img class="img-responsive" src="img/b.jpg" style="width:100%; height:40vh;">
        <div class="desc" style="background-color:gray; height:14vh;"  ><h4><br>Caps </h4></div>
    </div> 
    </li>
    
    <li>
    <div class="hi" style="width:33%;">
        <img class="img-responsive" src="img/c.jpg" style="width:100%; height:40vh;">
        <div class="desc" style="background-color:gray; height:14vh;" ><h4><br>Shoes</h4></div>
    </div> 
    </li>
    </ul>

    <h2> Contact Us </h2> +234 701 030 3363  optimaempire@gmail.com<br>
  
   <footer style="background-color:grey; height:10vh">
 <span style="margin-bottom:200px;"> &#9400 optimaempire.com 2022</span>
  </footer>
  </center>


</body>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 3 seconds
}
</script>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</html>