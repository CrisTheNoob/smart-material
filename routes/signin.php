<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Waste Management</title>
    <?php include '../views/layouts/base.php'; ?>
    <link rel="stylesheet" href="../resources/css/signin.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login-card">
        <h2 class="text-center mb-4">Login</h2>
        <?php
                session_start();
                include '../config/app.php';

                // Redirect if already logged in
                if (isset($_SESSION['user_id'])) {
                    header('Location: ../welcome.php');
                    exit();
                }

                // Handle form submission
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Check if the user exists
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $user = $result->fetch_assoc();

                        // Verify password
                        if (password_verify($password, $user['password'])) {
                            // Start session and set session variables
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['user_name'] = $user['name'];

                            // Successful login
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Welcome!',
                                    text: 'Login successful!',
                                    confirmButtonText: 'Continue'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../welcome.php';
                                    }
                                });
                            </script>";
                        } else {
                            // Incorrect password
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Failed',
                                    text: 'Invalid password. Please try again.'
                                });
                            </script>";
                        }
                    } else {
                        // Email not found
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: 'Email not found. Please register.'
                            });
                        </script>";
                    }
                }
            ?>
        <form method="POST" id="login-form">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-custom w-100">Login</button>
            <p class="text-center mt-3">
                Don't have an account? <a href="signup.php">Register</a>
            </p>
        </form>
    </div>
    <?php include '../views/layouts/script.php'; ?>
</body>
</html>
