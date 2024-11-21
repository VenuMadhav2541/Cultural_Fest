<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');
// Set default timezone to IST
date_default_timezone_set('Asia/Kolkata');
// Query to get events data
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$events = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
                    <h4>Events</h4>
                    <button class="btn btn-dark" data-toggle="modal" data-target="#addEventModal">Add Event</button>
                </div>
                <hr>
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm" id="eventsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Event ID</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event) { ?>
                                <tr>
                                    <th scope="row"><?php echo $event['event_id']; ?></th>
                                    <td><?php echo $event['event_name']; ?></td>
                                    <td><?php echo $event['event_date']; ?></td>
                                    <td><?php echo $event['event_location']; ?></td>
                                    <td><img src="<?php echo '.'.$event['event_image']; ?>" alt="<?php echo $event['event_name']; ?>" width="100" height="60"></td>
                                    <td><button class="btn btn-secondary btn-md edit-btn" data-id="<?php echo $event['event_id']; ?>">&#128393;</button></td>
                                    <td><button class="btn btn-danger btn-md delete-btn" data-id="<?php echo $event['event_id']; ?>">&#10006;</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addEventForm" action="add_event.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="eventName">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="eventLocation">Event Location</label>
                            <input type="text" class="form-control" id="eventLocation" name="event_location" required>
                        </div>
                        <div class="form-group">
                            <label for="eventImage">Event Image</label>
                            <input type="file" class="form-control-file" id="eventImage" name="event_image" required>
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

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editEventForm" action="edit_event.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editEventId" name="event_id">
                        <div class="form-group">
                            <label for="editEventName">Event Name</label>
                            <input type="text" class="form-control" id="editEventName" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventDate">Event Date</label>
                            <input type="date" class="form-control" id="editEventDate" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventLocation">Event Location</label>
                            <input type="text" class="form-control" id="editEventLocation" name="event_location" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventImage">Event Image</label>
                            <input type="file" class="form-control-file" id="editEventImage" name="event_image">
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

    <!-- Delete Event Modal -->
    <div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteEventForm" action="delete_event.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEventModalLabel">Delete Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="deleteEventId" name="event_id">
                        <p>Are you sure you want to delete this event?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#eventsTable').DataTable({
                "paging": true,
                "lengthMenu": [10],
                "ordering": true,
                "searching": true
            });

            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'get_event.php',
                    type: 'GET',
                    data: { id: id },
                    success: function(data) {
                        var event = JSON.parse(data);
                        $('#editEventId').val(event.event_id);
                        $('#editEventName').val(event.event_name);
                        $('#editEventDate').val(event.event_date);
                        $('#editEventLocation').val(event.event_location);
                        $('#editEventModal').modal('show');
                    },
                    error: function() {
                        alert('An error occurred while retrieving event data.');
                    }
                });
            });

            $('.delete-btn').click(function() {
                var id = $(this).data('id');
                $('#deleteEventId').val(id);
                $('#deleteEventModal').modal('show');
            });
        });
    </script>
</body>
</html>