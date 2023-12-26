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
            <h2 class="heading-section">Quản lý sản phẩm</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="h5 mb-4 text-center">Danh sách sản phẩm hiện có
              trong kho</h4>
            <div class="table-wrap">

              <table class="table">
                <thead class="thead-primary" style="position: sticky; top: 0; z-index: 1">
                  <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thương hiệu</th>
                    <th width="15%">Cập nhật</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  include '../src/utils/functions.php';
                  $product_list = getAllProducts();
                  $i = 1;
                  foreach ($product_list as $product) {
                    $formatedPrice = number_format($product['Gia'], 0, ',', '.') . 'đ';
                  ?>
                    <tr class="alert" role="alert">
                      <td><span><?php print $i++ ?></span></td>
                      <td>
                        <div class="img" style="background-image: url(../public/<?php print $product['Anh'] ?>)"></div>
                      </td>
                      <td>
                        <div class="product">
                          <span><?php print $product['TenSP'] ?></span>
                        </div>
                      </td>
                      <td><?php print $formatedPrice ?></td>

                      <td class="quantity">
                        <form action="./controllers/productController.php" method="get">
                          <input type="hidden" name="masp" value="<?php print $product['MaSP'] ?>">
                          <div class="input-group">
                            <input type="number" name="sl" class="quantity form-control input-number" value="<?php print $product['SoLuong'] ?>" min="1" max="100" autocomplete="off" />
                          </div>
                          <button class="w-100" type="submit" name="action" value="update_quantity">
                            <i class="fa fa-check"></i>
                          </button>
                        </form>
                      </td>
                      <td><?php print $product['ThuongHieu'] ?></td>
                      <td><a href="updateProduct.php?masp=<?php print $product['MaSP'] ?>">Cập nhật</a></td>
                      <td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông
                                  báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">Bạn có chắc muốn xóa sản
                                phẩm này không?</div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                                <button type="submit" class="btn btn-danger" onclick="handleRemoveProduct()">Xóa</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button class="close" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="handleSaveMsp(<?php print $product['MaSP'] ?>)">
                          <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
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

  <script type="text/javascript">
    const handleSaveMsp = (msp) => {
      localStorage.setItem("masp", msp);
    };

    const handleRemoveProduct = () => {
      const msp = localStorage.getItem("masp");
      window.location.href = "./controllers/productController.php?masp=" + msp + "&action=delete";
    };
  </script>
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