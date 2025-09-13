<?php
session_start();

// Check if form data exists in session
if (!isset($_SESSION['form_data'])) {
    header('Location: index.html');
    exit;
}

$formData = $_SESSION['form_data'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .detail-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .details-info {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 4px;
            margin-top: 20px;
        }
        
        .details-info h3 {
            margin-top: 0;
            color: #495057;
        }
        
        .detail-item {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .detail-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        
        .back-btn {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        
        .back-btn:hover {
            background-color: #0056b3;
        }
        
        .new-form-btn {
            background-color: #28a745;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            margin-left: 10px;
        }
        
        .new-form-btn:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="detail-container">
        <h2>Detail Registrasi Mahasiswa</h2>
        
        <div class="alert-success">
            <strong>Success!</strong> Form submitted successfully!
        </div>
        
        <div class="details-info">
            <h3>Detail Informasi Data</h3>
            <div class="detail-item">
                <span class="detail-label">Username:</span>
                <?= htmlspecialchars($formData['username']) ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <?= htmlspecialchars($formData['email']) ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Perguruan Tinggi:</span>
                <?= htmlspecialchars($formData['university']) ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Program Studi:</span>
                <?= htmlspecialchars($formData['program']) ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Hobi:</span>
                <?= !empty($formData['hobbies']) ? implode(', ', array_map('htmlspecialchars', $formData['hobbies'])) : 'Tidak ada' ?>
            </div>
            <div class="detail-item">
                <span class="detail-label">Password:</span>
            </div>
        </div>
        
        <a href="index.html" class="new-form-btn">Isi Form Lagi</a>
        
        <?php
        // Clear session data after displaying
        unset($_SESSION['form_data']);
        ?>
    </div>
</body>
</html>
