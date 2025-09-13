<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .form-wrapper {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
        }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-berhasil {
            background: #d4edda; color: #155724; border: 1px solid #c3e6cb;
        }
        .detail { background: #e9ecef; padding: 20px; border-radius: 4px; margin-top: 20px; }
        .detail-item { margin-bottom: 10px; border-bottom: 1px solid #dee2e6; padding-bottom: 8px; }
        .label-detail { font-weight: bold; display: inline-block; width: 150px; }
        .back-btn {
            display: block; margin-top: 20px; text-align: center;
            background: #007bff; color: white; padding: 10px 20px;
            border-radius: 4px; text-decoration: none;
        }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>

<body>
    <div class="form-wrapper">
        <h2>Data Registrasi Berhasil</h2>

        <div class="alert alert-berhasil">✅ Form berhasil tervalidasi!</div>

        <div class="detail">
            <div class="detail-item">
                <span class="label-detail">Nama Pengguna:</span>
                <?= htmlspecialchars($_SESSION['username']) ?>
            </div>
            <div class="detail-item">
                <span class="label-detail">Email:</span>
                <?= htmlspecialchars($_SESSION['email']) ?>
            </div>
            <div class="detail-item">
                <span class="label-detail">Perguruan Tinggi:</span>
                <?= htmlspecialchars($_SESSION['university']) ?>
            </div>
            <div class="detail-item">
                <span class="label-detail">Program Studi:</span>
                <?= htmlspecialchars($_SESSION['program']) ?>
            </div>
            <div class="detail-item">
                <span class="label-detail">Hobi:</span>
                <?= empty($_SESSION['hobbies']) ? "-" : implode(", ", $_SESSION['hobbies']) ?>
            </div>
        </div>
    </div>
</body>
</html>
