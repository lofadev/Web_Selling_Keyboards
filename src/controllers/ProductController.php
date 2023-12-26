<?php
require 'src/utils/functions.php';
$maloai = "";
$product_list =  getProductByTypeandPage($maloai, 1);
$totalPage = getTotalPageByType($maloai);
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $searchMap = [
    'banphimco' => 'l1',
    'keycap'    => 'l2',
    'switch'    => 'l3',
    'phukien'   => 'l4',
  ];
  $maloai = $searchMap[$search] ?? '';
  $product_list = getProductByTypeandPage($maloai, 1);
  $totalPage = getTotalPageByType($maloai);
}

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  print $page;
}

include 'src/components/ProductCategory.php';
renderProductCategory($product_list, $maloai, $totalPage / 8);
