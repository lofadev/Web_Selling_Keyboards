<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <title>Trang chủ</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="public/css/giohangcss/style.css" />
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="public/css/custom.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
  <script src="public/js/modernizr.js"></script>

</head>

<body>
  <?php include 'src/components/Header.php' ?>

  <main class="content">
    <?php
    include 'src/components/Slider.php';
    include 'src/components/SectionProduct.php';
    renderSectionProduct('l1', "Bàn phím cơ");
    renderSectionProduct('l2', "Keycap");
    renderSectionProduct('l3', "Switch");
    renderSectionProduct('l4', "Phụ kiện");
    ?>
  </main>

  <?php include 'src/components/Footer.php' ?>


  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/popper.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/main.js"></script>
  <script src="public/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="public/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="public/js/plugins.js"></script>
  <script type="text/javascript" src="public/js/script.js"></script>
</body>

</html>