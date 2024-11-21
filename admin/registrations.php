<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');
// Set default timezone to IST
date_default_timezone_set('Asia/Kolkata');
// Query to get registration data
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

$registrations = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $registrations[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- DataTables Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
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
        .main { display: flex; justify-content: center; align-items: center; height: 91.5vh; }
        .student-container { height: 90%; width: 90%; border-radius: 20px; padding: 40px; background-color: rgba(255, 255, 255, 0.8); }
        .student-container > div { box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 10px; padding: 30px; height: 100%; overflow-x: auto; }
        .title { display: flex; justify-content: space-between; align-items: center; }
        table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting_asc_disabled, table.dataTable thead > tr > th.sorting_desc_disabled, table.dataTable thead > tr > td.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting_asc_disabled, table.dataTable thead > tr > td.sorting_desc_disabled { text-align: center; }
        .table-container { overflow-x: auto; }
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
    <div class="main">
        <div class="student-container">
            <div class="student-list">
                <div class="title">
                    <h4>Registrations</h4>
                </div>
                <hr>
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm" id="registrationsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Regd No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Event Registered</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registrations as $item) { ?>
                                <tr>
                                    <th scope="row"><?php echo $item['id']; ?></th>
                                    <td><?php echo $item['regd_no']; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['email']; ?></td>
                                    <td><?php echo $item['phone']; ?></td>
                                    <td><?php echo $item['event_registered']; ?></td>
                                    <td><button class="btn btn-secondary btn-md edit-btn" data-id="<?php echo $item['id']; ?>">&#128393;</button></td>
                                    <td><button class="btn btn-danger btn-md delete-btn" data-id="<?php echo $item['id']; ?>">&#10006;</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Registration Modal -->
    <div class="modal fade" id="editRegistrationModal" tabindex="-1" role="dialog" aria-labelledby="editRegistrationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editRegistrationForm" action="edit_registration.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRegistrationModalLabel">Edit Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editRegId" name="id">
                        <div class="form-group">
                            <label for="editRegdNo">Regd No</label>
                            <input type="text" class="form-control" id="editRegdNo" name="regd_no" required>
                        </div>
                        <div class="form-group">
                            <label for="editRegName">Name</label>
                            <input type="text" class="form-control" id="editRegName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editRegEmail">Email</label>
                            <input type="email" class="form-control" id="editRegEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="editRegPhone">Phone</label>
                            <input type="text" class="form-control" id="editRegPhone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="editRegEventRegistered">Event Registered</label>
                            <input type="text" class="form-control" id="editRegEventRegistered" name="event_registered" required>
                        </div>
                        <div class="form-group">
                            <label for="editRegDate">Registration Date</label>
                            <input type="text" class="form-control" id="editRegDate" name="registration_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registrationsTable').DataTable({
                "pagingType": "simple_numbers",
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "&lt;",
                        "next": "&gt;"
                    }
                }
            });

            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                $.ajax({
                    url: 'get_registration.php',
                    type: 'GET',
                    data: { id: id },
                    success: function (data) {
                        var registration = JSON.parse(data);
                        $('#editRegId').val(registration.id);
                        $('#editRegdNo').val(registration.regd_no);
                        $('#editRegName').val(registration.name);
                        $('#editRegEmail').val(registration.email);
                        $('#editRegPhone').val(registration.phone);
                        $('#editRegEventRegistered').val(registration.event_registered);
                        $('#editRegDate').val(registration.registration_date);
                        $('#editRegistrationModal').modal('show');
                    }
                });
            });

            $('.delete-btn').click(function () {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this registration?')) {
                    $.ajax({
                        url: 'delete_registration.php',
                        type: 'POST',
                        data: { id: id },
                        success: function (response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

