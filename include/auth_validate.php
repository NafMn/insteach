<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        echo "Hash di database: '" . $user['password'] . "'<br>";
        echo "Panjang hash di database: " . strlen($user['password']) . "<br>";
        echo "Password yang dimasukkan: '" . $password . "'<br>";
        echo "Panjang password yang dimasukkan: " . strlen($password) . "<br>";

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: ../dashboard.php');
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>
