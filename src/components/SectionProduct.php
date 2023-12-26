<?php
function renderSectionProduct($maloai, $title)
{
  $search = null;
  switch ($maloai) {
    case "l1":
      $search = "banphimco";
      break;
    case "l2":
      $search = "keycap";
      break;
    case "l3":
      $search = "switch";
      break;
    case "l4":
      $search = "phukien";
      break;
  };
?>
  <section class="product-store position-relative padding-medium">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase"><?php print $title ?></h2>
          <div class="btn-right">
            <a href="product.php?search=<?php print $search ?>" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
          </div>
        </div>
        <div class="swiper product-swiper">
          <div class="swiper-wrapper">
            <?php
            include_once 'src/utils/functions.php';
            $product_list = getProductByTypeandPage($maloai, 1);
            foreach ($product_list as $product) {
              $formatedPrice = number_format($product['Gia'], 0, ',', '.') . ' đ';
            ?>
              <div class="swiper-slide">
                <div class="product-card position-relative border shadow rounded">
                  <div class="image-holder">
                    <img src="public/<?php print $product['Anh'] ?>" alt="product-item" class="img-fluid" />
                  </div>
                  <div class="cart-concern position-absolute position-bottom">
                    <div class="cart-button d-flex">
                      <a href="themhangController?msp=<%=sp.getMaSP()%>" class="btn btn-medium btn-black"> Thêm <svg class="cart-outline">
                          <use xlink:href="#cart-outline"></use>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <div class="card-detail d-flex justify-content-between flex-column align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase">
                      <a href="#" class="card_product-title"><?php print $product['TenSP'] ?></a>
                    </h3>

                    <div class="d-flex justify-content-center card-price">
                      <span>Giá: </span> <span class="item-price text-primary"><?php print $formatedPrice ?></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
  </section>
<?php } ?>