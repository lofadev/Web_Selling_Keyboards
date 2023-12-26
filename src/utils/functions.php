<?php

function getAllProducts()
{
  include '../src/utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("SELECT * FROM sanpham");
    $getProducts->execute();
    $product_list = $getProducts->fetchAll();

    return $product_list;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function getProductByTypeandPage($maloai, $page)
{
  try {
    include 'src/utils/connecting.php';
    $sql = "";
    $skip = 8 * ($page - 1);

    if ($maloai) {
      $sql = "SELECT * FROM sanpham WHERE maloai = :maloai ORDER BY MaSP LIMIT 8 OFFSET :skipping";
    } else {
      $sql = "SELECT * FROM sanpham ORDER BY MaSP LIMIT 8 OFFSET :skipping";
    }

    $getProducts = $pdo->prepare($sql);

    if ($maloai) {
      $getProducts->bindParam(':maloai', $maloai);
    }

    $getProducts->bindParam(':skipping', $skip, PDO::PARAM_INT);


    $getProducts->execute();

    $product_list = $getProducts->fetchAll();
    return $product_list;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}


function getTotalPageByType($maloai)
{
  include 'src/utils/connecting.php';
  try {
    $sql = "SELECT COUNT(*) FROM sanpham WHERE maloai LIKE :maloai";
    $getTotalPage = $pdo->prepare($sql);

    $maloaiParam = '%' . $maloai . '%';
    $getTotalPage->bindParam(':maloai', $maloaiParam);

    $getTotalPage->execute();

    $totalPage = $getTotalPage->fetchColumn();
    return $totalPage;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}


function generateHashPassword($password)
{
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  return $hashedPassword;
}


function verifyPassword($passwordEntered, $hashedPassword)
{
  return password_verify($passwordEntered, $hashedPassword);
}

function getUser($username, $password)
{
  include 'src/utils/connecting.php';
  $sql = "SELECT * FROM khachhang WHERE taikhoan = ? AND matkhau = ?";
  $getUser = $pdo->prepare($sql);
  $getUser->execute(array($username, $password));
  $user = $getUser->fetch(PDO::FETCH_OBJ);
  if ($user > 0) {
    $pdo = null;
    return $user;
  }
  return null;
}
