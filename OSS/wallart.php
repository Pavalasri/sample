<?php
// Start the session
session_start();

// Check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['customer_id']);
    if (!isset($_SESSION['username'])) {
        // Redirect to login page if not logged in
        header("Location: login_signup/login.php");
        exit();
    } else {
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ART SPOT</title>
  <meta charset="utf-8">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <style>
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
      box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }
    body {
      padding-top: 100px; 
    }

    .nav-main img {
      width: 13%;
      height: auto;
    }

    .nav-sec ul {
      display: flex;
    }

    .nav-sec ul li {
      list-style-type: none;
      margin-right: 20px;
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

    .back {
      background-color:#0b153f;
      width: 95%;
      margin: 0 auto;
      border-radius: 10px;
      text-align: center;
      display: flex; 
      align-items: center;
      justify-content: space-between; 
    }

    .text {
      margin-right: 70px;
    }

    .text h1 {
      font-family: serif;
      font-size: 50px;
      color: white;
      text-align: left;
      padding-left: 50px;
      padding-bottom: 20px;
    }

    .text p {
      font-family: sans-serif;
      font-size: 20px;
      color: white;
      font-weight: 500;
      text-align: left;
      padding-left: 50px;
    }

    .categories {
      margin: 40px 40px;
      background-color: white;
    }

    .fill-st {
      color: gold;
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
.nav-sec{
      display:flex;
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
        <li><a href="login_signup/main.php">Home</a></li>
        <li><a href="login_signup/main.php">About Us</a></li>
        <li><a href="login_signup/login.php">Sell Your Art</a></li>
      </ul>
      <?php if (!isset($_SESSION['username'])): ?>
          <ul>
            <li><a href="login_signup/login.php"><button>Login</button></a></li>
			      <li><a href="login/signup/signup.php"><button>Sign Up</button></a></li>
          </ul>
        <?php else: ?>
          <div class="drop-down">
            <ul>
              <li><i class="fa-solid fa-user"></i></li>
              <li><?php echo htmlspecialchars($_SESSION['username']); ?></li>
              <li><a href="add_to_cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
              <li><a href="login_signup/logout.php"><button>Log-out</button></a></li>
            </ul>
          </div>
        <?php endif; ?>
    </div>
  </nav>
  <div class="back">
    <div class="text">
      <h1>WallArt</h1>
      <p>Adorn your walls with a masterpiece. Our wall art collection features exclusive creations from talented artists, transforming your space into a gallery of creativity. Elevate your decor with unique designs that showcase your appreciation for art.</p>
    </div>
    <img src="home_wallart/walllarttt.jpg" style="width:40%">
  </div>

  <div class="categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Mountain Painting" data-price="$3.50" data-image="home_wallart/wall2.png">
            <img src="home_wallart/wall2.png" width="300" height="300">
          </div>
          <h4>Mountain Painting</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <p>$3.50</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Poolside Dreams" data-price="$3.00" data-image="home_wallart/wall3.png">
            <img src="home_wallart/wall3.png" width="300" height="300">
          </div>
          <h4>Poolside Dreams</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <p>$3.00</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Women's Head Framed Art Print" data-price="$4.00" data-image="home_wallart/wall4.jpg">
            <img src="home_wallart/wall4.jpg" width="300" height="300">
          </div>
          <h4>Women's Head Framed Art Print</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <p>$4.00</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Great Sushi Dragon" data-price="$3.50" data-image="home_wallart/wall5.png">
            <img src="home_wallart/wall5.png" width="300" height="300">
          </div>
          <h4>Great Sushi Dragon</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></"></i>
          <i class="fa-regular fa-star"></i>
          <p>$3.50</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Be kind to your Mind Poster" data-price="$3.00" data-image="home_wallart/wall6.jpg">
            <img src="home_wallart/wall6.jpg" width="300" height="300">
          </div>
          <h4>Be kind to your Mind Poster</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <p>$3.00</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Lord Krishna WallArt" data-price="$4.00" data-image="home_wallart/wall7.jpg">
            <img src="home_wallart/wall7.jpg" width="300" height="300">
          </div>
          <h4>Lord Krishna WallArt</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <p>$4.00</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Abstract Coffee Art" data-price="$3.50" data-image="home_wallart/wall8.jpg">
            <img src="home_wallart/wall8.jpg" width="300" height="300">
          </div>
          <h4>Abstract Coffee Art</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <p>$3.50</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Pop Art Cat" data-price="$4.50" data-image="home_wallart/wall9.jpg">
            <img src="home_wallart/wall9.jpg" width="300" height="300">
          </div>
          <h4>Pop Art Cat</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <p>$4.50</p>
        </div>
        <div class="col-lg-4">
          <div class="img-hv" data-toggle="modal" data-target="#productModal" data-title="Textured Blue Abstract Resin Wall Art Painting" data-price="$5.00" data-image="home_wallart/wall10.jpg">
            <img src="home_wallart/wall10.jpg" width="300" height="300">
          </div>
          <h4>Textured Blue Abstract Resin Wall Art Painting</h4>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa fa-star fill-st"></i>
          <i class="fa-regular fa-star"></i>
          <p>$5.00</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="productModalLabel">Product Title</h4>
        </div>
        <div class="modal-body">
          <img id="modalImage" src="" width="100%" height="auto">
          <p id="modalPrice"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Add to Cart</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script>
  // Update modal content when it's about to be shown
$('#productModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var title = button.data('title');    // Extract info from data-* attributes
    var price = button.data('price');
    var image = button.data('image');

    var modal = $(this);
    modal.find('.modal-title').text(title); // Update the modal's title
    modal.find('#modalImage').attr('src', image); // Update the modal's image
    modal.find('#modalPrice').text(price); // Update the modal's price

    // Make sure the data is available globally for the AJAX call
    modal.data('title', title);
    modal.data('price', price);
    modal.data('image', image);
});

// Handle Add to Cart button click
$('.btn-primary').on('click', function () {
    var modal = $('#productModal');
    var title = modal.data('title');
    var price = modal.data('price');
    var image = modal.data('image');

    $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: {
            productTitle: title,
            productPrice: price,
            productImage: image
        },
        success: function(response) {
            if (response == 'not_logged_in') {
                window.location.href = 'login_signup/login.php'; // Redirect to login page
            } else if (response == 'success') {
                // Handle success (e.g., show a confirmation message)
                alert('Item added to cart!');
            } else {
                // Handle other errors
                alert('An error occurred while adding the item to the cart.');
            }
        },
        error: function() {
            alert('An error occurred while adding the item to the cart.');
        }
    });
});

</script>
</body>
</html>
