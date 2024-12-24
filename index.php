<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Waste Management</title>
    <?php include 'views/layouts/base.php';  ?>
    <link rel="stylesheet" href="resources/css/index.css">
</head>
<body>
    <div class="container">
        <header class="mb-5">
            <h1 class="header-title display-4 fw-bold">Smart Waste Management</h1>
            <p class="header-description fs-5 mt-3">
                Revolutionizing the way we handle waste with technology. Join us in creating a cleaner, greener planet.
            </p>
        </header>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="routes/signin.php" class="btn btn-primary btn-custom">Login</a>
            <a href="routes/signup.php" class="btn btn-success btn-custom">Register</a>
        </div>
    </div>

    <?php include 'views/layouts/script.php'; ?>
</body>
</html>
