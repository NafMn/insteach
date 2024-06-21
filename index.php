<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insteach - Tentukan Guru Terbaik untuk Mengajar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('./image/background.png');
            background-repeat: repeat;
            background-size: auto 100px;
        }
        .white-text {
            color: white;
            font-weight: 500;
            font-size: 80px;
        }
        .blue-text {
            color: skyblue;
            font-size: 40px;
        }
        .start-button {
            margin-top: 50px;
        }
    </style>
    <script>
        function showLogin() {
            window.location.href = "login.php";
        }
    </script>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100" style="background-color: rgba(0, 0, 0, 0.5);">
        <h1 class="display-4 text-center white-text">Insteach</h1>
        <h2 class="text-center mb-5 blue-text">Tentukan Guru Terbaik untuk Mengajar</h2>
        <div class="start-button">
            <button class="btn btn-primary btn-lg" onclick="showLogin()">Mulai</button>
        </div>
    </div>
</body>
</html>

