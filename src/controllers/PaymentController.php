<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
if (!isset($_SESSION['user'])) {
  header('Location: ./signin.php');
  return;
}
$carts = $_SESSION['cart'];
$currentDate = date("Y-m-d");
$noigiaohang = $_GET['noigiaohang'];
themHoaDon($_SESSION['user']['MaKH'], $currentDate, $noigiaohang);

$maxhd = getMaxHD();
foreach ($carts as $cart) {
  themChitietHD($maxhd, $cart['MaSP'], $cart['SoLuong']);
}
unset($_SESSION['cart']);
print '<script>
alert("Đã đặt hàng thành công");
window.location.href = "../../cart.php";
</script>';
