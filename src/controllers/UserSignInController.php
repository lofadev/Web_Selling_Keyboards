<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once '../utils/connecting.php';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM khachhang WHERE taikhoan = :taikhoan AND matkhau = :matkhau");

$stmt->bindParam(':taikhoan', $username);
$stmt->bindParam(':matkhau', $password);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
  $_SESSION['user'] = $result;
  header("Location: ../../index.php");
} else {
  print '<script>
  alert("Tài khoản hoặc mật khẩu chưa chính xác.");
  window.location.href = "../../signin.php";
  </script>';
}
