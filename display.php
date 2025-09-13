<?php
session_start();
if (!isset($_SESSION['form_data'])) {
  header("Location: index.php");
  exit;
}
$data = $_SESSION['form_data'];
function e($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Data</title>
</head>
<body>
  <h2>Detail Informasi Data</h2>
  <table border="1" cellpadding="8" cellspacing="0">
    <tr><td>Username</td><td><?= e($data['username']) ?></td></tr>
    <tr><td>Email</td><td><?= e($data['email']) ?></td></tr>
    <tr><td>Perguruan Tinggi</td><td><?= e($data['universitas']) ?></td></tr>
    <tr><td>Program Studi</td><td><?= e($data['prodi']) ?></td></tr>
    <tr><td>Hobi</td><td><?= empty($data['hobi']) ? 'Tidak ada' : implode(", ", array_map('e',$data['hobi'])) ?></td></tr>
  </table>

  <p><a href="index.php">Kembali ke Form</a></p>
</body>
</html>
