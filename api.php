<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle book list request
if ($_GET['action'] == 'getBooks') {
    $result = $conn->query("SELECT * FROM books");
    $books = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($books);
}

// Handle user information submission
if ($_POST['action'] == 'submitUserInfo') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $conn->query($sql);
}
if ($_GET['action'] == 'getUserInfo') {
    // Assuming you have a session or token-based authentication mechanism in place
    $userId = $_SESSION['user_id']; // Adjust this based on your authentication mechanism

    $result = $conn->query("SELECT * FROM users WHERE id = $userId");
    $userInfo = $result->fetch_assoc();
    echo json_encode($userInfo);
}

$conn->close();
?>

$conn->close();
?>
