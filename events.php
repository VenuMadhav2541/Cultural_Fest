<?php
include('head.php');

date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');

// Fetch Ongoing Events
$ongoingEventsQuery = "SELECT * FROM events WHERE event_date = '$currentDate'";
$ongoingEventsResult = mysqli_query($conn, $ongoingEventsQuery);
$ongoingEventsCount = mysqli_num_rows($ongoingEventsResult);

// Fetch Upcoming Events
$upcomingEventsQuery = "SELECT * FROM events WHERE event_date > '$currentDate'";
$upcomingEventsResult = mysqli_query($conn, $upcomingEventsQuery);
$upcomingEventsCount = mysqli_num_rows($upcomingEventsResult);

// Fetch Completed Events
$completedEventsQuery = "SELECT * FROM events WHERE event_date < '$currentDate'";
$completedEventsResult = mysqli_query($conn, $completedEventsQuery);
$completedEventsCount = mysqli_num_rows($completedEventsResult);

function getColClass($count) {
  return $count <= 2 ? 'col-md-6' : 'col-md-4';
}

$ongoingColClass = getColClass($ongoingEventsCount);
$upcomingColClass = getColClass($upcomingEventsCount);
$completedColClass = getColClass($completedEventsCount);
?>

<section id="Event_head">
  <div class="heading_event">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content_events_head">
            <h2 class="title">Events</h2>
            <p>Welcome to RVR & JC Events pages</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Blogs -->
<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-5">
        <aside class="sidebar">
          <div class="widget">
            <ul class="tabs">
              <li class="active" rel="tab1">Ongoing</li>
              <li rel="tab2">UpComing</li>
              <li rel="tab3">Completed</li>
            </ul>
            <div class="tab_container bg_grey">
              <h3 class="d_active tab_drawer_heading" rel="tab1">Ongoing</h3>
              <div id="tab1" class="tab_content">
                <div class="row">
                  <?php while($row = mysqli_fetch_assoc($ongoingEventsResult)) { ?>
                    <div class="<?php echo $ongoingColClass; ?> col-sm-6 col-12">
                      <a href="<?php echo "./forms/".$row['event_name'].'.php' ?>">
                        <div class="single_comments">
                          <img alt="" src="<?php echo $row['event_image']; ?>" class="img-fluid">
                          <center>
                            <div class="info_event">
                              <p class="color"><?php echo $row['event_name']; ?></p>
                              <p><?php echo date('F jS, Y', strtotime($row['event_date'])); ?></p>
                              <p>At <?php echo $row['event_location']; ?></p>
                            </div>  
                          </center>            
                        </div>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <h3 class="tab_drawer_heading" rel="tab2">UpComing</h3>
              <div id="tab2" class="tab_content">
                <div class="row">
                  <?php while($row = mysqli_fetch_assoc($upcomingEventsResult)) { ?>
                    <div class="<?php echo $upcomingColClass; ?> col-sm-6 col-12">
                      <a href="<?php echo "./forms/".$row['event_name'].'.php' ?>">
                        <div class="single_comments">
                          <img alt="" src="<?php echo $row['event_image']; ?>" class="img-fluid">
                          <center>
                            <div class="info_event">
                              <p class="color"><?php echo $row['event_name']; ?></p>
                              <p><?php echo date('F jS, Y', strtotime($row['event_date'])); ?></p>
                              <p>At <?php echo $row['event_location']; ?></p>
                            </div>  
                          </center>            
                        </div>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <h3 class="tab_drawer_heading" rel="tab3">Completed</h3>
              <div id="tab3" class="tab_content">
                <div class="row">
                  <?php while($row = mysqli_fetch_assoc($completedEventsResult)) { ?>
                    <div class="<?php echo $completedColClass; ?> col-sm-6 col-12">
                      <a href="#">
                        <div class="single_comments">
                          <img alt="" src="<?php echo $row['event_image']; ?>" class="img-fluid">
                          <center>
                            <div class="info_event">
                              <p class="color"><?php echo $row['event_name']; ?></p>
                              <p><?php echo date('F jS, Y', strtotime($row['event_date'])); ?></p>
                              <p>At <?php echo $row['event_location']; ?></p>
                            </div>  
                          </center>            
                        </div>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-7">
          <h2>Back To The Movements </h2>
          <hr>
          <div class="blog_item padding-bottom">
            <h3 class="color">Coding Competition under the AI & ML Spectrum Club</h3>
            <ul class="comments">
              <li><a href="#.">July 4<sup>th</sup>, 2024</a></li>
              <li><a href="#."><i class="icon-chat-2"></i>5</a></li>
            </ul>
            <div class="image_container">
              <div id="blog-slider" class="owl-carousel">
                <div class="item"><img src="./images1/organizers.jpg" class="img-responsive" alt="blog post"></div>
                <div class="item"><img src="./images1/1.jpg" class="img-responsive" alt="blog post"></div>
                <div class="item"><img src="./images1/2nd.jpg" class="img-responsive" alt="blog post"></div>
              </div>
            </div>
            <p>Coding Competition under the AI & ML Spectrum Club is an exciting and intellectually stimulating technical quiz program that aims to test and enhance participants' knowledge across a wide range of technical subjects.
              From computer science and engineering to beyond, this quiz program covers a diverse array of topics, making it suitable for students, professionals, and tech enthusiasts alike.</p>
          </div>
        </div>
      </div>
  </div>
</section>

<?php include('foot.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
