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
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fffdf5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 500px;
            margin: 40px auto;
            padding: 30px;
            border: 2px solid rgb(234, 234, 234);
            border-radius: 20px;
            background: #fff;
            box-sizing: border-box;
            box-shadow: 0px 0px 50px 0px rgba(189, 189, 189, 0.18);
        }
        h2 {
            color: #1976d2;
            text-align: center;
            margin-bottom: 24px;
        }
        .result-row {
            margin-bottom: 16px;
            font-size: 16px;
            color: #222;
            display: flex;
            align-items: flex-start;
        }
        .result-label {
            min-width: 160px;
            font-weight: bold;
            color: #1565c0;
        }
        .result-value {
            flex: 1;
        }
        .hobi-list {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 8px;
            padding: 2px 10px;
            margin-right: 6px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Submitted Successfully!</h2>
        <div class="result-row"><span class="result-label">Username:</span> <span class="result-value"><?php echo htmlspecialchars($username); ?></span></div>
        <div class="result-row"><span class="result-label">Email:</span> <span class="result-value"><?php echo htmlspecialchars($email); ?></span></div>
        <div class="result-row"><span class="result-label">Perguruan Tinggi:</span> <span class="result-value"><?php echo htmlspecialchars($univ); ?></span></div>
        <div class="result-row"><span class="result-label">Program Studi:</span> <span class="result-value"><?php echo htmlspecialchars($prodi); ?></span></div>
        <div class="result-row"><span class="result-label">Hobi:</span> <span class="result-value">
            <?php 
                if (!empty($hobi)) {
                    foreach($hobi as $h) {
                        echo '<span class="hobi-list">'.htmlspecialchars($h).'</span>';
                    }
                } else {
                    echo "<span style='color:#888'>Tidak ada hobi dipilih</span>";
                }
            ?>
        </span></div>
    </div>
</body>
</html>