<?php
session_start();

$username   = $_POST['username'];
$email      = $_POST['email'];
$university = $_POST['university'];
$program    = $_POST['program'] ?? '';
$hobbies    = $_POST['hobbies'] ?? [];
$password   = $_POST['password'];

$errors = [];

if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
    $errors[] = "Username hanya boleh huruf (tanpa angka/simbol).";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if (empty($program)) {
    $errors[] = "Program studi wajib dipilih.";
}

if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
    $errors[] = "Password minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'username'   => $username,
        'email'      => $email,
        'university' => $university,
        'program'    => $program,
        'hobbies'    => $hobbies,
        'password'   => $password
    ];
    header("Location: form.php");
    exit;
}

$_SESSION['username']   = $username;
$_SESSION['email']      = $email;
$_SESSION['university'] = $university;
$_SESSION['program']    = $program;
$_SESSION['hobbies']    = $hobbies;

unset($_SESSION['old']);
unset($_SESSION['errors']);

header("Location: result.php");
exit;
