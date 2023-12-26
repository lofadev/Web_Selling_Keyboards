<?php
function renderProductCategory($product_list, $type, $totalPage)
{ ?>
  <section id="product-category" class="product-store position-relative padding-medium">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between align-items-center pb-3">
          <h2 class="display-7 text-dark text-uppercase">
            Danh sách sản phẩm
            <?php
            if ($type) {
              $typeMap = [
                'l1' => "Bàn phím cơ",
                'l2' => "Keycap",
                'l3' => "Switch",
                'l4' => "Phụ kiện",
              ];
              $typeHasUnicode = $typeMap[$type] ?? "";
              print " : " . $typeHasUnicode;
            }
            ?>
          </h2>

          <div class="search-item">
            <a href="#" class="search-button"> <svg class="search">
                <use xlink:href="#search"></use>
              </svg>
            </a>
          </div>

        </div>

        <div class="product-content">
          <?php
          foreach ($product_list as $product) {
            $formatedPrice = number_format($product['Gia'], 0, ',', '.') . ' đ';
          ?>
            <div class="product-card position-relative border shadow rounded">
              <div class="image-holder">
                <img src="public/<?php print $product['Anh'] ?>" alt="product-item" class="img-fluid" />
              </div>
              <div class="cart-concern position-absolute position-bottom">
                <div class="cart-button d-flex">
                  <a href="./src/controllers/CartController.php?masp=<?php print $product['MaSP'] ?>&action=add" class="btn btn-medium btn-black"> Thêm <svg class="cart-outline">
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
          <?php } ?>
        </div>


        <nav aria-label="..." class="mt-5">
          <ul class="pagination justify-content-center">
            <?php
            if (isset($_GET['page'])) {
              $isDisPrev =  $_GET['page'] == 1 ? "disabled" : "";
            } else {
              $isDisPrev = "disabled";
            }
            $searchParam = isset($_GET['search']) ? '&search=' . $_GET['search'] : "";
            ?>
            <li class="page-item <?php print $isDisPrev ?>"><a class="page-link" href="product.php?page=<?php print isset($_GET['page']) && $_GET['page'] - 1 . $searchParam; ?>">Previous</a></li>
            <?php
            for ($i = 1; $i <= $totalPage; $i++) {
              if (isset($_GET['page'])) {
                $currentPage = $i == $_GET['page'] ? 'active' : "";
              } else {
                $currentPage = $i == 1 ? 'active' : "";
              }
            ?>
              <li class="page-item <?php print $currentPage ?>"><a class="page-link" href="product.php?page=<?php print $i . $searchParam; ?>"><?php print $i ?></a></li>
            <?php
            }
            ?>

            <?php
            $page = null;
            if (isset($_GET['page'])) {
              $isDisNext =  $_GET['page'] == $totalPage ? "disabled" : "";
              $page = $_GET['page'];
            } else $page = 1;
            ?>
            <li class="page-item  <?php print $isDisNext ?>"><a class="page-link" href="product.php?page=<?php print $page + 1 . $searchParam; ?>">Next</a></li>
          </ul>
        </nav>

      </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
  </section>
<?php }
