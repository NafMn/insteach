<?php include './include/header.php'; ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="./image/<?php echo $_SESSION['username']; ?>.png" alt="Profile Picture" class="rounded-circle mb-3" width="150" height="150">
                        <a href="edit_profile.php" class="text-center mt-3">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <h2 class="card-title"><?php echo $_SESSION['username']; ?></h2>
                        <p class="card-text">This is your profile page. You can change your profile picture, username, and password here.</p>
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                        <a href="reset_password.php" class="btn btn-primary">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include './include/footer.php'; ?>

