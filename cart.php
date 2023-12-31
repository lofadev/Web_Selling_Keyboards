<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$totalCost = 0;
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
  <title>Giỏ hàng</title>

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
              <h2 class="heading-section">Giỏ hàng</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h3 class="h5 mb-4 text-center">Danh sách sản phẩm hiện có
                trong giỏ hàng</h3>
              <div class="table-wrap">

                <form action="suaghController" id="form-cart-delete"></form>
                <table class="table">
                  <thead class="thead-primary">
                    <tr>
                      <th><input class="btn btn-danger" type="submit" name="btnxoachon" value="Xóa chọn" form="form-cart-delete"></th>
                      <th>STT</th>
                      <th>Ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                    ?>
                      <tr>
                        <td class="text-center h1" colspan="8">Bạn chưa có sản
                          phẩm nào trong giỏ hàng. Vui lòng mua hàng <a href="product.php" class="text-primary">tại đây</a>
                        </td>
                      </tr>
                      <?php
                    } else {
                      $i = 1;
                      $carts = $_SESSION['cart'];
                      foreach ($carts as $cart) {
                        $formatedPrice = number_format($cart['Gia'], 0, ',', '.') . 'đ';
                        $formatedTotalPrice = number_format($cart['Gia'] * $cart['SoLuong'], 0, ',', '.') . 'đ';
                        $totalCost += $cart['Gia'] * $cart['SoLuong'];
                      ?>
                        <tr class="alert" role="alert">
                          <td><input type="hidden" name="masp" value="<?php print $cart['MaSP'] ?>"> <label class="checkbox-wrap checkbox-primary"> <input name="checkboxes" type="checkbox" form="form-cart-delete" /> <span class="checkmark"></span>
                            </label></td>
                          <td><span><?php print $i++ ?></span></td>
                          <td>
                            <div class="img" style="background-image: url(public/<?php print $cart['Anh'] ?>)"></div>
                          </td>
                          <td>
                            <div class="product">
                              <span><?php print $cart['TenSP'] ?> </span>
                            </div>
                          </td>
                          <td><?php print $formatedPrice ?></td>

                          <td class="quantity">
                            <form action="./src/controllers/CartController.php" method="get">
                              <input type="hidden" name="masp" value="<?php print $cart['MaSP'] ?>">
                              <div class="input-group">

                                <input type="number" name="sl" class="quantity form-control input-number" value="<?php print $cart['SoLuong'] ?>" min="1" max="100" autocomplete="off" />
                              </div>
                              <button class="w-100" type="submit" name="action" value="update">
                                <i class="fa fa-check"></i>
                              </button>
                            </form>
                          </td>
                          <td><?php print $formatedTotalPrice ?></td>
                          <td><a href="./src/controllers/CartController.php?masp=<?php print $cart['MaSP'] ?>&action=delete" class="close"> <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </a></td>
                        </tr>

                    <?php }
                    } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div>



            <h2 class="text-right mt-2">
              <span>Tổng tiền: </span> <span><?php print number_format($totalCost, 0, ',', '.') . 'đ';  ?></span>
            </h2>

            <div class="text-right">
              <button onclick="handlePayment()" class="btn btn-primary">Thanh Toán</button>
            </div>


            <div class="text-center">
              <a href="product.php" class="btn btn-primary">Tiếp tục
                mua hàng</a>
            </div>
          </div>
        </div>
      </section>

      <script>
        const handlePayment = () => {
          const noigiaohang = prompt("Vui lòng nhập nơi giao hàng");
          window.location.href = "./src/controllers/PaymentController.php?noigiaohang=" + noigiaohang;
        };
      </script>
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