<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Smart Waste Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/signup.css">
    <!-- SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="signup-card p-4 bg-white shadow rounded">
            <h2 class="text-center mb-4">Sign Up</h2>
            <?php
                include '../config/app.php';

                // Handle form submission
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];

                    // Check if email already exists
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Email already registered
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Email is already registered!'
                            });
                        </script>";
                    } else {
                        // Check if passwords match
                        if ($password !== $confirm_password) {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Passwords do not match!'
                                });
                            </script>";
                        } else {
                            // Hash the password and save the user
                            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $name, $email, $hashed_password);

                            if ($stmt->execute()) {
                                // Show success SweetAlert and redirect to login page
                                echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Registration successful!',
                                        confirmButtonText: 'Go to Login'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = 'signin.php';
                                        }
                                    });
                                </script>";
                            } else {
                                echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong! Please try again.'
                                    });
                                </script>";
                            }
                        }
                    }
                }
                $conn->close();
            ?>

            <form action="" method="POST" id="signup-form">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-success btn-custom w-100">Sign Up</button>
                <p class="text-center mt-3">
                    Already have an account? <a href="signin.php">Login</a>
                </p>
            </form>
        </div>
    </div>

    <?php include '../views/layouts/script.php'; ?>
    <script src="../resources/js/signup.js"></script>
    <script>
        // JavaScript validation for password matching
        const form = document.getElementById('signup-form');
        form.addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Passwords do not match!'
                });
            }
        });
    </script>
</body>
</html>
