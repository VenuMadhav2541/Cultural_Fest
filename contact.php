<?php
include('head.php');
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/autoload.php';

$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['phone'];
    $issue_subject = $_POST['subject'];
    $issue_message = $_POST['issue'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO issues (full_name, email, mobile_number, issue_subject, issue_message, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $full_name, $email, $mobile_number, $issue_subject, $issue_message);

    // Execute the statement
    if ($stmt->execute()) {
        $msg = "Issue Submitted successfully";
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'y21cm045@gmail.com';             // SMTP username
            $mail->Password   = 'louz ykds qdzg alyb';                  // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable implicit TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('y21cm045@gmail.com', 'Issue Submission');
            $mail->addAddress($email, $full_name);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Issue Submission Successful';
            $mail->Body    = "
            <html>
            <head>
            <title>Issue Submission Successful</title>
            </head>
            <body>
            <p>Dear $full_name,</p>
            <p>Thank you for Submitting your issue.</p>
            <p>We'll look into and inform you shortly be rectifying it.</p>
            <p>Best Regards,<br>Event Team</p>
            </body>
            </html>
            ";
            $mail->AltBody = "Dear $full_name,\n\nThank you for Submitting your issue. \n\nWe'll look into and inform you shortly be rectifying it.\n\nBest Regards,\nEvent Team";

            $mail->send();
        } catch (Exception $e) {
            $usernameError = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $msg = "Error: " . $stmt->error;
    }
}

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
?>
<style>
        .email-container {
            padding: 20px;
        }
        .email-heading {
            padding-top: 15px;
            text-align: center;
            font-size: 2em;
            color: #e25111;
            margin-bottom: 30px;
            position: relative;
        }
        .email-heading:after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #e25111;
            margin: 10px auto 0;
        }
        .email-item {
            margin-bottom: 20px;
            text-align: center;
        }
        .email-link {
            font-size: 1.2em;
            color: black;
            text-decoration: none;
            position: relative;
            padding-bottom: 5px;
        }
        .email-link:hover {
            color: #003d82;
        }
        .email-link:after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #0056b3;
            transition: width 0.3s;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .email-link:hover:after {
            width: 100%;
        }
        .btn-submit{
          border: transparent;
          border-radius: 25px;
          background:#e25111;
          color:#fff;
          cursor:pointer;
          font-weight: bold;
          font-size:18px;
          line-height:1;
          width: 150px;
        }
        .btn-submit:hover{
          background:black;
          color:#e25111;
        }
        .button3{
          color:#fff;
          padding:12px 30px;
          display:inline-block;
        }
        .bg_bistro	.button3:hover, .bg_bistro .button3:focus{
          background:#111111;
        }
</style>
<section id="Event_head">
  <div class="heading_about">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content_abouts_head">
            <h2 class="title">Contact &nbsp;Us</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Feedback Form -->
<div class="main-container bg_grey">
  <section class="contact" id="review" style="min-height: 60vh;">
    <div class="container">
      <h2 class="color text-center" style="padding-top: 15px; text-align: center;">Submit Issues</h2><br>
      <form action="contact.php" method="POST">
        <?php if ($msg): ?>
          <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Full Name" style="margin-bottom: 10px !important; border:1px solid black !important;" required>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email Address" style="margin-bottom: 10px !important; border:1px solid black !important;" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="number" name="phone" class="form-control" placeholder="Mobile Number" style="margin-bottom: 10px !important; border:1px solid black !important;" required>
          </div>
          <div class="col-md-6">
            <input type="text" name="subject" class="form-control" placeholder="Issue Subject" style="margin-bottom: 10px !important; border:1px solid black !important;" required>
          </div>
        </div>
        <textarea class="form-control mb-3" name="issue" rows="5" placeholder="Enter Issue Clearly" style="margin-bottom: 10px !important; border:1px solid black !important;" required></textarea>
        <div class="form-group">
            <input type="submit" class="btn-submit button3" value="Submit" />
        </div>
      </form>
    </div>
    <div class="container email-container">
    <h2 class="email-heading" data-aos="fade-up">Our Emails</h2><br>
    <div id="venu" class="email-item" data-aos="fade-up" data-aos-delay="100">
        <p class="address"><i class="icon-dollar"></i><a href="mailto:y21cm006@rvrjc.ac.in" class="email-link">&nbsp;y21cm006@rvrjc.ac.in</a></p>
    </div>
    <div id="yogi" class="email-item" data-aos="fade-up" data-aos-delay="200">
        <p class="address"><i class="icon-dollar"></i><a href="mailto:y21cm045@rvrjc.ac.in" class="email-link">&nbsp;y21cm045@rvrjc.ac.in</a></p>
    </div>
    <div id="deep" class="email-item" data-aos="fade-up" data-aos-delay="300">
        <p class="address"><i class="icon-dollar"></i><a href="mailto:y21cm065@rvrjc.ac.in" class="email-link">&nbsp;y21cm065@rvrjc.ac.in</a></p>
    </div>
    <div id="janu" class="email-item" data-aos="fade-up" data-aos-delay="400">
        <p class="address"><i class="icon-dollar"></i><a href="mailto:y21cm048@rvrjc.ac.in" class="email-link">&nbsp;y21cm048@rvrjc.ac.in</a></p>
    </div>
    </div>
  </section>
</div>
  <br />

<br>
<?php include('foot.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
