<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user'])) {
  header('Location: signin.php');
  return;
}
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
  <title>Lịch sử mua hàng</title>

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
    <main class="main-content">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
              <h2 class="heading-section">Lịch sử mua hàng</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h3 class="h5 mb-4 text-center">Danh sách các mặt hàng mà bạn đã đặt</h3>
              <div class="table-wrap">

                <form action="suaghController" id="form-history-delete"></form>
                <table class="table">
                  <thead class="thead-primary">
                    <tr>
                      <th>STT</th>
                      <th>Ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    include './src/utils/functions.php';
                    $historys = getLichSu($_SESSION['user']['MaKH']);
                    if (count($historys) == 0) {
                    ?>
                      <tr>
                        <td class="text-center h1" colspan="8">Bạn chưa mua sản phẩm nào. Vui lòng mua hàng <a href="product.php" class="text-primary">tại đây</a>
                        </td>
                      </tr>
                      <?php
                    } else {
                      $i = 1;
                      foreach ($historys as $history) {
                        $formatedPrice = number_format($history['Gia'], 0, ',', '.') . 'đ';
                        $formatedTotalPrice = number_format($history['Gia'] * $history['SoLuong'], 0, ',', '.') . 'đ';
                      ?>
                        <tr class="alert" role="alert">
                          <td><span><?php print $i++ ?></span></td>
                          <td>
                            <div class="img" style="background-image: url(public/<?php print $history['Anh'] ?>)"></div>
                          </td>
                          <td>
                            <div class="product">
                              <span><?php print $history['TenSP'] ?> </span>
                            </div>
                          </td>
                          <td><?php print $formatedPrice ?></td>

                          <td class="quantity">
                            <?php print $history['SoLuong'] ?>
                          </td>
                          <td><?php print $formatedTotalPrice ?></td>
                          <td><?php if ($history['DaMua'] == 1) { ?>
                              <span class="text-success">Đã xác nhận</span>
                            <?php } else { ?>
                              <span class="text-primary">Đang chờ...</span>
                            <?php } ?>
                          </td>
                        </tr>

                    <?php }
                    } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <a href="product.php" class="btn btn-primary">Tiếp tục
              mua hàng</a>
          </div>
        </div>
      </section>
    </main>
  </main>

  <?php include './src/components/Footer.php' ?>


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