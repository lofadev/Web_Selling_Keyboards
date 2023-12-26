<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
$action = $_GET['action'];
$masp = $_GET['masp'] ?? "";

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
  case "update": {
      $tensp = $_GET['tensp'];
      $gia = $_GET['gia'];
      $sl = $_GET['sl'];
      $th = $_GET['th'];
      if (!is_numeric($gia)) {
        print '<script>
      alert("Giá không hợp lệ.");
      window.location.href = "../updateProduct.php?masp=' . $masp . '";
      </script>';
      }
      if (!is_numeric($sl)) {
        print '<script>
      alert("Số lượng hợp lệ.");
      window.location.href = "../updateProduct.php?masp=' . $masp . '";
      </script>';
      }
      capnhatSanpham($masp, $tensp, $gia, $sl, $th);
      print '<script>
      alert("Đã cập nhật sản phẩm thành công.");
      window.location.href = "../home.php";
      </script>';
      break;
    }

  case "add": {
      $anh = $_GET['anh'];
      $tensp = $_GET['tensp'];
      $gia = $_GET['gia'];
      $sl = $_GET['sl'];
      $loai = $_GET['loai'];
      $th = $_GET['th'];
      if (!is_numeric($gia)) {
        print '<script>
      alert("Giá không hợp lệ.");
      window.location.href = "../updateProduct.php?masp=' . $masp . '";
      </script>';
      }
      if (!is_numeric($sl)) {
        print '<script>
      alert("Số lượng hợp lệ.");
      window.location.href = "../updateProduct.php?masp=' . $masp . '";
      </script>';
      }
      themSanpham($tensp, $gia, $sl, $loai, $th, $anh);
      print '<script>
      alert("Đã thêm sản phẩm thành công.");
      window.location.href = "../home.php";
      </script>';
      break;
    }
}
