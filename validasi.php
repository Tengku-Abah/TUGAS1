<?php
// Fungsi untuk validasi username (tidak boleh mengandung angka)
function validateUsername($username) {
    return !preg_match('/[0-9]/', $username);
}

// Fungsi untuk validasi email (harus mengandung @ dan domain)
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Fungsi untuk validasi password
function validatePassword($password) {
    // Minimal 8 karakter
    if (strlen($password) < 8) {
        return false;
    }
    
    // Harus ada huruf besar
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    
    // Harus ada huruf kecil
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    
    // Harus ada angka
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    
    return true;
}

// Array untuk menyimpan error messages
$errors = [];

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari form (sesuai dengan name di index.html)
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $universitas = trim($_POST['universitas'] ?? '');
    $prodi = $_POST['prodi'] ?? '';
    $hobi = $_POST['hobi'] ?? [];
    $password = $_POST['password'] ?? '';
    
    // Validasi Username
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (!validateUsername($username)) {
        $errors[] = "Username cannot contain numbers";
    }
    
    // Validasi Email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!validateEmail($email)) {
        $errors[] = "Email must contain @ followed by domain";
    }
    
    // Validasi Perguruan Tinggi
    if (empty($universitas)) {
        $errors[] = "Perguruan Tinggi is required";
    }
    
    // Validasi Program Studi
    if (empty($prodi)) {
        $errors[] = "Program Studi must be selected";
    }
    
    // Validasi Password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (!validatePassword($password)) {
        $errors[] = "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one number";
    }
    
    // Jika ada error, tampilkan alert dan kembali ke form
    if (!empty($errors)) {
        $error_message = "Error processing form:\n" . implode("\n", $errors);
        echo "<script>alert('" . addslashes($error_message) . "'); window.history.back();</script>";
        exit();
    }
    
    // Jika semua validasi berhasil, redirect ke result.php dengan data
    session_start();
    $_SESSION['form_data'] = [
        'username' => $username,
        'email' => $email,
        'universitas' => $universitas,
        'prodi' => $prodi,
        'hobi' => $hobi
    ];
    
    // Tampilkan alert sukses dan redirect ke result
    echo "<script>alert('Form submitted successfully!'); window.location.href='result.php';</script>";
    exit();
    
} else {
    // Jika bukan POST request, redirect ke index.html
    header("Location: index.html");
    exit();
}
?>
