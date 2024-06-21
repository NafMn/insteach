<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    </style>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100 " style="background-color: rgba(0, 0, 0, 0.5);">
        <h1 class="display-4 text-center white-text">INSTEACH</h1>
        <h2 class="text-center mb-5 blue-text">Tentukan Guru terbaik untuk mengajar</h2>
        <div class="container card p-5 mb-5 shadow w-50 ">
            <div class="card text-black">
                <div class="card-body">
                    <div class="card-header text-center mb-3"><h2>Login Insteach</h2></div>
                    <form action="./include/auth_validate.php" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center p-3 bg-dark">
        <p class="text-white">Copyright &copy; 2023 NafMn. All rights reserved.</p>
        <p class="text-white">Find me on GitHub: <a href="https://github.com/NafMn" target="_blank">https://github.com/NafMn</a></p>
    </footer>
</body>
</html>

