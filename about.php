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