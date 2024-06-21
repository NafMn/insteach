<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Cek apakah username sudah ada
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Masukkan user baru ke database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "User created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Username already exists!";
    }
}
?>
