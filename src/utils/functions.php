<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

function getProductByProductID($id)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("SELECT * FROM sanpham where masp = :msp");

    $getProducts->bindParam(':msp', $id);
    $getProducts->execute();
    $product = $getProducts->fetch();

    return $product;
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

  try {
    $sql = "SELECT * FROM khachhang WHERE taikhoan = :taikhoan AND matkhau = :matkhau";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':taikhoan', $username);
    $stmt->bindParam(':matkhau', $password);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function getLichSu($userId)
{
  include 'src/utils/connecting.php';

  try {
    $sql = "select MaCTHD, TenSP, cthd.SoLuong, Gia, Anh, NgayDatHang, cthd.DaMua
    from chitiethoadon as cthd 
      inner join sanpham as sp on cthd.MaSP=sp.MaSP
      inner join hoadon as hd on hd.MaHD = cthd.MaHD
    where MaKH = :makh";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':makh', $userId);

    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function themHoaDon($makh, $ngaydathang, $noigiaohang)
{
  include '../utils/connecting.php';

  try {
    $sql = "insert into hoadon(makh, ngaydathang, noigiaohang, damua) values(:makh, :ngaydathang, :noigiaohang, 0)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':makh', $makh);
    $stmt->bindParam(':ngaydathang', $ngaydathang);
    $stmt->bindParam(':noigiaohang', $noigiaohang);

    $stmt->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function getMaxHD()
{
  include '../utils/connecting.php';

  try {
    $sql = "select max(mahd) from hoadon";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $maxhd = $stmt->fetchColumn();
    return $maxhd;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function themChitietHD($mahd, $masp, $soluong)
{
  include '../utils/connecting.php';

  try {
    $sql = "insert into chitiethoadon(mahd, masp, soluong, damua) values(:mahd, :masp, :soluong, 0)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':mahd', $mahd);
    $stmt->bindParam(':masp', $masp);
    $stmt->bindParam(':soluong', $soluong);

    $stmt->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}
