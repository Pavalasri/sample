<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo 'not_logged_in';
    exit();
}

// Check if the required POST parameters are set
if (isset($_POST['productTitle']) && isset($_POST['productPrice']) && isset($_POST['productImage'])) {
    $productTitle = htmlspecialchars($_POST['productTitle']);
    $productPrice = htmlspecialchars($_POST['productPrice']);
    $productImage = htmlspecialchars($_POST['productImage']);

    // Get the cart from the session or initialize it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the item to the cart
    $_SESSION['cart'][] = array(
        'title' => $productTitle,
        'price' => $productPrice,
        'image' => $productImage
    );

    echo 'success';
} else {
    echo 'error';
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <meta charset="utf-8">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <style>
    body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            flex-direction: column;
            background-color: white;
        }
        nav {
            width: 100%;
            background: white;
            display: inline-block;
        }
        nav img {
            width: 13%;
        }
        nav a {
            float: right;
            text-decoration: none;
            font-family: serif;
            font-size: 25px;
            color: #070436;
        }
        nav a:hover {
            color: rgb(88, 70, 153);
        }
        nav button {
            background-image: linear-gradient(to right, #614385 0%, #516395  51%, #614385  100%);
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
  </style>
</head>
<body>
    <nav>
        <img src="artt.png">
        <a href="login_signup/main.php"><button><i class="fa-solid fa-backward"></i>   Back to Home</button></a>
    </nav>
</body>
</html>
