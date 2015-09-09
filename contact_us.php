<?php
  $errName ="";
  $errMessage ="";
  $result="";
  $errEmail ="";

  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'Contact Form';
    $to = 'acm@cs.odu.edu';
    $subject = 'Message from Contact Us page Acm main site';

    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Please enter your message';
    }

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Thank You! We will be in touch</div>';
  } else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
  }
}
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : BarbedFlower
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
<link href="bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="wrapper">
  <div id="header-wrapper">
    <div id="header" class="container">
      <div id="logo">
        <img src="images/acm_logo.png">
        &nbsp;&nbsp;&nbsp;
        <a href="#">ODU ACM</a>
      </div>
      <div id="menu">
        <ul>
          <li><a href="index.html" accesskey="1" title="">Home</a></li>
          <li><a href="about_us.html" accesskey="2" title="">About Us</a></li>
          <li><a href="#" accesskey="2" title="">Events</a></li>
          <li class="active"><a href="contact_us.html" accesskey="5" title="">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="banner">
    <div class="container">
      <div class="title">
        <h2>Association for Computing Machinery</h2>
        <span class="byline">at Old Dominion University</span> </div>
    <!--  <ul class="actions">
        <li><a href="#" class="button">Etiam posuere</a></li>
      </ul> -->
    </div>
  </div>

  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <?php echo $result; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <h1 class="page-header text-center">Contact Us</h1>
        <form class="form-horizontal" role="form" method="post" action="contact_us.php">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
              <?php echo "<p class='text-danger'>$errName</p>";?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
              <?php echo "<p class='text-danger'>$errEmail</p>";?>
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="4" name="message"></textarea>
              <?php echo "<p class='text-danger'>$errMessage</p>";?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="copyright" class="container">
  <p>Old Dominion University ACM © 2015 </p>
</div>
</body>
</html>