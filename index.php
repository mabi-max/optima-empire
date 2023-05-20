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
.hi{
    float: left;
    padding: 2px;
}

#btn:hover{
    background-color:blue;
}
#btn{
    border: none;
  outline: none;
    color: white;
  margin-top: 20px;
  background: #1DA1F2;
  height: 45px;
  width:100%;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}
@media screen and (max-width:600px){
    h1{
        font-size:25px;
    }
    h2{
        font-size:20px;
    }
}


</style>
<body>

  <center>
        <div style="background-color: white; height: 16vh;">       
       <h1  style="color: blue; ">Welcome to optima empire.</h1>
         <h2 style="color: blue; ">Your go-to clothing store.</h2> 
    </ul>
    </div>
 </center>

        <div style="width:100%; float:right;">
        <div><img class="mySlides" src="img/d.jpg" style="height:69vh; width:100%; "></div>
        <div><img class="mySlides" src="img/a.jpg" style="height:69vh; width:100%; "></div>    
        <div><img class="mySlides" src="img/b.jpg" style="height:69vh; width:100%;"> </div>

    
    <div  style="background-color:white; height:50vh; color:black;"><p>
            <img class="img-responsive" style="float:left;  height:50vh; border-radius: 250%; margin-left:9%;" src="img/c.jpg">
        <div style="padding-top:20; padding-left:5; float:right; margin-right:6%;">
                <h3> Optima empire</h3> Your home of quality wears.<br>
                Fashion is not just about what you wear,<br> it's about making a statement.
               order statement pieces today <br>and let your outfit speak for you.
               <br>Experience top notch quality and excellent customer service<p>
                    <a href="register.php"><button id="btn">Sign up</button></a><br>
                    <a href="login.php"><button id="btn">Sign in</button></a>
                    </div>
                </div>
   </div>
   <center>
<h1 style="color:blue"> What's trending</h1>
  <center>
 
  
  <ul style=" list-style-type:none; margin-right:10px">
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
    <div  class="hi" style="width:33%;">
        <img class="img-responsive" src="img/d.jpg" style="width:100%; height:40vh;">
        <div class="desc" style="background-color:gray; height:14vh;" ><h4><br>Shirts</h4></div>
    </div> 
    </li>
    </ul>

    <h2> Contact Us </h2> +234 701 030 3363  optimaempire@gmail.com<br>
  
    <div style="background-color: grey; font-size:18px; height:15vh; padding-top:60px  ">
            copyright @ optimaempire.com 2022
        </div>
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