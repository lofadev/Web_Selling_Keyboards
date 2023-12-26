<?php
function getProductByProductID($id)
{
  include './utils/connecting.php';
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

function getLoai()
{
  include './utils/connecting.php';
  try {
    $stmt = $pdo->prepare("SELECT * FROM loaihang");

    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function updateCountInStock($masp, $soluong)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("UPDATE sanpham SET soluong = :soluong WHERE masp = :masp");

    $getProducts->bindParam(':soluong', $soluong);
    $getProducts->bindParam(':masp', $masp);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}


function deleteProduct($masp)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("DELETE from sanpham WHERE masp = :masp");

    $getProducts->bindParam(':masp', $masp);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function getXacnhan()
{
  include './utils/connecting.php';
  try {
    $sql = "select MaCTHD,HoTen, TenSP, cthd.SoLuong, Gia, Anh, NgayDatHang, NoiGiaoHang, cthd.DaMua from chitiethoadon as cthd inner join sanpham as sp on cthd.MaSP=sp.MaSP
    inner join hoadon as hd on hd.MaHD = cthd.MaHD 
    inner join khachhang as kh on kh.MaKH = hd.MaKH";
    $getProducts = $pdo->prepare($sql);

    $getProducts->execute();
    $result = $getProducts->fetchAll();
    return $result;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function capNhatTrangThaiDaMua($macthd, $trangthai)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("UPDATE chitiethoadon SET damua = :damua WHERE macthd = :macthd");

    $getProducts->bindParam(':damua', $trangthai);
    $getProducts->bindParam(':macthd', $macthd);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}

function huyDonHang($macthd)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("delete from chitiethoadon WHERE macthd = :macthd");

    $getProducts->bindParam(':macthd', $macthd);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}


function capnhatSanpham($masp, $tensp, $gia, $sl, $thuonghieu)
{
  include '../utils/connecting.php';
  try {
    $getProducts = $pdo->prepare("UPDATE sanpham SET tensp = :tensp, gia=:gia, soluong = :soluong, thuonghieu=:thuonghieu WHERE masp = :masp");

    $getProducts->bindParam(':tensp', $tensp);
    $getProducts->bindParam(':gia', $gia);
    $getProducts->bindParam(':soluong', $sl);
    $getProducts->bindParam(':thuonghieu', $thuonghieu);
    $getProducts->bindParam(':masp', $masp);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}



function themSanpham($tensp, $gia, $sl, $loai, $thuonghieu, $anh)
{
  include '../utils/connecting.php';
  try {
    $sql = "insert into sanpham(tensp, gia, soluong, maloai, thuonghieu, anh) 
    values(:tensp, :gia, :soluong, :loai, :thuonghieu, :anh)";
    $getProducts = $pdo->prepare($sql);

    $getProducts->bindParam(':tensp', $tensp);
    $getProducts->bindParam(':gia', $gia);
    $getProducts->bindParam(':soluong', $sl);
    $getProducts->bindParam(':loai', $loai);
    $getProducts->bindParam(':thuonghieu', $thuonghieu);
    $getProducts->bindParam(':anh', $anh);
    $getProducts->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $pdo = null;
  }
}
