<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../utils/functions.php';
$fullName = $_POST['fullName'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if (empty($fullName) || empty($username) || empty($password) || empty($confirmPassword)) {
  print '<script>
  alert("Vui lòng nhập đầy đủ thông tin");
  window.location.href = "../../signup.php";
  </script>';
  return;
}

$checkExistUserName = getUserbyUserName($username);
if ($checkExistUserName != null) {
  print '<script>
  alert("Tài khoản này đã tồn tại.");
  window.location.href = "../../signup.php";
  </script>';
  return;
}

if ($password  != $confirmPassword) {
  print '<script>
  alert("Mật khẩu không trùng khớp");
  window.location.href = "../../signup.php";
  </script>';
  return;
}

themKhachhang($fullName, $username, $password);
print '<script>
  alert("Đăng ký thành công");
  window.location.href = "../../signin.php";
  </script>';
