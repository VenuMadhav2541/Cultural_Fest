<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');

// Query to count rows in each table
$tables = ['events', 'gallery', 'registration', 'issues'];
$data = [];

foreach ($tables as $table) {
    $sql = "SELECT COUNT(*) AS total FROM $table";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $data[$table] = $row['total'];
    } else {
        $data[$table] = 0; // Default to 0 if query fails
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="logo.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        * { margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
            background-blend-mode: multiply,multiply;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 91.5vh;
        }
        .dashboard-content {
            width: 90%;
            border-radius: 20px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .dashboard-cards {
            display: flex;
            justify-content: space-between;
        }
        .card {
            flex: 1;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            text-align: center;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="registrations.php">Registrations</a></li>
                <li class="nav-item"><a class="nav-link" href="issues.php">Issues</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="dashboard-container">
        <div class="dashboard-content">
        <div id="home" class="content-section active">
                    <div class="row text-center">
                        <div class="col-md-4 ml-5 col-sm-12 mb-5">
                            <div class="card text-white mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-success"><b>Total Events</b></h5>
                                    <p class="card-text text-success"><b><?php echo $data['events']; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ml-5 mr-5"></div>
                        <div class="col-md-4 mr-3 col-sm-12 mb-5">
                            <div class="card text-white mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-info"><b>Total Gallery Items</b></h5>
                                    <p class="card-text text-info"><b><?php echo $data['gallery']; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3 ml-5 col-sm-12">
                            <div class="card text-white mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-warning"><b>Total Issues</b></h5>
                                    <p class="card-text text-warning"><b><?php echo $data['issues']; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ml-5 mr-5 col-sm-12"></div>
                        <div class="col-md-4 mt-3 mr-3">
                            <div class="card text-white mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-danger"><b>Total Registrations</b></h5>
                                    <p class="card-text text-danger"><b><?php echo $data['registration']; ?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> 
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
