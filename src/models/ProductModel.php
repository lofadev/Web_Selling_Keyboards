<?php
class Product
{
  private $masp;
  private $tensp;
  private $soluong;
  private $gia;
  private $thuonghieu;
  private $maloai;
  private $anh;

  public function __construct(
    $masp,
    $tensp,
    $soluong,
    $gia,
    $thuonghieu,
    $maloai,
    $anh
  ) {
    $this->masp = $masp;
    $this->tensp = $tensp;
    $this->soluong = $soluong;
    $this->gia = $gia;
    $this->thuonghieu = $thuonghieu;
    $this->maloai = $maloai;
    $this->anh = $anh;
  }


  public function getMasp()
  {
    return $this->masp;
  }


  public function setMasp($masp)
  {
    $this->masp = $masp;

    return $this;
  }


  public function getTensp()
  {
    return $this->tensp;
  }


  public function setTensp($tensp)
  {
    $this->tensp = $tensp;

    return $this;
  }

  public function getSoluong()
  {
    return $this->soluong;
  }

  public function setSoluong($soluong)
  {
    $this->soluong = $soluong;

    return $this;
  }

  public function getGia()
  {
    return $this->gia;
  }

  public function setGia($gia)
  {
    $this->gia = $gia;

    return $this;
  }

  public function getThuonghieu()
  {
    return $this->thuonghieu;
  }

  public function setThuonghieu($thuonghieu)
  {
    $this->thuonghieu = $thuonghieu;

    return $this;
  }

  public function getMaloai()
  {
    return $this->maloai;
  }

  public function setMaloai($maloai)
  {
    $this->maloai = $maloai;

    return $this;
  }

  public function getAnh()
  {
    return $this->anh;
  }

  public function setAnh($anh)
  {
    $this->anh = $anh;

    return $this;
  }
}
