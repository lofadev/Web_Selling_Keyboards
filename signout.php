<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
  header("Location: index.php");
}
