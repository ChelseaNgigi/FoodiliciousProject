<html>
<head>
    <title>Foodilicious</title>
    <link rel="stylesheet" type="text/css" href="Homepage.css">
    
    
</head>
    
<body>
    <div id="logo">
         <h5>Foodilicious</h5>
         </div>
   
    <div id="navigation">
    <ul class="navigation">

        <li><a href="Home.php">Home</a></li>
        <li><a href="log_in.php">Order</a></li>
        <li><a href="log_in.php">Pricing and plan</a></li>
        <li><a href="log_in.php">About Us</a></li>
        <li id="login"><a href="log_in.php">Log In</a></li>
        <li id="login"><a href="registerpage.php">Create account</a></li>
        </ul>
    </div>
        `   <h1 style="font-family:courier">Foodilicious</h1>
    <div class="header">
      <p style="font-family:courier">Get your favourite meals at the comfort of your home.Order with us and experience a taste of joy.</p><br>
       <div class="slideshow-container">

<div class="mySlides fade">
  <img src="Chicken.jpg" style="width:70%">
    
</div>

<div class="mySlides fade">
  <img src="pizzaa.jpg" style="width:70%">
  </div>

<div class="mySlides fade">
  <img src="cake.jpg" style="width:70%">
  
</div>

    <div class="mySlides fade">
  <img src="bb.jpg" style="width:70%">
  
</div>
    
</div>
<br>
    <div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
 <span class="dot"></span> 

</div>
        <script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

        <div class="button">
            <a href="log_in.php"><input type="button" value="Order Now"></a>
        </div>
    </div><br><br>
       
      


    <div class="imgs">
  <img src="deliver.jpg" height="400" width="600">
  
</div>
     <div class="paragraph">
      <p style="font-family:courier">Fast delivery services to ensure the ordered food reach our customers on time.</p>
    </div>

<br>
    <div id="ing">
 <div class="ingredients">
  <img src="burger-chips.jpg" height="400" width="600">
  
</div>
     <div class="paragraph2">
      <p style="font-family:courier">Quality and ready made food  sourced from your favourite restaurants to satify our customers tastebuds..</p>
    </div>
<br>

    </div>
    
   <div class="menu">
<h2 style="font-family:courier">Trending Orders</h2>
      
        
           <div  class="rightImages">
                <a href="log_in.php"><h4>Fried Chicken</h4></a>
                <img src="Chicken.jpg" height="400px" width="359px">
               
                <a href="log_in.php"><h4>Pizza</h4></a>
                <img  src="pizzaa.jpg" height="400px" width="359px">
           </div>
           <div  class="leftImages">
               <a href="log_in.php"><h4>Tropical Icecream</h4></a>
                <img src="Ice-Cream.png" height="400px" width="359px" >
                <a href="log_in.php"><h4>Fries</h4></a>
                <img src="fries.jpg" height="400px" width="359px">               
           </div>

        </div>
    

    <br>
        <div class="contactUs">
            <h4>Contact Us</h4>
            <p>Mobile number:0708315173/0786543255</p>
            <p> Telephone number:227897-097</p>
            <p>Email:foodilicious@gmail.com</p>
            <h4>Location</h4>
            <p> Langatta constituency</p>
            <p>Mombasa road</p>
            <p>Kitusuru plaza.</p>
        </div>
    
    
    </body>
</html>