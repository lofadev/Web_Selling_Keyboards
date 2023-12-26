<?php
session_start();
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm | admin</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />

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
  <?php
  include './components/headeradmin.php';
  ?>
  <section class="vh-100" style="background-color: #eee; padding-top: 30px;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Thêm
                    sản phẩm</p>

                  <form class="mx-1 mx-md-4" action="./controllers/productController.php" method="get" enctype="multipart/form-data">

                    <div class="mb-4">
                      <input class="form-control" type="file" id="formFile" name="anh"> <label for="formFile" class="form-label">Ảnh</label>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" name="tensp" /> <label class="form-label" for="form3Example1c">Tên sản phẩm</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" class="form-control" name="gia" /> <label class="form-label" for="form3Example3c">Giá</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example4c" class="form-control" name="sl" /> <label class="form-label" for="form3Example4c">Số lượng</label>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <select name="loai" class="form-select" aria-label="Default select example">
                          <?php
                          include './utils/functions.php';
                          $loais = getLoai();
                          foreach ($loais as $loai) {
                          ?>
                            <option value="<?php print $loai['MaLoai'] ?>"><?php print $loai['TenLoai'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <label class="form-label" for="form3Example4c">Loại</label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example4cd" class="form-control" name="th" /> <label class="form-label" for="form3Example4cd">Thương Hiệu</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="action" value="add" class="btn btn-primary btn-lg">Thêm</button>
                    </div>

                    <div class="text-center">
                      <p>
                        <a href="./home.php">Trở về</a>
                      </p>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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