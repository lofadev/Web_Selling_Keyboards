<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
$action = $_GET['action'];
$masp = $_GET['masp'];
$action = $_GET['action'];

switch ($action) {
  case "update_quantity": {
      $soluong = $_GET['sl'];
      updateCountInStock($masp, $soluong);
      print '<script>
      alert("Đã cập nhật số lượng thành công.");
      window.location.href = "../home.php";
      </script>';
      break;
    }
  case "delete": {
      deleteProduct($masp);
      print '<script>
      alert("Đã xóa sản phẩm thành công.");
      window.location.href = "../home.php";
      </script>';
      break;
    }
}
