<?php
$hash = '$2y$10$P.e0K1hQ/9XgkN0k/ojUbu.bH6nqRuFRTuhgVopgNBd.dAqV7sKfO';
$password = 'password123';

if (password_verify($password, $hash)) {
    echo "Password benar!";
} else {
    echo "Password salah!";
}
?>
