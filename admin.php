<?php
session_start();

// Regenerate session ID to prevent session fixation attacks
session_regenerate_id();

// Check if the 'role' cookie is set and has the value of 1
if (isset($_COOKIE['role']) && $_COOKIE['role'] == '1') {
    // Set session variables for the admin user
    $_SESSION['username'] = 'admin';
    $_SESSION['role'] = 'admin';
}

// Check if user is logged in and has admin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== "admin") {
    // Redirect to login page or unauthorized access page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <h3>Admin Panel</h3>
    <p>This is the admin-only area where you can manage the system.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
