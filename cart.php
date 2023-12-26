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
                    // session_start();
                    // if (!isset($_SESSION['cart']).lent) {

                    ?>
                    <tr>
                      <td class="text-center h1" colspan="8">Bạn chưa có sản
                        phẩm nào trong giỏ hàng. Vui lòng mua hàng <a href="sanphamController" class="text-primary">tại đây</a>
                      </td>
                    </tr>
                    <?php
                    // } else {
                    // int i = 1;
                    // for (giohangbean g : gh.ds) {
                    // 	Locale locale = new Locale("vi", "VN");

                    // 	NumberFormat currencyFormatter = NumberFormat.getCurrencyInstance(locale);

                    // 	String formattedPrice = currencyFormatter.format(g.getGia());
                    // 	String formattedTotal = currencyFormatter.format(g.getThanhTien());
                    ?>
                    <tr class="alert" role="alert">


                      <td><input type="hidden" name="msp" value="<%=g.getMaSP()%>"> <label class="checkbox-wrap checkbox-primary"> <input type="checkbox" name="<%=g.getMaSP()%>" form="form-cart-delete" /> <span class="checkmark"></span>
                        </label></td>
                      <td><span><%=i++%></span></td>
                      <td>
                        <div class="img" style="background-image: url()"></div>
                      </td>
                      <td>
                        <div class="product">
                          <span><%=g.getTenSP()%> </span>
                        </div>
                      </td>
                      <td><%=formattedPrice%></td>

                      <td class="quantity">
                        <form action="suaghController">
                          <input type="hidden" name="msp" value="<%=g.getMaSP()%>">
                          <div class="input-group">

                            <input type="number" name="txtsl" class="quantity form-control input-number" value="<%=g.getSoLuong()%>" min="1" max="100" autocomplete="off" />
                          </div>
                          <button class="w-100" type="submit" name="btncapnhat">
                            <i class="fa fa-check"></i>
                          </button>
                        </form>
                      </td>
                      <td><%=formattedTotal%></td>
                      <td><a href="suaghController?msp=<%=g.getMaSP()%>&btnxoa" class="close"> <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </a></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div>



            <h2 class="text-right mt-2">
              <%
						Locale locale = new Locale("vi", "VN");

						NumberFormat currencyFormatter = NumberFormat.getCurrencyInstance(locale);

						String totalPrice = currencyFormatter.format(gh.TongTien());
						%>
              <span>Tổng tiền: </span> <span><%=totalPrice%></span>
            </h2>

            <div class="text-right">
              <a href="xacnhanController" class="btn btn-primary">Thanh Toán</a>
            </div>


            <div class="text-center">
              <a href="sanphamController" class="btn btn-primary">Tiếp tục
                mua hàng</a>
            </div>
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