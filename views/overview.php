<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Smart Waste Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <div class="container mt-4">
        <h1 class="text-center mb-4">Overview</h1>
        <div class="row">
            <!-- Example Box 1 -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-title">Recycling Rate</div>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percent">75%</div>
                </div>
            </div>
            <!-- Example Box 2 -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-title">Waste Reduction</div>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percent">60%</div>
                </div>
            </div>
            <!-- Example Box 3 -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-title">Energy Recovery</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percent">45%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
