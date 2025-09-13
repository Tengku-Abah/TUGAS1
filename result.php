<?php
session_start();


if (!isset($_SESSION['form_data'])) {
    header("Location: index.html");
    exit();
}

$form_data = $_SESSION['form_data'];


unset($_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Result</title>
</head>
<body>
    <h1>Display Detail Informasi Data</h1>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th colspan="2">Data Mahasiswa</th>
        </tr>
        <tr>
            <td><strong>Username:</strong></td>
            <td><?php echo htmlspecialchars($form_data['username']); ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo htmlspecialchars($form_data['email']); ?></td>
        </tr>
        <tr>
            <td><strong>University:</strong></td>
            <td><?php echo htmlspecialchars($form_data['universitas']); ?></td>
        </tr>
        <tr>
            <td><strong>Program Studi:</strong></td>
            <td><?php echo htmlspecialchars($form_data['prodi']); ?></td>
        </tr>
        <tr>
            <td><strong>Hobbies:</strong></td>
            <td>
                <?php 
                if (!empty($form_data['hobi'])) {
                    echo htmlspecialchars(implode(', ', $form_data['hobi']));
                } else {
                    echo 'No hobbies selected';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="index.html">Back to Form</a>
            </td>
        </tr>
    </table>
</body>
</html>