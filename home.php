<?php
session_start();

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username']; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phishing Detection | Stay Safe Online</title>
    <meta name="description" content="Learn how to detect and prevent phishing attacks">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!-- Navbar Menu  ---->
<?php include 'include/header.php';?>

    <!--- Banner Hero section ------->
    <section class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="promo-title">Stay Safe from Phishing Attacks</p>
            <p class="join-title">Learn to Identify and Prevent Online Threats</p>
            <!-- <a href="#" class="link-play">
              <img src="svg/play.svg" alt="" class="play-btn">Watch Tutorial Videos
            </a> -->
          </div>
          <div class="col-md-6">
            <img src="svg/security-shield.svg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <img src="images/ground@-min.png" class="bottom-img" alt="">
    </section>

    <!--- Services/Tips Section ---->
    <section id="services">
      <div class="container text-center">
        <h3 class="title text-center">PHISHING DETECTION TIPS</h3>
        <div class="row text-center">
          <div class="col-md-4 services">
            <img src="svg/a2.svg" class="service-img" alt="">
            <h4>Verify URLs</h4>
            <p>Hover over links before clicking to preview the destination. Watch for slight misspellings or suspicious domains in URLs.</p>
          </div>
          <div class="col-md-4 services">
            <img src="svg/a1.svg" class="service-img" alt="">
            <h4>Check for HTTPS</h4>
            <p>Ensure the URL begins with "https://" indicating a secure connection. Look for a padlock icon in the address bar.</p>
          </div>
          <div class="col-md-4 services">
            <img src="svg/a3.svg" class="service-img" alt="">
            <h4>Inspect the Domain</h4>
            <p>Be cautious of URLs with unfamiliar or misspelled domain names. Verify the legitimacy of the domain before proceeding.</p>
          </div>
        </div>

      </div>
    </section>
    <!--- About Section ------>
    <section id="about" class="py-5">
      <div class="container">
      <h3 class="title text-center mb-4">ABOUT PHISHING</h3>
      <div class="row">
        <div class="col-md-6 about">
        <p class="about-title font-weight-bold">Understanding Modern Phishing Attacks</p>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Phishers often impersonate legitimate companies and services.</li>
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Social engineering tactics are used to manipulate emotions and trust.</li>
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Attacks can target both personal and business information.</li>
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Mobile phishing attempts are increasingly common.</li>
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Sophisticated attacks may use real company logos and branding.</li>
          <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Regular security awareness training is essential for protection.</li>
        </ul>
        </div>
        <div class="col-md-6">
        <img src="images/Phishing.png" class="img-fluid" alt="Phishing Diagram">
        </div>
      </div>
      </div>
    </section>


    <!-- Footer ------>
 <?php include 'include/footer.php';?>

    <!--- Smooth Scroll js ---------->
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
  </body>
</html>