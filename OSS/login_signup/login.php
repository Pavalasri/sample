<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['customer_id'])) {
    // Redirect to the home page if already logged in
    header("Location: main.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
        .header a {
            text-decoration: none;
            display: flex;
            margin-top: 2px;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            color: #DA70D6;
        }
        .container {
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 3px solid #DA70D6;
            padding: 20px;
            border-radius: 10px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .forms {
            display: flex;
            flex-direction: column;
            margin: 10px 0;
            color: #DA70D6;
        }
        .forms label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .forms input {
            padding: 10px;
            width: 200px;
            border: 3px solid #808080;
            border-radius: 5px;
        }
        .button {
            text-align: center;
            margin: 10px;
        }
        .button button {
            margin: 5px 0;
            padding: 10px;
            width: 100px;
            border: 3px solid #808080;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            color: #DA70D6;
        }
        .image {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <img src="artt.png">
        <a href="main.php"><button><i class="fa-solid fa-backward"></i>   Back to Home</button></a>
    </nav>
    <h1 style="color:#DA70D6;">Log In</h1>
    <div class="header">
        <a href="signup.php">Need an account? Sign Up</a>
    </div>
    <div class="container">
        <div class="form-container">
            <!-- The form submits to itself using PHP -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="forms">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="forms">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// PHP code to handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start session
    session_start();

    // Database connection parameters
    $servername = "localhost";
    $username = "root";  // Replace with your DB username
    $db_password = "";  // Replace with your DB password
    $dbname = "artspot";  // Replace with your DB name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password']; // This is the user-entered password

    // Protect against SQL injection
    $email = $conn->real_escape_string($email);

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT customer_id,username, email,password FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        // Bind the result to variables
        $stmt->bind_result($customer_id,$username, $email, $hashed_password);
        $stmt->fetch();
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $customer_id;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            // Redirect to a protected page
            echo '<script>
            alert("Login Successfully");
            window.location.href = "main.php";
        </script>';
            exit();
        } else {
            // Incorrect password
            echo "<p style='color:red;'>Incorrect password.</p>";
        }
    } else {
        // User does not exist
        echo "<p style='color:red;'>No user found with that email address.</p>";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>

                <div class="button">
                    <button type="submit">Log In</button>
                </div>
            </form>
            
        </div>
        <div class="image">
            <img src="customer2.jpg" height="200" width="200" alt="Customer">
        </div>
        <div class="image2">
            <img src="art.webp" height="200" width="200" alt="Art">
        </div>
    </div>
</body>
</html>
