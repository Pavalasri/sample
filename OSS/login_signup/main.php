<?php
session_start();

// Function to handle add to cart action
function addToCart($itemId) {
    // Assuming you have a cart session or a similar cart mechanism
    if (!isset($_SESSION['username'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    } else {
        // Handle the cart addition process here
        // For example:
        // $_SESSION['cart'][] = $itemId;
        echo "Item added to cart";
        // Redirect to cart page or show a success message
    }
}

// Check if an item is being added to the cart
if (isset($_GET['add_to_cart'])) {
    $itemId = $_GET['add_to_cart'];
    addToCart($itemId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ART SPOT</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    html{
      scroll-behavior: smooth;
    }
    p{
      margin:0px;
    }
    .nav-main {
      width: 100%;
      background-color: rgb(255, 255, 255);
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: fixed; 
      top: 0; 
      z-index: 1000; 
      transition: box-shadow 0.3s; 
    }

    .nav-main.scrolled {
		box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    body {
      padding-top: 80px; 
	}

    .nav-main img {
      width: 13%;
      height: auto;
    }
    .nav-sec{
      display:flex;
    }
    .nav-sec ul {
      display: flex;
    }

    .nav-sec ul li {
      list-style-type: none;
      margin-right: 30px;
      display: flex;
      font-family: serif;
      align-items: center;
    }

    .nav-sec ul li a {
      text-decoration: none;
      font-family: serif;
      font-size: 25px;
      color: #070436;
    }

    .nav-sec ul li a:hover {
      color: rgb(88, 70, 153);
    }

    .nav-sec ul li button {
      border: none;
      background-color: #c055cc;
      border-radius: 20px;
      padding: 10px;
      color: #070436;
      cursor: pointer;
      background-image: linear-gradient(to right, #614385 0%, #516395 51%, #614385 100%);
      margin: 10px;
      margin-right: 10px;
      padding: 10px 20px;
      text-align: center;
      font-size: 17px;
      transition: 0.5s;
      background-size: 200% auto;
      color: white;
      box-shadow: 0 0 12px #5e5a5a;
      border-radius: 10px;
      display: block;
    }

    .nav-sec ul li button:hover {
      background-position: right center;
      color: #fff;
      text-decoration: none;
    }
    .drop-down ul{
      padding-inline-start: 0;
      cursor: pointer;
    }
    .drop-down ul li{
      list-style-type: none;
      margin-right: 20px;
      display: flex;
      font-family: serif;
      align-items: center;
      font-size:25px;
      color: #070436;
      justify-content:space-between; 
    }

    .carousel-inner {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .carousel-caption {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      text-align: center;
    }

    .carousel-caption h1 {
      font-size: 60px;
      font-family: serif;
      margin: 0;
    }

    .carousel-caption p {
      font-size: 24px;
      font-family: 'Courier New', Courier, monospace;
    }

    .carousel-caption a {
      border: none;
      background-color: #09000a;
      border-radius: 10px;
      padding: 10px;
      color: #605adb;
      cursor: pointer;
      background-color: #d7c8f5;
      margin: 10px;
      padding: 10px 20px;
      text-align: center;
      font-weight: 500;
      font-size: 18px;
      font-family: verdana;
      transition: 0.5s;
      background-size: 200% auto;
      box-shadow: 0 0 10px #eee;
      color: hwb(278 0% 96%);
      text-decoration: none;
      display: inline-block;
    }

    .carousel-caption a:hover {
      background-position: right center;
      color: #70056e;
    }

    .carousel-inner .item {
      width: 100%;
      transition: transform .2s ease-in-out;
    }

    .carousel-inner .item img {
      width: 100%;
      object-fit: cover;
    }
	.about .col-lg-6{
		padding: 0;
	}
  .col-lg-4 .img-hv {
  border: 2px solid rgb(210, 178, 236);
  border-radius: 10px;
  transition: transform 0.6s ease, box-shadow 0.6s ease;
  margin-bottom: 20px;
  overflow: hidden;
  text-align: center;
  cursor: pointer;
}

.col-lg-4 .img-hv:hover img {
  transform: scale(1.1);
  transition: transform 0.6s ease; 
}

.col-lg-4 .img-hv:hover {
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.products{
  padding:25px 0px;
}
.products h1{
  color:#070436; 
  font-size:30px;

}
.products h2{
  color:#070436; 
  font-size:20px;
}
  .footer{
    background-color:black;
    padding: 10px 50px;
    color:white;
  }
  
  </style>
</head>
<body>
  <nav class="nav-main">
    <img src="artt.png">
    <div class="nav-sec">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="login.php">Sell Your Art</a></li>
        </ul>
        <?php if (!isset($_SESSION['username'])): ?>
          <ul>
            <li><a href="login.php"><button>Login</button></a></li>
			      <li><a href="signup.php"><button>Sign Up</button></a></li>
          </ul>
        <?php else: ?>
          <div class="drop-down">
            <ul>
              <li><i class="fa-solid fa-user"></i></li>
              <li><?php echo htmlspecialchars($_SESSION['username']); ?></li>
              <li><a href="../add_to_cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
              <li><a href="logout.php"><button>Log-out</button></a></li>
            </ul>
          </div>
        <?php endif; ?>
    </div>
  </nav>

  <div class="containe">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <div class="item active">
         
          <img src="../stickers/backsticker1.png" alt="Stickers">
          <div class="carousel-caption">
            <h1>Stickers</h1>
            <p>Stick It With Style!!</p>
            <a href="../stickers.php" class="info">Shop Now</a>
          </div>
        </div>

        <div class="item">
          <img src="../stickers/backwall1.png" alt="Wallart">
          <div class="carousel-caption">
            <h1>Wall Art</h1>
            <p>Timeless Beauty on Your Wall</p>
            <a href="../wallart.php" class="info">Shop Now</a>
          </div>
        </div>

        <div class="item">
          <img src="../stickers/backphone1.png" alt="Phone Case">
          <div class="carousel-caption">
            <h1>Phone Case</h1>
            <p>Empower your phone with elegance</p>
            <a href="../phonecases.php" class="info">Shop Now</a>
          </div>
        </div>

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
<div class="about" id="about">
	<div class="container-fluid" >
		<div class="row" style="background-color: #d5a6da;">
			<div class="col-lg-6" style="padding: 120px;">
				<h4 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Welcome to ArtSpot, a vibrant online marketplace where creativity meets everyday life. We believe in the power of art to transform spaces and bring joy to daily routines, which is why we've created a platform where talented artists can showcase their work on a variety of products.</h4>
			</div>
			<div class="col-lg-6">
				<img src="image.jpg" alt="" width="100%"  >
      </div>


		</div>
		<div class="row" >
			<div class="col-lg-3" style="background: #8ad8d0; padding-top: 100px; height: 75vh;">
         <h1 style="  transform: rotate(270deg);font-size:60px;">ABOUT US</h1>
			</div>
			<div class="col-lg-6" style="padding: 80px;">
				<p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">At ArtSpot, our mission is to bridge the gap between art and utility. We offer a wide range of products, including wall art, phone cases, and stickers, all featuring unique designs by independent artists from around the world. Each item is crafted with care and attention to detail, ensuring that you receive high-quality products that are as durable as they are beautiful.
				</p>
					<p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">We are passionate about supporting artists and providing them with opportunities to share their creations with a broader audience. By purchasing from ArtSpot, you are not only enhancing your space with one-of-a-kind pieces but also supporting the artistic community.
					</p><p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Join us in celebrating creativity and making art a part of your everyday life. Thank you for choosing ArtSpot. We look forward to bringing more beauty and inspiration into your world.</p>
			</div>
			<div class="col-lg-3" style="height: 75vh; background: #ffec58;"></div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<img src="image1.jpg" alt="" width="100%">
			</div>
			<div class="col-lg-6" style="height: 49vh; background: #eb9c9b;"></div>
		</div>
	</div>
</div>
<div class="products">
  <h1 style="text-align:center;"><b>Our Products</b></h1>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="img-hv">
          <a href="../phonecases.php"><img src="../home_phonecase/case7.jpg" width="300" height="300"></a>
        </div>
        <h2 style="text-align:center;"><b>Phonecases</b></h1>
      </div>
      <div class="col-lg-4">
        <div class="img-hv">
          <a href="../stickers.php"><img src="../home_stickers/sticker8.jpg" width="300" height="300"></a>
        </div>
        <h2 style="text-align:center;"><b>Stickers</b></h1>
      </div>
      <div class="col-lg-4">
        <div class="img-hv">
          <a href="../wallart.php"><img src="../home_wallart/wall9.jpg" width="300" height="300"></a>
        </div>
        <h2 style="text-align:center;"><b>Wallart</b></h1>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div style="text-align: center;">
  <h2 style="padding:10px 0px;">Contact Us</h2>
  <p>We'd love to hear from you! Whether you have questions about our products, need assistance with an order, or just want to share your thoughts, our team is here to help.</p>
  </div>
      
      <div class="container" style="padding:10px 0px;">
        <div class="row">
          <div class="col-lg-4">
        <h4>Customer Support:</h4>
        <ul>
          <li>E-mail: <a href="mailto: support@ArtSpot.com ">support@ArtSpot.com </a> </li>
          <li>Phone: 1234567890</li>
        </ul>
        </div>
          <div class="col-lg-4">
            <h4>Business Enquirys:</h4>
            <ul>
              <li>Business E-mail:  <a href="mailto: business@ArtSpot.com">business@ArtSpot.com  </a></li>
            </ul>
        </div>
        <div class="col-lg-4">
            <h4>Follow Us:</h4>
            <ul>
              <li>Facebook : <i class="fa-brands fa-square-facebook"></i> ArtSpot</li>
              <li>Instagram : <i class="fa-brands fa-square-instagram"></i> ArtSpot</li>
              <li>Twitter : <i class="fa-brands fa-square-twitter"></i> ArtSpot</li>
            </ul>
        </div>
        </div>
      </div>
      <h4 style="text-align: center">
      Thank you for reaching out to ArtSpot.We value your feedback and look forward to assisting you!</h4>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    window.addEventListener('scroll', function() {
      const nav = document.querySelector('.nav-main');
      if (window.scrollY > 0) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>
