<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
$action = $_GET['action'];
$macthd = $_GET['macthd'];

switch ($action) {
  case "xacnhan": {
      capNhatTrangThaiDaMua($macthd, 1);
      print "<script> 
      alert('Xác nhận đơn hàng thành công');
      window.location.href= '../xacnhandathang.php';
      </script>";
      break;
    }
  case "huyxacnhan": {
      capNhatTrangThaiDaMua($macthd, 0);
      print "<script> 
      alert('Đã hủy xác nhận đơn hàng thành công');
      window.location.href= '../xacnhandathang.php';
      </script>";
      break;
    }
  case "huy": {
      huyDonHang($macthd);
      print "<script> 
      alert('Đã hủy đơn hàng thành công');
      window.location.href= '../xacnhandathang.php';
      </script>";
      break;
    }
}
