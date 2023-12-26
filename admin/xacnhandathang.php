<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
  <title>Trang chủ | admin</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../public/css/giohangcss/style.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../public/css/custom.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
  <script src="../public/js/modernizr.js"></script>
</head>

<body>
  <?php include '../admin/components/headeradmin.php' ?>
  <main class="main-content" style="padding-top: 90px">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-4">
            <h2 class="heading-section">Xác nhận đơn hàng</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="h5 mb-4 text-center">Danh sách các sản phẩm mà khách hàng đã đặt</h4>
            <div class="table-wrap">

              <table class="table">
                <thead class="thead-primary" style="position: sticky; top: 0; z-index: 1">
                  <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Họ tên</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Nơi giao hàng</th>
                    <th>Xác nhận</th>
                    <th>Hủy</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../utils/functions.php';
                  $accepts = getXacnhan();
                  $i = 1;
                  foreach ($accepts as $accept) {
                    $formatedPrice = number_format($accept['Gia'], 0, ',', '.') . 'đ';
                  ?>
                    <tr class="alert" role="alert">
                      <td><span><?php print $i++ ?></span></td>
                      <td>
                        <div class="img" style="background-image: url(../public/<?php print $accept['Anh'] ?>)"></div>
                      </td>
                      <td>
                        <div>
                          <span><?php print $accept['HoTen'] ?></span>
                        </div>
                      </td>
                      <td>
                        <div class="product">
                          <span><?php print $accept['TenSP'] ?></span>
                        </div>
                      </td>
                      <td><?php print $formatedPrice ?></td>

                      <td class="quantity">
                        <?php print $accept['SoLuong'] ?>
                      </td>
                      <td>
                        <?php print $accept['NgayDatHang'] ?>
                      </td>
                      <td>
                        <?php print $accept['NoiGiaoHang'] ?>
                      </td>
                      <td>
                        <a href="" class="text-primary">Xác nhận</a>
                      </td>
                      <td>
                        <a href="" class="text-danger">Hủy</a>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/main.js"></script>
  <script src="../public/js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="../public/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../public/js/plugins.js"></script>
  <script type="text/javascript" src="../public/js/script.js"></script>
</body>

</html>