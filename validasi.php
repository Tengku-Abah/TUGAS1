/*
Kelompok 8 // Kelas E
Tengku muhamad Afif Alghomidy (24060123140165)
Zoe Mohamed (24060123140182)
Shakila Tungga Dewi (24060123120025)
Tsabita Syahida Khafid (24060123130071) 
*/

<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $university = trim($_POST['university'] ?? '');
    $program = $_POST['program'] ?? '';
    $hobbies = $_POST['hobbies'] ?? [];
    $password = $_POST['password'] ?? '';
    
    // Validation
    // 1. Validasi Username (Tidak boleh ada angka dan tidak boleh kosong)
    if (empty($username)) {
        $errors[] = "Username tidak boleh kosong";
    } else {
        $hasNumber = false;
        for ($i = 0; $i < strlen($username); $i++) {
            if (is_numeric($username[$i])) {
                $hasNumber = true;
                break;
            }
        }
        if ($hasNumber) {
            $errors[] = "Username tidak boleh mengandung angka";
        }
    }
    
    // 2. Validasi email harus ada @ dan domain emailnya
    if (empty($email)) {
        $errors[] = "Email tidak boleh kosong";
    } elseif (strpos($email, '@') === false) {
        $errors[] = "Email harus mengandung @";
    } elseif (substr_count($email, '@') > 1) {
        $errors[] = "Email hanya boleh mengandung satu @";
    } else {
        $parts = explode('@', $email);
        if (empty($parts[0]) || empty($parts[1])) {
            $errors[] = "Format email tidak valid";
        } elseif (strpos($parts[1], '.') === false) {
            $errors[] = "Email harus memiliki domain (contoh: .com, .id)";
        }
    }
    
    // 3. Validasi Unviersitas,Universitas tidak boleh kosong
    if (empty($university)) {
        $errors[] = "Perguruan tinggi tidak boleh kosong";
    }
    
    // 4. Validasi program studi,wajib memilih salah satu opsi
    if (empty($program)) {
        $errors[] = "Program studi harus dipilih";
    }
    
    // 5. Hobi tidak membutuhkan validasi,karena pengisiannya yang optional
    
    // 6. Validasi password dengan ketentuan(minimal 8 karakter, 1 huruf besar, 1 huruf kecil, 1 angka)
    if (empty($password)) {
        $errors[] = "Password tidak boleh kosong";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password minimal 8 karakter";
    } else {
        $hasUpper = false;
        $hasLower = false;
        $hasNumber = false;
        
        for ($i = 0; $i < strlen($password); $i++) {
            $char = $password[$i];
            if ($char >= 'A' && $char <= 'Z') {
                $hasUpper = true;
            } elseif ($char >= 'a' && $char <= 'z') {
                $hasLower = true;
            } elseif ($char >= '0' && $char <= '9') {
                $hasNumber = true;
            }
        }
        
        if (!$hasUpper) {
            $errors[] = "Password harus mengandung minimal 1 huruf besar";
        }
        if (!$hasLower) {
            $errors[] = "Password harus mengandung minimal 1 huruf kecil";
        }
        if (!$hasNumber) {
            $errors[] = "Password harus mengandung minimal 1 angka";
        }
    }
    
    // Kondisi untuk cek,jika tidak ada error maka kirim data ke page result
    if (empty($errors)) {
        $_SESSION['form_data'] = [
            'username' => $username,
            'email' => $email,
            'university' => $university,
            'program' => $program,
            'hobbies' => $hobbies,
            'password' => $password
        ];
        
        // Berikan alert success
        echo "<script>
                alert('Form submitted successfully!');
                window.location.href = 'detail.php';
              </script>";
        exit;
    } else {
        // Validasi form gagal tampilkan pesan error
        echo "<script>
                alert('" . implode('\\n', array_map('addslashes', $errors)) . "');
                window.history.back();
              </script>";
        exit;
    }
} else {
    // Mencegah request selain "POST",jika user mencoba akses result.php secara langsung dari route,maka akan langsung redirect ke form 
    header('Location: index.html');
    exit;
}
?>

