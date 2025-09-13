<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.php");
  exit;
}

$username    = $_POST['username']    ?? '';
$email       = $_POST['email']       ?? '';
$universitas = $_POST['universitas'] ?? '';
$prodi       = $_POST['prodi']       ?? '';
$hobi        = $_POST['hobi']        ?? [];
$password    = $_POST['password']    ?? '';

$errors = [];

/* 1. Username: hanya huruf */
if (!preg_match("/^[A-Za-z]+$/", $username)) {
  $errors[] = "Username hanya boleh huruf tanpa angka/simbol.";
}

/* 2. Email: valid */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Format email tidak valid.";
}

/* 3. Perguruan Tinggi */
if (trim($universitas) === '') {
  $errors[] = "Perguruan Tinggi wajib diisi.";
}

/* 4. Program Studi */
if ($prodi === '') {
  $errors[] = "Program Studi wajib dipilih.";
}

/* 5. Password */
if (!(strlen($password) >= 8 &&
      preg_match("/[A-Z]/", $password) &&
      preg_match("/[a-z]/", $password) &&
      preg_match("/[0-9]/", $password))) {
  $errors[] = "Password minimal 8 karakter, ada huruf besar, kecil, dan angka.";
}

/* Jika ada error */
if (!empty($errors)) {
  $msg = implode("\\n", $errors);
  echo "<script>alert('$msg'); window.history.back();</script>";
  exit;
}

/* Jika lolos validasi → simpan data ke session lalu redirect */
session_start();
$_SESSION['form_data'] = [
  'username' => $username,
  'email' => $email,
  'universitas' => $universitas,
  'prodi' => $prodi,
  'hobi' => $hobi
];

echo "<script>alert('Form submitted successfully'); window.location.href='display.php';</script>";
exit;
