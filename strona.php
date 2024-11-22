<?php

$host = 'localhost';
$dbname = 'wycieczki';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro</title>
    <link rel="style" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Oferty Wycieczek</h1>
    <?php
    
    if ($result->num_rows > 0) 
        
    echo "<table>";
    echo "<tr><th>Data Wyjazdu</th><th>Cel</th><th>Cena</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['dataWyjazdu']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cel']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cena']) . " PLN</td>";
            echo "</tr>";
        }

    $conn->close();
    ?>

    </div>
</body>
</html>