<?php
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
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Nhập</p>
                    <form class="mx-1 mx-md-4" action="src/controllers/UserSignInController.php" method="post">
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="username" /> <label class="form-label" for="form2Example1">Tài khoản</label>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" /> <label class="form-label" for="form2Example2">Mật khẩu</label>
                      </div>
                      <div class="row mb-4 mt-2">
                        <div class="col d-flex justify-content-center">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked /> <label class="form-check-label" for="form2Example31"> Lưu đăng nhập</label>
                          </div>
                        </div>

                        <div class="col">
                          <a href="#!">Quên mật khẩu?</a>
                        </div>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Đăng
                          nhập</button>
                      </div>

                      <div class="text-center">
                        <p>
                          Không có tài khoản? <a href="signup.php">Đăng ký</a>
                        </p>
                      </div>
                    </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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