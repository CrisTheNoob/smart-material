<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: routes/signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Smart Waste Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/dashboard.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background: linear-gradient(to bottom, #56ab2f, #a8e063);
            color: white;
            position: fixed;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin-bottom: 10px;
            width: 80%;
            text-align: center;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            transition: background 0.3s ease;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.4);
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .progress {
            height: 20px;
            border-radius: 10px;
        }
        .box-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .percent {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include 'views/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="content">
        <h1>Registration</h1>
        <form action="controllers/register_mrf.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="mrf-number" class="form-label">MRF Number</label>
                <input type="text" class="form-control" id="mrf-number" name="mrf_number" placeholder="Enter MRF Number" required>
            </div>
            <div class="mb-3">
                <label for="mrf-address" class="form-label">MRF Address</label>
                <textarea class="form-control" id="mrf-address" name="mrf_address" placeholder="Enter MRF Address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="contact-number" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="contact-number" name="contact_number" placeholder="Enter Contact Number" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const logoutLink = document.getElementById('logout-link');

        logoutLink.addEventListener('click', () => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.href = 'controllers/logout.php'; // Redirect to logout
                    }, 2000);
                }
            });
        });
    </script>

</body>
</html>
