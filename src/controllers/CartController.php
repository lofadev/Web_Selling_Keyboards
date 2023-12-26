<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
$masp = $_GET['masp'];
$carts = $_SESSION['cart'];

$action = $_GET['action'];
switch ($action) {
  case 'add': {
      $product = getProductByProductID($masp);
      $checkExistProductInCarts = false;
      foreach ($carts as &$cart) {
        if ($cart['MaSP'] == $masp) {
          $cart['SoLuong'] += 1;
          $checkExistProductInCarts = true;
          break;
        }
      }

      if (!$checkExistProductInCarts) {
        $product['SoLuong'] = 1;
        array_push($carts, $product);
      }

      $_SESSION['cart'] = $carts;
      header("Location: ../../cart.php");
      break;
    }
  case "update": {
      $soluong = $_GET['sl'];

      foreach ($carts as &$cart) {
        if ($cart['MaSP'] == $masp) {
          $cart['SoLuong'] = $soluong;
          break;
        }
      }
      $_SESSION['cart'] = $carts;
      header("Location: ../../cart.php");
      break;
    }
  case "delete": {
      foreach ($carts as $key => $cart) {
        if ($cart['MaSP'] == $masp) {
          unset($carts[$key]);
          break;
        }
      }

      $_SESSION['cart'] = $carts;
      header("Location: ../../cart.php");
      break;
    }

  case "delete_choose": {
      foreach ($carts as $key => $cart) {
        if ($cart['MaSP'] == $masp) {
          unset($carts[$key]);
          break;
        }
      }

      $_SESSION['cart'] = $carts;
      header("Location: ../../cart.php");
      break;
    }
}
