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
    <title>Phishing Detection | Detecting Insecure URLs with Machine Learning</title>
    <meta name="description" content="Learn how Machine Learning detects phishing attempts through insecure URLs">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!-- Navbar Menu -->
    <?php include 'include/header.php';?>

    <!-- Machine Learning Section: Insecure URL Detection -->
    <section id="ml" class="py-5">
      <div class="container">
        <h3 class="title text-center mb-4">Detecting Phishing through Insecure URLs with Machine Learning</h3>
        <div class="row">
          <div class="col-md-6">
            <p class="font-weight-bold">How Machine Learning Detects Insecure URLs</p>
            <p>Phishing attacks often rely on insecure or suspicious URLs to trick users into revealing sensitive information. Machine Learning (ML) models can identify these insecure URLs by analyzing patterns in domain names, URL structure, and other metadata.</p>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Machine Learning models can spot fake or spoofed domain names.</li>
              <li class="mb-2"><i class="fa fa-check-circle mr-2"  style="color: #d32f2f;"></i>URLs with suspicious characters or insecure protocols (http instead of https) can be flagged.</li>
              <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>By analyzing URL patterns, ML detects phishing attempts even in new attacks.</li>
              <li class="mb-2"><i class="fa fa-check-circle mr-2" style="color: #d32f2f;"></i>Advanced ML algorithms continuously learn from new data, improving detection accuracy.</li>
            </ul>
            <p>With the help of ML, websites and users can be protected by automatically identifying unsafe URLs, preventing phishing attacks in real-time.</p>
            <a href="" class="btn btn-primary btn-lg" style="background-color: #ff4e00; border: 1px solid white;">Phishing Detection</a>
          </div>
          <div class="col-md-5 offset-md-1">
            <img src="images/ml-img.jpeg" class="img-fluid" style="max-width: 90%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" alt="Machine Learning Detecting Insecure URLs">
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include 'include/footer.php';?>

    <!-- Smooth Scroll js -->
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
  </body>
</html>
