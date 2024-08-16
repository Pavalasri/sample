<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$dbConfig = [
    'servername' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'artspot'
];

// Create a function to handle database connection
function createConnection($dbConfig) {
    $conn = mysqli_connect($dbConfig['servername'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = createConnection($dbConfig);

    $signup_type = $_POST['signup_type'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // if ($signup_type == 'artist') {
    //     $sql = "INSERT INTO artistsignup (shopname, email, password) VALUES ('$username', '$email', '$password')";
    // } else
    if ($signup_type == 'customer') {
        $sql = "INSERT INTO customers (username, email, password) VALUES ('$username', '$email', '$password')";
    } else {
        die("Invalid signup type");
    }

    if (mysqli_query($conn, $sql)) {
        $message = "Signup successful";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: signup.php?message=" . urlencode($message));
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <title>Signup</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            flex-direction: column; 
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
        .container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .box, .box2 {
            width: 200px;
            height: 200px;
            background-color: white;
            border: 3px solid #DA70D6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            cursor: pointer;
        }
        .box a, .box2 a {
            color: #DA70D6;
            
        }
        .box img, .box2 img {
            margin-bottom: 10px;
        }
        .box p, .box2 p {
            margin: 0;
        }
        .signup {
            display: flex;
            flex-direction: column;
            align-items: center; 
        }
        .signup input {
            flex-direction: column;
            margin: 5px 0;
            padding: 10px;
            width: 200px;
            border: 3px solid #DA70D6;
            border-radius: 5px;
        }
        .signup a {
            text-decoration: none;
            display: flex;
            margin-top: 10px;
            text-align: center;
        }
        .sub {
            text-align: center;
            margin: 10px;
        }
        .sub button {
            margin: 5px 0;
            padding: 10px;
            width: 100px;
            border: 3px solid #DA70D6;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            color:  #DA70D6;
        }
        .log {
            margin: 10px;
            text-align: center;    
            color : #DA70D6;
            display : flex;
            justify-content :center;
        }
        .header {
            color: #DA70D6;
        }
    </style>
</head>
<body>
    <nav>
        <img src="artt.png">
        <a href="main.php"><button><i class="fa-solid fa-backward"></i>   Back to Home</button></a>
    </nav>
    <div class="header">
        <h1>Join Us</h1>
    </div>
    <div class="container">
        <div class="box2" id="customer-box">
            <img src="customer.jpg" height="130" width="120">
            <p><a id="customer-signup" href="#">Customer Signup</a></p>
        </div>
    </div>
    <div class="signup">
        <form id="signup-form" action="signup.php" method="post">
            <input type="hidden" id="signup_type" name="signup_type" value="">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="sub">
                <button type="submit">Signup</button>
            </div>
            <div class="log">
                <a href="login.php">Already have an account? Log In</a>
            </div>
        </form>
    </div>
    <script>
        /*document.getElementById('artist-signup').addEventListener('click', function(event) {
            event.preventDefault(); 
            document.getElementById('signup_type').value = 'artist';
            document.getElementById('username').placeholder = 'Shop Name';
        });
        */

        document.getElementById('customer-signup').addEventListener('click', function(event) {
            event.preventDefault(); 
            document.getElementById('signup_type').value = 'customer';
            document.getElementById('username').placeholder = 'Username';
        });
    </script>
</body>
</html>
