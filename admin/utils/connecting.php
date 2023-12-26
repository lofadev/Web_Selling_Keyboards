<?php
// connect DB
$servername = "localhost";
$username = "root";
$password = "200288";
$schema = "kicap";

$dsn = "mysql:host=$servername;dbname=$schema";

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Check for connection errors
  if (!$pdo) {
    die("Connection failed: " . $pdo->errorInfo());
  }
} catch (PDOException $e) {
  print $e->getMessage();
}
