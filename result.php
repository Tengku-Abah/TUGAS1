<?php
/*
Kelompok 8 // Kelas E
Tengku muhamad Afif Alghomidy (24060123140165)
Zoe Mohamed (24060123140182)
Shakila Tungga Dewi (24060123120025)
Tsabita Syahida Khafid (24060123130071) 
*/
session_start();

// Kondisi untuk cek apakah data ada di session
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
    <title>Student Sign On Form</title>
</head>

<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th colspan="2">Student Registration Details</th>
        </tr>
        <tr>
            <td colspan="2" style="background-color: #d4edda; color: #155724; padding: 10px;">
                <strong>Success!</strong> Form submitted successfully!
            </td>
        </tr>
        <tr>
            <td><strong>Username:</strong></td>
            <td><?= htmlspecialchars($formData['username']) ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?= htmlspecialchars($formData['email']) ?></td>
        </tr>
        <tr>
            <td><strong>Perguruan Tinggi:</strong></td>
            <td><?= htmlspecialchars($formData['universitas']) ?></td>
        </tr>
        <tr>
            <td><strong>Program Studi:</strong></td>
            <td><?= htmlspecialchars($formData['prodi']) ?></td>
        </tr>
        <tr>
            <td><strong>Hobi:</strong></td>
            <td><?= !empty($formData['hobi']) ? implode(', ', array_map('htmlspecialchars', $formData['hobi'])) : 'Tidak ada' ?></td>
        </tr>
        <tr>
            <td><strong>Password:</strong></td>
            <td>**********</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="index.html" style="text-decoration: none;">
                    <button type="button">Isi Form Lagi</button>
                </a>
            </td>
        </tr>
    </table>

    <?php
    // Bersihkan Session
    unset($_SESSION['form_data']);
    ?>
</body>

</html>
