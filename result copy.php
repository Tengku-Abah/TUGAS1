<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
$username = $_SESSION['username'];
$email    = $_SESSION['email'];
$univ     = $_SESSION['univ'];
$prodi    = $_SESSION['prodi'];
$hobi     = $_SESSION['hobi'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <h2>Form Submitted Successfully!</h2>
    <p>Username: <?php echo htmlspecialchars($username); ?></p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <p>Perguruan Tinggi: <?php echo htmlspecialchars($univ); ?></p>
    <p>Program Studi: <?php echo htmlspecialchars($prodi); ?></p>
    <p>Hobi: 
        <?php 
                if (!empty($hobi)) {
                    echo implode(", ", $hobi);
                } else {
                    echo "Tidak ada hobi dipilih";
                }
        ?>
    </p>
</body>
</html>