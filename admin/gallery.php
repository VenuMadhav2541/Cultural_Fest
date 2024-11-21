<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');
// Set default timezone to IST
date_default_timezone_set('Asia/Kolkata');
// Query to get gallery data
$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);

$gallery = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $gallery[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <h4>Gallery</h4>
                    <button class="btn btn-dark" data-toggle="modal" data-target="#addGalleryModal">Add Gallery Item</button>
                </div>
                <hr>
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm" id="galleryTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Type</th>
                                <th scope="col">URL</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gallery as $item) { ?>
                                <tr>
                                    <th scope="row"><?php echo $item['id']; ?></th>
                                    <td><?php echo $item['event_category']; ?></td>
                                    <td><?php echo $item['event_name']; ?></td>
                                    <td><img src="<?php echo '../'.$item['event_image']; ?>" alt="<?php echo $item['event_name']; ?>" width="100" height="60"></td>
                                    <td><?php echo $item['event_type']; ?></td>
                                    <td><button class="btn btn-primary view-btn" data-url="<?php echo $item['event_url']; ?>"><i class="fas fa-eye"></i></button></td>

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

    <!-- Add Gallery Item Modal -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" role="dialog" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addGalleryForm" action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGalleryModalLabel">Add Gallery Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="eventCategory">Category</label>
                            <input type="text" class="form-control" id="eventCategory" name="event_category" required>
                        </div>
                        <div class="form-group">
                            <label for="eventName">Name</label>
                            <input type="text" class="form-control" id="eventName" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="eventImage">Image</label>
                            <input type="file" class="form-control-file" id="eventImage" name="event_image" required>
                        </div>
                        <div class="form-group">
                            <label for="eventType">Type</label>
                            <input type="text" class="form-control" id="eventType" name="event_type" required>
                        </div>
                        <div class="form-group">
                            <label for="eventUrl">URL</label>
                            <input type="text" class="form-control" id="eventUrl" name="event_url" required>
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

    <!-- Edit Gallery Item Modal -->
    <div class="modal fade" id="editGalleryModal" tabindex="-1" role="dialog" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editGalleryForm" action="edit_gallery.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editEventId" name="id">
                        <div class="form-group">
                            <label for="editEventCategory">Category</label>
                            <input type="text" class="form-control" id="editEventCategory" name="event_category" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventName">Name</label>
                            <input type="text" class="form-control" id="editEventName" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventImage">Image</label>
                            <input type="file" class="form-control-file" id="editEventImage" name="event_image">
                        </div>
                        <div class="form-group">
                            <label for="editEventType">Type</label>
                            <input type="text" class="form-control" id="editEventType" name="event_type" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventUrl">URL</label>
                            <input type="text" class="form-control" id="editEventUrl" name="event_url" required>
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

    <!-- Delete Gallery Item Modal -->
    <div class="modal fade" id="deleteGalleryModal" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteGalleryForm" action="delete_gallery.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteGalleryModalLabel">Delete Gallery Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="deleteEventId" name="id">
                        <p>Are you sure you want to delete this gallery item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS, DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#galleryTable').DataTable({
                lengthMenu: [[10, 100, 1000], [10, 100, 1000]],
                order: [[0, 'asc']]
            });

            $('#galleryTable').on('click', '.view-btn', function () {
                var url = $(this).data('url');
                window.open(url, '_blank');
            });

            $('#galleryTable').on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                $.get('get_gallery_item.php', { id: id }, function (data) {
                    var item = JSON.parse(data);
                    $('#editEventId').val(item.id);
                    $('#editEventCategory').val(item.event_category);
                    $('#editEventName').val(item.event_name);
                    $('#editEventType').val(item.event_type);
                    $('#editEventUrl').val(item.event_url);
                    $('#editGalleryModal').modal('show');
                });
            });

            $('#galleryTable').on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                $('#deleteEventId').val(id);
                $('#deleteGalleryModal').modal('show');
            });
        });
        $(document).ready(function() {
        $('.view-btn').on('click', function() {
            var url = $(this).data('url'); // Get URL from data attribute
            $(this).replaceWith('<a href="' + url + '" target="_blank">' + url + '</a>'); // Replace button with URL
        });
    });
    </script>
</body>
</html>
