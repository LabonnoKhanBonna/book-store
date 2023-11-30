<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login functionality
if ($_GET['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation: Add your own validation logic here

    $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user = $result->fetch_assoc();

    if ($user) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conn->close();
?>
