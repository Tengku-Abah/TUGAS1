<!-- 
 Ambil data dari $_POST.
Jalankan validasi sesuai syarat tugas:
Username huruf aja.
Email ada @ dan domain.
Password ≥ 8 karakter, ada huruf besar, kecil, angka.
(Hobi bisa kosong atau banyak, prodi radio button, perguruan tinggi bebas).
Kalau ada error → echo "<script>alert('Pesan error')</script>"; lalu redirect balik ke form.
Kalau semua valid → redirect ke result.php sambil oper data (misalnya via $_SESSION atau kirim ulang pakai POST).
  -->

<?php
$username = $_POST['username'];
$email = $_POST['email'];
$univ = $_POST['universitas'];
$prodi = $_POST['prodi'];
$hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
$password = $_POST['pass'];

$errors = [];

if (!preg_match("/^[a-zA-Z]+$/", $username)) {
    $errors[] = "Username hanya boleh huruf (tanpa angka)";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if (strlen($password) < 8) {
    $errors[] = "Password minimal 8 karakter.";
}
if (!preg_match("/[A-Z]/", $password)) {
    $errors[] = "Password harus mengandung huruf besar.";
}
if (!preg_match("/[a-z]/", $password)) {
    $errors[] = "Password harus mengandung huruf kecil.";
}
if (!preg_match("/[0-9]/", $password)) {
    $errors[] = "Password harus mengandung angka.";
}


if(!empty($errors)){
    $msg = implode("\\n", $errors);
    echo "<script>alert('".$msg."'); window.history.back();</script>";
    exit;
}else {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['email']    = $email;
    $_SESSION['univ']     = $univ;
    $_SESSION['prodi']    = $prodi;
    $_SESSION['hobi']     = $hobi;
    header("Location: result.php");
    exit;
}

?>