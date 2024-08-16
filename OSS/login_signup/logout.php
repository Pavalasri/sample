// logout.php
<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
// Redirect to the main page or login page
echo '<script>
        alert("Logout Successfully");
        window.location.href = "main.php";
    </script>';
exit();
?>
